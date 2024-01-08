<?php

include "cart.classes.php";

class CartContr extends DB {

    public function getCartProUser($user_id){
        $stmt = $this->connect()->prepare("SELECT * FROM cart WHERE user_id = ?");


        if(!$stmt->execute([$user_id])){
            $cart = null;
        } else {
            
            $cart = $stmt->fetchAll((PDO::FETCH_OBJ));
            // $cart = new Cart($cartDB[0]['cart_id'], $cartDB[0]['product_id'], $cartDB[0]['product_title'], $cartDB[0]['product_image'], $cartDB[0]['product_price'], $cartDB[0]['product_qty'], $cartDB[0]['user_id']);
        }

        return $cart;

        
    }

    
}


?>