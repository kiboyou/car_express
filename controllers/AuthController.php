<?php

require MODELS . 'Customers.php';
require MODELS . 'Admin.php';

class AuthController
{
    private $modeladmin;
    private $modelcustomer;
    //constructeur
    public function __construct()
    {
        global $database;
        $this->modeladmin = new Admin($database);
        $this->modelcustomer = new Customer($database);
    }

    // login of customer
    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $maildata = $_POST['mailcustomer'];
            $passdata = $_POST['passcustomer'];

            //recherche de l'utilisateur par verification si c'est mail ou pas
            if (filter_var($maildata, FILTER_VALIDATE_EMAIL)) {
                $customer = $this->modelcustomer->logincustomer($maildata);
                if ($customer) {
                    if (password_verify($passdata, $customer['passwordcustomer'])) {
                        echo "Cet customer existe et son mot de passe est correct";
                    } else {
                        echo "Cet customer existe mais son mot de pase est incorrect";
                    }
                } else {
                    echo "Cet customer n'existe pas";
                }
            } else {
                $admin = $this->modeladmin->loginadmin($maildata);
                if ($admin) {
                    if (password_verify($passdata, $admin['passwordadmin'])) {
                        header('Location: ' . url('admin'));
                    } else {
                        header('Location: ' . url('login'));
                        echo "Cet admin existe mais son mot de pase est incorrect";
                    }
                } else {
                    echo "Cet admin n'existe pas";
                }
            }
        }
    }
}
