<?php
class IndexController extends Yaf_Controller_Abstract {

	public function indexAction() {
		$post = new PostModel();
		$post->data(array('name'=>'lee'))->add();
		$this->getView()->assign("content", "Hello World");
	}






}
?>
