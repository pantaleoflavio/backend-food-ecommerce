<?php

    function username_exists($username)
    {
        global $conn;
        $insert = $conn->prepare("SELECT * FROM users WHERE username = '$username'");
        $insert->execute();

        if ($insert->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
        
    }

    function email_exists($email)
    {
        global $conn;
        $insert = $conn->prepare("SELECT * FROM users WHERE user_email = '$email'");
        $insert->execute();

        if ($insert->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
        

    }

?>