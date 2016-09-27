<?php

App::uses('AppController', 'Controller');


class MenusController extends AppController {
	
	public function getMenuList() {
		$menuList = $this->Menu->getMenuList();
		$this->set('menuList', $menuList);
		return $menuList;
	}
	
	
	public function getSubMenuList($idParent) {
		$subMenuList = $this->Menu->getSubMenuList($idParent);
		$this->set('subMenuList', $subMenuList);
		return $subMenuList;
	}
	
	
	public function manage() {}
	
	
	public function add() {
		if ($this->request->is('post')) {
			$this->Menu->create();
			if($this->canBeSaved(null, $this->request->data)) {
				if ($this->Menu->save($this->request->data)) {
					$this->Flash->success('Le menu a bien été sauvegardé');
					return $this->redirect(array('action' => 'manage'));
				}
			}
			
			$this->Flash->error(
					'Le menu n\'a pas pu être sauvegardé. Réessayez ou contactez l\'administrateur du site'
			);
		}
	}
	
	
	public function edit($id = null) {
		$this->Menu->id = $id;
		if (!$this->Menu->exists()) {
			throw new NotFoundException('Menu invalide');
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			if($this->canBeSaved($id, $this->request->data)) {
				if ($this->Menu->save($this->request->data)) {
					$this->Flash->success('Le menu a bien été sauvegardé');
					return $this->redirect(array('action' => 'manage'));
				}
			}
			
			$this->Flash->error(
					'Le menu n\'a pas pu être sauvegardé. Réessayez ou contactez l\'administrateur du site'
			);
		} else {
			$this->request->data = $this->Menu->findById($id);
		}
	}
	
	
	public function delete($id = null) {
		
		$this->request->allowMethod('post');
		
		$this->Menu->id = $id;
		if (!$this->Menu->exists()) {
			throw new NotFoundException('Menu invalide');
		}
		
		if ($this->Menu->delete()) {
			$this->Flash->success('Menu supprimée avec succès');
			return $this->redirect(array('action' => 'manage'));
		}
		
		$this->Flash->error('Le menu n\'a pas pu être supprimé');
		return $this->redirect(array('action' => 'manage'));
	}
	
	
	public function canBeSaved($id, $menuToSave = null) {
		if($menuToSave['Menu']['post_id'] != 0 && count($this->Menu->getSubMenuList($id)) > 0) {
			$this->Flash->error('Un menu parent ne peut avoir d\'enfants et pointer vers une page', array('key' => 'form'));
			return false;
		}
		if($menuToSave['Menu']['parent_id'] != 0 && count($this->Menu->getSubMenuList($id)) > 0) {
			$this->Flash->error('Un menu enfant ne peut lui-même avoir d\'enfants', array('key' => 'form'));
			return false;
		}
		if($menuToSave['Menu']['parent_id'] != 0 && $menuToSave['Menu']['post_id'] == 0) {
			$this->Flash->error('Un menu enfant doit pointer vers une page', array('key' => 'form'));
			return false;
		}
		return true;
	}
	
	public function getPostsList() {
		$this->loadModel('Post');
		return $this->Post->find('list');
	}
	
	public function getParentsList($id = null) {
		return $this->Menu->find('list',
				array(
						'conditions' => array(
								'id !=' => $id,
								'parent_id' => 0,
						),
				)
		);
	}
}

?>