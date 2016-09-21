<?php

App::uses('AppModel', 'Model');


class Post extends AppModel {
	public $displayField = 'title';
	
	
	public function getPost($id) {
		return $this->find('first', array(
				'conditions'	=> array('id' => $id),
		));
	}
}

?>