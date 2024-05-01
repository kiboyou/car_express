<?php

require MODELS . 'Customers.php';
require MODELS . 'Admin.php';
require MODELS . 'Gestionnaire.php';

class AuthController
{
    private $modeladmin;
    private $modelcustomer;
    private $modelmanager;
    //constructeur
    public function __construct()
    {
        global $database;
        $this->modeladmin = new Admin($database);
        $this->modelcustomer = new Customer($database);
        $this->modelmanager = new Gestionnaire($database);
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
                        // echo "Cet customer existe et son mot de passe est correct";
                        session_start();
                        // Après que l'utilisateur se soit connecté avec succès
                        $_SESSION['customer'] = array(
                            'lastname' => $customer['lastnamecustomer'],
                            'firstname' => $customer['firstnamecustomer'],
                            'email' => $customer['mailcustomer']
                        );
                        // echo $_SESSION['firstnamecustomer'] . ' ' . $_SESSION['lastnamecustomer'] . ' ' . $_SESSION['mailcustomer'];
                        header('Location: ' . url('index'));
                    } else {
                        $pass_error = "Mot de passe incorrect";
                        header('Location: ' . url('login', ['error' => $pass_error]));
                        exit();
                        // echo "Cet customer existe mais son mot de pase est incorrect";
                    }
                } else {
                    $user_error = "Cet utilisateur n'existe pas";
                    header('Location: ' . url('login', ['error' => $user_error]));
                    exit();
                    // echo "Cet customer n'existe pas";
                }
            } else {
                if ($maildata == "admin") {
                    $admin = $this->modeladmin->loginadmin($maildata);
                    if ($admin) {
                        if (password_verify($passdata, $admin['passwordadmin'])) {
                            session_start();
                            $_SESSION['admin'] = $admin['usernameadmin'];
                            header('Location: ' . url('admin'));
                            // echo "Admin connected with success";
                        } else {
                            $pass_error = "Mot de passe incorrect";
                            header('Location: ' . url('login', ['error' => $pass_error]));
                            exit();
                            // echo "Cet admin existe mais son mot de pase est incorrect";
                        }
                    } else {
                        $user_error = "Cet utilisateur n'existe pas";
                        header('Location: ' . url('login', ['error' => $user_error]));
                        exit();
                        // echo "Cet admin n'existe pas";
                    }
                } else {
                    $manager = $this->modelmanager->loginmanager($maildata);
                    if ($manager) {
                        if (password_verify($passdata, $manager['passwordgestionnaire'])) {
                            // header('Location: ' . url('admin'));
                            echo "Gestionnaire connected with success";
                        } else {
                            $pass_error = "Mot de passe incorrect";
                            header('Location: ' . url('login', ['error' => $pass_error]));
                            exit();
                            // echo "Cet gestionnaire existe mais son mot de pase est incorrect";
                        }
                    } else {
                        $user_error = "Cet utilisateur n'existe pas";
                        header('Location: ' . url('login', ['error' => $user_error]));
                        exit();
                        // echo "Cet gestionnaire n'existe pas";
                    }
                }
            }
        }
    }
}
