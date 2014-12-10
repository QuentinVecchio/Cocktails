<?php 

class isMadeOf extends AppModel
{
	public $hasOne = array('Recipe','Ingredient');
	
	public $validate = array(
			'title'  => array(
				'rule' => 'notEmpty',
				'message' => 'Erreur')
	);	
}

 ?>