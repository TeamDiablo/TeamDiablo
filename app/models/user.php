<?php
class User extends AppModel {

	var $name = 'User';
	var $primaryKey = 'uid';
        var $actsAs = array('Acl' => array('type' => 'requester'));
	var $validate = array(
		'uid' => VALID_NOT_EMPTY,
		'username' => VALID_NOT_EMPTY,
		'password' => VALID_NOT_EMPTY,
		'first_name' => VALID_NOT_EMPTY,
		'last_name' => VALID_NOT_EMPTY,
		'created' => VALID_NOT_EMPTY,
		'modified' => VALID_NOT_EMPTY,
		'last_login' => VALID_NOT_EMPTY,
		'email' => VALID_EMAIL,
		'last_generation_of_email' => VALID_NOT_EMPTY,
	);

}
?>