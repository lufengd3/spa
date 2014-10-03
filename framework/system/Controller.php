<?php

class Controller {
    public function model($model) {
        require_once APP_PATH . '/protected/models/' . $model . '.php';

        return new User;
    }

    public function view($view, $data = '') {
        require_once APP_PATH . '/protected/views/home/' . $view . '.php';
    }
}
