<?php

abstract class Driver{

	//PDO操作实例
	protected $PDO = null;

	//当前模型名称
	protected $model = null;

	//当前数据库连接
	protected $linked  = null;

	//
	protected $error = '';

	// 数据库连接参数配置
	protected $config     = array(
		'type'              =>  '',     // 数据库类型
		'hostname'          =>  '127.0.0.1', // 服务器地址
		'database'          =>  '',          // 数据库名
		'username'          =>  '',          // 用户名
		'password'          =>  '',          // 密码
		'hostport'          =>  '',          // 端口     
		'dsn'               =>  '', 		 //          
		'params'            =>  array(), 	 // 数据库连接参数        
		'charset'           =>  'utf8',      // 数据库编码默认采用utf8  
		'prefix'            =>  '',    		 // 数据库表前缀
		'debug'             =>  false,       // 数据库调试模式
		'deploy'            =>  0, 			 // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
		'rw_separate'       =>  false,       // 数据库读写是否分离 主从式有效
		'master_num'        =>  1, 			 // 读写分离后 主服务器数量
		'slave_no'          =>  '', 		 // 指定从服务器序号
		'db_like_fields'    =>  '', 
	);

    // PDO连接参数
    protected $options = array(
        PDO::ATTR_CASE              =>  PDO::CASE_LOWER,
        PDO::ATTR_ERRMODE           =>  PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_ORACLE_NULLS      =>  PDO::NULL_NATURAL,
        PDO::ATTR_STRINGIFY_FETCHES =>  false,
    );

    // 数据库表达式
    protected $exp = array('eq'=>'=','neq'=>'<>','gt'=>'>','egt'=>'>=','lt'=>'<','elt'=>'<=','notlike'=>'NOT LIKE','like'=>'LIKE','in'=>'IN','notin'=>'NOT IN','not in'=>'NOT IN','between'=>'BETWEEN','not between'=>'NOT BETWEEN','notbetween'=>'NOT BETWEEN');

    // 查询表达式
    protected $selectSql  = 'SELECT%DISTINCT% %FIELD% FROM %TABLE%%FORCE%%JOIN%%WHERE%%GROUP%%HAVING%%ORDER%%LIMIT% %UNION%%LOCK%%COMMENT%';
    

    /**
	 * 读取数据库配置信息
	 * @access public
	 * @param array $config 数据库配置数组
	 */
	public function __construct($config=''){
		if(!empty($config)) {
			$this->config   =   array_merge($this->config,$config);
			if(is_array($this->config['params'])){
				$this->options = $this->config['params'] + $this->options;
			}
		}
	}

    /**
     * 执行查询 返回数据集
     * @access public
     * @param string $str  sql指令
     * @return mixed
     */
    public function query($str,$fetchSql=false) {
		$this->initConnect();
		if( !$this->linked ) return false;

		//释放前次的查询结果
		if ( !empty($this->PDO) ) $this->free();	
	}

    /**
     * 初始化数据库连接
     * @access protected
     * @return void
	 */
	protected function initConnect() {
		$this->linked = $this->connect();
	}


	/**
	 * 连接数据库方法
	 * @access public
	 */
	public function connect($config='') {
		if(empty($config))  $config = $this->config;
		try{
			if(empty($config['dsn'])) {
				$config['dsn']  =   $this->parseDsn($config);
			}
			if(version_compare(PHP_VERSION,'5.3.6','<=')){ 
				// 禁用模拟预处理语句
				$this->options[PDO::ATTR_EMULATE_PREPARES]  =   false;
			}
			$this->linked = new PDO( $config['dsn'], $config['username'], $config['password'],$this->options);
		}catch (\PDOException $e) {
			E($e->getMessage());
		}
		return $this->linked;
	}


    /**
     * 插入记录
     * @access public
     * @param array $data 数据
     * @param array $options 参数表达式
     * @param boolean $replace 是否replace
     * @return false | int
     */
	public function insert($data = array(), $options = array(), $replace = false){
	
	}


	/**
	 * 释放查询结果
	 * @access public
	 */
	public function free() {
        $this->PDO = null;
    }



}
