<?php

class testController extends Controller {

    public function actionHello() {
        $username = "keith3";
        /* $user = $this -> model('User'); */
        $sql = "SELECT * FROM user WHERE username = :username";
        $userInfo = Model::$db -> prepare($sql);
        $userInfo -> bindParam(':username', $username);
        $userInfo -> execute();

        if ($userInfo -> rowCount() > 0) {
            echo "yes"; 
        } else {
            echo "no";
        }
    }

}
