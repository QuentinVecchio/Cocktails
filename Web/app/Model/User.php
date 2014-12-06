<?php 
class User extends AppModel{

	public $validate = array(
			'username' => array(
				'unique' => array(
							'rule' => 'isUnique',
							'message' => 'Login déjà utilisé'
							),
				/*'requis' => array(
					'rule' => array('minLength', 3),
					'required' => true,
					'message' => 'Login trop court (2 caractères minimum)')*/
				),
			'firstname' => array(
				'rule' => '/^[a-zA-Zéèêàâùûç\- ]+$/i',
				'message' => 'Prénom incorrect'
				),
			'lastname' => array(
				'rule' => '/^[a-zA-Zéèêàâùûç\- ]+$/i',
				'message' => 'Nom incorrect'
				),
			'gender' => array(
				'rule' => 'notEmpty',
				'message' => 'Sexe incorrect'
				),
			'email' => array(
				'rule' => '/^[A-Za-z0-9._%+-]+@([A-Za-z0-9-]+\.)+([A-Za-z0-9]{2,4})$/',
				'message' => 'Renseignez une adresse mail valide'
				),
			'phone' => array(
				'rule' => '/^0[1-9][0-9]{8}$|^[+]33[1-9][0-9]{8}$|^[+]352[0-9]{6,}$|^00352[0-9]{6,}$/',
				'message' => 'Numéro de téléphone incorrect'
				),
			'street' => array(
				'rule' => 'notEmpty',
				'message' => 'Renseignez une adresse'
				),
			'zipcode' => array(
				'rule' => 'notEmpty',
				'message' => 'Renseignez un code postal'
				),
			'country' => array(
				'rule' => 'notEmpty',
				'message' => 'Renseignez un pays'
				),
			'town' => array(
				'rule' => 'notEmpty',
				'message' => 'Renseignez une ville'
				),
			'passwordOld' => array(
					'rule' => 'checkCurrentPassWord',
					'message' => 'Erreur sur la saisie de l\'ancien mot de passe.',
					'allowEmpty' => true
				),
			'password' => array(
				'rule' =>  array('minLength', 2),
				//'required' => true,
				'message' => 'Mot de passe requis (2 caractères minimum).'),
			'password2' => array(
				//'required' => true,
				'rule' => 'checkEqualPassWord',
				'message' => 'Les deux mots de passe sont différents.'
				),
			'role' => array(
				'rule' => 'notEmpty',
				'message' => 'Type incorrect',
				'options' => array('admin', 'normal'),
					/*'on' =>'update',
					'rule' => 'notTheLastOne',
					'message' => 'C\'est le dernier des administrateurs, il ne peut pas être modifié'*/
				)
			);

	public function beforeSave($options = array()) {
		if(isset($this->data['User']['password']) && !empty($this->data['User']['password'])){
	    	$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
		}
		if(empty($this->data['User']['password'])){
			unset($this->data['User']['password']);
		}
	    return true;
	}

	public function notTheLastOne($check){
		if($check['role'] == 'normal'){
			$tmp = $this->findAllByStatus('admin');
			if(count($tmp) == 1){
					if($this->request->data['User']['id'] == $tmp[0]['User']['id']){
						return false;
					}
			}
		}
		return true;
	}

	
	public function checkEqualPassWord() {
	    return $this->data['User']['password'] == $this->data['User']['password2'];
	}


	public function checkCurrentPassWord($check) {
			$this->id = $this->request->data['User']['id'];
			$password = $this->field('password');
			//debug($this->request->data);
	    return AuthComponent::password(current($check)) == $password;
	}
/*
	public function afterValidate(){
		unset($this->request->data[$this->alias]['passwordOld']);
		unset($this->request->data[$this->alias]['password2']);
	}

	public function beforeDelete($cascade = true) {
		$tmp = $this->findAllByStatus('admin');
		if(count($tmp) == 1){
				if($this->id == $tmp[0]['User']['id']){
					return false;
				}
		}
	  return true;
	}
	*/

} ?>