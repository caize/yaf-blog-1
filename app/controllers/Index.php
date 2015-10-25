<?php
class IndexController extends Yaf_Controller_Abstract {

	public function indexAction() {
		//echo '<pre>';
		//$post = new TagModel();
		//$where['id'] = 10;
		//$data['name'] = 'name';
		//$data['alias'] = 'alias';
		//$re = $post->data($data)->add();
		//$re = $post->where($data)->find();
		//$re = $post->where($data)->limit(0,1)->select();
		//$re = $post->where($data)->del();
		//$re = $post->where($where)->data($data)->update();
		//var_dump($re);exit;
		//$this->getView()->assign("content", "Hello World");
		//echo '<pre>';
		$this->display('index');
	}






}
?>
