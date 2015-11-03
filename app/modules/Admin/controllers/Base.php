<?php

class BaseController extends Controller {

	public function init(){
		$session = Yaf_Session::getInstance();
		$is_login = $session->get('is_login');
		if(!$is_login){
			$this->redirect('/admin/public/login');	
		}
		$this->assign('is_login',$is_login);
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
