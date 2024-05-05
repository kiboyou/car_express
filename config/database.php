<?php
//for connect mysql 
$dsn = 'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME . ';charset=utf8';
try {
    // Connexion à la base de données
    $database = new PDO($dsn, DB_USER, DB_PASSWORD);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    #echo "Database connect successfuly";
} catch (PDOException $e) {
    echo "Cannot to database " . $e->getMessage();   
}