<?php

class Model {
    
    public static $db;

    public static function connectDb($config) {
        $dbInfo = $config['type'] . ':host=' . $config['host'] . '; port=' .  $config['port'];
        $dbInfo .= '; dbname=' . $config['dbname'];
        self::$db = new PDO($dbInfo, $config['user'], $config['password']);
    }    
}
