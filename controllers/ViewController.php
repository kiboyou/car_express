<?php
require MODELS . 'Admin.php';
class ViewController
{
    private $modelview;

    public function __construct()
    {
        global $database;
        $this->modelview = new Admin($database);
    }

    //display index home only of customer
    public function index()
    {
        require_once VIEWS . '/acceuil.php';
    }

    //display admin page
    public function admin()
    {
        echo "Bienvenue mr l'administrateur";
    }

    //display login from customer page
    public function logincustomer()
    {
        require_once VIEWS . '/accountManagement/login.php';
    }

    //display all car without data
    public function listcar()
    {
        $cars = $this->modelview->listcar();
        require_once VIEWS . '/body/car.php';
    }

    //display one car 
    public function detailscar()
    {
        if (!empty($_GET['matricule'])) {
            $matricule = $_GET['matricule'];
            $detailcar = $this->modelview->listOnecar($matricule);
            require_once VIEWS . '/body/view-element.php';
        }
    }
}
