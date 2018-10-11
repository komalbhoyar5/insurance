<?php
App::uses('CoverBenifite', 'Model');

/**
 * CoverBenifite Test Case
 *
 */
class CoverBenifiteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cover_benifite'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CoverBenifite = ClassRegistry::init('CoverBenifite');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CoverBenifite);

		parent::tearDown();
	}

}
