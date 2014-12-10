<?php 

class UsersController extends AppController
{

	public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('login', 'signup', 'newpassword');
	}

	/**
	* Nouveau du mot de passe
	*/
	public function newpassword(){
		if($this->request->is('post')){
			$t = $this->request->data;
			$user = $this->User->find('first', array('conditions' => array('username' => $t['User']['username'])));
			if(empty($user)){
				$this->Session->setFlash('Le login saisi ne correspond à aucun utilisateur.', "message", array('type' => 'danger'));
			}
			else{
				$this->User->id = $user['User']['id'];
				if($this->User->saveField('password', $t['User']['password'])){
					$this->Session->setFlash('Votre mot de passe a été enregistré.', "message", array('type' => 'success'));
					$this->redirect(array('controller' => 'users', 'action' => 'login'));
				}
				else{
					$this->Session->setFlash('Veuillez vérifier vos données.', "message", array('type' => 'danger'));
				}
			}
		}
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
			if($this->User->save($t, true)){
				$this->Session->setFlash('Votre compte a bien été crée.', "message", array('type' => 'success'));
				$this->redirect('/');
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
		$this->User->id = $id;
			$t = $this->request->data;
			if($this->User->save($t, true, array('username','firstname','lastname','birthdate', 'street' ,'zipcode','country','phone', 'email'))){
				$this->Session->setFlash('Votre profil a correctement été mis à jour.','message',array('type' => 'success'));
				$this->redirect('/');
			}
		$this->request->data = $this->User->read();
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
			if($this->User->save($t, true, array('firstname','lastname','birthdate', 'street' ,'zipcode','country','phone', 'email'))){
				$this->Session->setFlash('Vous venez de mettre à jour un utilisateur !','message',array('type' => 'success'));
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
			$this->Session->setFlash('Vous venez de supprimer un utilisateur !','message', array('type' => 'danger'));
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
	*	Formulaire d'ajout d'un utilisateur
	*/
	/*
	public function admin_add()
	{
		if(!empty($this->data))
		{
			unset($this->request->data['submit']);
			$this->request->data = array('User' => $this->request->data);

			if($this->User->save($this->data)){
				$this->Session->setFlash('<strong>Félicitation:</strong> Vous venez d\'ajouter un utilisateur !','message', array('type' => 'success'));
				$this->redirect(array('action' => 'index'));
			}
		}
	}
	*/
	/**
	*	Connexion d'un utilisateur
	*/
	public function login() 
	{
		//debug($this->data);
		if(!empty($this->data)){
			if($this->Auth->login()){
				$this->Session->setFlash('Bienvenue '. $this->Auth->user('firstname') . ' ' . $this->Auth->user('lastname') .', vous êtes désormais connecté.', 'message', array('type' => 'success'));
					$this->redirect(array('controller' => 'cocktails', 'action' => 'index'));
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
		$this->redirect(array('controller' => 'users', 'action' => 'login'));
	}
} 

?>