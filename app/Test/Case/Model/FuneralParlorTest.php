<?php
App::uses('FuneralParlor', 'Model');

/**
 * FuneralParlor Test Case
 *
 */
class FuneralParlorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.funeral_parlor'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FuneralParlor = ClassRegistry::init('FuneralParlor');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FuneralParlor);

		parent::tearDown();
	}

}
