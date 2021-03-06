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
	public $displayField = 'address';
	public $virtualFields = array('address'=>'CONCAT(Publication.address)');

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
	'video'=>array(
				'validateVideo' => array(
						'rule' => array('validateVideo'),
						'message' => 'El link es inválido.',
						//'allowEmpty' => false,
						//'required' => false,
						//'last' => false, // Stop validation after this rule
						//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
				
	),	
			
		'address' => array(
			 'characters' => array(
       		 'rule' => array('custom', '/^[a-z0-9 ,.]*$/i'),
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
	
	public function validateVideo($field){
		if(isset($this->data['Publication']['video'])){
			$link = $this->data['Publication']['video'];
			if(strlen(trim($link))> 0){
				$pattern = '#^(?:https?://)?(?:www\.)?(?:youtu\.be/|youtube\.com(?:/embed/|/v/|/watch\?v=|/watch\?.+&v=))([\w-]{11})(?:.+)?$#x';
    			preg_match($pattern, $link, $matches);
    		 	$code = (isset($matches[1])) ? $matches[1] : false;
				if($code && strlen($code) == 11){
					$this->data['Publication']['video'] = 'https://www.youtube.com/watch?v='.$code;
					return true;	
				}
				return false;
			}	
		}
		return true;
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
