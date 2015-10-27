<?php
class TagController extends BaseAdmin{

	public function listAction() {
		$this->display('list');
	}

	public function addAction() {
		$this->display('add');
	}

	public function ajaxAddAction() {
		$params = $this->gp();	
		$data = array();
		$data['type'] = '1';
		$data = $data + $params;
		$M = new TaxonomyModel();
		$re = $M->data($data)->add();
		vd($re);
	}

}

?>
