<?php 

class Recette extends AppModel
{
	public $validate = array(
			'titre'  => array(
				'rule' => 'notEmpty',
				'message' => 'Titre incorrect'),
			'preparation' => array(
				'rule' => 'notEmpty',
				'message' => 'Préparation incorrect')
		);	
}

 ?>