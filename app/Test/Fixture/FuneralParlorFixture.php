<?php
/**
 * FuneralParlorFixture
 *
 */
class FuneralParlorFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'funeral_parlor';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'parlor_name' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'address' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'contact_no' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'discount_rate' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
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
			'parlor_name' => 1,
			'address' => 1,
			'contact_no' => 1,
			'discount_rate' => 1
		),
	);

}
