<?php

App::uses('AppModel', 'Model');


class Menu extends AppModel {
	public $displayField = 'title';
	public $belongsTo = array(
			'Post'	=> array(
					'className'		=> 'Post',
					'foreignKey'	=> 'post_id'
			),
	);
	
	public function getMenuList() {
		return $this->find('all', array(
				'order'			=> 'level ASC',
				'conditions'	=> array('parent_id' => 0),
		));
	}
	
	public function getSubMenuList($parentId) {
		return $this->find('all', array(
				'order'			=> 'level ASC',
				'conditions'	=> array('parent_id' => $parentId),
		));
	}
}

?>