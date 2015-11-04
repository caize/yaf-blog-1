<?php
class IndexController extends Controller {


	public function indexAction() {
		$Post = new PostModel();
		$list = $Post->returnIndexList();
		$this->assign('plist',$list);
		$this->display('index');
	}










}
?>
