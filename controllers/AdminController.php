<?php
require MODELS . 'Admin.php';
require MODELS . 'Customers.php';
require MODELS . 'MailDesign.php';
require MODELS . 'Vehicule.php';
require MODELS . 'Reservations.php';
require MODELS . 'Factures.php';

class AdminController
{
    private $modeladmin;
    private $modelcustomer;
    private $modelmaildesign;
    private $modelcar;
    private $modelreservation;
    private $modelinvoice;

    public function __construct()
    {
        global $database;
        $this->modeladmin = new Admin($database);
        $this->modelcustomer = new Customer($database);
        $this->modelmaildesign = new MailDesign($database);
        $this->modelcar = new Vehicule($database);
        $this->modelreservation = new reservation($database);
        $this->modelinvoice = new Facture($database);
    }

    //display main page of dash
    public function index()
    {
        require_once VIEWS . '/dashboard/admin/dashboard.php';
    }
    //display customer info
    public function customer()
    {
        $customers = $this->modelcustomer->Allcustomer();
        require_once VIEWS . '/dashboard/admin/list-client.php';
    }
    //display reservation info
    public function reservation()
    {
        $reservation = $this->modelreservation->allReservation();
        require_once VIEWS . 'dashboard/admin/list-reservation.php';
    }
    //display facture info
    public function facture()
    {
        $invoice = $this->modelinvoice->allCustomerInvoice();
        require_once VIEWS . 'dashboard/admin/list-facture.php';
    }
    //display reçu info
    public function received()
    {
        require_once VIEWS . 'dashboard/admin/list-recu.php';
    }
    //display inventaire info 
    public function inventaire()
    {
        require_once VIEWS . 'dashboard/admin/list-inventaire.php';
    }
    //display gestionnaire info
    public function gestionnaire()
    {
        require_once VIEWS . 'dashboard/admin/list-gestionnaire.php';
    }
    //display voiture info
    public function vehicule()
    {
        $marque = $this->modeladmin->listmarque();
        $modele = $this->modeladmin->listmodele();
        $cars = $this->modelcar->listcar();
        require VIEWS . 'dashboard/admin/list-voiture.php';
    }

    //traitment of data marque
    public function addmarque()
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['marque'])) {
                $errors['marque'] = "Marque must not be empty";
                // echo $errors['marque'];
            }

            if (empty($errors)) {
                $datamarque = $_POST['marque'];
                if ($this->modeladmin->newmarque($datamarque)) {
                    header('Location: ' . url('car'));
                } else {
                    echo "Error to save ";
                }
            }
        }
        header('Location: ' . url('car'));
    }
    //traitement of data model
    public function addmodele()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $marquedata = $_POST['marque'];
            $modeldata = $_POST['modele'];
            // echo $marquedata . ' ' . $modeldata;
            if ($this->modeladmin->newmodel($marquedata, $modeldata)) {
                header('Location: ' . url('car'));
            } else {
                echo "Error to save";
            }
        }
        header('Location: ' . url('car'));
    }
    //traitment data to save a new car
    public function addvehicule()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $matriculedata = $this->modelcar->generateMatricule();
            $modeldata = $_POST['modele'];
            $catdata = $_POST['categorie'];
            $transdata = $_POST['transmission'];
            $vehiculeprice = floatval($_POST['vehiculeprice']);
            $dispdata = $_POST['disponibilite'];
            if (isset($_FILES["vehiculepicture"]) && $_FILES["vehiculepicture"]["error"] == UPLOAD_ERR_OK) {
                $original_name = $_FILES['vehiculepicture']["name"];
                $extensionfile = pathinfo($original_name, PATHINFO_EXTENSION);
                // $formatmodelname = str_replace(' ', '_', strtolower($modeldata));
                $newfilename = $modeldata . '_' . date("YmdHis") . '.' . $extensionfile;

                //save file in le picture
                $target = STORAGE . $newfilename;
                if (move_uploaded_file($_FILES['vehiculepicture']['tmp_name'], $target)) {
                    if ($this->modelcar->newcar($matriculedata, $modeldata, $catdata, $transdata, $newfilename, $vehiculeprice, $dispdata)) {
                        header('Location: ' . url('car'));
                    } else {
                        echo "erreu to save data";
                    }
                } else {
                    echo "erreur d'enregistrement du fichier";
                }
                // echo 'matricule: ' . $matriculedata . '  / vehicule: ' . $modeldata . ' / categorie: ' . $catdata . ' / transmission: ' . $transdata . ' / price: ' . $vehiculeprice . '-- dispo: ' . $dispdata . ' / file: ' . $target;
            } else {
                echo "Aucun fichier telecharge";
            }
        }
        header('Location: ' . url('car'));
    }

    public function registeradmin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $lastnamedata = $_POST['username'];
            $passworddata = $_POST['password'];
            $passwordcrypt = password_hash($passworddata, PASSWORD_DEFAULT);

            //send into database
            if ($this->modeladmin->addadmin($lastnamedata, $passwordcrypt)) {
                echo "Success";
            } else {
                // Gérer les erreurs lors de l'ajout du client à la base de données
                echo "Une erreur s'est produite lors de l'ajout du client à la base de données.";
            }
            // echo $lastnamedata . ' ' . $firstnamedata . ' ' . $emaildata . ' ' . $phonedata . ' ' . $passwordcrypt;
        }
    }
    public function registermanager()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $firstnamemanager = $_POST['firstnamemanager']; //prenom
            $lastnamemanager = $_POST['lastnamemanager']; //nom
            $emailmanager = $_POST['mailmanager'];
            $addressemanager = $_POST['addressmanager'];
            $phonemanager = $_POST['phonemanager'];
            $usermanagerdata = $_POST['usernamemanager'];

            //default password for new manager
            $defaultpasswordmanager = $this->modeladmin->generatePassword();
            //hash password now
            $passwordHash = password_hash($defaultpasswordmanager, PASSWORD_DEFAULT);

            // echo $firstnamemanager . '<--->' . $lastnamemanager . '<--->' . $emailmanager . '<--->' . $addressemanager . '<--->' . $phonemanager . '<--->' . $usermanager . '<--->' . $passwordHash;
            if ($this->modeladmin->isUsernameUnique($usermanagerdata)) { 
                if ($this->modeladmin->addmanager($lastnamemanager, $firstnamemanager, $usermanagerdata, $phonemanager, $addressemanager, $passwordHash)) {
                    if ($this->modelmaildesign->sendManagerCredential($lastnamemanager, $emailmanager, $defaultpasswordmanager, $usermanagerdata)) {
                        header('Location: ' . url('manager'));
                    } else {
                        $mailerror = "Manager cree et email non envoye";
                        header('Location: ' . url('error', ['error' => $mailerror]));
                        exit();
                    }
                } else {
                    $manager_error = "Impossible de créer le nouvel manager";
                    header('Location: ' . url('error', ['error' => $manager_error]));
                    exit();
                }
            } else {
                $username_erro = "Cet username existe deja";
                header('Location: ' . url('error', ['error' => $username_erro]));
                exit();
            }
        }
    }
}
