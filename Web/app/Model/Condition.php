<?php 

class Condition extends AppModel {
	public $validate = array(
		'name' => array(
			'rule' => 'notEmpty',
			'message' => 'Veuillez saisir un nom.')
	);
}

?>