<?php

class SiteController extends Controller {
    public $layout = 'new';

    public function actionIndex($params) {
        $this -> view('index', array(
            'name' => 'keith' 
        ));
    }

    public function actionCreate() {
        $this -> view('create');
    }

    public function actionYes() {
        if (isset($_POST)) {
            print_r($_POST);
        }
        echo "yes action";
    }

}
