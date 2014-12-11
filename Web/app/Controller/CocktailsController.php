<?php 

class CocktailsController extends AppController
{	public function beforeFilter() {
	    parent::beforeFilter();
	    if($this->Session->read('Auth.User.username') == null){
	    	$this->Auth->allow('index');
	    }
	    else{
	    	$this->Auth->deny('index');
	    }
	}

	
	function index()
	{/*
		if($this->Session->read('Auth.User.username') == null){
			$this->Session->setFlash('Vous n\'êtes pas inscrit ? N\'hesitez pas à cliquer sur "Inscription" pour pouvoir sauvegarder vos recettes favorites !', "message", array('type' => 'info'));
		}*/
	}
}

?>