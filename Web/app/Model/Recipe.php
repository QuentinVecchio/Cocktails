<?php 

class Recipe extends AppModel
{
/**
* Une recette a plusieurs ingrédients
*/
	public $hasAndBelongsToMany = array(
        'Ingredient' =>
            array(
                'className' => 'Ingredients',
                'joinTable' => 'isMadeOf',
                'foreignKey' => 'recipe',
                'associationForeignKey' => 'ingredient',
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