<?php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');


class User extends AppModel {
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Un nom d\'utilisateur est requis'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Un mot de passe est requis'
            ),
			'min' => array(
					'rule' => array('minLength', 6),
					'message' => 'Le mot de passe doit avoir une longueur d\'au moins 6 caractères'
			),
        ),
		'password_confirm' => array(
			'required' => array(
				'rule' => 'notBlank',
				'message' => 'La confirmation de mot de passe est requise'
			),
			'match' => array(
				'rule' => 'validatePasswordConfirm',
				'message' => 'Les mots de passe ne correspondent pas'
			),
		),
    );
	
	
	function validatePasswordConfirm($data) {
		if ($this->data['User']['password'] !== $data['password_confirm'])
			return false;
		return true;
	}
	
	
	public function beforeSave($options = array()) {
		if (isset($this->data['User']['password'])) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash($this->data['User']['password']);
		}
		
		return true;
	}
}

?>