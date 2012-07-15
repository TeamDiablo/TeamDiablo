<?php 

loadController('Friends');

class FriendsControllerTestCase extends UnitTestCase {
	var $object = null;

	function setUp() {
		$this->object = new FriendsController();
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