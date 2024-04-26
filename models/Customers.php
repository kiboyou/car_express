<?php
class Customer
{
    private $database;
    public function __construct($db)
    {
        $this->database = $db;
    }

    //add a new customer
    public function addcustomer($lastnameval, $firstnameval, $mailval, $phoneval, $passval){
        $sql = "INSERT INTO customer(lastnamecustomer, firstnamecustomer, mailcustomer, phonecustomer, passwordcustomer) VALUES (:lastnamecustomer, :firstnamecustomer, :mailcustomer, :phonecustomer, :passwordcustomer)";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':lastnamecustomer', $lastnameval);
        $stmt->bindParam(':firstnamecustomer', $firstnameval);
        $stmt->bindParam(':mailcustomer', $mailval);
        $stmt->bindParam(':phonecustomer', $phoneval);
        $stmt->bindParam(':passwordcustomer', $passval);

        return $stmt->execute();
    }
    public function Allcustomer(){
        $sql = "SELECT * FROM customer";
        $query = $this->database->query($sql);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    //login customer
    public function logincustomer($mailcustomer){
        $sql = "SELECT * FROM customer WHERE mailcustomer=:mailcustomer";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':mailcustomer', $mailcustomer);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
