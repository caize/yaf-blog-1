<?php
class AutoloadPlugin extends Yaf_Plugin_Abstract {


	public function routerShutdown(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) {
		error_reporting(E_ERROR);
		$module = $request->module;
		if($module == 'Admin'){
			spl_autoload_register(array($this,'admin_autoload'));
		}
	}


	private function admin_autoload($class){
		$class = str_replace('Controller','',$class);
		include('app/modules/Admin/controllers/'.$class.'.php');	
	}







}
