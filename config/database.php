<?php
try {
    // Connexion à la base de données
    $database = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    #echo "Database connect successfuly";
} catch (PDOException $e) {
    echo "Cannot to database " . $e->getMessage();   
}