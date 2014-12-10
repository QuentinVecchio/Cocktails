<?php 

class Ingredient extends AppModel {

		public $hasMany = array('isMadeOf');
		
		public $validate = array(
			'name' => array(
				'rule' => 'notEmpty',
				'message' => 'Veuillez saisir un nom')
		);
}

?>