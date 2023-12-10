<?php
class Products extends DB {

    protected function getProducts($cat_id){
        $stmt = $this->connect()->prepare("SELECT * FROM products WHERE category_id = ?");

        if(!$stmt->execute([$cat_id])){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $products = $stmt->fetchAll((PDO::FETCH_OBJ));
        return $products;
        
    }

    protected function singleProduct($id){
        $stmt = $this->connect()->prepare("SELECT * FROM products WHERE product_id = ?");

        if(!$stmt->execute([$id])){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $singleProduct = $stmt->fetchAll((PDO::FETCH_ASSOC));
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

}


?>