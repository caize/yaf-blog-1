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
    protected $data = array();

    // 链操作方法列表
    protected $methods = array('strict','order','alias','having','group','lock','distinct','auto','filter','validate','result','token','index','force');


	public function __construct(){
		if(!isset($this->tablePrefix)){
            $this->tablePrefix = C('db','prefix');
        }
		$this->name = $this->getModelName();
		$this->db();
	}

    public function __isset($name){}

	public function db(){
		$this->db = Db::getInstance();		
	}

    /**
     * 利用__call方法实现一些特殊的Model方法
     * @access public
     * @param string $method 方法名称
     * @param array $args 调用参数
     * @return mixed
     */
    public function __call($method,$args) {
        if(in_array(strtolower($method),$this->methods,true)) {
            // 连贯操作的实现
            $this->options[strtolower($method)] =   $args[0];
            return $this;
        }elseif(in_array(strtolower($method),array('count','sum','min','max','avg'),true)){
            // 统计查询的实现
            $field =  isset($args[0])?$args[0]:'*';
            return $this->getField(strtoupper($method).'('.$field.') AS tp_'.$method);
        }elseif(strtolower(substr($method,0,5))=='getby') {
            // 根据某个字段获取记录
            $field   =   parse_name(substr($method,5));
            $where[$field] =  $args[0];
            return $this->where($where)->find();
        }elseif(strtolower(substr($method,0,10))=='getfieldby') {
            // 根据某个字段获取记录的某个值
            $name   =   parse_name(substr($method,10));
            $where[$name] =$args[0];
            return $this->where($where)->getField($args[1]);
        }elseif(isset($this->_scope[$method])){// 命名范围的单独调用支持
            return $this->scope($method,$args[0]);
        }else{
            E(__CLASS__.':'.$method.L('_METHOD_NOT_EXIST_'));
            return;
        }
    }

    /**
     * 保存数据
     * @access public
     * @param mixed $data 数据
     * @param array $options 表达式
     * @return boolean
     */
    public function update($data='',$options=array()) {
        if(empty($data)) {
            // 没有传递数据，获取当前数据对象的值
            if(!empty($this->data)) {
                $data           =   $this->data;
                // 重置数据
                $this->data     =   array();
            }else{
                $this->error    =   L('_DATA_TYPE_INVALID_');
                return false;
            }
        }
        $data  = $this->_facade($data);
        if(empty($data)){
            $this->error = L('_DATA_TYPE_INVALID_');
            return false;
        }
        $options = $this->_parseOptions($options);
        if(!isset($options['where']) ) {
            // 如果存在主键数据 则自动作为更新条件
            if (is_string($pk) && isset($data[$pk])) {
                $where[$pk] = $data[$pk];
                unset($data[$pk]);
            } elseif (is_array($pk)) {
                // 增加复合主键支持
                foreach ($pk as $field) {
                    if(isset($data[$field])) {
                        $where[$field] = $data[$field];
					} else {
						// 如果缺少复合主键数据则不执行
						$this->error = L('_OPERATION_WRONG_');
                        return false;
                    }
                    unset($data[$field]);
                }
            }
            if(!isset($where)){
                // 如果没有任何更新条件则不执行
                $this->error = L('_OPERATION_WRONG_');
                return false;
            }else{
                $options['where'] = $where;
            }
        }
		$result = $this->db->update($data,$options);
		return $result;
	}

	/**
	 * @func 添加数据
	 * @param $replace 是否replace 默认false
	 * @return mixed
	 */
	public function add($replace = false){
		if(!empty($this->data)){
			$data = $this->data;	// 获取数据对象的值
			$data['ctime'] = time();
			$this->data = array();	//重置数据
		}else{
			$this->error = die('_DATA_TYPE_INVALID_');
			return false;
		}
		$options = $this->_parseOptions();
		$result  = $this->db->insert($data,$options,$replace);
		return $result;
	}


	/**
	 * @func 批量添加数据
	 * @param $replace 是否replace 默认false
	 * @return mixed
	 */
	public function addAll($replace = false){
		$dataList = $this->data;
		if(empty($dataList)) {
			$this->error = L('_DATA_TYPE_INVALID_');
			return false;
		}
		$options = $this->_parseOption();
		$result  = $this->db->insertAll($dataList,$options,$replace);
		if(false !== $result ) {
			$insertId = $this->getLastInsID();
			if($insertId) {
				return $insertId;
			}
		}
		return $result;	
	}

	public function save(){}
	

	public function del($options = array()){
		$options =  $this->_parseOptions($options);

		// 如果条件为空 不进行删除操作 除非设置 1=1
        if(empty($options['where'])) return false;

		$result = $this->db->delete($options);
		return $result;
	}


	public function select($options=array()){
		$options = $this->_parseOptions($options);	
		$result  = $this->db->select($options);
		if(false === $result) return false;
		return $result;
	}


	public function find($options = array()){
		$options['limit'] = 1;
		$options = $this->_parseOptions($options);
		$result  = $this->db->select($options);
		if(false === $result) return false;
		if(empty($result)) return null;
		if(is_string($result)) return $result;
		$this->data = $result[0];
		return $this->data;
	}


	public function setField(){}

	public function getField(){}

	public function create(){}

	public function check(){}

	public function query(){}

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

	public function where($where,$parse=null){
        if(!is_null($parse) && is_string($where)) {
            if(!is_array($parse)) {
                $parse = func_get_args();
                array_shift($parse);
            }
            $parse = array_map(array($this->db,'escapeString'),$parse);
            $where =   vsprintf($where,$parse);
        }elseif(is_object($where)){
            $where  =   get_object_vars($where);
        }
        if(is_string($where) && '' != $where){
            $map    =   array();
            $map['_string']   =   $where;
            $where  =   $map;
        }
        if(isset($this->options['where'])){
            $this->options['where'] =   array_merge($this->options['where'],$where);
        }else{
            $this->options['where'] =   $where;
        }
        return $this;
	}

	public function limit($offset,$length=null){
        if(is_null($length) && strpos($offset,',')){
            list($offset,$length) = explode(',',$offset);
        }
        $this->options['limit'] = intval($offset).( $length? ','.intval($length) : '' );
        return $this;
	}

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
		if(is_array($options)){
			@$options = array_merge($this->options,$options);
		}

        if(!isset($options['table'])){
            $options['table'] = $this->getTableName();
        }

		$this->options = array();
		return $options;
	}

    /**
     * 对保存到数据库的数据进行处理
     * @access protected
     * @param mixed $data 要操作的数据
     * @return boolean
     */
     protected function _facade($data) {
        // 检查数据字段合法性
        if(!empty($this->fields)) {
            if(!empty($this->options['field'])) {
                $fields =   $this->options['field'];
                unset($this->options['field']);
                if(is_string($fields)) {
                    $fields =   explode(',',$fields);
                }    
            }else{
                $fields =   $this->fields;
            }        
            foreach ($data as $key=>$val){
                if(!in_array($key,$fields,true)){
                    if(!empty($this->options['strict'])){
                        E(L('_DATA_TYPE_INVALID_').':['.$key.'=>'.$val.']');
                    }
                    unset($data[$key]);
                }elseif(is_scalar($val)) {
                    // 字段类型检查 和 强制转换
                    $this->_parseType($data,$key);
                }
            }
        }
       
        // 安全过滤
        if(!empty($this->options['filter'])) {
            $data = array_map($this->options['filter'],$data);
            unset($this->options['filter']);
        }
        return $data;
     }

    /**
     * 数据类型检测
     * @access protected
     * @param mixed $data 数据
     * @param string $key 字段名
     * @return void
     */
    protected function _parseType(&$data,$key) {
        if(!isset($this->options['bind'][':'.$key]) && isset($this->fields['_type'][$key])){
            $fieldType = strtolower($this->fields['_type'][$key]);
            if(false !== strpos($fieldType,'enum')){
                // 支持ENUM类型优先检测
            }elseif(false === strpos($fieldType,'bigint') && false !== strpos($fieldType,'int')) {
                $data[$key]   =  intval($data[$key]);
            }elseif(false !== strpos($fieldType,'float') || false !== strpos($fieldType,'double')){
                $data[$key]   =  floatval($data[$key]);
            }elseif(false !== strpos($fieldType,'bool')){
                $data[$key]   =  (bool)$data[$key];
            }
        }
    }


}



?>
