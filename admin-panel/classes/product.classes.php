<?php

class Product {

    public $product_id;
    public $product_title;
    public $product_description;
    public $product_image;
    public $product_price;
    public $product_quantity;
    public $exp_date;
    public $category_id;
    public $status;

    public function __construct($product_id, $product_title, $product_description, $product_image, $product_price, $product_quantity, $exp_date, $category_id, $status,) {
        $this->product_id = $product_id;
        $this->product_title = $product_title;
        $this->product_description = $product_description;
        $this->product_image = $product_image;
        $this->product_price = $product_price;
        $this->product_quantity = $product_quantity;
        $this->exp_date = $exp_date;
        $this->category_id = $category_id;
        $this->status = $status;
    }



}


?>