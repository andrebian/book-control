<?php
App::uses('Book', 'Model');

/**
 * Book Test Case
 *
 */
class BookTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.book'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Book = ClassRegistry::init('Book');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Book);

		parent::tearDown();
	}
        
        
        public function testValidateName()
        {
            $this->Book->set(array('name' => ''));
            
            $result = $this->Book->validates(array('fieldList' => array('name')));
            
            $this->assertfalse($result);
        }

}
