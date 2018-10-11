<?php
App::uses('CoverType', 'Model');

/**
 * CoverType Test Case
 *
 */
class CoverTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cover_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CoverType = ClassRegistry::init('CoverType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CoverType);

		parent::tearDown();
	}

}
