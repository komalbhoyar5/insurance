<?php
App::uses('DependantType', 'Model');

/**
 * DependantType Test Case
 *
 */
class DependantTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.dependant_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DependantType = ClassRegistry::init('DependantType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DependantType);

		parent::tearDown();
	}

}
