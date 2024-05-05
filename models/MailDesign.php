<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require CONFIG . 'PHPMailer/src/Exception.php';
require CONFIG . 'PHPMailer/src/PHPMailer.php';
require CONFIG . 'PHPMailer/src/SMTP.php';

class MailDesign
{  
    private $database;
    public function __construct($db)
    {
        $this->database = $db;
    }
    function sendWelcomeCustomer($nomcustomer, $emailcustomer)
    {
        // Récupérer le contenu du modèle depuis l'URL avec les paramètres de requête
        $model_url = url('customerwelcome', [
            'nom' => $nomcustomer
        ]);
        $model_content = file_get_contents($model_url);

        // Instancier PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Paramètres du serveur SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'bm.service021@gmail.com';
            $mail->Password = 'bjurlwulagflsjnn';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Destinataire
            $mail->setFrom('bm.service021@gmail.com', 'ABKM Service');
            $mail->addAddress($emailcustomer, $nomcustomer); // Utilisez le nom récupéré depuis la base de données

            // Contenu de l'email
            $mail->isHTML(true);
            $mail->Subject = 'Welcome to Express Car';
            $mail->Body = $model_content; // Utiliser le contenu du modèle PHP récupéré depuis l'URL

            // Envoyer l'email
            $mail->send();
            return true; // Succès de l'envoi
        } catch (Exception $e) {
            return false; // Échec de l'envoi
        }
    }
    function sendManagerCredential($nommanager, $emailmanager, $passmanager, $username)
    {
        // Récupérer le contenu du modèle depuis l'URL avec les paramètres de requête
        $model_url = url('idmanager', [
            'nom' => $nommanager,
            'email' => $emailmanager,
            'password' => $passmanager,
            'username' => $username
        ]);
        $model_content = file_get_contents($model_url);

        // Instancier PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Paramètres du serveur SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'bm.service021@gmail.com';
            $mail->Password = 'bjurlwulagflsjnn';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Destinataire
            $mail->setFrom('bm.service021@gmail.com', 'ABKM Service');
            $mail->addAddress($emailmanager, $nommanager); // Utilisez le nom récupéré depuis la base de données

            // Contenu de l'email
            $mail->isHTML(true);
            $mail->Subject = 'Your login details';
            $mail->Body = $model_content; // Utiliser le contenu du modèle PHP récupéré depuis l'URL

            // Envoyer l'email
            $mail->send();
            return true; // Succès de l'envoi
        } catch (Exception $e) {
            return false; // Échec de l'envoi
        }
    }
    function sendReservationConfirmation($nomclient, $emailclient, $idReservation, $StartLocation)
    {
        // Récupérer le contenu du modèle depuis l'URL avec les paramètres de requête
        $model_url = url('confirmReservation', [
            'nom' => $nomclient,
            'email' => $emailclient,
            'idreservation' => $idReservation,
            'startlocation' => $StartLocation
        ]);
        $model_content = file_get_contents($model_url);

        // Instancier PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Paramètres du serveur SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'bm.service021@gmail.com';
            $mail->Password = 'bjurlwulagflsjnn';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Destinataire
            $mail->setFrom('bm.service021@gmail.com', 'ABKM Service');
            $mail->addAddress($emailclient, $nomclient); // Utilisez le nom récupéré depuis la base de données

            // Contenu de l'email
            $mail->isHTML(true);
            $mail->Subject = 'Confirmation of your car reservation';
            $mail->Body = $model_content; // Utiliser le contenu du modèle PHP récupéré depuis l'URL

            // Envoyer l'email
            $mail->send();
            return true; // Succès de l'envoi
        } catch (Exception $e) {
            return false; // Échec de l'envoi
        }
    }
}
