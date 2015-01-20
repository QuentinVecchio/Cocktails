<?php 

class IngredientsController extends AppController
{
	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('index', 'view');
	}

	/**
	*	Liste les ingrédients
	*/
	public function index()
	{
		$this->loadModel('Condition');
		$listConditions = $this->Condition->find('all');
		$this->set('listConditions', $listConditions);

		$listIngredients = $this->Ingredient->find('all');
		$this->set('listIngredients', $listIngredients);
	}

	/**
	*	Liste les ingrédients admin
	*/
	public function admin_index()
	{
		$this->loadModel('Condition');
		$listConditions = $this->Condition->find('all');
		$this->set('listConditions', $listConditions);

		$listIngredients = $this->Ingredient->find('all');
		$this->set('listIngredients', $listIngredients);
	}

	/**
	*	donne les recettes d'un ingrédient
	*/
	public function admin_view($id){
		$nom = $this->Ingredient->findById($id);
		//debug($nom);
		$this->set('nom', $nom['Ingredient']['name']);
		$i = 0;
		$this->loadModel('Recipe');
		$allRecipes = $this->Recipe->find('all');
		foreach ($allRecipes as $key => $v) {
			foreach ($v['Ingredient'] as $key2 => $v2) {
				if($v2['IsMadeOf']['ingredient'] == $id){
					$listRecipes[$i] = $v['Recipe'];
					$i++;
				}
			}
		}
		//debug($listRecipes);
		$this->set('listRecipes', $listRecipes);
	}

	/**
	*	donne les recettes d'un ingrédient
	*/
	public function view($id){
		$nom = $this->Ingredient->findById($id);
		//debug($nom);
		$this->set('nom', $nom['Ingredient']['name']);
		$i = 0;
		$this->loadModel('Recipe');
		$allRecipes = $this->Recipe->find('all');
		foreach ($allRecipes as $key => $v) {
			foreach ($v['Ingredient'] as $key2 => $v2) {
				if($v2['IsMadeOf']['ingredient'] == $id){
					$listRecipes[$i] = $v['Recipe'];
					$i++;
				}
			}
		}
		//debug($listRecipes);
		$this->set('listRecipes', $listRecipes);
	}

	/**
	*	Formulaire d'ajout d'un ingrédient
	*/
	public function admin_add()
	{
		$this->loadModel('Condition');
		$listConditions = $this->Condition->find('all');
		$this->set('listConditions', $listConditions);
		if($this->request->is('post')){
			$t = $this->request->data;
			debug($t);
			if($this->Ingredient->saveAssociated($t, array('deep' => true, 'atomic' => true))){
				$this->Session->setFlash('Vous venez d\'ajouter un ingrédient.', "message", array('type' => 'success'));
				$this->redirect(array('action' => 'index'));
			}
			else{
				$this->Session->setFlash('Veuillez vérifier les données saisies.', "message", array('type' => 'danger'));
			}
		}
	}

	/**
	*	Formulaire d'édition d'un ingrédient
	*/
	public function admin_edit($id)
	{
		if(!empty($this->data))
		{
			$this->Ingredient->id = $id;			
			$t = $this->request->data;
			if($this->Ingredient->save($t, true)){
				$this->Session->setFlash('Vous venez de mettre à jour un ingrédient.','message',array('type' => 'success'));
				$this->redirect(array('action' => 'index'));
			}
			else{
				$this->Session->setFlash('Veuillez vérifier les données saisies.','message',array('type' => 'danger'));
			}
			$this->request->data = $this->Ingredient->read();
		}
		else
		{
			$this->loadModel('Condition');
			$listConditions = $this->Condition->find('all');
			$this->set('listConditions', $listConditions);
			$this->data = $this->Ingredient->findById($id); 
			if(!isset($this->data['Conditions'][0])){
				$this->set('selected', 0);
			}
			else{
				$tmp = $this->Condition->findById($this->data['Conditions'][0]['Belong']['cond']);
				$this->set('selected', $tmp['Condition']['id']);
			}
		}
	}

	/**
	*	Permet la suppression d'un ingrédient
	*/
	public function admin_delete($id)
	{
		if($this->Ingredient->delete($id, true))
		{
			$this->Session->setFlash('Vous venez de supprimer un ingrédient.','message', array('type' => 'success'));
			$this->redirect(array('action' => 'index'));			
		}
		else
		{
			$this->Session->setFlash('Une erreur est survenue lors de la suppression.','message',
																	 array('type' => 'danger'));
			$this->redirect(array('action' => 'index'));			
			
		}
	}
}

?>