<?php
App::uses('BooksLog', 'Model');

/**
 * BooksLog Test Case
 *
 */
class BooksLogTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.books_log',
		'app.book'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BooksLog = ClassRegistry::init('BooksLog');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BooksLog);

		parent::tearDown();
	}

}
