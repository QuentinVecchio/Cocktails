<?php 

class UsersController extends AppController
{

	public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('login', 'signup', 'newpassword');
	}

	/**
	*	Liste les utilisateurs
	*/
	public function admin_index()
	{
		$listUser = $this->User->find('all', array('conditions' => array('role !=' => 'admin')));
		$this->set('listUser', $listUser);
	}

	/**
	* Inscription d'un visiteur
	*/
	public function signup(){
		if($this->request->is('post')){
			$t = $this->request->data;
			if(!isset($t['User']['birthdate'])) $t['User']['birthdate'] = 0;
			if(!isset($t['User']['firstname'])) $t['User']['firstname'] = '';
			if(!isset($t['User']['lastname'])) $t['User']['lastname'] = '';
			if(!isset($t['User']['gender'])) $t['User']['gender'] = '';
			if(!isset($t['User']['email'])) $t['User']['email'] = '';
			if(!isset($t['User']['phone'])) $t['User']['phone'] = '';
			if(!isset($t['User']['zipcode'])) $t['User']['zipcode'] = '';
			if(!isset($t['User']['street'])) $t['User']['street'] = '';
			if(!isset($t['User']['town'])) $t['User']['town'] = '';
			if(!isset($t['User']['country'])) $t['User']['country'] = '';
			if(!isset($t['User']['role'])) $t['User']['role'] = '';
			if($t['User']['birthdate'] == null) $t['User']['birthdate'] = 0;
			if($this->User->save($t)){
				$this->Session->setFlash('Votre compte a bien été crée.', "message", array('type' => 'success'));
				$this->redirect(array('controller' => 'cocktails', 'action' => 'index'));
			}
			else{
				$this->Session->setFlash('Veuillez vérifier vos données.', "message", array('type' => 'danger'));
			}
		}
	}

	/**
	* Gestion du profil visiteur
	*/
	public function edit(){
		$id = $this->Auth->user('id');
		if(!$id){
			$this->redirect('/');
			die();
		}
		else{
			$this->User->id = $id;
			$t = $this->request->data;
			if($this->request->is('put')){
				if($t['User']['birthdate'] == null) $t['User']['birthdate'] = 0;
			}
			if($this->User->save($t, true, array('password','firstname','lastname','birthdate', 'street' ,'town','gender','zipcode','country','phone', 'email'))){
				$this->Session->setFlash('Votre profil a correctement été mis à jour.','message',array('type' => 'success'));
				$this->redirect('/');
			}
			else{
				$this->Session->setFlash('Vous pouvez choisir de ne pas saisir toutes les données.','message',array('type' => 'info'));
			}
			$this->request->data = $this->User->read();
			debug($this->request->data);
		}
	}

	/**
	*	Formulaire d'édition d'un utilisateur
	*/
		public function admin_edit($id)
	{
		if(!empty($this->data))
		{
			$this->User->id = $id;			
			$t = $this->request->data;
			if($this->User->save($t, true, array('firstname','lastname','birthdate', 'street' ,'zipcode','country','gender','town', 'phone', 'email'))){
				$this->Session->setFlash('Vous venez de mettre à jour un utilisateur.','message',array('type' => 'success'));
				$this->redirect(array('action' => 'index'));
			}
			else{
				$this->Session->setFlash('Veuillez vérifier les données saisies.','message',array('type' => 'danger'));
			}
			$this->request->data = $this->User->read();
		}
		else
		{
			$this->data = $this->User->findById($id);
		}
	}

	
	/**
	*	Permet la suppression d'un utilisateur
	*/
	
	public function admin_delete($id)
	{
		if($this->User->delete($id))
		{
			$this->Session->setFlash('Vous venez de supprimer un utilisateur.','message', array('type' => 'success'));
			$this->redirect(array('action' => 'index'));			
		}
		else
		{
			$this->Session->setFlash('<strong>Erreur:</strong> C\'est le dernier des administrateurs, il ne peut pas être supprimé','message',
																	 array('type' => 'danger'));
			$this->redirect(array('action' => 'index'));			
			
		}
	}
	
	/**
	*	Connexion d'un utilisateur
	*/
	public function login() 
	{
		if(!empty($this->data)){
			if($this->Auth->login()){
				$this->Session->setFlash('Bienvenue '. $this->Auth->user('firstname') . ' ' . $this->Auth->user('username') .', vous êtes désormais connecté.', 'message', array('type' => 'success'));
				$idUser = $this->Session->read('Auth.User.id');
				$this->loadModel('Cart');

				if($this->Session->read('Cart') != null)
				{
					foreach ($this->Session->read('Cart.recipe') as $k) {
						if($k == null) continue;
						else{
							$this->request->data['Cart']['recipe'] = $k;
							$this->request->data['Cart']['user'] = $idUser;
							$this->Cart->save($this->request->data);
						}
					}
					$this->Session->delete('Cart');
				}
				$this->redirect(array('controller' => 'recipes', 'action' => 'index'));
			}
			else{
				$this->Session->setFlash('Veuillez vérifier vos identifiants.', 'message', array('type' => 'danger'));
				$this->redirect(array('controller' => 'users', 'action' => 'login'));
			}
		}
	}


	/**
	*	Deconnexion d'un utilisateur et redirection vers la page de login
	*/
	public function logout()
	{
		if($this->Auth->logout()){
			$this->Session->setFlash('Vous avez été déconnecté.', 'message', array('type' => 'success'));
		}
		$this->redirect(array('controller' => 'cocktails', 'action' => 'index'));
	}
} 

?>