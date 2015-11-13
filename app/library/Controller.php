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
	protected function _gp($p = null){
		$method = '';
		$is_str = is_string($p);
		if($this->getRequest()->getRouted()){
			if($is_str){
				$method = 'getParam';
			}else{
				$method = 'getParams';
			}
		}elseif($this->getRequest()->method == 'POST'){
			$method = 'getPost';
		}elseif($this->getRequest()->method == 'GET'){
			$method = 'getQuery';
		}else{
			return false;	
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
