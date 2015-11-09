<?php

class PostModel extends Model{
	
	const PUBLISH = 0;	//文章已发布
	const DRAFT   = 1;	//文章为草稿
	const TIMING  = 2;	//文章为定时发布状态
	const DELETED = -1;	//文章已删除


	//返回前台文章列表
	public function returnIndexList(){
		$TM = new TaxonomyModel();
		$where['type'] = self::PUBLISH;	
		$field = 'id,title,content,date,views';
		$list = $this->field($field)->order('id desc')->where($where)->select();
		$post_id_arr = array_column($list,'id');
		$category_arr = $TM->returnCategoryByPostIdArr($post_id_arr);
		$tag_arr = $TM->returnTagByPostIdArr($post_id_arr);
		foreach($list as &$v){
			$content = $v['content'];
			$post_id = $v['id'];
			$v['content'] = mb_strimwidth(strip_tags($content),0,180,'...','utf8');	
			$v['category'] = $category_arr[$post_id];
			$v['tag'] = $tag_arr[$post_id];
		}
		return $list;
	}

	//返回后台文章列表
	public function returnAdminList(){
		$where['type'] = self::PUBLISH;	
		return $this->field('id,title,date')->order('id desc')->where($where)->select();
	}

	private function returnPublishList(){
		$where['type'] = self::PUBLISH;	
		return $this->order('id desc')->where($where)->select();
	}


	public function delById($id){
		$where['id'] = $id;
		$data['type'] = self::DELETED;
		return $this->where($where)->data($data)->update();	
	}





}


?>




