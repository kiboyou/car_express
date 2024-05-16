<?php
class Gestionnaire
{
    private $database;
    public function __construct($db)
    {
        $this->database = $db;
    }


    //connect 
    public function loginmanager($usermanager)
    {
        $sql = "SELECT * FROM gestionnaire WHERE usermanager=:usermanager";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':usermanager', $usermanager);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //update password
    public function updatepasswordfirstlogin($idmanagerdata, $passworddata)
    {
        $sql = "UPDATE gestionnaire SET passwordgestionnaire=:passwordgestionnaire, firstlogin=0 WHERE idgestionnaire=:idgestionnaire";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':passwordgestionnaire', $passworddata);
        $stmt->bindParam(':idgestionnaire', $idmanagerdata);

        return $stmt->execute();
    }

    //inventaire
    public function makeinventory($val)
    {
        $sql = "INSERT INTO inventaire(matricule, modele, marque, categorie, rentprice, transmission, disponibilite)
                SELECT matricule, namemodele, namemarque, categorie, rentprice, transmission, disponibilite
                    FROM modele
                    INNER JOIN marque ON modele.idmarque = marque.idmarque
                    INNER JOIN voiture ON voiture.idmodele = modele.idmodele
                    WHERE disponibilite=:statut ";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':statut', $val);

        return $stmt->execute();
    }
    public function groupInventory()
    {
        $sql = "SELECT * FROM inventory_grouped";
        $stmt = $this->database->prepare($sql);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function detailInventory($dateVal, $timeVal, $statVal)
    {
        $sql = "SELECT matricule, marque, modele, categorie, rentprice, transmission FROM inventaire JOIN inventory_grouped
                    ON DATE(inventaire.dateinventory) = inventory_grouped.dateinventory
                    AND TIME(inventaire.dateinventory) = inventory_grouped.timeinventory
                    AND inventaire.disponibilite =
                                        CASE inventory_grouped.Statut
                                            WHEN 'Disponible' THEN 1
                                                ELSE 0
                                        END
                WHERE DATE(inventaire.dateinventory) = :invDate
                AND TIME(inventaire.dateinventory) = :invTime
                AND CASE
      WHEN disponibilite = 1 THEN 'Disponible'
      ELSE 'Indisponible'
    END = :statut";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':invDate', $dateVal);
        $stmt->bindParam(':invTime', $timeVal);
        $stmt->bindParam(':statut', $statVal);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
