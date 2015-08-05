<?php
class Bootstrap extends Yaf_Bootstrap_Abstract{

	public function _initConfig() {
		$config = Yaf_Application::app()->getConfig();
		Yaf_Registry::set("config", $config);
	}

	//加载公共类库
	public function _initCommon(){
		include('library/common.php');
	}

}
