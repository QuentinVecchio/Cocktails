<?php 

class DatabaseController extends AppController
{

	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('index');
	}
	function index()
	{
		
	}
	
}

 ?>