<?php
class Controller extends Yaf_Controller_Abstract {

	public function init(){
	}

	protected function assign($n,$p){
		if($n && $p) $this->getView()->assign($n,$p);
	}



	/**
	 * @func 获取参数   
	 * @param mixed $p
	 */
	protected function gp($p = null){
		$method = '';
		$is_str = is_string($p);
		switch($this->getRequest()->method){
			case 'POST':
				$method = 'getPost';
				break;
			case 'GET':
				$method = 'getQuery';
				break;
			default:
				if($is_str){
					$method = 'getParam';
				}else{
					$method = 'getParams';
				}
		}
		if($is_str){
			$re = trim($this->getRequest()->$method($p));
		}else{
			$re = $this->getRequest()->$method();
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
