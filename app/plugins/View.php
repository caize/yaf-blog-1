<?php
class ViewPlugin extends Yaf_Plugin_Abstract {


	public function routerShutdown(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) {
		$module = $request->module;
		$dispatcher = Yaf_Dispatcher::getInstance();
		$Smarty = new Smarty_Adapter;
		$Smarty->_smarty->compile_dir = 'cache/'.$module; 
		if($module != 'Index'){
			$Smarty->setScriptPath(APP_PATH.'/app/modules/'.$module.'/views');
		}else{
			$Smarty->setScriptPath(APP_PATH.'/app/views');
		}
		$dispatcher->setView($Smarty);
	}


}
