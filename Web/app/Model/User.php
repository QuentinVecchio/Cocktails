<?php 
class User extends AppModel{
	public $validate = array(/*
			'username' => array(
				'rule' => 'isUnique',
				'message' => 'Login déjà utilisé'
				),
			'birthdate' => array(
				'rule' => 'date',
				'allowEmpty' => true,
				'required' => false
				),
			'firstname' => array(
				'rule' => '/^[a-zA-Zéèêàâùûç\- ]+$/i',
				'message' => 'Prénom incorrect',
				'allowEmpty' => true,
				'required' => false
				),
			'lastname' => array(
				'rule' => '/^[a-zA-Zéèêàâùûç\- ]+$/i',
				'message' => 'Nom incorrect',
				'allowEmpty' => true,
				'required' => false
				),
			'gender' => array(
				'rule' => 'notEmpty',
				'message' => 'Sexe incorrect',
				'allowEmpty' => true,
				'required' => false
				),
			'email' => array(
				'rule' => '/^[A-Za-z0-9._%+-]+@([A-Za-z0-9-]+\.)+([A-Za-z0-9]{2,4})$/',
				'message' => 'Renseignez une adresse mail valide',
				'allowEmpty' => true,
				'required' => false
				),
			'phone' => array(
				'rule' => '/^0[1-9][0-9]{8}$|^[+]33[1-9][0-9]{8}$|^[+]352[0-9]{6,}$|^00352[0-9]{6,}$/',
				'message' => 'Numéro de téléphone incorrect',
				'allowEmpty' => true,
				'required' => false
				),/*
			'street' => array(
				'allowEmpty' => true,
				'required' => false
				),
			'zipcode' => array(
				'allowEmpty' => true,
				'required' => false
				),
			'country' => array(
				'allowEmpty' => true,
				'required' => false
				),
			'town' => array(
				'allowEmpty' => true,
				'required' => false
				),
			'password' => array(
				'rule' =>  array('minLength', 2),
				'message' => 'Mot de passe requis (2 caractères minimum).'),
			'password2' => array(
				'rule' => 'checkEqualPassWord',
				'message' => 'Les deux mots de passe sont différents.'
				),*/
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
		if($check['role'] != 'admin'){
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