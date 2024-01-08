<?php

class Cart {

    public $cart_id;
    public $product_id;
    public $product_title;
    public $product_image;
    public $product_price;
    public $product_qty;
    public $user_id;

    public function __construct($cart_id, $product_id, $product_title, $product_image, $product_price, $product_qty, $user_id) {
        $this->cart_id = $cart_id;
        $this->product_id = $product_id;
        $this->product_title = $product_title;
        $this->product_image = $product_image;
        $this->product_price = $product_price;
        $this->product_qty = $product_qty;
        $this->user_id = $user_id;
    }


    
}

?>