<?php
    // Prevent user to go to config.php
    if (!isset($_SERVER['HTTP_REFERER'])) {
        // redirection to desired location
        header('location: http://localhost/Freshcery/index.php');
        exit;
    }

   try { 
        // host
        define("HOST", "localhost");

        // dbname
        define("DBNAME", "freshcery");

        // user
        define("USER", "root");

        // pass
        define("PASS", "");

        $conn = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";",USER, PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    } catch (PDOException $e) {
        echo $e->getMessage();
    }
?>