<?php
class Products extends DB {

    protected function getProducts($product){
        $stmt = $this->connect()->prepare("SELECT * FROM products WHERE category_id = ?");

        if(!$stmt->execute($product)){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $products = $stmt->fetchAll((PDO::FETCH_OBJ));

        foreach ($products as $product) {
            
            $product_id = $product->product_id;
            $product_title = $product->product_title;
            $product_description = $product->product_description;
            $product_image = $product->product_image;
            $product_price = $product->product_price;
            $product_qty = $product->product_qty;
            $product_exp = $product->product_exp;
            $product_status = $product->product_status;
        }

    }



}


?>