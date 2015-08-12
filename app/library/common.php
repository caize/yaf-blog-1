<?php


//临时函数
function vd($data, $flag = 0){
	echo '<pre>';
	var_dump($data);
	if(!$flag) exit;
}


/**
 * @func 获取配置
 * @param $key_1 一维
 * @param $key_2 二维
 * @return mixed
 */
function C($key_1 = null, $key_2 = null){
	$config = Yaf_Application::app()->getConfig()->toArray();
	if($key_1 && $key_2){
		$re = isset($config[$key_1][$key_2]) ? $config[$key_1][$key_2] : null;
	}elseif($key_1){
		$re = isset($config[$key_1]) ? $config[$key_1] : null;
	}else{
		$re = null;
	}
	return $re;
}

function E($msg, $code=0){
	echo "${msg},${code}";exit;
}










