<?php
App::uses('PlanDependent', 'Model');

/**
 * PlanDependent Test Case
 *
 */
class PlanDependentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.plan_dependent',
		'app.plan',
		'app.product',
		'app.cover_type',
		'app.dependent_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PlanDependent = ClassRegistry::init('PlanDependent');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PlanDependent);

		parent::tearDown();
	}

}
