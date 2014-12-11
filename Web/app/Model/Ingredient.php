<?php 

class Ingredient extends AppModel {
/**
* Un ingrédient a et appartient à plusieurs catégories
*/
	public $hasAndBelongsToMany = array(
        'Conditions' =>
            array(
                'className' => 'Conditions',
                'joinTable' => 'belongs',
                'foreignKey' => 'ingredient',
                'associationForeignKey' => 'cond',
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