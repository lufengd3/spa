<?php 

class User extends Model {
    public $name = "keith";
    protected $table = 'user';
    protected $timestamps = [];
    protected $fillable = ['username'];

    public function getName() {
        return $this -> name;
    }
}
