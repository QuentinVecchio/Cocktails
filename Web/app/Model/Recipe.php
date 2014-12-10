<?php 

class Recipe extends AppModel
{
	public $hasMany = array('isMadeOf');

	public $validate = array(
			'title'  => array(
				'rule' => 'notEmpty',
				'message' => 'Titre incorrect'),
			'recipe' => array(
				'rule' => 'notEmpty',
				'message' => 'Préparation incorrect')
		);	
}

 ?>