<?php
App::uses('CoverBenefit', 'Model');

/**
 * CoverBenefit Test Case
 *
 */
class CoverBenefitTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cover_benefit'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CoverBenefit = ClassRegistry::init('CoverBenefit');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CoverBenefit);

		parent::tearDown();
	}

}
