<?php

    function username_exists($username)
    {
        global $conn;
        $insert = $conn->query("SELECT * FROM users WHERE username = '$username'");
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
        $insert = $conn->query("SELECT * FROM users WHERE user_email = '$email'");
        $insert->execute();

        if ($insert->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
        

    }

    function generateStringRandom() {
        // Characters from which to create the random string
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // Mix the Characters
        $mixedCharacters = str_shuffle($characters);
        // Estrai una sottostringa random della lunghezza desiderata
        $stringRandom = substr($mixedCharacters, 0, 10);
        return $stringRandom;
    }
    

?>