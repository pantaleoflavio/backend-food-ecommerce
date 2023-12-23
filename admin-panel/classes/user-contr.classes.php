<?php

class UserContr extends User {
    
    private $userModel;

    public function __construct(User $userModel) {
        $this->userModel = $userModel;
    }

    public function getUser($id) {
        return $this->userModel->getSingleUser($id);
    }

    
}

?>