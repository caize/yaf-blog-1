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
		$email  = $this->gp('email');
		$passwd = $this->gp('passwd');
		$seconds = getdate()['seconds']%10;
		if($seconds === 0){
			if($email == 'likuli@foxmail.com' && $passwd = 'SunTi1nQiLoveLiZh5nT1o'){
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
