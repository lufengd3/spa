<?php
/**
 * SPA bootstrap file
 * @author lufeng <lufengd3@gmail.com>
 */

define('SPA_PATH', dirname(__FILE__));  // framework base path

require SPA_PATH . '/SpaBase.php';
require SPA_PATH . '/system/Controller.php';
require SPA_PATH . '/system/Model.php';

class SPA extends SpaBase {

    /**
     * @return string, the version of SPA framework
     */
    public static function getSpaVersion() {
        return '0.0.1';
    }

}
