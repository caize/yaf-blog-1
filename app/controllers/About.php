<?php
class IndexController extends Yaf_Controller_Abstract {

	public function indexAction() {
		//new PostModel();
		$this->getView()->assign("content", "Hello World");
	}






}
?>
