<?php
class Bootstrap extends Yaf_Bootstrap_Abstract{

	public function _initConfig() {
		$config = Yaf_Application::app()->getConfig();
		Yaf_Registry::set("config", $config);
		Yaf_Dispatcher::getInstance()->autoRender(false);
	}

	public function _initPlugin(Yaf_Dispatcher $dispatcher) {
		$view = new ViewPlugin();
		$autoload = new AutoloadPlugin();
		$dispatcher->registerPlugin($view);
		$dispatcher->registerPlugin($autoload);
	}

	public function _initSmarty(Yaf_Dispatcher $dispatcher) {  
		//$smarty = new Smarty_Adapter(
			//null, 
			//Yaf_Application::app()->getConfig()->smarty
		//);  
		//Yaf_Dispatcher::getInstance()->setView($smarty);  
	}  

	//加载公共类库
	public function _initCommon(){
		include('library/common.php');
	}

}
