<?php
require MODELS . 'Gestionnaire.php';
require MODELS . 'Factures.php';
require MODELS . 'Vehicule.php';

class GestionnaireController
{
    private $modelmanager;
    private $modelinvoice;
    private $modelcar;
    public function __construct()
    {
        global $database;
        $this->modelmanager = new Gestionnaire($database);
        $this->modelinvoice = new Facture($database);
        $this->modelcar = new Vehicule($database);
    }

    public function updatepassword()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $passwordmanager = $_POST['passwordclient'];
            $idmanager = $_POST['idmanager'];

            //hash password
            $passwordHash = password_hash($passwordmanager, PASSWORD_DEFAULT);

            // echo $passwordmanager . ' ' . $idmanager . '=> ' . $passwordHash;
            if ($this->modelmanager->updatepasswordfirstlogin($idmanager, $passwordHash)) {
                header('Location: ' . url('login'));
            } else {
                echo "Erreur";
            }
        }
    }

    public function makepaiement()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $idfacture = $_POST['factureID'];
            // $resteinDatabase = $_POST['reste'];
            $totalinDatabase = $_POST['total'];
            $amountPaye = $_POST['amount_paye'];
            $amountPaid = $_POST['amount_paid'];
            $dateHeureActuelle = date("Y-m-d");
            $reference = $_POST['reference'];

            $amountAdvance = $amountPaid + $amountPaye;
            $reste = $totalinDatabase - $amountAdvance;

            if ($reste == 0) {
                $statut_facture = "payé";
            } else {
                $statut_facture = "non payé";
            }
            // var_dump($_POST);
            // echo $idfacture . 'Total a paye: '  . $totalinDatabase . ' -> montant donné:' . $amountPaid . '-> reste:' . $reste . ' -> montant deja paye:' . $amountPaye . ' -> date:' . $dateHeureActuelle . ' amount advance:' . $amountAdvance . ' Statut:' . $statut_facture;
            if ($this->modelinvoice->createReceived($dateHeureActuelle, $idfacture, $amountPaid, $reste, $reference)) {
                if ($this->modelinvoice->updateFacturePayer($idfacture, $amountAdvance, $statut_facture)) {
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                } else {
                    echo 'update in table reservation impossible';
                }
            } else {
                echo "received error";
            }
        }
    }

    public function inventory()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $statut = $_POST['statutSearch'];
            if ($this->modelmanager->makeinventory($statut)) {
                echo "Inventaire effectue";
            } else {
                echo "Erreur";
            }
        }
    }
    public function inventoryDetails()
    {
        if (empty($_GET['dateinventory']) || empty($_GET['timeinventory']) || empty($_GET['statut'])) {
            // echo "Valeur get indisponible";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            // echo "Valeurs disponible";
            $date = urldecode($_GET['dateinventory']);
            $time = urldecode($_GET['timeinventory']);
            $statut = urldecode($_GET['statut']);

            $result = $this->modelmanager->detailInventory($date, $time, $statut);
            require_once VIEWS . 'dashboard/admin/details-inventaire.php';
        }
    }
    public function updatedisponibilite(){
        if(empty($_GET['matricule'])){
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            // echo $idcar . ' ' . $dispo;
            if($this->modelcar->updateAvailable($_GET['matricule'])){
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }else{
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }
}
