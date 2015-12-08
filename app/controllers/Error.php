<?php

/**
 * 当有未捕获的异常, 则控制流会流到这里
 */
class ErrorController extends Yaf_Controller_Abstract {


	public function errorAction() {
		$exception = $this->getRequest()->getException();
		try{
			//throw $exception;
		}catch(Yaf_Exception_LoadFailed $e) {

		}catch(Yaf_Exception $e) {

		}
	}
}

