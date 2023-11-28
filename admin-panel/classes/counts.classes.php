<?php
class Counts extends DB {

    public function numberProducts(){
        $stmt = $this->connect()->prepare("SELECT * FROM products");

        if(!$stmt->execute()){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $products = $stmt->fetchAll((PDO::FETCH_ASSOC));

        return count($products);

    }

    public function numberOrders(){
        $stmt = $this->connect()->prepare("SELECT * FROM bills");

        if(!$stmt->execute()){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $orders = $stmt->fetchAll((PDO::FETCH_ASSOC));

        return count($orders);

    }

    public function numberCategories(){
        $stmt = $this->connect()->prepare("SELECT * FROM categories");

        if(!$stmt->execute()){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $categories = $stmt->fetchAll((PDO::FETCH_ASSOC));

        return count($categories);

    }

    public function numberUsers(){
        $stmt = $this->connect()->prepare("SELECT * FROM users");

        if(!$stmt->execute()){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $users = $stmt->fetchAll((PDO::FETCH_ASSOC));

        return count($users);

    }






}


?>