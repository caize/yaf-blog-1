<?php

class Db{


	//数据库连接实例
	static private $instance;

	/**
	 * @desc 获取数据库实例
	 */
	static public function getInstance(){
		$config = self::parseConfig();
		self::$instance = new Driver_Mysql($config);
		return self::$instance;
	}
	
	
	static private function parseConfig(){
		$_config = array_change_key_case(C('db'));
		$config  = array(
			'type' 		=> (C('db','type')) ? C('db','type') : 'mysql',
			'hostname'  => (C('db','hostname')) ? C('db','hostname') : 'localhost',
			'database'	=> C('db','database'),
			'username'	=> C('db','username'),
			'password'	=> C('db','password'),
			'hostport'  => (C('db','hostport')) ? C('db','hostport') : '3306',
		);
		return $config;
	}



}
