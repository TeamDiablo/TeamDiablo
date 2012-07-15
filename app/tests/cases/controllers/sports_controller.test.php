<?php 

loadController('Sports');

class SportsControllerTestCase extends UnitTestCase {
	var $object = null;

	function setUp() {
		$this->object = new SportsController();
	}

	function tearDown() {
		unset($this->object);
	}

	/*
	function testMe() {
		$result = $this->object->doSomething();
		$expected = 1;
		$this->assertEqual($result, $expected);
	}
	*/
}
?>