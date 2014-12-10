<?php 

class Ingredient extends AppModel {
/**
* Un ingrédient a et appartient à plusieurs catégories
*/
	public $hasAndBelongsToMany = array(
        'Condition' =>
            array(
                'className' => 'Conditions',
                'joinTable' => 'isMadeOf',
                'foreignKey' => 'ingredient',
                'associationForeignKey' => 'ind',
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