<?php
require MODELS . 'Gestionnaire.php';

class GestionnaireController
{
    private $modelmanager;
    public function __construct()
    {
        global $database;
        $this->modelmanager = new Gestionnaire($database);
    }

    public function updatepassword(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $passwordmanager = $_POST['passwordclient'];
            $idmanager = $_POST['idmanager'];

            //hash password
            $passwordHash = password_hash($passwordmanager, PASSWORD_DEFAULT);

            // echo $passwordmanager . ' ' . $idmanager . '=> ' . $passwordHash;
            if($this->modelmanager->updatepasswordfirstlogin($idmanager, $passwordHash)){
                header('Location: ' . url('login'));
            }else{
                echo "Erreur";
            }
        }
    }
}
