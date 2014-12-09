<?php 

class ConditionsController extends AppController
{
	/**
	*	Liste les catégories pour l'admin
	*/
	public function index()
	{
		$listConditions = $this->Condition->find('all', array('order' => array('Condition.id' => 'asc')));
		$this->set('listConditions', $listConditions);
	}

	/**
	*	Liste les catégories pour l'admin
	*/
	public function admin_index()
	{
		$listConditions = $this->Condition->find('all', array('order' => array('Condition.id' => 'asc')));
		$this->set('listConditions', $listConditions);
		
	}

	/**
	*	Formulaire d'ajout d'un catégorie
	*/
	public function admin_add($id)
	{
		
	}

	/**
	*	Formulaire d'édition d'une catégorie
	*/
	public function admin_edit($id)
	{
		
	}

	/**
	*	Permet la suppression d'une catégorie
	*/
	public function admin_delete($id)
	{
		
	}
}

?>