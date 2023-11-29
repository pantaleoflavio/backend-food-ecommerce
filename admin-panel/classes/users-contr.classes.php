<?php
class UsersContr extends Users {
    private $id;

    public function getUsers(){

        return $this->getUsersByRole('customer');

    }

    public function getAdmins(){
        
        return $this->getUsersByRole('admin');

    }

    public function setAdmin($user_id){
        $this->id = $user_id;
        return $this->setRoleAdmin($this->id);
    }

    public function setUser($user_id){
        $this->id = $user_id;
        return $this->setRoleUser($this->id);
    }
    



}


?>