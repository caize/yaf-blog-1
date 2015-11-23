<?php
class PostController extends BaseController{


	public function listAction(){
		$P =  new PostModel();
		$list = $P->returnAdminList();
		$this->assign('plist',$list);
		$this->display('list');
	}

	public function draftAction(){
		$this->display('draft');
	}

	public function timingAction(){
		$this->display('timing');
	}

	public function delAction(){
		$this->display('del');
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
		$id = $this->gp('id');
		
		$P = new PostModel();
		$re = $P->delById($id);
		ar('reload');
	}

	public function ajaxAddAction(){
		$params = $this->getRequest()->getPost();	

		$P = new PostModel();
		$T = new TaxonomyModel();
		$M = new TaxonomyMapModel();

		//添加文章
		$pdata['title']   = $params['title'];
		$pdata['content'] = $params['content'];
		$post_id = $P->data($pdata)->add();

		//添加分类和标签
		$tdata = array();
		$category_arr = explode('_',trim($params['category'],'_'));
		$tag_arr = explode('_',trim($params['tag'],'_'));
		$tarr = array_merge($category_arr,$tag_arr);

		$twhere['id'] = array('in',$tarr);
		$tlist = $T->field('id,type,name,slug')->where($twhere)->select();
		foreach($tlist as &$v){
			$v['post_id'] = $post_id;
			$v['taxonomy_id']   = $v['id'];
			$v['taxonomy_name'] = $v['name'];
			$v['taxonomy_slug'] = $v['slug'];
			unset($v['id'],$v['name'],$v['slug']);
		}
		$M->data($tlist)->addAll();
		ar('jump','/admin/post/list');
	}


	

}

?>
