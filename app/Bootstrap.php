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

	public function _initRouter(Yaf_Dispatcher $dispatcher){
		$router = Yaf_Dispatcher::getInstance()->getRouter();
		$router->addConfig(Yaf_Registry::get("config")->routes);
	}

	//加载公共类库
	public function _initCommon(){
		include('library/common.php');
	}











}
