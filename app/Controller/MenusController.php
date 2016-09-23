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
			if ($this->Menu->save($this->request->data)) {
				$this->Flash->success('Le menu a bien été sauvegardé');
				return $this->redirect(array('action' => 'panel'));
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
			if ($this->Menu->save($this->request->data)) {
				$this->Flash->success('Le menu a bien été sauvegardé');
				return $this->redirect(array('action' => 'panel'));
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
			return $this->redirect(array('action' => 'panel'));
		}
		$this->Flash->error('Le menu n\'a pas pu être supprimé');
		return $this->redirect(array('action' => 'panel'));
	}
}

?>