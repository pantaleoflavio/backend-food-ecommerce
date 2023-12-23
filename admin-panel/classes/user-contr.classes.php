<?php

class UserContr extends User {
    private $id;
    private $fullname;
    private $email;
    private $username;
    private $user_image;
    private $password;

    public function __construct($id, $fullname, $email, $username, $user_image, $password)
    {
        $this->id = $id;
        $this->fullname = $fullname;
        $this->email = $email;
        $this->username = $username;
        $this->user_image = $user_image;
        $this->password = $password;
    }

    public function getUser() {
        return $this->getSingleUser($this->id);
    }

    
}

?>