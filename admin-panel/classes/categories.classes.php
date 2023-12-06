<?php
class Categories extends DB {

    protected function getCategory(){
        $stmt = $this->connect()->prepare("SELECT * FROM categories");

        if(!$stmt->execute()){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $categories = $stmt->fetchAll((PDO::FETCH_OBJ));
        return $categories;
        
    }

    protected function singleCategory($id){
        $stmt = $this->connect()->prepare("SELECT * FROM categories WHERE category_id = ?");

        if(!$stmt->execute([$id])){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $singleCat = $stmt->fetchAll((PDO::FETCH_ASSOC));
        return $singleCat;
        
    }

    protected function updateSingleCategory($id, $name, $image, $description, $icon){
        $stmt = $this->connect()->prepare("UPDATE categories SET category_name = ?, category_image = ?, category_description = ?, category_icon= ? WHERE category_id = ?");

        if(!$stmt->execute([$name, $image, $description, $icon, $id])){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
        
    }

    protected function deleteSingleCategory($id){
        $stmt = $this->connect()->prepare("DELETE FROM categories WHERE category_id = ?");

        if(!$stmt->execute([$id])){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
        
    }

    protected function createSingleCategory($name, $image, $description, $icon){
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