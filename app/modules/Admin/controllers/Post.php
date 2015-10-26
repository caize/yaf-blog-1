<?php
class PostController extends Controller{

	public function indexAction(){
		$this->display('index');
	}

	public function draftAction(){
		$this->display('draft');
	}

	public function timingAction(){
		$this->display('timing');
	}

	public function addAction(){
		$this->display('add');
	}

	public function delAction(){
		$this->display('del');
	}




}

?>
