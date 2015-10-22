<?php
class IndexController extends Yaf_Controller_Abstract {

	public function indexAction() {
echo '<pre>';
		$post = new TagModel();
		$data['name'] = 'lee';
		//$data['alias'] = 'lee';
		$re = $post->where($data)->find();
var_dump($re);exit;
		//$this->getView()->assign("content", "Hello World");
	}






}
?>
