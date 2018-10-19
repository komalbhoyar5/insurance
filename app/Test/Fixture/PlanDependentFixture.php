<?php
/**
 * PlanDependentFixture
 *
 */
class PlanDependentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'plan_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'dependent_type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'cover_benefits_type' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'sub_assured' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'min_age' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'max_age' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'living_allowance_per_month' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'living_allowance_for_month' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'fixed_premium' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false),
		'employer_contribution' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'employee_contribution' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
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
			'plan_id' => 1,
			'dependent_type_id' => 1,
			'cover_benefits_type' => 1,
			'sub_assured' => 'Lorem ipsum dolor sit amet',
			'min_age' => 1,
			'max_age' => 1,
			'living_allowance_per_month' => 1,
			'living_allowance_for_month' => 1,
			'fixed_premium' => 1,
			'employer_contribution' => 1,
			'employee_contribution' => 1
		),
	);

}
