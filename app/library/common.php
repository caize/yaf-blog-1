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

/**
 * 字符串命名风格转换
 * type 0 将Java风格转换为C的风格 1 将C风格转换为Java的风格
 * @param string $name 字符串
 * @param integer $type 转换类型
 * @return string
 */
function parse_name($name, $type=0) {
    if ($type) {
        return ucfirst(preg_replace_callback('/_([a-zA-Z])/', function($match){return strtoupper($match[1]);}, $name));
    } else {
        return strtolower(trim(preg_replace("/[A-Z]/", "_\\0", $name), "_"));
    }
}









