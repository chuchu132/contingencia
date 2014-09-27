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
	

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'street' => array(
			 'characters' => array(
       		 'rule' => array('custom', '/^[a-z0-9 ]*$/i'),
        		'message'  => 'Solo letras, números y espacios.'
   		 ),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
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
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
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
		),
		'age' => array(
			'numeric' => array(
				'rule' => array('positiveNumber'),
				'message' => 'Debes ingresar la antigüedad aproximada en años.',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	
		'price' => array(
			'numeric' => array(
				'rule' => array('positiveNumber'),
				//'message' => 'Your custom message here',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'currency' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'alphaNumeric' => array(
				'rule' => array('alphaNumeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			
		),
		
		'bathrooms' => array(
			'numeric' => array(
				'rule' => array('positiveNumber'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		
	
	);
	
	public function positiveNumber($check) {
		// $data array is passed using the form field name as the key
		// have to extract the value to make the function generic
		$value = array_values($check);
		$value = $value[0];
		return (is_numeric($value) && $value >= 0);
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
		)
	);
}
