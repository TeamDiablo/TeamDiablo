<?php
class Game extends AppModel {

	var $name = 'Game';
	var $primaryKey = 'gid';
	var $validate = array(
		'gid' => VALID_NOT_EMPTY,
		'oid' => VALID_NOT_EMPTY,
		'sid' => VALID_NOT_EMPTY,
		'location' => VALID_NOT_EMPTY,
		'skill' => VALID_NOT_EMPTY,
		'numpeople' => VALID_NOT_EMPTY,
		'date' => VALID_NOT_EMPTY,
		'time' => VALID_NOT_EMPTY,
	);

}
?>