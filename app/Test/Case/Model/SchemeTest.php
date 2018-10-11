<?php
App::uses('Scheme', 'Model');

/**
 * Scheme Test Case
 *
 */
class SchemeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.scheme'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Scheme = ClassRegistry::init('Scheme');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Scheme);

		parent::tearDown();
	}

}
