<?php 

class IngredientsController extends AppController
{
	/**
	*	Liste les ingrédients
	*/
	public function index()
	{
		$listIngredients = $this->Ingredient->find('all', array('order' => array('Ingredient.id' => 'asc')));
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