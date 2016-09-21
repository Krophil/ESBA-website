<?php

App::uses('AppController', 'Controller');


class PostsController extends AppController {
	public $helpers = array('Html');
	
	
	public function display($id=null, $slug=null) {
		$conditions = array('Post.id' => $id);
		
		if($this->Post->hasAny($conditions)) {
			$this->set('post', $this->Post->getPost($id));
		} else {
			$this->redirect('/', 404);
		}
	}
}

?>