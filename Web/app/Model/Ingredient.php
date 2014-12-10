<?php 

class Ingredient extends AppModel {
/**
* Un ingrédient a et appartient à plusieurs catégories
*/
	public $hasAndBelongsToMany = array(
        'Ingredient' =>
            array(
                'className' => 'Ingredient',
                'joinTable' => 'belongs',
                'foreignKey' => 'ingredient',
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
			'name' => array(
				'rule' => 'notEmpty',
				'message' => 'Veuillez saisir un code postal')
		);
}

?>