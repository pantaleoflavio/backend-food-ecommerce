<?php
    include "user.classes.php";
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


    
}

?>