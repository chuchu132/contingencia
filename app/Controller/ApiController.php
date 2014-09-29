<?php
App::uses('AppController', 'Controller');
/**
 * Cities Controller
 *
 * @property City $City
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ApiController extends AppController {


	public $uses = array('City','Publication','PropertyType','OperationType','Neighborhood','Currency');
	  
	public $autoRender = false;

	public function beforeFilter() {
		$this->Auth->allow();
	}
	
	public  function index(){
		
	}
	
	public function neighborhoods(){
		$this->response->type('json');
		$this->Neighborhood->recursive = 0;
		$neighborhoods = $this->Neighborhood->find('all',array('fields' => array('Neighborhood.id', 'Neighborhood.name' )));
		$neighborhoods_array = array();
		foreach ($neighborhoods as $key =>$value){
			$neighborhoods_array[] = $value['Neighborhood'];
		}
		$this->response->body(json_encode($neighborhoods_array));
	}
	
	public function operation_types(){
		$this->response->type('json');
		$this->OperationType->recursive = 0;
		$operation_types = $this->OperationType->find('all',array('fields' => array('OperationType.id', 'OperationType.name' )));
		$operation_types_array = array();
		foreach ($operation_types as $key =>$value){
			$operation_types_array[] = $value['OperationType'];
		}
		$this->response->body(json_encode($operation_types_array));
	}
	
	public function property_types(){
		$this->response->type('json');
		$this->PropertyType->recursive = 0;
		$property_types = $this->PropertyType->find('all',array('fields' => array('PropertyType.id', 'PropertyType.name' ,'PropertyType.category')));
		$property_types_array = array();
		foreach ($property_types as $key =>$value){
			$property_types_array[] = $value['PropertyType'];
		}
		$this->response->body(json_encode($property_types_array));
	}
	
	public function publications(){
	error_log('Publications request from :'.$_SERVER['REMOTE_ADDR']);
	error_log('Request: '.print_r($this->request->query,true));	
		$this->response->type('json');
		$this->Publication->recursive = 1;
		
		$conditions = array();
		$conditions['Publication.property_type_id'] =  $this->request->query('property_type');
		$conditions['Publication.operation_type_id'] =  $this->request->query('operation_type');
		$conditions['Publication.neighborhood_id'] =  $this->request->query('neighborhood');
		$conditions['Publication.updated <='] = date("Y-m-d H:i:s", ($this->request->query('timestamp')));
		$conditions['Publication.status'] =  PUBLICADA;

		
		
		if(!is_null($this->request->query('precio')) && !is_null($this->request->query('moneda'))){
			$scale = $this->Currency->findByCode($this->request->query('moneda'));
			$precios = $this->request->query('precio');
			$desde = ($precios[0] == '')?0:$precios[0];
			$hasta = $precios[1];
			if($hasta != ''){
					if($desde>$hasta){
						$tmp = $hasta;
						$hasta = $desde;
						$desde = $tmp;
					}
				$conditions['Publication.scaled_price BETWEEN ? AND ?'] =  array(($desde * $scale['Currency']['factor']),($hasta * $scale['Currency']['factor']));
			}else {
				$conditions['Publication.scaled_price >='] =  ($desde * $scale['Currency']['factor']);
			}
		}
		
		if(!is_null($this->request->query('sup_total'))){
			$conditions['Publication.total_area >='] = $this->request->query('sup_total') ;
		}
		if(!is_null($this->request->query('sup_cubierta'))){
			$conditions['Publication.covered_area >='] = $this->request->query('sup_cubierta') ;
		}
		if(!is_null($this->request->query('ambientes'))){
			$conditions['Publication.rooms >='] = $this->request->query('ambientes') ;
		}
		if(!is_null($this->request->query('expensas'))){
			$conditions['Publication.expenses <='] = $this->request->query('expensas') ;
		}
		if(!is_null($this->request->query('antiguedad'))){
			$conditions['Publication.age <='] = $this->request->query('antiguedad') ;
		}
		if(!is_null($this->request->query('a_estrenar'))){
			$conditions['Publication.expenses'] = (bool)$this->request->query('a_estrenar') ;
		}
		if(!is_null($this->request->query('banos'))){
			$conditions['Publication.bathrooms >='] = $this->request->query('banos') ;
		}
		if(!is_null($this->request->query('en_suite'))){
			$conditions['Publication.ensuite_bedroom'] = (bool)$this->request->query('en_suite') ;
		}
		if(!is_null($this->request->query('con_cochera'))){
			$conditions['Publication.garage'] = (bool)$this->request->query('con_cochera') ;
		}
		
		
		$options = array();
		$options['conditions'] = $conditions;
		$options['order'] = array('Publication.publication_type desc','Publication.'.$this->request->query('sort_field').' '.$this->request->query('order'), 'Publication.created DESC');
		$options['limit'] = 5;
		$options['offset'] = $this->request->query('offset');
		$options['fields'] = array('Publication.address','Publication.rooms','Publication.total_area','Publication.images_url','Publication.operation_type','Publication.currency','Publication.scaled_price','Publication.price','Publication.publication_type','Publication.neighborhood','Publication.property_type' );
		$options['joins'] =array(
        array(
            'table' => 'currency_convertor',
            'alias' => 'Currency',
            'type' => 'INNER',
            'conditions' => array(
                'Currency.code = Publication.currency'
            )
        )
    );
	
		$this->Publication->virtualFields['address'] = 'CONCAT(Publication.street," ", Publication.st_number)';
		$this->Publication->virtualFields['neighborhood'] = 'Neighborhood.name';
		$this->Publication->virtualFields['operation_type'] = 'OperationType.name';
		$this->Publication->virtualFields['property_type'] = 'PropertyType.name';
		$this->Publication->virtualFields['scaled_price'] = '(Publication.price * Currency.factor)';
		$publications = $this->Publication->find('all',$options);
		error_log("Resultados: ".count($publications));
		$this->response->body(json_encode($publications));
	}
	
	
}
