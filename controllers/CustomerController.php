<?php
require MODELS . 'Customers.php';
require MODELS . 'MailDesign.php';
require MODELS . 'Vehicule.php';
require MODELS . 'Reservations.php';
require MODELS . 'Factures.php';

class CustomerController
{
    private $modelcustomer;
    private $modelmaildesign;
    private $modelcar;
    private $modelreservation;
    private $modelinvoice;

    public function __construct()
    {
        global $database;
        $this->modelcustomer = new Customer($database);
        $this->modelmaildesign = new MailDesign($database);
        $this->modelcar = new Vehicule($database);
        $this->modelreservation = new Reservation($database);
        $this->modelinvoice = new Facture($database);
    }

    public function dashindex()
    {
        $idcustomer = $_GET['id'];
        $reservationData = $this->modelreservation->userReservation($idcustomer);
        $result = $this->modelinvoice->countData($idcustomer);
        require_once VIEWS . 'dashboard/client/dashboard.php';
    }

    public function dashinvoice()
    {
        $idcustomer = $_GET['id'];
        $invoices = $this->modelinvoice->customerInvoice($idcustomer);
        require_once VIEWS . 'dashboard/client/list-facture.php';
    }

    public function invoicepdf(){
        if(!empty($_GET['client'] && !empty($_GET['facture']))){
            $client = $_GET['client'];
            $facture = $_GET['facture'];
            $datainvoice = $this->modelinvoice->customerprintInvoice($client, $facture);
            require_once VIEWS . 'invoicepdf.php';
        }
        // require_once VIEWS . 'invoicepdf.php';
    }

    public function dashreservation()
    {
        $idcustomer = $_GET['id'];
        $reservationData = $this->modelreservation->userReservation($idcustomer);
        require_once VIEWS . 'dashboard/client/list-reservation.php';
    }

    public function dashreceived()
    {
        $idcustomer = $_GET['id'];
        $received = $this->modelinvoice->customerReceived($idcustomer);
        require_once VIEWS . 'dashboard/client/list-recu.php';
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
    public function makereservation()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $idclient = $_POST['idcustomer'];
            $idcar = $_POST['idcar'];
            $nomPerson = $_POST['lastname_person'];
            $prenomPerson = $_POST['firstname_person'];
            $mailPerson = $_POST['mail_person'];
            $telPerson = $_POST['tel_person'];
            $adressPerson = $_POST['address_person'];
            $methodPaye = $_POST['methodpaye'];
            $dateStart = $_POST['dateStart'];
            $dateEnd = $_POST['dateEnd'];
            $dateNow = date("Y-m-d");
            $numReservation = $this->modelreservation->newIDReservation();
            $prixLocation = $_POST['priceCar'];

            if ($this->modelreservation->addreservation($numReservation, $idclient, $idcar, $dateNow, $dateStart, $dateEnd, 'En attente', $nomPerson, $prenomPerson, $adressPerson, $telPerson, $mailPerson, $methodPaye, $prixLocation)) {
                // echo "Reservation effectue avec succes";
                if ($this->modelcar->updateAvailable($idcar, 0)) {
                    if ($this->modelmaildesign->sendReservationConfirmation($nomPerson, $mailPerson, $numReservation, $dateStart)) {
                        // echo "Reservation effectue et Mail envoye";
                        header('Location:' . url('index'));
                    } else {
                        echo "Reservation effectue et Mail non envoye avec succes";
                    }
                } else {
                    echo 'Impossible de faire la mise a jour';
                }
            } else {
                echo "Impossible d'effectuer cette reservation";
            }

            // echo $idclient . ' ' . $idcar . ' ' . $nomPerson . ' ' . $prenomPerson . ' ' . $mailPerson . ' ' . $telPerson . ' ' . $adressPerson . ' ' . $methodPaye . ' ' . $dateStart . ' ' . $dateEnd . ' ' . $numReservation . ' ' . $prixLocation;
        }
    }
    public function confirm()
    {
        $num_reservation = $_GET['reservation'];
        if ($this->modelreservation->confirmReservation($num_reservation)) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            echo "Impossible";
        }
    }
    public function annule(){
        $num_reservation = $_GET['reservation'];
        $car = $_GET['matricule'];
        // echo $car;
        // echo $num_reservation;
        if($this->modelreservation->cancelReservation($num_reservation)){
            if($this->modelcar->updateAvailable($car, 1)){
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }else{
            echo "Impossible";
        }
    }

    // //get invoice
    // public function customerInvoice(){
    //     $client = $_GET['id'];
    // }
}
