<?php
require MODELS . 'Customers.php';
class CustomerController
{
    private $modelcustomer;
    public function __construct()
    {
        global $database;
        $this->modelcustomer = new Customer($database);
    }

    public function registercustomer()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $lastnamedata = $_POST['lastnameclient'];
            $firstnamedata = $_POST['firstnameclient'];
            $emaildata = $_POST['emailclient'];
            $phonedata = $_POST['phoneclient'];
            $passworddata = $_POST['passwordclient'];
            $passwordcrypt = password_hash($passworddata, PASSWORD_DEFAULT);

            //send into database
            if ($this->modelcustomer->checkExistMail($emaildata)) {
                $mail_error = "Cet E-mail existe";
                header('Location: ' . url('login', ['error' => $mail_error]));
                exit();
            }
            if ($this->modelcustomer->addcustomer($lastnamedata, $firstnamedata, $emaildata, $phonedata, $passwordcrypt)) {
                header('Location: ' . url('login'));
                exit();
            } else {
                // Gérer les erreurs lors de l'ajout du client à la base de données
                echo "Une erreur s'est produite lors de l'ajout du client à la base de données.";
            }

            // echo $lastnamedata . ' ' . $firstnamedata . ' ' . $emaildata . ' ' . $phonedata . ' ' . $passwordcrypt;
        }
    }
}
