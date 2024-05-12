<?php
class Facture
{
    private $database;
    public function __construct($db)
    {
        $this->database = $db;
    }

    //get invoice by id client
    public function customerInvoice($num){
        $sql = "SELECT * FROM facture
                    INNER JOIN reservationView re
                    ON facture.idreservation = re.idreservation WHERE idclient=:client";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':client', $num);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //get invoice by id client and id facture
    public function customerprintInvoice($numclient, $numinvoice){
        $sql = "SELECT * FROM facture
                    INNER JOIN reservationView re
                    ON facture.idreservation = re.idreservation WHERE idclient=:client AND idfacture=:facture";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':client', $numclient);
        $stmt->bindParam(':facture', $numinvoice);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //get all invoice
    //get invoice by id client
    public function allCustomerInvoice(){
        $sql = "SELECT * FROM facture
                    INNER JOIN reservationView re
                    ON facture.idreservation = re.idreservation";
        $stmt = $this->database->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
