<?php
class PostController extends BaseController{



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
		$C = new TaxonomyModel();
		$clist = $C->returnCategoryList();
		$tlist = $C->returnTagList();
		$this->assign('clist',$clist);
		$this->assign('tlist',$tlist);
		$this->display('add');
	}

	public function ajaxDelAction(){
	}

	public function ajaxAddAction(){
		$params = $this->gp();	
		vd($params);
	}


	

}

?>
