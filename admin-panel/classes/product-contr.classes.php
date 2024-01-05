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

    protected function updateSingleProduct($id, $title, $description, $image, $price, $qty, $exp_date, $cat, $status){
        $stmt = $this->connect()->prepare("UPDATE products SET product_title = ?, product_description = ?, product_image = ?, product_price= ?, product_quantity = ?, exp_date =?,  category_id = ?, status = ? WHERE product_id = ?");

        if(!$stmt->execute([$title, $description, $image, $price, $qty, $exp_date, $cat, $status, $id])){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
        
    }


    public function updateProduct() {
        
        return $this->updateSingleProduct($this->product_id, $this->product_title, $this->product_description, $this->product_image, $this->product_price,
        $this->product_quantity, $this->exp_date, $this->category_id, $this->status);

    }



    

    
}


?>