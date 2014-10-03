<?php

define('APP_PATH', dirname(__FILE__));

// change the following paths if necessary
require APP_PATH . '/framework/SPA.php';
require APP_PATH . '/protected/config.php';

$spaApp = new SPA($config);
