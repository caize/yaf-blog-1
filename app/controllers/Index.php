<?php

class IndexController extends Controller {

	const PNUM = 10;	//首页文章数

	public function indexAction() {
		$page = intval($this->gp('page'));
		$page = $page ? $page : 1;
		$Post  = new PostModel();
		$list  = $Post->returnIndexList($page,self::PNUM);
		$pages = $Post->returnIndexPages(self::PNUM);
		$this->assign('plist',$list);
		$this->assign('page',$page);		//当前页码
		$this->assign('pages',$pages);		//总页码数
		$this->display('index');
	}










}
?>
