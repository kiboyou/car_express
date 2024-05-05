<?php
class Admin
{
    private $database;

    public function __construct($db)
    {
        $this->database = $db;
    }

    //login admin
    public function loginadmin($useradmin)
    {
        $sql = "SELECT * FROM administrateur WHERE usernameadmin=:usernameadmin";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':usernameadmin', $useradmin);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addadmin($usernameval, $passval)
    {
        $sql = "INSERT INTO administrateur(usernameadmin, passwordadmin) VALUES (:usernameadmin, :passwordadmin)";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':usernameadmin', $usernameval);
        $stmt->bindParam(':passwordadmin', $passval);

        return $stmt->execute();
    }

    //add new marque
    public function newmarque($marquevalue)
    {
        $sql = "INSERT INTO marque(namemarque) VALUES(:marquevalue)";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':marquevalue', $marquevalue, PDO::PARAM_STR);
        
        return $stmt->execute();
    }
    //add new model
    public function newmodel($marqueid, $modelvalue)
    {
        $sql = "INSERT INTO modele(idmarque, namemodele) VALUES(:marquevalue, :modelevalue)";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':marquevalue', $marqueid, PDO::PARAM_INT);
        $stmt->bindParam(':modelevalue', $modelvalue, PDO::PARAM_STR);
        
        return $stmt->execute();
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
    //add a new manager
    public function addmanager($lastnamedata, $firstnamedata, $usernamedata, $phonedata, $addressdata, $passworddata){
        $sql = "INSERT INTO gestionnaire(nomgestionnaire, prenomgestionnaire, usermanager, phonegestionnaire, addressmanager, passwordgestionnaire) VALUES(:nomgestionnaire, :prenomgestionnaire, :usermanager, :phonegestionnaire, :addressmanager, :passwordgestionnaire)";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':nomgestionnaire', $lastnamedata);
        $stmt->bindParam(':prenomgestionnaire', $firstnamedata);
        $stmt->bindParam(':usermanager', $usernamedata);
        $stmt->bindParam(':phonegestionnaire', $phonedata);
        $stmt->bindParam(':addressmanager', $addressdata);
        $stmt->bindParam(':passwordgestionnaire', $passworddata);
        
        return $stmt->execute();
    }
    //list all marque
    public function listmarque()
    {
        $sql = "SELECT * FROM marque ORDER BY namemarque ASC";
        $query = $this->database->query($sql);
        
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    //list all model
    public function listmodele()
    {
        $sql = "SELECT idmodele, concat(namemarque,' ',namemodele) AS vehicule
                    FROM modele
                    INNER JOIN marque
                    USING(idmarque)";
        $query = $this->database->query($sql);
        
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    //list all car
    public function listcar()
    {
        $sql = "SELECT matricule, categorie, namemarque, namemodele, transmission, disponibilite, vehiculepicture, rentprice
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
        $sql = "SELECT matricule, categorie, namemarque, namemodele, transmission, disponibilite, vehiculepicture, rentprice
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
    function generatePassword()
    {
        $uppercaseLetters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lowercaseLetters = 'abcdefghijklmnopqrstuvwxyz';
        $digits = '0123456789';
        $specialChars = '!@#$%^&*()-_+=<>?';

        // Choisir au hasard une lettre majuscule
        $password = $uppercaseLetters[rand(0, strlen($uppercaseLetters) - 1)];

        // Choisir au hasard une lettre minuscule
        $password .= $lowercaseLetters[rand(0, strlen($lowercaseLetters) - 1)];

        // Choisir au hasard un chiffre
        $password .= $digits[rand(0, strlen($digits) - 1)];

        // Choisir au hasard un caractère spécial
        $password .= $specialChars[rand(0, strlen($specialChars) - 1)];

        // Choisir les autres caractères aléatoires
        for ($i = 4; $i < 8; $i++) {
            $allChars = $uppercaseLetters . $lowercaseLetters . $digits . $specialChars;
            $password .= $allChars[rand(0, strlen($allChars) - 1)];
        }

        // Mélanger les caractères du mot de passe
        $password = str_shuffle($password);

        return $password;
    }
    public function isUsernameUnique($userdata){
        $sql = "SELECT COUNT(*) FROM gestionnaire WHERE usermanager=:usermanager";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':usermanager', $userdata);
        $stmt->execute();
        $count = $stmt->fetch(PDO::FETCH_ASSOC);

        return $count == 0;
    }
}
