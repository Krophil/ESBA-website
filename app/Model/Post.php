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
            ),
			'slug-rule' => array(
				'rule' => 'alphaNumericDashUnderscore',
				'message' => 'Le slug ne peut contenir que des lettres en minuscules, des chiffres, des tirets et des tirets bas'
			)
        ),
    );
	
	
	public function getPost($id) {
		return $this->find('first', array(
				'conditions'	=> array('id' => $id),
		));
	}
	
	
	public function alphaNumericDashUnderscore($check) {
		$value = array_values($check);
		$value = $value[0];
		
		return preg_match('|^[0-9a-z_-]*$|', $value);
	}
}

?>