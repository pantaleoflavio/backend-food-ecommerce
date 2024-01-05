<?php

include "category.classes.php";

class CategoryContr extends DB {

    public function getCategories(){
        $stmt = $this->connect()->prepare("SELECT * FROM categories");

        if(!$stmt->execute()){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $categories = $stmt->fetchAll((PDO::FETCH_OBJ));
        return $categories;
        
    }

    public function getSingleCategory($id){
        $stmt = $this->connect()->prepare("SELECT * FROM categories WHERE category_id = ?");

        if(!$stmt->execute([$id])){

            $singleCat = null;

        } else {
            
            $singleCatDB = $stmt->fetchAll((PDO::FETCH_ASSOC));
            $singleCat = new Category($singleCatDB[0]['category_id'], $singleCatDB[0]['category_name'], $singleCatDB[0]['category_image'], $singleCatDB[0]['category_description'], $singleCatDB[0]['category_icon']);
        }

        return $singleCat;
        
    }

    public function updateSingleCategory($id, $name, $image, $description, $icon){
        $stmt = $this->connect()->prepare("UPDATE categories SET category_name = ?, category_image = ?, category_description = ?, category_icon= ? WHERE category_id = ?");

        try {
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $image);
            $stmt->bindParam(3, $description);
            $stmt->bindParam(4, $icon);
            $stmt->bindParam(5, $id);
    
            $stmt->execute();
    
            return true; // Successo
        } catch (PDOException $e) {
            error_log("PDOException in updateSingleCategory: " . $e->getMessage());
            return false;
        }
        
    }

    public function deleteSingleCategory($id){
        $stmt = $this->connect()->prepare("DELETE FROM categories WHERE category_id = ?");

        if(!$stmt->execute([$id])){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
        
    }

    public function createSingleCategory($name, $image, $description, $icon){
        $stmt = $this->connect()->prepare("INSERT INTO categories (category_name, category_image, category_description, category_icon) VALUES (?, ?, ?, ?)");

        if(!$stmt->execute([$name, $image, $description, $icon])){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
        
    }

}


?>