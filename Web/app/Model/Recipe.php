<?php 

class Recipe extends AppModel
{
/**
* Une recette a plusieurs ingrédients
*/
    var $idToDelete;
	public $hasMany = array(
        'Ingredient' =>
            array(
                'className' => 'Ingredients',
                'joinTable' => 'isMadeOf',
                'foreignKey' => 'id',
                'associationForeignKey' => 'id',
                'unique' => true,
                'conditions' => '',
                'fields' => '',
                'order' => '',
                'limit' => '',
                'offset' => '',
                'finderQuery' => ''
            )
    );
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