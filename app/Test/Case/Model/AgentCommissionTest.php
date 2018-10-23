<?php
App::uses('AgentCommission', 'Model');

/**
 * AgentCommission Test Case
 *
 */
class AgentCommissionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.agent_commission',
		'app.agent'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AgentCommission = ClassRegistry::init('AgentCommission');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AgentCommission);

		parent::tearDown();
	}

}
