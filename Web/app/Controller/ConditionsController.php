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
	public function admin_add()
	{
		$listPere = $this->Condition->find('all');
		$this->set('listPere', $listPere);
		if($this->request->is('post')){
			$t = $this->request->data;
			if($this->Condition->save($t['User'], true)){
				$this->Session->setFlash('Vous venez d\'ajouter une catégorie.', "message", array('type' => 'success'));
				$this->redirect('/');
			}
			else{
				$this->Session->setFlash('Veuillez vérifier vos données.', "message", array('type' => 'danger'));
			}
		}
	}

	/**
	*	Formulaire d'édition d'une catégorie
	*/
	public function admin_edit($id)
	{
		$listPere = $this->Condition->find('all');
		$this->set('listPere', $listPere);
		if(!empty($this->data))
		{
			$this->Condition->id = $id;			
			$t = $this->request->data;
			$t['Condition']['fathercondition'] = $t['Condition']['fathercondition'] + 1;
			if($this->Condition->save($t, true)){
				$this->Session->setFlash('Vous venez de mettre à jour une catégorie.','message',array('type' => 'success'));
				$this->redirect(array('action' => 'index'));
			}
			else{
				$this->Session->setFlash('Veuillez vérifier les données saisies.','message',array('type' => 'danger'));
			}
			$this->request->data = $this->Condition->read();
		}
		else
		{
			if(!isset($this->data['Condition'][0])){
				$this->data = $this->Condition->findById($id); 
				$this->set('selected', 0);
			}
			else{
				$this->data = $this->Condition->findById($id); 
				$tmp = $this->Condition->findByName($this->data['Condition'][0]['name']);
				$this->set('selected', $tmp['Condition']['id']);
			}
		}
	}

	/**
	*	Permet la suppression d'une catégorie
	*/
	public function admin_delete($id)
	{
		$compteur = 0;
		$listFilles = $this->Condition->find('all');
		$this->set('listFilles', $listFilles);
		foreach ($listFilles as $filles =>$v){
			if($v['Condition']['fathercondition'] == $id){
				$this->Session->setFlash('Vous ne pouvez supprimer cette catégorie, elle est père de sous-catégories.','message', array('type' => 'danger'));
				$this->redirect(array('action' => 'index'));
			}
		}
		if($this->Condition->delete($id))
		{
			$this->Session->setFlash('Vous venez de supprimer une catégorie.','message', array('type' => 'success'));
			$this->redirect(array('action' => 'index'));			
		}
	}
}

?>