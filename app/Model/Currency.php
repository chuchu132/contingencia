<?php
App::uses('AppModel', 'Model');
/**
 * City Model
 *
 * @property Neighborhood $Neighborhood
 */
class Currency extends AppModel {

	public $useTable = 'currency_convertor';
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'code';



}
