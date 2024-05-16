<?php
class Facture
{
    private $database;
    public function __construct($db)
    {
        $this->database = $db;
    }

    //get invoice by id client
    public function customerInvoice($num)
    {
        $sql = "SELECT * FROM facture
                    INNER JOIN reservationView re
                    ON facture.idreservation = re.idreservation WHERE idclient=:client";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':client', $num);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //get invoice by id client and id facture
    public function customerprintInvoice($numclient, $numinvoice)
    {
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
    public function allCustomerInvoice()
    {
        $sql = "SELECT * FROM facture
                    INNER JOIN reservationView re
                    ON facture.idreservation = re.idreservation";
        $stmt = $this->database->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function createReceived($daterecu, $idfacture, $amount, $reste, $reference)
    {
        $sql = "INSERT INTO received(daterecu, idfacture, montantpaye, amountReste, referencepaiement) VALUES(:daterecu, :idfacture, :montantpaye,:reste, :referencepaiement)";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':daterecu', $daterecu);
        $stmt->bindParam(':idfacture', $idfacture);
        $stmt->bindParam(':montantpaye', $amount);
        $stmt->bindParam(':reste', $reste);
        $stmt->bindParam(':referencepaiement', $reference);

        return $stmt->execute();
    }
    public function updateFacturePayer($idfacture, $amount, $statut)
    {
        $sql = "UPDATE facture SET amount_advance=:amount, statutfacture=:statut WHERE idfacture=:id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':amount', $amount);
        $stmt->bindParam(':statut', $statut);
        $stmt->bindParam(':id', $idfacture);

        return $stmt->execute();
    }

    //get received by id client
    public function customerReceived($num)
    {
        $sql = "SELECT * FROM facture 
            INNER JOIN reservationView re ON facture.idreservation = re.idreservation
            INNER JOIN received ON facture.idfacture = received.idfacture
            WHERE idclient=:client";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':client', $num);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //get all
    public function allCustomerReceived()
    {
        $sql = "SELECT * FROM facture 
            INNER JOIN reservationView re ON facture.idreservation = re.idreservation
            INNER JOIN received ON facture.idfacture = received.idfacture";
        $stmt = $this->database->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countData($client)
    {
        $sql = "SELECT 
                    (SELECT COUNT(*) FROM reservation WHERE idclient = :client) AS reservationCount,
                    (SELECT COUNT(*) FROM reservation INNER JOIN facture ON reservation.idreservation = facture.idreservation WHERE idclient = :client) AS invoiceCount,
                    (SELECT COUNT(*) FROM reservation INNER JOIN facture ON reservation.idreservation = facture.idreservation INNER JOIN received ON facture.idfacture = received.idfacture WHERE idclient = :client) AS receivedCount";

        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':client', $client);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
