<?php

include "user.classes.php";

class UserContr extends DB {
    

    // SIngle User Methods
    public function getSingleUser($id) {
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE user_id = ?");
        if(!$stmt->execute([$id])){
            $user = null;

        } else {
            $userDB = $stmt->fetchAll((PDO::FETCH_ASSOC));
            $user = new User($userDB[0]['user_id'], $userDB[0]['user_fullname'], $userDB[0]['user_email'], $userDB[0]['username'], $userDB[0]['user_image'], $userDB[0]['role']);
        }

        return $user;
    }

    public function updateSingleUser($id, $fullname, $email, $username, $user_image) {
        $stmt = $this->connect()->prepare("UPDATE users SET user_fullname=?, user_email=?, username=?, user_image=? WHERE user_id=?");
    
        try {
            $stmt->bindParam(1, $fullname);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $username);
            $stmt->bindParam(4, $user_image);
            $stmt->bindParam(5, $id);
    
            $stmt->execute();
    
            return true; // Successo
        } catch (PDOException $e) {
            error_log("PDOException in updateSingleUser: " . $e->getMessage());
            return false;
        }
    }


    // ALL USERS METHODS
    public function getAllUsers() {
        $stmt = $this->connect()->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getUsers($role) {
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE role = ?");
        $stmt->execute([$role]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
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