<?php 

class RecipesController extends AppController
{
	public function beforeFilter() {
	    parent::beforeFilter();
	    $this->Auth->allow('index');
	}

	public function index()
	{
		$listRecettes = $this->Recipe->find('all');
		$this->set('listRecettes', $listRecettes);
	}

	public function view($id)
	{
		$recette = $this->Recipe->find($id);
		$this->set('recette', $recette);
	}

	public function admin_add($id)
	{
		
	}

	public function admin_edit($id)
	{
		
	}

	public function admin_delete($id)
	{
		
	}
}

 ?>