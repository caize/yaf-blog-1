<?php
class PostController extends Controller {

	public function indexAction() {
		$id = intval($this->gp('id'));

		if(!$id) $this->go_404();

		$Post  = new PostModel();
		$post = $Post->returnPostById($id);

		if(!$post) $this->go_404();

		$this->assign('post',$post);
		$this->display('index');
	}






}
?>
