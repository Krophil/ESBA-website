<?php

App::uses('AppController', 'Controller');


class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout');
    }

	
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

	
    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Utilisateur invalide'));
        }
        $this->set('user', $this->User->findById($id));
    }

	
    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('L\'utilisateur a bien été sauvegardé'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('L\'utilisateur n\'a pas pu être sauvegardé. Réessayez ou contactez l\'administrateur du site')
            );
        }
    }

	
    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Utilisateur invalide'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('L\'utilisateur a bien été sauvegardé'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('L\'utilisateur n\'a pas pu être sauvegardé. Réessayez ou contactez l\'administrateur du site')
            );
        } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }
    }

	
    public function delete($id = null) {

        $this->request->allowMethod('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Utilisateur invalide'));
        }
        if ($this->User->delete()) {
            $this->Flash->success(__('Utilisateur supprimé avec succès'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('L\'utilisateur n\'a pas pu être supprimé'));
        return $this->redirect(array('action' => 'index'));
    }
	
	
	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error(__('Nom d\'utilisateur ou mot de passe invalide, veuillez réessayer'));
		}
	}

	public function logout() {
		return $this->redirect($this->Auth->logout());
	}
}

?>