<?php

/**
 * @func ajax return
 */
function ar($code,$info = '',$func = ''){
    $return = array();
    $return['code'] = $code;
    $return['body'] = $info;
    $return['func'] = $func;
    echo json_encode($return);
    exit;
}

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
 * 获取和设置语言定义(不区分大小写)
 * @param string|array $name 语言变量
 * @param mixed $value 语言值或者变量
 * @return mixed
 */
function L($name=null, $value=null) {
    static $_lang = array();
    // 空参数返回所有定义
    if (empty($name))
        return $_lang;
    // 判断语言获取(或设置)
    // 若不存在,直接返回全大写$name
    if (is_string($name)) {
        $name   =   strtoupper($name);
        if (is_null($value)){
            return isset($_lang[$name]) ? $_lang[$name] : $name;
        }elseif(is_array($value)){
            // 支持变量
            $replace = array_keys($value);
            foreach($replace as &$v){
                $v = '{$'.$v.'}';
            }
            return str_replace($replace,$value,isset($_lang[$name]) ? $_lang[$name] : $name);        
        }
        $_lang[$name] = $value; // 语言定义
        return null;
    }
    // 批量定义
    if (is_array($name))
        $_lang = array_merge($_lang, array_change_key_case($name, CASE_UPPER));
    return null;
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


//$arr 二维数组；$tmp 一维数组
//array_walk($arr, 'array_walk_merge',$tmp);
function array_walk_merge(&$v,$k,$c){
	$v = array_merge($v,$c);
}






