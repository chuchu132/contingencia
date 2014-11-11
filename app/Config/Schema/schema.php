<?php 
class AppSchema extends CakeSchema {

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
	}

	public $cities = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $currency_convertor = array(
		'code' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 3, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'factor' => array('type' => 'float', 'null' => false, 'default' => null),
		'indexes' => array(
			
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $neighborhoods = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'city_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'city_id' => array('column' => 'city_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $operation_type = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $property_types = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'category' => array('type' => 'integer', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $publications = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'street' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 300, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'st_number' => array('type' => 'integer', 'null' => false, 'default' => null),
		'neighborhood_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'covered_area' => array('type' => 'integer', 'null' => true, 'default' => null),
		'total_area' => array('type' => 'integer', 'null' => true, 'default' => null),
		'rooms' => array('type' => 'integer', 'null' => true, 'default' => null),
		'expenses' => array('type' => 'integer', 'null' => true, 'default' => null),
		'age' => array('type' => 'integer', 'null' => true, 'default' => null),
		'brand_new' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'price' => array('type' => 'integer', 'null' => false, 'default' => null),
		'currency' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 3, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'balcony' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'bathrooms' => array('type' => 'integer', 'null' => true, 'default' => null),
		'dining_room' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'ensuite_bedroom' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'storage' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'garage' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'studio' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'kitchen' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'service_unit' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'hall' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'frontgarden' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'backyard' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'laundry' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'lounge' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'living_room' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'terrace' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'mains_water' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'drains' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'cable' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'gas' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'internet' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'pavement' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'publication_date' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'publication_type' => array('type' => 'integer', 'null' => false, 'default' => null),
		'status' => array('type' => 'integer', 'null' => false, 'default' => null),
		'video' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 300, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'images_url' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'operation_type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'property_type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'end_date' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'description' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'availability' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'neighborhood_id' => array('column' => 'neighborhood_id', 'unique' => 0),
			'operation_type_id' => array('column' => 'operation_type_id', 'unique' => 0),
			'property_type_id' => array('column' => 'property_type_id', 'unique' => 0),
			'user_id' => array('column' => 'user_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $users = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'username' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'password' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'tel_part' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'mobile' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

}
