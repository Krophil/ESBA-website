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

abstract class MiscType {
	public const INFO = 1;
	public const PLAN = 2;
	public const PARTENAIRES = 3;
	public const CONTACT = 4;
}

?>