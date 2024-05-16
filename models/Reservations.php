<?php
class Reservation
{
    private $database;
    public function __construct($db)
    {
        $this->database = $db;
    }

    // make a reservation
    public function addreservation($numreservation, $numclient, $numcar, $datereservation, $startLocation, $endLocation, $statusReservation, $nomperson, $prenomperson, $addressperson, $telperson, $mailperson, $paidby, $prixlocation)
    {
        $sql = "INSERT INTO reservation (idreservation, idclient, idvoiture, datereservation, debutlocation, finlocation, statutreservation, nomperson1, prenomperson1, addressperson1, telperson1, mailperson1, paidby, prixlocation) 
                    VALUES(:idreservation, :idclient, :idvoiture, :datereservation, :debutlocation, :finlocation, :statutreservation, :nomperson1, :prenomperson1, :addressperson1, :telperson1, :mailperson1, :paidby, :prixlocation)";

        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':idreservation', $numreservation);
        $stmt->bindParam(':idclient', $numclient);
        $stmt->bindParam(':idvoiture', $numcar);
        $stmt->bindParam(':datereservation', $datereservation);
        $stmt->bindParam(':debutlocation', $startLocation);
        $stmt->bindParam(':finlocation', $endLocation);
        $stmt->bindParam(':statutreservation', $statusReservation);
        $stmt->bindParam(':nomperson1', $nomperson);
        $stmt->bindParam(':prenomperson1', $prenomperson);
        $stmt->bindParam(':addressperson1', $addressperson);
        $stmt->bindParam(':telperson1', $telperson);
        $stmt->bindParam(':mailperson1', $mailperson);
        $stmt->bindParam(':paidby', $paidby);
        $stmt->bindParam(':prixlocation', $prixlocation);

        return $stmt->execute();
    }

    //select reservation by user
    public function userReservation($customer){
        $sql = "SELECT * FROM reservationView WHERE idclient = :idclient";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':idclient', $customer);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //select all reservation
    public function allReservation(){
        $sql = "SELECT * FROM reservationView";
        $stmt = $this->database->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //confirm reservation
    public function confirmReservation($numreservation){
        $sql = "UPDATE reservation SET statutreservation = :statut WHERE idreservation = :id";
        $stmt = $this->database->prepare($sql);

        $stmt->bindValue(':statut', "Confirme");
        $stmt->bindParam(':id', $numreservation);

        return $stmt->execute();
    }
    //annul reservation
    public function cancelReservation($numreservation){
        $sql = "UPDATE reservation SET statutreservation = :statut WHERE idreservation = :id";
        $stmt = $this->database->prepare($sql);

        $stmt->bindValue(':statut', "Annule");
        $stmt->bindParam(':id', $numreservation);

        return $stmt->execute();
    }
    public function progressReservation($numreservation){
        $sql = "UPDATE reservation SET statutreservation = :statut WHERE idreservation = :id";
        $stmt = $this->database->prepare($sql);

        $stmt->bindValue(':statut', "Progress");
        $stmt->bindParam(':id', $numreservation);

        return $stmt->execute();
    }
    public function closeReservation($numreservation){
        $sql = "UPDATE reservation SET statutreservation = :statut WHERE idreservation = :id";
        $stmt = $this->database->prepare($sql);

        $stmt->bindValue(':statut', "Close");
        $stmt->bindParam(':id', $numreservation);

        return $stmt->execute();
    }

    //numéro for reservation
    public function newIDReservation()
    {
        do {
            // Générer la partie de la réservation basée sur la date actuelle
            $dateNow = date("Ymd"); // YYYYMMDD
            $timeNow = date("His"); // HHMMSS en seconde

            // Générer une partie unique pour le numéro de réservation (4 chiffres)
            $uniquePart = mt_rand(1000, 9999); // Génère un nombre aléatoire à quatre chiffres

            // Créer le numéro de réservation complet
            $reservationNumber = "ABKM-$dateNow-$timeNow-$uniquePart";

            // Vérifier si l'ID de réservation est unique en appelant la fonction checkExistIDReservation
            $isUnique = $this->checkExistIDReservation($reservationNumber);

            // Répéter la génération de l'ID de réservation jusqu'à ce qu'il soit unique
        } while (!$isUnique);

        // Une fois qu'un ID de réservation unique est généré, le retourner
        return $reservationNumber;
    }
    //check if email exist
    public function checkExistIDReservation($num)
    {
        $sql = "SELECT COUNT(*) AS total FROM reservation WHERE idreservation=:idreservation";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':idreservation', $num); // Correction ici
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['total'] == 0;
    }
}
