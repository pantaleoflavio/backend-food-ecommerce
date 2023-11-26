<?php
    class Signup extends DB {

        protected function setUser($fullname, $email, $username, $image, $password){
            $stmt = $this->connect()->prepare("INSERT INTO users(user_fullname, user_email, username, user_image, user_password)
            VALUES (?, ?, ?, ?, ?)");

            $hashedPass = password_hash($password, PASSWORD_DEFAULT);

            if(!$stmt->execute(array($fullname, $email, $username, $image, $hashedPass))){
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            $stmt = null;
        }

        protected function checkUser($username, $email){
            $stmt = $this->connect()->prepare("SELECT * FROM users WHERE username = ? OR user_email = ?;");
        
            if(!$stmt->execute(array($username, $email))){
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            $resultCheck;
            if($stmt->rowCount() > 0) {
                $resultCheck = false;
            } else {
                $resultCheck = true;
            }

            return $resultCheck;
        }
    }
 
?>