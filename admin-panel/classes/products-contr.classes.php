<?php
class ProductsContr extends Products {

    private $product_id;
    private $product_title;
    private $product_description;
    private $product_image;
    private $product_price;
    private $product_quantity;
    private $exp_date;
    private $category_id;
    private $status;

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

    public function listProducts() {
        
        return $this->getProducts($this->category_id);
    }

    public function getSingleProduct() {
        
        return $this->singleProduct($this->product_id);
    }

    public function updateProduct() {
        
        return $this->updateSingleProduct($this->product_id, $this->product_title, $this->product_description, $this->product_image, $this->product_price,
        $this->product_quantity, $this->exp_date, $this->category_id, $this->status);

    }



    

    
}


?>