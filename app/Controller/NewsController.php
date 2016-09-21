<?php

App::uses('AppController', 'Controller');


class NewsController extends AppController {
	public $helpers = array('Html');

	public function index() {
		$this->set('lastNews', $this->News->getLastNews(5));
	}
}

?>