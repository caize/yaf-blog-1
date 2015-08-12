<?php
class IndexController extends Yaf_Controller_Abstract {

	public function indexAction() {
		new PostModel();
		exit;
		$this->getView()->assign("content", "Hello World");
	}






}
?>
