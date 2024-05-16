<?php
class Vehicule
{
    private $database;
    public function __construct($db)
    {
        $this->database = $db;
    }

    //add new car
    public function newcar($matriculeval, $modeleval, $catval, $transval, $pictureval, $priceval, $dispoval)
    {
        $sql = "INSERT INTO voiture(matricule, idmodele, categorie, transmission, vehiculepicture, rentprice, disponibilite) VALUES(:matricule, :idmodele, :categorie, :transmission, :vehiculepicture, :rentprice, :disponibilite)";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':matricule', $matriculeval, PDO::PARAM_STR);
        $stmt->bindParam(':idmodele', $modeleval, PDO::PARAM_INT);
        $stmt->bindParam(':categorie', $catval, PDO::PARAM_STR);
        $stmt->bindParam(':transmission', $transval, PDO::PARAM_STR);
        $stmt->bindParam(':vehiculepicture', $pictureval, PDO::PARAM_STR);
        $stmt->bindParam(':rentprice', $priceval);
        $stmt->bindParam(':disponibilite', $dispoval, PDO::PARAM_INT);

        return $stmt->execute();
    }

    //list all car
    public function listcar()
    {
        $sql = "SELECT matricule, categorie, namemarque, namemodele, CONCAT(namemarque, ' ', namemodele) AS vehicule, transmission, disponibilite, vehiculepicture, rentprice
                    FROM voiture
                    INNER JOIN modele
                    ON voiture.idmodele = modele.idmodele
                    INNER JOIN marque
                    ON modele.idmarque = marque.idmarque";
        $query = $this->database->query($sql);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    //get one car
    public function listOnecar($matriculeval)
    {
        $sql = "SELECT CONCAT(namemarque, ' ', namemodele) AS vehicule, matricule, categorie, namemarque, namemodele, transmission, disponibilite, vehiculepicture, rentprice
                    FROM voiture
                    INNER JOIN modele
                    ON voiture.idmodele = modele.idmodele
                    INNER JOIN marque
                    ON modele.idmarque = marque.idmarque
                    WHERE matricule=:matricule";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':matricule', $matriculeval, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    //update disponibilte to non
    public function updateAvailable($numcar){
        $sql = "UPDATE voiture SET disponibilite = CASE WHEN disponibilite = 1 THEN 0 ELSE 1 END WHERE matricule = :matricule";
        $stmt = $this->database->prepare($sql);

        $stmt->bindParam(':matricule', $numcar);

        return $stmt->execute(); 
    }
    //generer matricule for vehicule
    public function buildMatricule()
    {
        // Lettres possibles pour le matricule
        $lettres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // Chiffres possibles pour le matricule
        $chiffres = '0123456789';

        // Générer une série de trois lettres aléatoires
        $lettreAleatoire = '';
        for ($i = 0; $i < 3; $i++) {
            $lettreAleatoire .= $lettres[rand(0, strlen($lettres) - 1)];
        }
        // Générer une série de trois chiffres aléatoires
        $chiffreAleatoire = '';
        for ($i = 0; $i < 3; $i++) {
            $chiffreAleatoire .= $chiffres[rand(0, strlen($chiffres) - 1)];
        }

        // Concaténer les lettres et les chiffres pour former le matricule
        $matricule = $lettreAleatoire . $chiffreAleatoire;

        return $matricule;
    }
    public function generateMatricule()
    {
        $matriculeunique = $this->buildMatricule();
        $sql_verif = "SELECT COUNT(*) AS total FROM voiture WHERE matricule = :matricule";
        $stmt = $this->database->prepare($sql_verif);
        $stmt->bindParam(':matricule', $matriculeunique, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $total = $row['total'];
        //regenerate if total > 0
        while ($total > 0) {
            $matriculeunique = $this->buildMatricule();
            $sql_verif = "SELECT COUNT(*) AS total FROM voiture WHERE matricule = :matricule";
            $stmt = $this->database->prepare($sql_verif);
            $stmt->bindParam(':matricule', $matriculeunique, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $total = $row['total'];
        }
        return $matriculeunique;
    }
}
