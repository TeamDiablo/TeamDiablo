<?php
class Sport extends AppModel {

	var $name = 'Sport';
	var $primaryKey = 'sid';
	var $validate = array(
		'sid' => VALID_NOT_EMPTY,
		'name' => VALID_NOT_EMPTY,
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	
}
?>