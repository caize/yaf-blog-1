<?php

class TaxonomyModel extends Model{

	const CTYPE = 1;	//分类 category
	const TTYPE = 2;	//标签 tag
	const JTYPE = 3;	//教程
	const MTYPE = 4;	//目录

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


}


?>

