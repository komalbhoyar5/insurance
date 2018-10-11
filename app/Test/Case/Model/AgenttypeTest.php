<?php
App::uses('Agenttype', 'Model');

/**
 * Agenttype Test Case
 *
 */
class AgenttypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.agenttype'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Agenttype = ClassRegistry::init('Agenttype');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Agenttype);

		parent::tearDown();
	}

}
