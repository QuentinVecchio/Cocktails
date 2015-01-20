<?php 

class ConditionsController extends AppController
{
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('index','view','recipes');
	}

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
	*	donne les sous-catégories d'une catégories
	*/
	public function admin_view($id){
		$nom = $this->Condition->findById($id);
		$this->set('nom', $nom['Condition']['name']);
		$i = 0;
		$listConditions = null;
		$all = $this->Condition->find('all');
		foreach ($all as $filles =>$v){
			//debug($v);
			if(!isset($v['Condition'][0])) continue;
			if($v['Condition'][0]['FatherCondition']['father'] == $id)
			{
				$listConditions[$i] = $v['Condition'];
						$i++;
			}
		}
		$this->set('listConditions', $listConditions);
	}

	/**
	*	donne les sous-catégories d'une catégories
	*/
	public function view($id){
		$nom = $this->Condition->findById($id);
		$this->set('nom', $nom['Condition']['name']);
		$i = 0;
		$listConditions = null;
		$all = $this->Condition->find('all');
		foreach ($all as $filles =>$v){
			//debug($v);
			if(!isset($v['Condition'][0])) continue;
			if($v['Condition'][0]['FatherCondition']['father'] == $id)
			{
				$listConditions[$i] = $v['Condition'];
						$i++;
			}
		}
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
				$this->redirect(array('action' => 'index'));
			}
			else{
				$this->Session->setFlash('Veuillez vérifier les données saisies.', "message", array('type' => 'danger'));
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
			$tmp = $this->data;
			$this->set('selected', $tmp['Condition']['fathercondition']);

			$this->Condition->id = $id;
			$t = $this->request->data;
			$t['Condition']['fathercondition'] = $t['Condition']['fathercondition']  + 1;

			$this->Condition->save($t, true);
				$this->Session->setFlash('Vous venez de mettre à jour une catégorie.','message',array('type' => 'success'));
				$this->redirect(array('action' => 'index'));

			$this->request->data = $this->Condition->read();
		}
		else
		{
			$this->data = $this->Condition->findById($id); 
			if(!isset($this->data['Condition'][0])){
				$this->set('selected', 0);
			}
			else{
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
		$listFilles = $this->Condition->find('all');
		$this->set('listFilles', $listFilles);
		foreach ($listFilles as $filles =>$v){
			//debug($v);
			if(!isset($v['Condition'][0])) continue;
			if($v['Condition'][0]['FatherCondition']['father'] == $id){
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