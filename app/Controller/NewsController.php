<?php

class NewsController extends AppController {
	public $helpers = array('Html', 'Form');

	public function index() {
		$this->set('lastNews', $this->News->getLastNews(5));
	}
}

?>