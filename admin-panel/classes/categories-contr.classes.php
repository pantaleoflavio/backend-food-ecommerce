<?php
class CategoriesContr extends Categories {
    private $category_id;
    private $category_name;
    private $category_image;
    private $category_description;
    private $category_icon;

    public function __construct($category_id, $category_name, $category_image, $category_description, $category_icon)
    {
        $this->id = $category_id;
        $this->name = $category_name;
        $this->image = $category_image;
        $this->description = $category_description;
        $this->icon = $category_icon;
    }

    public function getCategories(){

        return $this->getCategory();

    }

    public function getSingleCategory(){
        return $this->singleCategory($this->id);

    }
    
    public function updateCategory(){
        
        return $this->updateSingleCategory($this->id, $this->name, $this->image, $this->description, $this->icon);

    }

    public function deleteCategory(){
        return $this->deleteSingleCategory($this->id);

    }

    public function createCategory(){
        return $this->createSingleCategory($this->name, $this->image, $this->description, $this->icon);

    }

}


?>