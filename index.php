<?php
define("APP_PATH",  realpath(dirname(__FILE__)));
$app  = new Yaf_Application(APP_PATH . "/conf/app.ini");
$app->getDispatcher()->catchException(true); 
$app->bootstrap()->run();

