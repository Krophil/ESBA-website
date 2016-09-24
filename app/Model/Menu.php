<?php

App::uses('AppModel', 'Model');


class Menu extends AppModel {
	public $displayField = 'title';
	
	
	public $belongsTo = array(
		'Post' => array(
			'className'		=> 'Post',
			'foreignKey'	=> 'post_id'
		),
		'Parent' => array(
			'className'		=> 'Menu',
			'foreignKey'	=> 'parent_id',
			'conditions'	=> array('Parent.id !=' => 'Menu.id'),
			'fields'		=> array('id', 'title', 'post_id'),
		),
	);
	
	
	public $validate = array(
		'title' => array(
			'required' => array(
				'rule' => 'notBlank',
				'message' => 'Un titre est requis'
			)
		),
		'parent_id' => array(
			'required' => array(
				'rule' => 'notBlank',
				'message' => 'Un niveau parent est requis'
			)
		),
		'level' => array(
			'required' => array(
				'rule' => 'notBlank',
				'message' => 'Un niveau est requis'
			),
		),
		'post_id' => array(
			'required' => array(
				'rule' => 'notBlank',
				'message' => 'Une page liée est requise'
			),
		),
	);
	
	
	public function getMenuList() {
		return $this->find('all', array(
				'order'			=> 'Menu.level ASC',
				'conditions'	=> array('Menu.parent_id' => 0),
		));
	}
	
	
	public function getSubMenuList($parentId) {
		return $this->find('all', array(
				'order'			=> 'Menu.level ASC',
				'conditions'	=> array('Menu.parent_id' => $parentId),
		));
	}
}

?>