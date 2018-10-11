<?php
App::uses('Collectionmode', 'Model');

/**
 * Collectionmode Test Case
 *
 */
class CollectionmodeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.collectionmode'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Collectionmode = ClassRegistry::init('Collectionmode');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Collectionmode);

		parent::tearDown();
	}

}
