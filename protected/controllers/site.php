<?php
class SiteController extends Controller {
    public function actionIndex($params) {
        print_r($params);
        /* $userModel = $this -> model('User'); */
        /* $userName = $userModel -> getName(); */
        /* $this -> view('index', array( */
        /*     'name' => $userName */
        /* )); */
    }

    public function actionCreate($username = '') {
        User::create([
            'username' => 'keith',
        ]);
    }

    public function actionHello() {
        echo "hello";
    }

}
