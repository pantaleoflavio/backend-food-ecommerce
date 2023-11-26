<?php
class DB {

    protected function connect (){
        try { 
            // host
            $localHost = "localhost";

            // dbname
            $dbname = "freshcherry";
    
            // user
            $user = "root";

            // pass
            $pass = "";
    
            $conn = new PDO("mysql:host=".$localHost.";dbname=".$dbname.";",$user, $pass);
            return $conn;
    
    
        } catch (PDOException $e) {
            echo $e->getMessage() . "<br>";
            die();
        }
    }

}
?>