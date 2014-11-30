<?php 

class CategoriesController extends AppController
{
	/**
	*	Liste les catégories
	*/
	public function index()
	{
		$listCategories = $this->Categorie->find('all');
		$this->set('listCategories', $listCategories);
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