<?php
class PublicController extends Controller{

	public function loginAction() {
		$session = Yaf_Session::getInstance();
		$is_login = $session->get('is_login');
		if($is_login){
			$this->redirect('/admin/index/index');	
		}
		$this->display('login');
	}


	public function ajaxLoginAction(){
		$email  = $this->getRequest()->getPost('email');
		$passwd = $this->getRequest()->getPost('passwd');
		$seconds = getdate()['seconds']%10;
		$username = C('admin','username');
		$password = C('admin','password');
		if($seconds === 0){
			if($email == $username && $passwd == $password){
				$session = Yaf_Session::getInstance();
				$session->set('is_login',true);
				ar('jump','/admin/index/index');
			}
		}else{
			ar('error',str_repeat('🐶',$seconds));	
		}

	}

	
	public function logoutAction(){
		$session = Yaf_Session::getInstance();
		$session->del('is_login');
		$this->redirect('/admin/public/login');
	}


}

?>
