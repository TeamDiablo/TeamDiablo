<?php
class Friend extends AppModel {

	var $name = 'Friend';
	var $primaryKey = 'no';
	var $validate = array(
		'pid1' => VALID_NOT_EMPTY,
		'pid2' => VALID_NOT_EMPTY,
	);

}
?>