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


	public function __construct(){}

	//public function __set(){}

	//public function __get(){}

    public function __isset($name){}

    //public function __unset($name) {

    //public function __call($name) {

	public function db(){}

	public function add(){}

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

	protected function getModelName(){}

	protected function getTalbeName(){}

	public function getError(){}

	public function getDbError(){}

	public function getLastInsertID(){}

	public function getLastSql(){}

	public function data(){}

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






}



?>
