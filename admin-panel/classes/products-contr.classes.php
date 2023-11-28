<?php
class ProductsContr extends Products {
    private $category;

    public function __construct($category) {
        $this->category = $category;
    }

    public function listProducts() {
        
        $this->getProducts($this->category);
    }



    

    
}


?>