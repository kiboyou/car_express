<?php
//import models
require_once MODELS . 'Marques.php';

class VehiculeController
{
    private $modelMarque;

    public function __construct()
    {
        global $database;
        $this->modelMarque = new Marque($database);
    }

    //add new marque
    public function addMarque()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_POST['varMarque']) {
                echo json_encode("marque ne doit pas etre vide");
            } else {
                if ($this->modelMarque->createMarque($_POST['varMarque'])) {
                }
            }
        }
    }
}
