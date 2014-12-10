<?php 

class Condition extends AppModel {
		public $hasAndBelongsToMany = array(
        'Condition' =>
            array(
                'className' => 'Conditions',
                'joinTable' => 'fatherConditions',
                'foreignKey' => 'id',
                'associationForeignKey' => 'son',
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
			'message' => 'Veuillez saisir un nom.')
	);
}

?>