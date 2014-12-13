<?php 

class CocktailsController extends AppController
{	public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('index');
	}

	
	function index()
	{
		if($this->Session->read('Auth.User.role') == 'admin')
		{
			$this->redirect(array('controller' => 'recipes', 'action' => 'index'));
		}
	}
}

?>