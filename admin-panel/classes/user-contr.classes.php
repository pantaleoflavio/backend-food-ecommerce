<?php

include "user.classes.php";
include "../../classes/db.classes.php";
class UserContr extends DB {
    
    public function getSingleUser($id) {
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE user_id = ?");
        if(!$stmt->execute([$id])){
            $user = null;

        } else {
            $userDB = $stmt->fetchAll((PDO::FETCH_ASSOC));
            $user = new User($userDB[0]['user_id'], $userDB[0]['user_fullname'], $userDB[0]['user_email'], $userDB[0]['username'], $userDB[0]['user_image'], $role = null);
        }

        return $user;
    }

    public function getAdmins() {
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE role = 'admin'");
        if(!$stmt->execute()){
            $admins = null;

        } else {

            $admins = $stmt->fetchAll((PDO::FETCH_OBJ));
        
        }

        return $admins;
    }

    public function getUsers() {
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE role = 'customer'");
        if(!$stmt->execute()){
            $users = null;

        } else {
            $users = $stmt->fetchAll((PDO::FETCH_OBJ));
        }

        return $users;
    }

    public function setRoleAdmin($user_id){
        $stmt = $this->connect()->prepare("UPDATE users SET role = 'admin' WHERE user_id = ?");

        if(!$stmt->execute([$user_id])){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
        
    }


    public function setRoleUser($user_id){
        $stmt = $this->connect()->prepare("UPDATE users SET role = 'customer' WHERE user_id = ?");

        if(!$stmt->execute([$user_id])){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
        
    }


    
}

?>