<?php
class MailController{

    public function customerWelcome(){
        require_once VIEWS . 'mail/model_welcome_customer.php';
    }

    public function credentialManager(){
        require_once VIEWS . 'mail/model_credential_manager.php';
    }

    public function confirmReservationCustomer(){
        require_once VIEWS . 'mail/model_confirm_reservation.php';
    }
}
?>