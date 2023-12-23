<?php

class User extends DB {

    protected function getSingleUser($id) {
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE user_id = ?");
        if(!$stmt->execute([$id])){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $user = $stmt->fetchAll((PDO::FETCH_ASSOC));
        return $user;
    }

    
}

?>