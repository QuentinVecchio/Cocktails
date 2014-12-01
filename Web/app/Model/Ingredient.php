<?php 

class Ingredient extends AppModel {

		public $validate = array(
			'name' => array(
				'rule' => 'notEmpty',
				'message' => 'Veuillez saisir un code postal')
		);
}

?>