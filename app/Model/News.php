<?php

class News extends AppModel {
	public $displayField = 'title';
	
	public function getLastNews($amountToDisplay) {
		return $this->find('all', array(
				'order'		=>	'id DESC',
				'limit'		=>	$amountToDisplay,
		));
	}
}

?>