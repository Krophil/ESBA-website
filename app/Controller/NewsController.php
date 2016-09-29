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
	
	public function manage_carousel() {
		if ($this->request->is('post') && !empty($this->request->data)) {
			if(!empty($this->request->data['News']['image_file']['tmp_name'])) {
				$extension = strtolower(pathinfo($this->request->data['News']['image_file']['name'], PATHINFO_EXTENSION));
				if(in_array($extension, array('jpg', 'jpeg', 'png'))) {
					if (move_uploaded_file($this->request->data['News']['image_file']['tmp_name'], IMAGES . 'jcarousel'
							. DS . $this->request->data['News']['image_file']['name'])) {
						$this->Flash->success('L\'image a bien été sauvegardée');
						return $this->redirect(array('action' => 'manage_carousel'));
					}
				} else {
					$this->Flash->error(
							'Extension invalide', array('key' => 'form')
					);
				}
			}
			$this->Flash->error(
					'L\'image n\'a pas pu être sauvegardée. Réessayez ou contactez l\'administrateur du site'
			);
		}
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
	
	
	public function delete_img($name = null) {
		App::uses('File', 'Utility');
		$file = new File(IMAGES . 'jcarousel' . DS . $name);
		
		if(!$file->readable()) {
			throw new NotFoundException('Actualité invalide');
		}
		
		if($file->delete()) {
			$this->Flash->success('Image supprimée avec succès');
			return $this->redirect(array('action' => 'manage_carousel'));
		}
		$this->Flash->error('L\'image n\'a pas pu être supprimée');
		return $this->redirect(array('action' => 'manage_carousel'));
	}
}

?>