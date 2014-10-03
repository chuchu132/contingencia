<?php
App::uses('AppModel', 'Model');
/**
 * Publication Model
 *
 * @property Neighborhood $Neighborhood
 * @property OperationType $OperationType
 * @property PropertyType $PropertyType
 * @property User $User
 */
class Publication extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'street';
	public $virtualFields = array('address'=>'CONCAT(Publication.street," ", Publication.st_number)');

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'imagen_1'=>array(
				'fileNotEmpty' => array(
						'rule' => array('fileNotEmpty'),
						'message' => 'El campo no puede quedar vacío.',
						//'allowEmpty' => false,
						//'required' => false,
						//'last' => false, // Stop validation after this rule
						//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
				
	),	
			
		'street' => array(
			 'characters' => array(
       		 'rule' => array('custom', '/^[a-z0-9 ]*$/i'),
        		'message'  => 'Solo letras, números y espacios.',
			 		'required' => false,
			 		
   		 ),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'El campo no puede quedar vacío.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'st_number' => array(
			'numeric' => array(
				'rule' => array('positiveNumber'),
				'message' => 'solo_numeros_error',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'El campo no puede quedar vacío.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'number' => array(
					'rule'    => array('range', 0, 20001),
					'message' => 'Por favor ingrese un número entre 1 y 20000'
			)
		),
		'covered_area' => array(
			'numeric' => array(
				'rule' => array('positiveNumber'),
				'message' => 'solo_numeros_error',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'number' => array(
					'rule'    => array('range', -1, 1000000000),
					'message' => 'Por favor ingrese un número entre 0 y 999999999'
			),
			'area' => array(
				'rule' => array('validateArea'),
				'message' => 'La superficie cubierta debe ser menor o igual a la superficie total.'
			)
		),
		'total_area' => array(
			'numeric' => array(
				'rule' => array('positiveNumber'),
				'message' => 'solo_numeros_error',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'number' => array(
					'rule'    => array('range', -1, 1000000000),
					'message' => 'Por favor ingrese un número entre 0 y 999999999'
			),
			
		),
		'rooms' => array(
			'numeric' => array(
				'rule' => array('positiveNumber'),
				'message' => 'solo_numeros_error',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'number' => array(
					'rule'    => array('range', 0, 101),
					'message' => 'Por favor ingrese un número entre 1 y 100'
			)
		),
		'expenses' => array(
			'numeric' => array(
				'rule' => array('positiveNumber'),
				'message' => 'solo_numeros_error',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'number' => array(
					'rule'    => array('range', -1, 5001),
					'message' => 'Por favor ingrese un número entre 0 y 5000'
			)
		),
		'age' => array(
			'numeric' => array(
				'rule' => array('positiveNumber'),
				'message' => 'Debes ingresar la antigüedad aproximada en años.',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'number' => array(
					'rule'    => array('range', -1, 5001),
					'message' => 'Por favor ingrese un número entre 0 y 5000'
			)
		),
	
		'price' => array(
			'numeric' => array(
				'rule' => array('positiveNumber'),
				'message' => 'solo_numeros_error',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'number' => array(
					'rule'    => array('range', -1, 1000000000),
					'message' => 'Por favor ingrese un número entre 0 y 999999999'
			)
		),
		'currency' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'El campo no puede quedar vacío.',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			
			
		),
		
		'bathrooms' => array(
			'numeric' => array(
				'rule' => array('positiveNumber'),
			'message' => 'solo_numeros_error',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'number' => array(
					'rule'    => array('range', -1, 101),
					'message' => 'Por favor ingrese un número entre 0 y 100'
			)
		),
		
	
	);

	
	public function fileNotEmpty($check) {
		return (is_array($check['imagen_1']) && !empty($check['imagen_1']['name']) );
	}
	public function positiveNumber($check) {
		// $data array is passed using the form field name as the key
		// have to extract the value to make the function generic
		$value = array_values($check);
		$value = $value[0];
		return (is_numeric($value) && $value >= 0);
	}

	
	public function validateArea($field){
		if(isset($this->data['Publication']['covered_area']) && isset($this->data['Publication']['total_area'])){
			return $this->data['Publication']['covered_area'] <= $this->data['Publication']['total_area'];
		}else {
			return true;
		}
	}
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Neighborhood' => array(
			'className' => 'Neighborhood',
			'foreignKey' => 'neighborhood_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'OperationType' => array(
			'className' => 'OperationType',
			'foreignKey' => 'operation_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PropertyType' => array(
			'className' => 'PropertyType',
			'foreignKey' => 'property_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PublicationType' => array(
			'className' => 'PublicationType',
			'foreignKey' => 'publication_type',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
