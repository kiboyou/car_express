<?php
    class Gestionnaire{
        private $database;
        public function __construct($db)
        {
            $this->database = $db;
        }


        //connect 
        public function loginmanager($usermanager){
            $sql = "SELECT * FROM gestionnaire WHERE usermanager=:usermanager";
            $stmt = $this->database->prepare($sql);
            $stmt->bindParam(':usermanager', $usermanager);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
?>