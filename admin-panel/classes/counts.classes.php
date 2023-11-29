<?php

class Counts extends DB {

    public function numberProducts(){
        $stmt = $this->connect()->prepare("SELECT COUNT(*) as count FROM products");
        return $this->executeAndCount($stmt);
    }

    public function numberOrders(){
        $stmt = $this->connect()->prepare("SELECT COUNT(*) as count FROM bills");
        return $this->executeAndCount($stmt);
    }

    public function numberCategories(){
        $stmt = $this->connect()->prepare("SELECT COUNT(*) as count FROM categories");
        return $this->executeAndCount($stmt);
    }

    public function numberUsers(){
        $stmt = $this->connect()->prepare("SELECT COUNT(*) as count FROM users");
        return $this->executeAndCount($stmt);
    }

    private function executeAndCount($stmt) {
        try {
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['count'];
        } catch (PDOException $e) {
            // Registra l'errore o gestiscilo in base alle tue esigenze
            error_log("Errore nell'esecuzione della query: " . $e->getMessage());
            return false;
        }
    }
}
?>
