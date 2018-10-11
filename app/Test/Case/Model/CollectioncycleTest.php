<?php
App::uses('Collectioncycle', 'Model');

/**
 * Collectioncycle Test Case
 *
 */
class CollectioncycleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.collectioncycle'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Collectioncycle = ClassRegistry::init('Collectioncycle');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Collectioncycle);

		parent::tearDown();
	}

}
