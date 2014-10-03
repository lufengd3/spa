<?php
/**
 * SPA base class file
 * @author lufeng <lufengd3@gmail.com>
 */

class SpaBase {

    public $config;
    public $controller;
    public $action;
    public $reqParams;

    public function __construct($config) {
        $this -> config = $config;
        $this -> setDefaultCA();    // set default controller and action
        $reqUrl = $this -> parseUrl();
        $this -> run($reqUrl);
    }

    public function run($reqUrl) {
        if (count($reqUrl) > 0) {
            if (file_exists(APP_PATH . '/protected/controllers/' . $reqUrl[0] . '.php')) {
                $this -> controller = $reqUrl[0];
                array_shift($reqUrl);
            } else {
                echo "Controller doesn't exists.";
                exit();
            }
        }

        require_once APP_PATH . '/protected/controllers/' . $this -> controller . '.php';

        define('CONTROLLER', $this -> controller); 
        $controllerName = $this -> controller . 'Controller';
        $this -> controller = new $controllerName;

        if (count($reqUrl) > 0) {
            $action = 'action' . ucfirst($reqUrl[0]);
            if (method_exists($this -> controller, $action)) {
                $this -> action = $action;
                array_shift($reqUrl);
            } else {
                echo "Action doesn't exists.";
                exit();
            }
        }

        Model::connectDb($this -> config['db']);
        $this -> reqParams = ($reqUrl ? array_values($reqUrl) : []);
        call_user_func([$this -> controller, $this -> action], $this -> reqParams);
    }

    /**
     * 
     */
    protected function setDefaultCA() {
        $this -> controller = (isset($this -> config['controller']) ? $this -> config['controller'] : 'site');
        $this -> action = (isset($this -> config['action']) ? $this -> config['action'] : 'actionIndex');
    }

    /**
     * parse request url
     * @return array, request url query params array
     * example: http://localhost/test/index/hello
     * return array is ['test', 'index', 'hello']
     */
    protected function parseUrl() {
        if (isset($_GET['url'])) {
            // filter special chars in url.
            $reqStr = strtolower(rtrim($_GET['url'], '/'));

            return explode('/', filter_var($reqStr, FILTER_SANITIZE_URL));
        }
    }

}
