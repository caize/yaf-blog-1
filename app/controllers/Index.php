<?php

class IndexController extends Controller {

	const PNUM = 10;	//首页文章数


	public function indexAction() {
		$page = intval($this->gp('page'));
		$page = $page ? $page : 1;
		$Post = new PostModel();
		$list = $Post->returnIndexList($page,self::PNUM);
		$pages = $Post->returnIndexPages(self::PNUM);
		vd($pages);
		$this->assign('plist',$list);
		$this->display('index');
	}










}
?>
