<?php 

class User extends AppModel {
		public $validate = array(
			'login'  => array(
				'rule' => '/^[a-zA-Zéèêàâùûç\- ]+$/i',
				'message' => 'Prénom incorrect'),
			'password' => array(
				'rule' => '/^[a-zA-Zéèêàâùûç\- ]+$/i',
				'message' => 'Prénom incorrect'),
			'prenom' => array(
				'rule' => '/^[a-zA-Zéèêàâùûç\- ]+$/i',
				'message' => 'Nom incorrect'),
			'nom' => array(
				'rule' => '/^[a-zA-Zéèêàâùûç\- ]+$/i',
				'message' => 'Nom incorrect'),
			'sexe' => array(
				'rule' => '/^f$|^h$/',
				'message' => 'Sexe incorrect'),
			'phone' => array(
				'rule' => '/^0[1-9][0-9]{8}$|^[+]33[1-9][0-9]{8}$|^[+]352[0-9]{6,}$|^00352[0-9]{6,}$/',
				'message' => 'Numéro de téléphone incorrect'),
			'email' => array(
				'rule' => 'notEmpty',
				'message' => 'Veuillez saisir une adresse mail'),
			'numero' => array(
				'rule' => 'notEmpty',
				'message' => 'Veuillez saisir un numéro de rue'),
			'adresse' => array(
				'rule' => 'notEmpty',
				'message' => 'Veuillez saisir une adresse'),
			'codePostal' => array(
				'rule' => 'notEmpty',
				'message' => 'Veuillez saisir un code postal'),
			'pays' => array(
				'rule' => 'notEmpty',
				'message' => 'Pays incorrect'),
			'administrateur' => array(
				'rule' => 'notTheLastOne',
				'message' => 'C\'est le dernier des administrateurs, il ne peut pas être changé')
		);

		public function notTheLastOne($check){
			if($check['administrateur'] == '0'){
				$tmp = $this->findAllByStatus('admin');
				if(count($tmp) == 1){
					if($this->data['User']['id'] == $tmp[0]['User']['id']){
						return false;
					}
				}
			}
			return true;
		}
}

 ?>