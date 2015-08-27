<?php
class IndexController extends Yaf_Controller_Abstract {

	public function indexAction() {
		$post = new PostModel();
		$post->data(array('id'))->add();
		//exit;
		$this->getView()->assign("content", "Hello World");
	}






}
?>
