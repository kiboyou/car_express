<?php
class Marque
{
    private $database;
    // private $table = 'Marques';

    public function __construct($db)
    {
        $this->database = $db;
    }

    //create marque
    public function createMarque($marqueName)
    {
        
        $sql = "INSERT INTO Marques(namemarque) VALUES(:marque)";
        $statment = $this->database->prepare($sql);

        $statment->bindParam(':marque', $marqueName, PDO::PARAM_STR);

        return $statment->execute();
    }
}
