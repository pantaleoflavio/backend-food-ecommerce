<?php
    class Login extends DB {

        protected function getUser($email, $password){
            $stmt = $this->connect()->prepare("SELECT user_password FROM users WHERE user_email = ? OR username =?");

            if(!$stmt->execute(array($email, $password))){
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            $passHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $checkPass = password_verify($password, $passHashed[0]["user_password"]);

            if($checkPass == false) {
                $stmt = null;
                header("location: ../auth/login.php?error=Username or email are wrong");
                exit();

            } elseif ($checkPass == true) {
                $stmt = $this->connect()->prepare("SELECT * FROM users WHERE user_email = ? OR username =?");

                if(!$stmt->execute(array($email, $password))){
                    $stmt = null;
                    header("location: ../index.php?error=stmtfailed");
                    exit();
                }

                if($stmt->rowCount() == 0) {
                    $stmt = null;
                    header("location: ../index.php?error=stmtfailed");
                    exit();
                }

                $user = $stmt->fetchAll((PDO::FETCH_ASSOC));

                $_SESSION['user_id'] = $user[0]['user_id'];
                $_SESSION['user_fullname'] = $user[0]['user_fullname'];
                $_SESSION['user_email'] = $user[0]['user_email'];
                $_SESSION['username'] = $user[0]['username'];
                $_SESSION['role'] = $user[0]['role'];

            }

            $stmt = null;
        }

    }
 
?>