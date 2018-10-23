<?php
/**
 * AgentCommissionFixture
 *
 */
class AgentCommissionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'agent_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'effective_from_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'effective_to_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'commission_rate' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'tax_on_commission' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'commision_from_month' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'commission_to_month' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'deleted_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'deleted_date' => array('type' => 'date', 'null' => false, 'default' => null),
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
			'agent_id' => 1,
			'effective_from_date' => '2018-10-23',
			'effective_to_date' => '2018-10-23',
			'commission_rate' => 1,
			'tax_on_commission' => 1,
			'commision_from_month' => 1,
			'commission_to_month' => 1,
			'deleted_by' => 1,
			'deleted_date' => '2018-10-23'
		),
	);

}
