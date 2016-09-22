<?php

App::uses('AppController', 'Controller');


class PostsController extends AppController {
	
	public $helpers = array('Html');
	
	
	public function beforeFilter() {
		parent::beforeFilter();
		
		$this->Auth->allow('display');
	}
	
	
	public function panel() {
		
	}
	
	
	public function display($id=null, $slug=null) {
		$conditions = array('Post.id' => $id);
		
		if($this->Post->hasAny($conditions)) {
			$this->set('post', $this->Post->getPost($id));
		} else {
			$this->redirect('/', 404);
		}
	}
	
	public function add() {
		if ($this->request->is('post')) {
            $this->Post->create();
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success(__('La page a bien été sauvegardée'));
                return $this->redirect(array('action' => 'panel'));
            }
            $this->Flash->error(
                __('La page n\'a pas pu être sauvegardée. Réessayez ou contactez l\'administrateur du site')
            );
        }
	}
	
	
	public function edit($id = null) {
        $this->Post->id = $id;
        if (!$this->Post->exists()) {
            throw new NotFoundException(__('Page invalide'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success(__('La page a bien été sauvegardée'));
                return $this->redirect(array('action' => 'panel'));
            }
            $this->Flash->error(
                __('La page n\'a pas pu être sauvegardée. Réessayez ou contactez l\'administrateur du site')
            );
        } else {
            debug($this->request->data = $this->Post->findById($id));
            //unset($this->request->data['Post']['password']);
        }
    }

	
    public function delete($id = null) {

        $this->request->allowMethod('post');

        $this->Post->id = $id;
        if (!$this->Post->exists()) {
            throw new NotFoundException(__('Page invalide'));
        }
        if ($this->Post->delete()) {
            $this->Flash->success(__('Page supprimée avec succès'));
            return $this->redirect(array('action' => 'panel'));
        }
        $this->Flash->error(__('La page n\'a pas pu être supprimée'));
        return $this->redirect(array('action' => 'panel'));
    }
}

?>