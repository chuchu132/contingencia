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


	public $uses = array('City','Publication','PropertyType','OperationType','Neighborhood');
	  
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
		error_log(print_r($publications,true));
		$this->response->body(json_encode($publications));
	}
	
	
}
