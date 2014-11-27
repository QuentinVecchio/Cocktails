<?php 

class UserModel extends AppModel {
		var $name="users";

		public $validate = array(
			'firstname' => array(
				'rule' => '/^[a-zA-Zéèêàâùûç\- ]+$/i',
				'message' => 'Prénom incorrect'),
			'lastname' => array(
				'rule' => '/^[a-zA-Zéèêàâùûç\- ]+$/i',
				'message' => 'Nom incorrect'),
			'birthdate' => array(
				'rule' => 'notEmpty',
				'message' => 'Veuillez aisir une date de naissance')
			'email' => array(
				'rule' => 'notEmpty',
				'message' => 'Veuillez saisir une adresse mail'),
			'phone' => array(
				'rule' => '/^0[1-9][0-9]{8}$|^[+]33[1-9][0-9]{8}$|^[+]352[0-9]{6,}$|^00352[0-9]{6,}$/',
				'message' => 'Numéro de téléphone incorrect'),
			'street' => array(
				'rule' => 'notEmpty',
				'message' => 'Veuillez saisir un numéro de rue ainsi que son libellé')
			'zipcode' => array(
				'rule' => 'notEmpty',
				'message' => 'Veuillez saisir un code postal')
			'country' => array(
				'rule' => 'notEmpty',
				'message' => 'Numéro de rue incorrect')
		);
}

 ?>