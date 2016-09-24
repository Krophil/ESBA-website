<?php

App::uses('AppModel', 'Model');


class News extends AppModel {
	public $displayField = 'title';
	
	
	public $validate = array(
		'title' => array(
			'required' => array(
				'rule' => 'notBlank',
				'message' => 'Un titre est requis'
			)
		),
		'content' => array(
			'required' => array(
				'rule' => 'notBlank',
				'message' => 'Un contenu est requis'
			)
		),
	);
	
	
	public function getLastNews($amountToDisplay) {
		return $this->find('all', array(
				'order'	=> 'id DESC',
				'limit'	=> $amountToDisplay,
		));
	}
}

?>