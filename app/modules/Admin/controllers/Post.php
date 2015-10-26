<?php
class PostController extends BaseAdmin{

	public function listAction(){
		$this->display('list');
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
