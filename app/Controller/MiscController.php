<?php

App::uses('AppController', 'Controller');


class MiscController extends AppController {
	
	public $helpers = array('Html');
	
	
	public function beforeFilter() {
		parent::beforeFilter();
		
		$this->Auth->allow('contact', 'partenaires', 'plan', 'info');
	}
	
	public function display($type = null) {
		$typeId = null;
		switch ($type) {
			case 'info':
				$typeId = MiscType::INFO;
				break;
			case 'plan':
				$typeId = MiscType::PLAN;
				break;
			case 'partenaires':
				$typeId = MiscType::PARTENAIRES;
				break;
			case 'contact':
				$typeId = MiscType::CONTACT;
				break;
			default:
				throw new NotFoundException('Page invalide');
				break;
		}
		
		$this->set('page', $this->Misc->find('first', array(
				'order' => array('Misc.created' => 'DESC'),
				'conditions' => array('Misc.type' => $typeId)
		)));
	}
	
	public function manage() {}
	
	public function edit($type = null) {
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Misc->save($this->request->data)) {
				$this->Flash->success('La page a bien été sauvegardée');
				return $this->redirect(array('action' => 'manage'));
			}
			
			$this->Flash->error(
					'La page n\'a pas pu être sauvegardée. Réessayez ou contactez l\'administrateur du site'
			);
		} else {
			$typeId = null;
			switch ($type) {
				case 'info':
					$typeId = MiscType::INFO;
					break;
				case 'plan':
					$typeId = MiscType::PLAN;
					break;
				case 'partenaires':
					$typeId = MiscType::PARTENAIRES;
					break;
				case 'contact':
					$typeId = MiscType::CONTACT;
					break;
				default:
					throw new NotFoundException('Page invalide');
					break;
			}
			
			$this->request->data = $this->Misc->find('first', array(
					'order' => array('Misc.created' => 'DESC'),
					'conditions' => array('Misc.type' => $typeId)
			));
		}
	}
}

?>