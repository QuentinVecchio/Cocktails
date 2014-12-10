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
	{/*
		$options['joins'] = array(
		    array('table' => 'isMadeOf',
		        'alias' => 'isMadeOf',
		        'type' => 'inner',
		        'conditions' => array(
		            'Ingredient.id = isMadeOf.ingredient'
		        )
		    ),
		    array('table' => 'Conditions',
		        'alias' => 'Condition',
		        'type' => 'inner',
		        'conditions' => array(
		            'isMadeOf.ind = Condition.id'
		        )
		    )
		);*/

		$listIngredients = $this->Ingredient->find('all');
		//debug($listIngredients[0]);
		$this->set('listIngredients', $listIngredients);
	}

	/**
	*	Formulaire d'ajout d'un ingrédient
	*/
	public function admin_add()
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