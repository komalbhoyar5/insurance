<?php
/**
 * PlanFixture
 *
 */
class PlanFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'plan_code' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 60, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'plan_name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'cause_of_claim' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'cover_type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'description' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'created_date' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'updated_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'updated_date' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'deleted_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'deleted_date' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'company_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'plan_code' => 'Lorem ipsum dolor sit amet',
			'plan_name' => 'Lorem ipsum dolor sit amet',
			'product_id' => 1,
			'cause_of_claim' => 1,
			'cover_type_id' => 1,
			'description' => 1,
			'created_by' => 1,
			'created_date' => '2018-10-16 19:10:35',
			'updated_by' => 1,
			'updated_date' => '2018-10-16 19:10:35',
			'deleted_by' => 1,
			'deleted_date' => '2018-10-16 19:10:35',
			'company_id' => 1
		),
	);

}
