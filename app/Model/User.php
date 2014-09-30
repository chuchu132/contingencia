<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
/**
 * User Model
 *
 * @property Publication $Publication
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
	public $debe_hashear = false;
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
			
			'password' => array(
					'notempty' => array(
							'rule' => array('notempty'),
							'message' => 'campo_no_vacio',
							//'allowEmpty' => false,
							//'required' => false,
							//'last' => false, // Stop validation after this rule
							//'on' => 'create', // Limit validation to 'create' or 'update' operations
					),
					'minlength' => array(
							'rule' => array('minlength', 8),
							'message' => 'minimopass_caracteres',
							//'allowEmpty' => false,
							//'required' => false,
							//'last' => false, // Stop validation after this rule
							//'on' => 'create', // Limit validation to 'create' or 'update' operations
					),
			),
			
			'username' => array(
					'notempty' => array(
							'rule' => array('notempty'),
							'message' => 'campo_no_vacio',
							//'allowEmpty' => false,
							//'required' => false,
							//'last' => false, // Stop validation after this rule
							//'on' => 'create', // Limit validation to 'create' or 'update' operations
					),
					'email' => array(
							'rule' => array('email'),
							'message' => 'formato_mail',
							//'allowEmpty' => false,
							//'required' => false,
							//'last' => false, // Stop validation after this rule
							//'on' => 'create', // Limit validation to 'create' or 'update' operations
					),
					'unique'=>array(
							'rule' => 'isUnique',
							'required' => 'create',
							'message' => 'Esta dirección de email ya fue utilizada.' 		
					),
			),
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			
		),

	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Publication' => array(
			'className' => 'Publication',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	public function beforeSave($options = array()) {
		if ($this->debe_hashear) {
			$passwordHasher = new SimplePasswordHasher();
			$this->data['User']['password'] = $passwordHasher->hash($this->data['User']['password']);
		}
		return true;
	}
	
}
