<?php

$spaBaseUrl = 'http://' . $_SERVER['SERVER_NAME'];
$spaBaseUrl .= substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/'));

define('APP_PATH', dirname(__FILE__));
define("BASE_URL", $spaBaseUrl);

// change the following paths if necessary
require APP_PATH . '/framework/SPA.php';
require APP_PATH . '/protected/config.php';

$spaApp = new SPA($config);

