<?php
class Controller extends Yaf_Controller_Abstract {

	public function init(){
		//error_reporting(0);
	}

	public function assign($n,$p){
		//$api = new Api;
		//$hots = $api->articles_by_hot();
		//$categories = $api->categories();
		//$this->getView()->assign('hots',$hots);
		//$this->getView()->assign('categories',$categories);
		if($n && $p) $this->getView()->assign($n,$p);
	}

	public function show($tpl){
		$this->getView()->display('public/header.html');
		$this->getView()->display('public/sidebar.html');
		$this->getView()->display($tpl);
		$this->getView()->display('public/footer.html');
	}

	/**
	 * @func 获取参数   
	 * @param mixed $p
	 */
	public function gp($p = null){
		if(is_string($p)){
			$re = trim($this->getRequest()->getParam($p));
		}else{
			$re = $this->getRequest()->getParams();
			if(is_array($p)){
				$re = array_intersect_key($re,array_flip($p));	
			}
			$re = $this->_array_trim($re);
		}
		return $re;
	}


	protected function _array_trim($arr = null){
		if(!is_array($arr)) return $arr;
		return array_map(create_function('$v','return trim($v);'),$arr);
	}

	


}

?>
