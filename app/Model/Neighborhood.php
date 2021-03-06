<?php
App::uses('AppModel', 'Model');
/**
 * Neighborhood Model
 *
 * @property City $City
 * @property Publication $Publication
 */
class Neighborhood extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

	public $recursive = 0;
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'City' => array(
			'className' => 'City',
			'foreignKey' => 'city_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Publication' => array(
			'className' => 'Publication',
			'foreignKey' => 'neighborhood_id',
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
	
	 var $hasAndBelongsToMany = array(
        'LimitWith' => array(
            'className' => 'Neighborhood',
            'joinTable' => 'neighborhood_limit_with_neighborhoods',
            'foreignKey' => 'neighborhood_id',
            'associationForeignKey' => 'neighborhood2_id',
        ),
    ); 

}
