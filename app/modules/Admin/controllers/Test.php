<?php
class TestController extends Yaf_Controller_Abstract {

	public function indexAction() {//默认Action
		echo 'Admin Test';exit;
		//$this->getView()->assign("content", "Hello Admin");
	}

}
?>
