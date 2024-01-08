<?php

class Bill {

    public $bill_id;
    public $invoice;
    public $customer;
    public $company;
    public $adresse;
    public $city;
    public $country;
    public $zip;
    public $email;
    public $phone;
    public $order_notes;
    public $user_id;
    public $total;
    public $productList;
    public $deliveryStatus;


    public function __construct($bill_id, $invoice, $customer, $company, $adresse, $city, $country, $zip, $email, $phone, $order_notes, $user_id, $total, $productList, $deliveryStatus) {
        $this->bill_id = $bill_id;
        $this->invoice = $invoice;
        $this->customer = $customer;
        $this->company = $company;
        $this->adresse = $adresse;
        $this->city = $city;
        $this->country = $country;
        $this->zip = $zip;
        $this->email = $email;
        $this->phone = $phone;
        $this->order_notes = $order_notes;
        $this->user_id = $user_id;
        $this->total = $total;
        $this->productList = $productList;
        $this->deliveryStatus = $deliveryStatus;
    }


    
}

?>