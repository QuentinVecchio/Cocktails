<?php 

class RecipesController extends AppController
{
	public function beforeFilter() {
	    parent::beforeFilter();
	    $this->Auth->allow('index');
	}

	public function index(){
		
	}

	public function admin_index()
	{
		$listRecipes = $this->Recipe->find('all', array('order' => array('Recipe.id' => 'asc')));
		$this->set('listRecipes', $listRecipes);
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