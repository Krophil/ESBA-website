<?php

App::uses('AppController', 'Controller');


class NewsController extends AppController {
	
	public $helpers = array('Html');
	
	
	public function beforeFilter() {
		parent::beforeFilter();
		
		$this->Auth->allow('index');
	}
	

	public function index() {
		$this->set('lastNews', $this->News->getLastNews(5));
	}
}

?>