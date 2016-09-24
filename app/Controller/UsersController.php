<?php

App::uses('AppController', 'Controller');


class UsersController extends AppController {
	
	
	public function beforeFilter() {
		parent::beforeFilter();
		
		$this->Auth->allow('login');
	}

	
    public function panel() {}
    
    
    public function manage() {
		$this->set('userList', $this->User->find('all', array('order' => 'id ASC')));
	}

	
    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->success('L\'utilisateur a bien été sauvegardé');
                return $this->redirect(array('action' => 'manage'));
            }
            
            $this->Flash->error(
                	'L\'utilisateur n\'a pas pu être sauvegardé. Réessayez ou contactez l\'administrateur du site'
            );
        }
    }

	
    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException('Utilisateur invalide');
        }
        
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success('L\'utilisateur a bien été sauvegardé');
                return $this->redirect(array('action' => 'manage'));
            }
            
            $this->Flash->error(
                	'L\'utilisateur n\'a pas pu être sauvegardé. Réessayez ou contactez l\'administrateur du site'
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
            throw new NotFoundException('Utilisateur invalide');
        }
        
        if ($this->User->delete()) {
            $this->Flash->success('Utilisateur supprimé avec succès');
            return $this->redirect(array('action' => 'manage'));
        }
        
        $this->Flash->error('L\'utilisateur n\'a pas pu être supprimé');
        return $this->redirect(array('action' => 'manage'));
    }
	
	
	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->Flash->success('Connexion réussie');
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error('Nom d\'utilisateur ou mot de passe invalide, veuillez réessayer');
		}
	}

	
	public function logout() {
		$this->Flash->success('Déconnexion réussie');
		return $this->redirect($this->Auth->logout());
	}
}

?>