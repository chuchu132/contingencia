<?php
App::uses('AppController', 'Controller');
App::uses('CakeTime', 'Utility');
App::uses('Sanitize', 'Utility');
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
		if ($this->request->is('post')) {
			$this->Publication->create();
			$this->setDefaults();
			if ($this->Publication->save($this->request->data)) {
				$this->Session->setFlash(__('The publication has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
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

	private function setDefaults(){
		$images_urls = $this->__uploadImages();
		$this->request->data['Publication']['images_url'] = $images_urls;
		$this->request->data['Publication']['user_id'] = $this->current_user['id'];
		$this->request->data['Publication']['publication_date'] = date("Y-m-d");
		$this->request->data['Publication']['end_date'] = date('Y-m-d', strtotime("+30 days"));
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
	
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $publication = $this->Publication->findByIdAndUserId($id,$this->current_user['id']);
		if (!((bool)$publication)) {
			throw new NotFoundException(__('Invalid publication'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$data['Publication']= array('id'=>$id,'price'=>$this->request->data['Publication']['price'],'currency'=>$this->request->data['Publication']['currency']);
			if ($this->Publication->save($data)) {
				$this->Session->setFlash(__('The publication has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
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
			if($this->Publication->saveField('status',PUBLICADA)){
				$this->Session->setFlash(__('La Publicación fue reanudada'), 'flash/success');
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
	
}
