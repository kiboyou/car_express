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
}
