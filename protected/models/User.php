<?php 

class User extends Model {
    public $name = "keith";

    public function getName() {
        return $this -> name;
    }
}
