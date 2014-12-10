<?php 

class RecipesController extends AppController
{
	public function beforeFilter() {
	    parent::beforeFilter();
	    $this->Auth->allow('index', 'add_in_cart', 'delete_in_cart', 'cart', 'clean_cart');
	}

	public function index(){
		$listRecipes = $this->Recipe->find('all', array('order' => array('Recipe.id' => 'asc')));
		$this->set('listRecipes', $listRecipes);
		if($this->Session->read() == null){
			$this->Session->setFlash('Vous n\'êtes pas inscrit ? N\'hesitez pas à cliquer sur "Inscription" pour pouvoir sauvegarder vos recettes favorites !', "message", array('type' => 'info'));
		}
	}

	public function view($id){
		$recipe = $this->Recipe->find($id, array('order' => array('Recipe.id' => 'asc')));
		$this->set('recipe', $recipe);
		if($this->Session->read() == null){
			$this->Session->setFlash('Vous n\'êtes pas inscrit ? N\'hesitez pas à cliquer sur "Inscription" pour pouvoir sauvegarder vos recettes favorites !', "message", array('type' => 'info'));
		}
	}


	public function clean_cart(){
		if($this->Session->delete('Cart')){
			$this->Session->setFlash('Votre panier a correctement été vidé.', "message", array('type' => 'success'));
			$this->redirect(array('controller' => 'recipes', 'action' => 'index'));
		}
	}

	public function cart(){
		if($this->Session->read('Cart') == null){
			$this->Session->setFlash('Votre panier est vide, vous pouvez y ajouter des recettes en cliquant sur \'Ajouter\'.','message',array('type' => 'danger'));
			$this->redirect(array('action' => 'index'));
		}
		$listRecipes = $this->Recipe->findAllById($this->Session->read('Cart.recipe'));
		$this->set('listRecipes', $listRecipes);
		$listInCart = $this->Session->read('Cart');
		$this->set('listInCart', $listInCart);
	}

	public function add_in_cart($id){
		/**
		* Si le visiteur n'est pas inscrit
		*/
		if($this->Session->read('Auth.User.username') != null)
		{
			$tmp = $this->Session->read('Cart.recipe');
			for ($i=0; $i < count($tmp) ; $i++) { 
				if($tmp[$i] == $id){
					$this->Session->setFlash('Cette recette est déjà dans votre panier.','message',array('type' => 'danger'));
					$this->redirect(array('action' => 'index'));
				}
			}
			if($this->Session->write('Cart.recipe', am($this->Session->read('Cart.recipe'), $id))){
				$this->Session->setFlash('Vous venez d\'ajouter une recette à votre panier.','message',array('type' => 'success'));
				$this->redirect(array('action' => 'index'));
			}
		}
		/**
		* Si le visiteur est inscrit
		*/
		else
		{
			$idUser = $this->Session->read('Auth.User.id');
			$find = $this->loadModel('Cart')->find(
					array(
						    'conditions' => array('Cart.recipe' => $id, 'Cart.user' => $idUser)));
			if(empty($find))
			{
				$this->loadModel('Cart')->save(array('Cart.recipe' => $id, 'Cart.user' => $idUser));
				$this->Session->setFlash('Vous venez d\'ajouter une recette à votre panier.','message',array('type' => 'success'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Cette recette est déjà dans votre panier.','message',array('type' => 'danger'));
				$this->redirect(array('action' => 'index'));
			}
		}


	}

	public function delete_in_cart($id){
		/**
		* Si le visiteur n'est pas inscrit
		*/
		if($this->Session->read('Auth.User.username') != null)
		{
			$tmp = $this->Session->read('Cart.recipe');
			unset($tmp[$id]);
			$this->Session->write('Cart.recipe', $tmp);
			$this->Session->setFlash('Vous venez de retirer une recette de votre panier.','message',array('type' => 'success'));
			$this->redirect(array('action' => 'cart'));
		}
		/**
		* Si le visiteur est inscrit
		*/
		else
		{
			if($this->loadModel('Cart')->delete($id))
			{
				$this->Session->setFlash('Vous venez de retirer une recette de votre panier.','message',array('type' => 'success'));
				$this->redirect(array('action' => 'cart'));			
			}
			else
			{
				$this->Session->setFlash('Une erreur est survenue lors de la suppression','message', array('type' => 'danger'));
				$this->redirect(array('action' => 'cart'));			
			}
		}
	}

	public function admin_index()
	{
		$listRecipes = $this->Recipe->find('all', array('order' => array('Recipe.id' => 'asc')));
		$this->set('listRecipes', $listRecipes);
	}

	public function admin_add()
	{
		$this->loadModel('Ingredient');
		$listIng = $this->Ingredient->find('all');
		$this->set('listIng', $listIng);
	}

	public function admin_edit($id)
	{
		if(!empty($this->data))
		{
			$this->Recipe->id = $id;			
			$t = $this->request->data;
			if($this->Recipe->save($t, true)){
				$this->Session->setFlash('Vous venez de mettre à jour une recette.','message',array('type' => 'success'));
				$this->redirect(array('action' => 'index'));
			}
			else{
				$this->Session->setFlash('Veuillez vérifier les données saisies.','message',array('type' => 'danger'));
			}
			$this->request->data = $this->Recipe->read();
		}
		else
		{
			$this->data = $this->Recipe->findById($id); 
		}
	}

	public function admin_delete($id)
	{
		if($this->Recipe->delete($id))
		{
			$this->Session->setFlash('Vous venez de supprimer une recette.','message', array('type' => 'success'));
			$this->redirect(array('action' => 'index'));			
		}
		else
		{
			$this->Session->setFlash('Une erreur est survenue lors de la suppression','message',
																	 array('type' => 'danger'));
			$this->redirect(array('action' => 'index'));			
		}
	}
}

 ?>