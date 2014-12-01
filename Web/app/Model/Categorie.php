<?php 

class Categorie extends AppModel {

	public $validate = array(
		'name' => array(
			'rule' => 'notEmpty',
			'message' => 'Veuillez saisir un code postal')
	);
}

?>