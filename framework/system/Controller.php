<?php
class Controller {
    public function model($model) {
        require_once '../app/model/' . $model . '.php';

        return new User;
    }

    public function view($view, $data = '') {
        require_once '../app/view/home/' . $view . '.php';
    }
}
