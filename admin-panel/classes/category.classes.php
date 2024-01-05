<?php
class Category {

    public $category_id;
    public $category_name;
    public $category_image;
    public $category_description;
    public $category_icon;

    public function __construct($category_id, $category_name, $category_image, $category_description, $category_icon)
    {
        $this->category_id = $category_id;
        $this->category_name = $category_name;
        $this->category_image = $category_image;
        $this->category_description = $category_description;
        $this->category_icon = $category_icon;
    }

    


}


?>