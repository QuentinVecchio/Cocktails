<?php 

class RecetteController extends AppController
{
	public function index()
	{
		$listRecettes = $this->Recette->find('all');
		$this->set('listRecettes', $listRecettes);
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