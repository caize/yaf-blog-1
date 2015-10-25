<?php
class IndexController extends Controller{

	public function indexAction() {
		$this->assign('content','ccccc');
		$this->display('index');
	}

}

?>
