<?php

App::uses('AppController', 'Controller');


class NewsController extends AppController {
	
	public $helpers = array('Html');

	public $components = array('Paginator');

	public $paginate = array(
        'limit' => 10,
        'order' => array(
            'News.created' => 'DESC'
        )
    );
	
	
	public function beforeFilter() {
		parent::beforeFilter();
		
		$this->Auth->allow('index');
	}
	

	public function index() {
		$this->Paginator->settings = $this->paginate;
		$lastNews = $this->Paginator->paginate('News');
		$this->set('lastNews', $lastNews);

		//$this->set('lastNews', $this->News->getLastNews(5));
	}
	
	
	public function manage() {
		$this->Paginator->settings = $this->paginate;
		$newsList = $this->Paginator->paginate('News');
		$this->set('newsList', $newsList);
		//$this->set('newsList', $this->News->find('all', array('order' => 'created DESC')));
	}
	
	
	public function add() {
		if ($this->request->is('post')) {
            $this->News->create();
            if ($this->News->save($this->request->data)) {
                $this->Flash->success('L\'actualité a bien été sauvegardée');
                return $this->redirect(array('action' => 'manage'));
            }
            
            $this->Flash->error(
            		'L\'actualité n\'a pas pu être sauvegardée. Réessayez ou contactez l\'administrateur du site'
			);
        }
	}
	
	
	public function edit($id = null) {
		$this->News->id = $id;
        if (!$this->News->exists()) {
            throw new NotFoundException('Actualité invalide');
        }
        
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->News->save($this->request->data)) {
                $this->Flash->success('L\'actualité a bien été sauvegardée');
                return $this->redirect(array('action' => 'manage'));
            }
            $this->Flash->error(
                	'L\'actualité n\'a pas pu être sauvegardée. Réessayez ou contactez l\'administrateur du site'
            );
        } else {
            $this->request->data = $this->News->findById($id);
        }
	}
	
	
	public function delete($id = null) {

        $this->News->id = $id;
        if (!$this->News->exists()) {
            throw new NotFoundException('Actualité invalide');
        }
        
        if ($this->News->delete()) {
            $this->Flash->success('Actualité supprimée avec succès');
            return $this->redirect(array('action' => 'manage'));
        }
        $this->Flash->error('L\'actualité n\'a pas pu être supprimée');
        return $this->redirect(array('action' => 'manage'));
	}
}

?>