<?php
class Home extends Controller {
    public function actionIndex($a = '', $b = '') {
        $userModel = $this -> model('User');
        $userName = $userModel -> getName();
        $this -> view('index', array(
            'name' => $userName
        ));
    }
    public function actionCreate($username = '') {
        User::create([
            'username' => 'keith',
        ]);
    }
}
