<?php

/**
 * Model模型类
 * 实现了ORM和ActiveRecords模式
 */
class Model {

	// 数据库操作对象
	protected $db				= null;

    // 数据表前缀
    protected $tablePrefix      =   null;

    // 模型名称
    protected $name             =   '';

    // 数据库名称
    protected $dbName           =   '';

    // 数据库配置
    protected $connection       =   '';

    // 数据表名（不包含表前缀）
    protected $tableName        =   '';

    // 实际数据表名（包含表前缀）
    protected $trueTableName    =   '';

    // 最近错误信息
    protected $error            =   '';

    // 字段信息
    protected $fields           =   array();

    // 数据信息
    protected $data             =   array();

    // 链操作方法列表
    protected $methods          =   array('strict','order','alias','having','group','lock','distinct','auto','filter','validate','result','token','index','force');


	public function __construct(){
		if(!isset($this->tablePrefix)){
            $this->tablePrefix = C('db','prefix');
        }
		$this->name = $this->getModelName();
		$this->db();
	}

	//public function __set(){}

	//public function __get(){}

    public function __isset($name){}

    //public function __unset($name) {

    //public function __call($name) {

	public function db(){
		$this->db = Db::getInstance();		
	}

	/**
	 * @func 添加数据
	 * @param $replace 是否replace 默认false
	 * @return mixed
	 */
	public function add($replace = false){
		if(!empty($this->data)){
			$data = $this->data;	// 获取数据对象的值
			$this->data = array();	//重置数据
		}else{
			$this->error = die('_DATA_TYPE_INVALID_');
			return false;
		}
		$options = $this->_parseOptions();
		$result = $this->db->insert($data,$options,$replace);
		return $result;
	}

	public function save(){}
	
	public function del(){}

	public function select(){}

	public function find(){}

	public function setField(){}

	public function getField(){}

	public function create(){}

	public function check(){}

	public function query(){}

	public function execute(){}

	public function parseSql(){}

	public function getError(){}

	public function getDbError(){}

	public function getLastInsertID(){}

	public function getLastSql(){}

	/**
	 * 设置数据对象
	 * @param $data 数据
	 * @return Model
	 */
	public function data($data = array()){
		if(!empty($data) && is_array($data)){
			$this->data = $data;
		}else{
			die('_DATA_TYPE_INVALID_');
		}
		return $this;
	}

	public function table(){}

	public function using(){}

	public function join(){}

	public function union(){}

	public function cache(){}

	public function field(){}

	public function where(){}

	public function limit(){}

	public function page(){}

	public function comment(){}

	public function fetchSql(){}


    /**
     * 得到当前的数据对象名称
     * @access public
     * @return string
     */
	public function getModelName(){
        if(empty($this->name)){
            $name = substr(get_class($this),0,-strlen('Model'));
            $this->name = $name;
        }
        return $this->name;
	}
	
	public function getTableName(){
		if(empty($this->tableName)){
			$this->tableName = strtolower($this->name);	
			if(!empty($this->tablePrefix)){
				$this->tableName = $this->tablePrefix . '_' . $this->tableName;
			}
		}
		return $this->tableName;
	}

	 /**
     * 分析表达式
     * @param array $options 表达式参数
     * @return array
     */
	private function _parseOptions($options = array()){
		if(is_array($options) && !empty($options)){
			$options =  array_merge($this->options,$options);
		}

        if(!isset($options['table'])){
            $options['table'] = $this->getTableName();
        }

		//清空表达式
		$this->options = array();
		return $options;
	}





}



?>
