<?php

class PostModel extends Model{
	
	const PUBLISH = 0;	//文章已发布
	const DRAFT   = 1;	//文章为草稿
	const TIMING  = 2;	//文章为定时发布状态
	const DELETED = -1;	//文章已删除

	public function returnPublishList(){
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




