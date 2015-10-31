
<?php
class TaxonomyController extends BaseController{

	public function listAction() {
		$M = new TaxonomyModel();
		$where['type'] = $this->type;
		$list = $M->where($where)->order('id desc')->select();
		$this->assign('_list',$list);
		$this->display('list');
	}

	public function addAction() {
		$this->display('add');
	}

	public function ajaxAddAction() {
		$params = $this->gp();	
		$data = array();
		$data['type'] = $this->type;
		$data = $data + $params;

		$M = new TaxonomyModel();
		
		$hasName = $M->where(array('name'=>$data['name']))->find();
		$hasSlug = $M->where(array('slug'=>$data['slug']))->find();
		if($hasName){
			$code = 'error';
			$body = '名称已经存在！';
		}elseif($hasSlug){
			$code = 'error';
			$body = '缩略名已经存在！';
		}else{
			$code = 'reload';
			$body = $M->data($data)->add();
		}
		ar($code,$body);
	}

	public function ajaxDelAction(){
		$id = $this->gp('id');
		$M = new TaxonomyModel();
		$re = $M->delById($id);
		if($re){
			ar('reload');
		}else{
			ar('error','删除失败');
		}
	}	




}
