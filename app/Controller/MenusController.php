<?php

class MenusController extends AppController {
	
	public function getMenuList() {
		$menuList = $this->Menu->getMenuList();
		$this->set('menuList', $menuList);
		return $menuList;
	}
	
	public function getSubMenuList($idParent) {
		$subMenuList = $this->Menu->getSubMenuList($idParent);
		$this->set('subMenuList', $subMenuList);
		return $subMenuList;
	}
}

?>