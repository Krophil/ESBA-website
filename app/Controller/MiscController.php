<?php

App::uses('AppController', 'Controller');


class MiscController extends AppController {
	
	public $helpers = array('Html');
	
	
	public function beforeFilter() {
		parent::beforeFilter();
		
		$this->Auth->allow('contact', 'partenaires', 'plan', 'info');
	}
	
	
	public function contact() {}
	public function info() {}
	public function plan() {}
	public function partenaires() {}
	
	
	public function manage() {}
	
	
	public function edit() {}
}

?>