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
		$listIngredients = $this->Ingredient->find('all', array('order' => array('Ingredient.id' => 'asc')));
		$this->set('listIngredients', $listIngredients);
	}

	/**
	*	Formulaire d'ajout d'un ingrédient
	*/
	public function admin_add($id)
	{
		
	}

	/**
	*	Formulaire d'édition d'un ingrédient
	*/
	public function admin_edit($id)
	{
		
	}

	/**
	*	Permet la suppression d'un ingrédient
	*/
	public function admin_delete($id)
	{
		
	}
}

?>