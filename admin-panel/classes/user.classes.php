<?php

class User {

    public $id;
    public $fullname;
    public $email;
    public $username;
    public $user_pic;
    public $role;

    public function __construct($id, $fullname, $email, $username, $user_pic, $role) {
        $this->id = $id;
        $this->fullname = $fullname;
        $this->email = $email;
        $this->username = $username;
        $this->user_pic = $user_pic;
        $this->role = $role;
    }


    
}

?>