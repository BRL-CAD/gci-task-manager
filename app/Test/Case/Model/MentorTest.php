<?php
App::uses('Mentor', 'Model');

/**
 * Mentor Test Case
 *
 */
class MentorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.mentor',
		'app.task',
		'app.mentors_task'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Mentor = ClassRegistry::init('Mentor');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Mentor);

		parent::tearDown();
	}

}
