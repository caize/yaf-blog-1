<?php

class PostModel extends Model{
	
	const PUBLISH = 0;	//文章已发布
	const DRAFT   = 1;	//文章为草稿
	const TIMING  = 2;	//文章为定时发布状态
	const DELETED = -1;	//文章已删除

	//返回首页总页数
	public function returnIndexPages($pnum){
		$where['status'] = self::PUBLISH;	
		$count = $this->where($where)->count('id');	
		return $count;
	}

	//返回前台文章列表
	public function returnIndexList($page,$pnum){
		$TM = new TaxonomyModel();
		$where['status'] = self::PUBLISH;	
		$field = 'id,title,content,date,views';
		$list = $this->field($field)->page($page,$pnum)->order('id desc')->where($where)->select();
		$post_id_arr = array_column($list,'id');
		$category_arr = $TM->returnCategoryByPostIdArr($post_id_arr);
		$tag_arr = $TM->returnTagByPostIdArr($post_id_arr);
		foreach($list as &$v){
			$content = $v['content'];
			$post_id = $v['id'];
			$v['content'] = mb_strimwidth(strip_tags($content),0,120,'...','utf8');	
			$v['category'] = $category_arr[$post_id];
			$v['tag'] = $tag_arr[$post_id];
		}
		return $list;
	}

	//返回后台文章列表
	public function returnAdminList(){
		$where['status'] = self::PUBLISH;	
		return $this->field('id,title,date')->order('id desc')->where($where)->select();
	}

	private function returnPublishList(){
		$where['status'] = self::PUBLISH;	
		return $this->order('id desc')->where($where)->select();
	}


	public function delById($id){
		$where['id'] = $id;
		$data['status'] = self::DELETED;
		return $this->where($where)->data($data)->update();	
	}





}


?>




