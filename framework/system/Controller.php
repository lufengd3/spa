<?php

class Controller {
    private $view;
    private $data;
    public $layout = 'default';

    public function model($model) {
        require_once APP_PATH . '/protected/models/' . $model . '.php';

        return new User;
    }

    public function view($view, $data = '') {
        $this -> view = $view;
        $this -> data = $data;

        require_once APP_PATH . '/protected/views/layouts/' . $this -> layout . '.php';
    }

    public function loadView() {
        if ($this -> data != '') {
            foreach ($this -> data as $key => $val) {
                $$key = $val; 
            }
        }

        require_once APP_PATH . '/protected/views/home/' . $this -> view . '.php';
    }
}
