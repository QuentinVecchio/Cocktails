<?php 

class CocktailsController extends AppController
{	public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('index');
	}

	
	function index()
	{
		if($this->Session->read() == null){
			$this->Session->setFlash('Vous n\'êtes pas inscrit ? N\'hesitez pas à cliquer sur "Inscription" pour pouvoir sauvegarder vos recettes favorites !', "message", array('type' => 'info'));
		}
	}
}

?>