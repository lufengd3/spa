<?php

// change the following paths if necessary
$yii = dirname(__FILE__).'/../chenrenyi/yii/framework/yii.php';
$config = dirname(__FILE__).'/protected/config/test.php';

// remove the following line when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);

require_once($yii);
Yii::createWebApplication($config)->run();