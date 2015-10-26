<?php

class BaseAdmin extends Controller {

	public function init(){
		$this->_assign_controller_name();
		$this->_assign_action_name();
	}

	protected function _assign_controller_name(){
		$name = $this->getRequest()->getControllerName();	
		$this->assign(strtolower($name),'active');
	}

	protected function _assign_action_name(){
		$name = $this->getRequest()->getActionName();	
		$this->assign(strtolower($name),'active');
	}


}
