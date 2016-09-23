<?php

App::uses('AppModel', 'Model');


class Post extends AppModel {
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
		'slug' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Un slug est requis'
            )
        ),
    );
	
	
	public function getPost($id) {
		return $this->find('first', array(
				'conditions'	=> array('id' => $id),
		));
	}
}

?>