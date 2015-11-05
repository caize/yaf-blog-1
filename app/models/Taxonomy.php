<?php

class TaxonomyModel extends Model{

	const CTYPE = 1;	//分类 category
	const TTYPE = 2;	//标签 tag
	const JTYPE = 3;	//教程
	const MTYPE = 4;	//目录

	public function returnCategoryByPostIdArr($arr = array()){
		$M = $this->returnMapInstance();
		$where['type'] = self::CTYPE;	
		$where['post_id'] = array('in',$arr);
		$field = 'post_id,taxonomy_slug,taxonomy_name';
		$list = $M->where($where)->field($field)->select();
		$list = $this->handleList($list);
		return $list;
	}

	public function returnTagByPostIdArr($arr = array()){
		$M = $this->returnMapInstance();
		$where['type'] = self::TTYPE;	
		$where['post_id'] = array('in',$arr);
		$field = 'post_id,taxonomy_slug,taxonomy_name';
		$list = $M->where($where)->field($field)->select();
		$list = $this->handleList($list);
		return $list;
	}

	public function returnCategoryList(){
		$where['type'] = self::CTYPE;
		return $this->where($where)->select();
	}

	public function returnTagList(){
		$where['type'] = self::TTYPE;
		return $this->where($where)->select();
	}

	public function delById($id){
		return $this->where(array('id'=>$id))->del();	
	}


	//将list的key转化为post id
	private function handleList($list){
		$arr = array();
		foreach($list as &$v){
			$post_id = $v['post_id'];	
			unset($v['post_id']);
			$arr[$post_id][] = $v;	
		}	
		return $arr;
	}


	private function returnMapInstance(){
		return new TaxonomyMapModel();	
	}


}


?>

