<?php

include "cart.classes.php";

class CartContr extends DB {

    public function getCartProUser($user_id){
        $stmt = $this->connect()->prepare("SELECT * FROM cart WHERE user_id = ?");


        if(!$stmt->execute([$user_id])){
            $cart = null;
        } else {
            
            $cart = $stmt->fetchAll((PDO::FETCH_OBJ));
            
        }

        return $cart;

        
    }

    public function validateCart($product_id, $user_id){
        $stmt = $this->connect()->prepare("SELECT * FROM cart WHERE pro_id = ? AND user_id = ?");
        
        if(!$stmt->execute([$product_id, $user_id])){
            $validate = null;
        }

        $row_count = $stmt->rowCount();
        
        if($row_count > 0) {
            
           $validate = true;
        } else {
            $validate = false;
        }

        return $validate;
    }

    public function createCart($pro_id, $pro_title, $pro_image, $pro_price, $pro_qty, $user_id){
        $stmt = $this->connect()->prepare("INSERT INTO cart (pro_id, pro_title, pro_image, pro_price, pro_qty, user_id) VALUES (?, ?, ?, ?, ?, ?)");

        try {
            $stmt->bindParam(1, $pro_id);
            $stmt->bindParam(2, $pro_title);
            $stmt->bindParam(3, $pro_image);
            $stmt->bindParam(4, $pro_price);
            $stmt->bindParam(5, $pro_qty);
            $stmt->bindParam(6, $user_id);
    
            $stmt->execute();
    
            return true; // Successo
        } catch (PDOException $e) {
            error_log("PDOException in createCart: " . $e->getMessage());
            return false;
        }
        
    }

    public function updateQtyProductCart ($pro_qty, $cart_id){
        $stmt = $this->connect()->prepare("UPDATE cart SET pro_qty = ? WHERE cart_id = ?");
        try {
            $stmt->bindParam(1, $pro_qty);
            $stmt->bindParam(2, $cart_id);
            $stmt->execute();
    
            return true; // Successo

        } catch (PDOException $e) {
            error_log("PDOException in updateQtyProductCart: " . $e->getMessage());
            return false;
        }
    }

    public function deleteProductFromCart ($cart_id){
        $stmt = $this->connect()->prepare("DELETE FROM cart WHERE cart_id = ?");
        try {
            $stmt->bindParam(1, $cart_id);
            $stmt->execute();
            return true; // Successo

        } catch (PDOException $e) {
            error_log("PDOException in deleteProductCart: " . $e->getMessage());
            return false;
        }
    }

    public function deleteCart ($user_id){
        $stmt = $this->connect()->prepare("DELETE FROM cart WHERE user_id=?");
        try {
            $stmt->bindParam(1, $user_id);
            $stmt->execute();
            unset($_SESSION['total_bill']);
            return true; // Successo

        } catch (PDOException $e) {
            error_log("PDOException in deleteCart: " . $e->getMessage());
            return false;
        }
    }
    
}


?>