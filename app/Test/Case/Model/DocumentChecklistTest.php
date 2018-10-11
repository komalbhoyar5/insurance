<?php
App::uses('DocumentChecklist', 'Model');

/**
 * DocumentChecklist Test Case
 *
 */
class DocumentChecklistTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.document_checklist'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DocumentChecklist = ClassRegistry::init('DocumentChecklist');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DocumentChecklist);

		parent::tearDown();
	}

}
