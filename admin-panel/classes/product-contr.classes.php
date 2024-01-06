<?php

include "product.classes.php";

class ProductContr extends DB {

    public function getProducts($cat_id){
        $stmt = $this->connect()->prepare("SELECT * FROM products WHERE category_id = ?");

        if(!$stmt->execute([$cat_id])){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $products = $stmt->fetchAll((PDO::FETCH_OBJ));
        return $products;
        
    }

    public function getSingleProduct($id){
        $stmt = $this->connect()->prepare("SELECT * FROM products WHERE product_id = ?");

        if(!$stmt->execute([$id])){
            $singleProduct = null;
        } else {
            
            $singleProductDB = $stmt->fetchAll((PDO::FETCH_ASSOC));
            $singleProduct = new Product($singleProductDB[0]['product_id'], $singleProductDB[0]['product_title'], $singleProductDB[0]['product_description'], $singleProductDB[0]['product_image'], $singleProductDB[0]['product_price'], $singleProductDB[0]['product_quantity'], $singleProductDB[0]['exp_date'], $singleProductDB[0]['category_id'], $singleProductDB[0]['status']);
        }

        return $singleProduct;
        
    }

    public function updateSingleProduct($id, $title, $description, $image, $price, $qty, $exp_date, $cat, $status){
        $stmt = $this->connect()->prepare("UPDATE products SET product_title = ?, product_description = ?, product_image = ?, product_price= ?, product_quantity = ?, exp_date =?,  category_id = ?, status = ? WHERE product_id = ?");

        try {
            $stmt->bindParam(1, $title);
            $stmt->bindParam(2, $description);
            $stmt->bindParam(3, $image);
            $stmt->bindParam(4, $price);
            $stmt->bindParam(5, $qty);
            $stmt->bindParam(6, $exp_date);
            $stmt->bindParam(7, $cat);
            $stmt->bindParam(8, $status);
            $stmt->bindParam(9, $id);
    
            $stmt->execute();
    
            return true; // Successo
        } catch (PDOException $e) {
            error_log("PDOException in updateSingleProduct: " . $e->getMessage());
            return false;
        }
        
    }

    public function createSingleProduct($title, $description, $image, $price, $qty, $exp_date, $cat, $status){
        $stmt = $this->connect()->prepare("INSERT INTO products (product_title, product_description, product_image, product_price, product_quantity, exp_date,  category_id, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        try {
            $stmt->bindParam(1, $title);
            $stmt->bindParam(2, $description);
            $stmt->bindParam(3, $image);
            $stmt->bindParam(4, $price);
            $stmt->bindParam(5, $qty);
            $stmt->bindParam(6, $exp_date);
            $stmt->bindParam(7, $cat);
            $stmt->bindParam(8, $status);
    
            $stmt->execute();
    
            return true; // Successo
        } catch (PDOException $e) {
            error_log("PDOException in createSingleProduct: " . $e->getMessage());
            return false;
        }
        
    }

    public function deleteSingleProduct($id){
        $stmt = $this->connect()->prepare("DELETE FROM products WHERE product_id = ?");

        try {
            $stmt->bindParam(1, $id);
            $stmt->execute();
    
            return true; // Successo
        } catch (PDOException $e) {
            error_log("PDOException in deleteSingleProduct: " . $e->getMessage());
            return false;
        }
        
    }

    
}


?>