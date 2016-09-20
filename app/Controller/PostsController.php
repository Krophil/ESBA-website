<?php

class PostsController extends AppController {
	public $helpers = array('Html', 'Form');
	
	public function index() {
		debug($this->Post->find('all'));
	}
}

?>