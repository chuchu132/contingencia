<?php
App::uses('AppController', 'Controller');
App::uses('CakeTime', 'Utility');
App::uses('Sanitize', 'Utility');
App::uses('CakeEmail', 'Network/Email');
/**
 * Publications Controller
 *
 * @property Publication $Publication
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PublicationsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	
	public $components = array('Paginator', 'Session');

	public $uses =  array('PublicationType','Publication', 'InstantPaymentNotification');

	public $helpers = array('Html','Form','PaypalIpn.Paypal');
	
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('cron_update_publications','public_view');
	}
	
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$options = array('Publication.user_id'=>$this->current_user['id']);
		if($this->request->is('post')){
			$filter = $this->request->data['Publication']['status'];
			$this->Session->write('Status.filter',Sanitize::clean($filter));
		}
		
		$filter = $this->Session->read('Status.filter');
		if($filter){
			$options['Publication.status'] = $filter;
		}
		
		$this->Publication->recursive = 0;
		$this->Paginator->settings = array(
				'conditions' => $options,
				'limit' => '10',
				'order' => array(
						'updated' => 'desc'
				)
		);
		$this->set('status_filter',$filter);
		$this->set('publications', $this->paginate('Publication'));
		$this->set('status_list',unserialize(FILTROS_ESTADOS));
		$this->set('type',unserialize(TIPOS_PUBLICACION));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Publication->exists($id)) {
			throw new NotFoundException(__('Invalid publication'));
		}
		$options = array('conditions' => array('Publication.' . $this->Publication->primaryKey => $id, 'Publication.user_id'=>$this->current_user['id']));
		$this->set('publication', $this->Publication->find('first', $options));
		$this->set('status_list',unserialize(FILTROS_ESTADOS));
		$this->set('type',unserialize(TIPOS_PUBLICACION));
		$this->set('is_public',false);
	}

/**
 * add method
 *
 * @return void
 */
	public function add($type) {
		if(!isset($type)){
			$this->redirect(array('action' => 'choose'));
		}
		$publication_type = $this->PublicationType->findById($type);
		if(!$publication_type){
			$this->redirect(array('action' => 'choose'));
		}
		if ($this->request->is('post')) {
			$this->Publication->create();
			$this->setDefaults($publication_type);
			if ($this->Publication->save($this->request->data)) {
				$publication =$this->Publication->findById($this->Publication->getLastInsertID());
				$this->__sendPublicationStartEmail($publication);
				$this->Session->setFlash(__('The publication has been saved'), 'flash/success');
                if($publication_type->id==1){
                    $this->Publication->saveField('pagado',true);
                    $this->redirect(array('action' => 'index'));
                }else{
                    $this->Publication->saveField('status',PAUSADO);
                    $this->Publication->saveField('pagado',false);
                    $this->redirect(array('action' => 'paypal', $this->Publication->id));
                }
			} else {
				$this->Session->setFlash(__('The publication could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$neighborhoods = $this->Publication->Neighborhood->find('list');
		$operationTypes = $this->Publication->OperationType->find('list');
		$propertyTypes = $this->Publication->PropertyType->find('list');
		$users = $this->Publication->User->find('list');
		$this->set('type',$type);
		$this->set('currency_types',unserialize(MONEDAS));
		$this->set(compact('neighborhoods', 'operationTypes', 'propertyTypes', 'users'));
	}

/**
 * paypal method
 *
 * @return void
 */
	public function paypal($id) {
	/*
        Paypal account= andes.garcia@inakanetworks.com
        password = MiLEEM2014
	*/

        $publication = $this->Publication->findByIdAndUserId($id,$this->current_user['id']);
		$type = $publication['PublicationType'];

        if($publication['Publication']['republicada']){
        $order = array(
               'id' => $id,
               'description' => 'Aviso republicado en MiLEEM',
               'amount' => $type['republication_cost'],
               'return' => "http://mileem-fiuba.herokuapp.com/publications/paypal_success/".$id,
               'cancel' => "http://mileem-fiuba.herokuapp.com/publications/paypal_cancel/".$id
           );
        }else{
        $order = array(
               'id' => $id,
               'description' => 'Aviso publicado en MiLEEM',
               'amount' => $type['cost'],
               'return' => "http://mileem-fiuba.herokuapp.com/publications/paypal_success/".$id,
               'cancel' => "http://mileem-fiuba.herokuapp.com/publications/paypal_cancel/".$id
           );
        }
        $this->set('order',$order);
	}


/**
 * paypal method
 *
 * @return void
 */
	public function paypal_cancel($id) {
		$this->Session->setFlash(__('Realize el pago para que el aviso sea publicado'), 'flash/error');
        $this->redirect(array('action' => 'index'));
	}

/**
 * paypal method
 *
 * @return void
 */
	public function paypal_success($id) {
        $this->Session->setFlash(__('Cuando el pago sea acreditado su aviso será publicado'), 'flash/success');
        $this->redirect(array('action' => 'index'));
	}

	private function setDefaults($publication_type){
		$images_urls = $this->__uploadImages();
		$this->request->data['Publication']['images_url'] = $images_urls;
		$this->request->data['Publication']['user_id'] = $this->current_user['id'];
		$this->request->data['Publication']['publication_date'] = date("Y-m-d");
		$this->request->data['Publication']['end_date'] = date('Y-m-d', strtotime("+".$publication_type['PublicationType']['duration']." days"));
		$this->request->data['Publication']['status'] = PUBLICADA;
		
	}
	
	private function __uploadImages(){
		error_reporting(0);
		$images = array();
		$images_urls = array();
		for ($i= 1; $i<6; $i++){
			if(isset($this->request->data['Publication']["imagen_$i"])){
				$images[] = $this->request->data['Publication']["imagen_$i"]['tmp_name'];
			}
		}
		
		foreach ($images as $image){
			$finfo = new finfo(FILEINFO_MIME_TYPE);
			if (!(false === $ext = array_search(
					$finfo->file($image),
					array(
							'jpg' => 'image/jpeg',
							'png' => 'image/png',
							'gif' => 'image/gif',
					),
					true
			) )) {
				
				$path = 'files'.DS.sha1_file($image).'.'.$ext;
				if (move_uploaded_file($image,APP.WEBROOT_DIR.DS.$path)) {
					$images_urls[] = $path;
				}
			}
		}
		return json_encode($images_urls);
	}
	

	public function replay($id = null) {
        $publication = $this->Publication->findByIdAndUserId($id,$this->current_user['id']);
		if (!((bool)$publication)) {
			throw new NotFoundException(__('Invalid publication'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$data['Publication']['id']=$id;
			$data['Publication']['price']= $this->request->data['Publication']['price'];
			$data['Publication']['currency']= $this->request->data['Publication']['currency'];
			$data['Publication']['publication_date'] = date("Y-m-d");
			$data['Publication']['end_date'] = date('Y-m-d', strtotime("+".$publication['PublicationType']['duration']." days"));
			$data['Publication']['status'] = PUBLICADA;
			$data['Publication']['republicada'] = true;
			$data['Publication']['pagado'] = true;
			if ($this->Publication->save($data)) {
				$publication = $this->Publication->findById($id);
				$this-> __sendPublicationStartEmail($publication);
				$this->Session->setFlash(__('The publication has been saved'), 'flash/success');
                if($publication['PublicationType']['id']=="1"){
                    $this->redirect(array('action' => 'index'));
                }else{

			        $data['Publication']['status'] = PAUSADO;
			        $data['Publication']['pagado'] = false;
			        $this->Publication->save($data);
                    $this->redirect(array('action' => 'paypal', $this->Publication->id));
                }
			} else {
				$this->Session->setFlash(__('The publication could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Publication.' . $this->Publication->primaryKey => $id));
			$this->request->data = $this->Publication->find('first', $options);
		}
		
		$this->set('currency_types',unserialize(MONEDAS));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$publication = $this->Publication->findByIdAndUserId($id,$this->current_user['id']);
		if (!((bool)$publication)) {
			throw new NotFoundException(__('Invalid publication'));
		}
		$this->Publication->id = $id;
		if ($this->Publication->delete()) {
			$this->Session->setFlash(__('Publication deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Publication was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
	
	public function choose(){
		
	}
	
	public function pause($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$publication = $this->Publication->findByIdAndUserId($id,$this->current_user['id']);
		if (!((bool)$publication)) {
			throw new NotFoundException(__('Invalid publication'));
		}
		
		if($publication['Publication']['status'] != FINALIZADA){
			$this->Publication->id = $id;
			if($this->Publication->saveField('status',PAUSADO)){
				$this->Session->setFlash(__('La Publicación fue pausada'), 'flash/success');
			}
		}
		$this->redirect(array('action' => 'index'));
	}
	
	public function play($id = null) {
		App::uses('CakeTime', 'Utility');
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$publication = $this->Publication->findByIdAndUserId($id,$this->current_user['id']);
		if (!((bool)$publication)) {
			throw new NotFoundException(__('Invalid publication'));
		}
		error_log($publication['Publication']['status']);
		if($publication['Publication']['status'] != FINALIZADA && !CakeTime::isPast($publication['Publication']['end_date'])){
			$this->Publication->id = $id;

            if($publication['Publication']['pagado']){
                if($this->Publication->saveField('status',PUBLICADA)){
                    $this->Session->setFlash(__('La Publicación fue reanudada'), 'flash/success');
                }
            }else{
                $this->redirect(array('action' => 'paypal', $this->Publication->id));
                return ;
            }
		}else{
			$this->Session->setFlash(__('La Publicación no puede ser reanudada'), 'flash/error');
		}
		$this->redirect(array('action' => 'index'));
	}
	
	public function end($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$publication = $this->Publication->findByIdAndUserId($id,$this->current_user['id']);
		if (!((bool)$publication)) {
			throw new NotFoundException(__('Invalid publication'));
		}
		$this->Publication->id = $id;
		if($this->Publication->saveField('status',FINALIZADA)){
			$this->Session->setFlash(__('La Publicación fue finalizada.'), 'flash/success');
		}
		$this->redirect(array('action' => 'index'));
	}
	
	
	public function cron_update_publications(){
			$this->autoRender = false;
			$ended_publications = $this->Publication->find('all',	array('conditions'=>array('Publication.end_date <' => date('Y-m-d'), 'Publication.status !=' => FINALIZADA)));
			foreach ($ended_publications as $publication){
				$this->Publication->id = $publication['Publication']['id'];
				$this->Publication->saveField('status',FINALIZADA);
				$this->__sendPublicationEndEmail($publication);
				echo "FINALIZA LA PUBLICACION #".$publication['Publication']['id']."<br/>";
			}
			echo "cron_update_publications";
	}
	
	private function __sendPublicationStartEmail($publication){
		$Email = new CakeEmail('gmail');
		$Email->from("infomileem@gmail.com","MiLEEM");
		$Email->to($publication['User']['username']);
		$Email->subject($publication['Publication']['address']. ' ha comenzado.');
		$Email->send('La Publicación #'.$publication['Publication']['id'].' ha comenzado y finalizará el día '.date('d-m-Y', strtotime($publication['Publication']['end_date'] )));
	}
	
	private function __sendPublicationEndEmail($publication){
		$Email = new CakeEmail('gmail');
		$Email->from("infomileem@gmail.com","MiLEEM");
		$Email->to($publication['User']['username']);
		$Email->subject($publication['Publication']['address']. ' ha finalizado.');
		$Email->send('La Publicación #'.$publication['Publication']['id'].' ha finalizado'.(($publication['PublicationType']['republication_days'] ==0)?'.':'. Tienes tiempo hasta el '. date('d-m-Y',strtotime( $publication['Publication']['end_date'].' +'.$publication['PublicationType']['republication_days'].' days' )).' para republicar tu propiedad a precios promocionales.'));
	}
	
	public function public_view($id = null) {
		
		$options = array('conditions' => array('Publication.' . $this->Publication->primaryKey => $id , 'Publication.status'=> PUBLICADA ));
		$publication = $this->Publication->find('first', $options);
		if($publication != null){
			$this->set('is_public',true);
			$this->set('set_social_tags',true);
			$this->set('publication',$publication );
			$this->set('status_list',unserialize(FILTROS_ESTADOS));
			$this->set('type',unserialize(TIPOS_PUBLICACION));
			$this->render('view');
		}else{
			$this->redirect(array('controller'=>'users','action' => 'login'));
		}
	}
}
