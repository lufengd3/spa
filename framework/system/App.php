<?php
class App {
    public $controller = 'home';
    public $action = 'actionIndex';
    public $reqParams;

    public function __construct() {
        $reqUrl = $this -> parseUrl();

        if (file_exists('..app/controller/' . $reqUrl[0] . '.php')) {
            $this -> controller = $reqUrl[0];
            unset($reqUrl[0]);
        }

        require_once '../app/controller/' . $this -> controller . '.php';
        $this -> controller = new $this -> controller;

        if (count($reqUrl) > 1) {
            $action = 'action' . ucfirst($reqUrl[1]);
            if (method_exists($this -> controller, $action)) {
                $this -> action = $action;
                unset($reqUrl[1]);
            }
        }

        $this -> reqParams = ($reqUrl ? array_values($reqUrl) : []);
        call_user_func_array([$this -> controller, $this -> action], $this -> reqParams);
    }

    protected function parseUrl() {
        if (isset($_GET['url'])) {
            // filter special chars in url.
            $reqStr = strtolower(rtrim($_GET['url'], '/'));
            return explode('/', filter_var($reqStr, FILTER_SANITIZE_URL));
        }
    }
}
