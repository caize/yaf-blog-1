<?php
class ViewPlugin extends Yaf_Plugin_Abstract {


	public function routerShutdown(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) {
		$module = $request->module;
		if($module != 'Index'){
			$dispatcher = Yaf_Dispatcher::getInstance();
			$Smarty = new Smarty_Adapter;
			$Smarty->_smarty->compile_dir = 'cache'; 
			$Smarty->setScriptPath(APP_PATH.'/app/modules/'.$module.'/views');
			$dispatcher->setView($Smarty);
		}
	}


}
