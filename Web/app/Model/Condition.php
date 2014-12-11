<?php 

class Condition extends AppModel {
        public $hasAndBelongsToMany = array(
        'Condition' =>
            array(
                'className' => 'Conditions',
                'joinTable' => 'fatherConditions',
                'foreignKey' => 'son',
                'associationForeignKey' => 'father',
                'unique' => true,
                'conditions' => '',
                'fields' => '',
                'order' => '',
                'limit' => '',
                'offset' => '',
                'finderQuery' => ''
            )
    );
}

?>
