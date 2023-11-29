<?php
class Users extends DB {

    protected function getUsersByRole($role){
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE role = ?");

        if(!$stmt->execute([$role])){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $users = $stmt->fetchAll((PDO::FETCH_OBJ));
        return $users;
        
    }

    protected function setRoleAdmin($user_id){
        $stmt = $this->connect()->prepare("UPDATE users SET role = 'admin' WHERE user_id = ?");

        if(!$stmt->execute([$user_id])){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
        
    }


    protected function setRoleUser($user_id){
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