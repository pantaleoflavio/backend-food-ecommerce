<?php

include "bill.classes.php";

class BillController extends DB {

    public function showAllBills(){
        $stmt = $this->connect()->prepare("SELECT * FROM bills ORDER BY created_at DESC");

        if(!$stmt->execute()){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $bills = $stmt->fetchAll((PDO::FETCH_OBJ));
        return $bills;
    }

    public function showAllBillsProUser($userId){
        $stmt = $this->connect()->prepare("SELECT * FROM bills WHERE user_id = ? ORDER BY created_at DESC");

        if(!$stmt->execute([$userId])){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $bills = $stmt->fetchAll((PDO::FETCH_OBJ));
        return $bills;
    }

    public function createBill($invoice, $fullname, $company, $city, $country, $adresse, $zip, $email, $phone, $order_notes, $user_id, $total, $product_list){

        $stmt = $this->connect()->prepare("INSERT INTO bills(invoice, fullname, company, city, country, adresse, zip, email, phone, order_notes, user_id, total, product_list) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        try {
            $stmt->bindParam(1, $invoice);
            $stmt->bindParam(2, $fullname);
            $stmt->bindParam(3, $company);
            $stmt->bindParam(4, $city);
            $stmt->bindParam(5, $country);
            $stmt->bindParam(6, $adresse);
            $stmt->bindParam(7, $zip);
            $stmt->bindParam(8, $email);
            $stmt->bindParam(9, $phone);
            $stmt->bindParam(10, $order_notes);
            $stmt->bindParam(11, $user_id);
            $stmt->bindParam(12, $total);
            $stmt->bindParam(13, $product_list);
    
            $stmt->execute();
    
            return true; // Successo
        } catch (PDOException $e) {
            error_log("PDOException in createBill: " . $e->getMessage());
            return false;
        }
        
    }

    public function generateInvoiceRandom() {
        // Characters from which to create the random string
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // Mix the Characters
        $mixedCharacters = str_shuffle($characters);
        // Estrai una sottostringa random della lunghezza desiderata
        $stringRandom = substr($mixedCharacters, 0, 10);
        return $stringRandom;
    }

    public function setDeliveryStatus($id, $delivery) {
        $stmt = $this->connect()->prepare("UPDATE bills SET delivery = ? WHERE bill_id = ?");
        if ($delivery == 0) {
            $stmt->execute([$delivery = 1, $id]);
            $stmt = null;
        } elseif ($delivery == 1){
            $stmt->execute([$delivery = 0, $id]);
            $stmt = null;
        }
    }

    
}

?>