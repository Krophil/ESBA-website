<?php

App::uses('AppModel', 'Model');

class Misc extends AppModel {
	public $displayField = 'content';
	
	public $validate = array(
			'content' => array(
					'required' => array(
							'rule' => 'notBlank',
							'message' => 'Un contenu est requis pour cette page'
					)
			),
	);
}

?>