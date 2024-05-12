<?php
require MODELS . 'Admin.php';
require MODELS . 'Vehicule.php';
class ViewController
{
    private $modelview;
    private $modelcar;

    public function __construct()
    {
        global $database;
        $this->modelview = new Admin($database);
        $this->modelcar = new Vehicule($database);
    }

    //display index home only of customer
    public function index()
    {
        require_once VIEWS . '/acceuil.php';
    }

    //display login from customer page
    public function login()
    {
        require_once VIEWS . '/accountManagement/login.php';
    }

    //deconnect
    public function logout()
    {
        require_once VIEWS . 'logout.php';
    }

    //page error
    public function error()
    {
        require_once VIEWS . '404.php';
    }
    public function errorpage()
    {
        require_once VIEWS . 'error.php';
    }

    //display all car without data
    public function listcar()
    {
        $cars = $this->modelcar->listcar();
        require_once VIEWS . '/body/car.php';
    }
    public function resetpassword()
    {
        require_once VIEWS . 'accountManagement/resetpassword.php';
    }

    //display one car 
    public function detailscar()
    {
        if (!empty($_GET['matricule'])) {
            $matricule = $_GET['matricule'];
            $detailcar = $this->modelcar->listOnecar($matricule);
            require_once VIEWS . '/body/view-element.php';
        }
    }
}
