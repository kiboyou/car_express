<?php require CONFIG . 'customerCheckLogin.php'; ?>

<!DOCTYPE html>
<html lang="en">
<!-- HEAD -->

<head>
  <!-- META -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- FONT LINK -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <!-- ICON -->
  <link rel="shortcut icon" href="<?= BASE_URL; ?>public/source/images/logo/logoB.png" type="image/x-icon" />
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet" />
  <!-- ICONS LINK -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- CSS FILE -->
  <link rel="stylesheet" href="<?= BASE_URL; ?>public/styles/dahboard.css">
  <!-- JS LINK -->

  <!-- TITRE DE LA PAGE -->
  <title>CarExpress | dashboard-admin</title>

</head>
<!-- BODY -->

<body>
  <section class="container">
    <!-- PARTIE 1 GAUCHE -->
    <div class="left">
      <!-- LOGO DU CENTRE CULTUREL COMOE -->
      <div class="logo">
      <a href="<?= url('index'); ?>">
          <img src="<?= BASE_URL; ?>public/source/images/logo/logoB.png" alt="logo du centre comoe" />
        </a>
      </div>
      <!-- LISTE DES OPTIONS MENU -->
      <div class="list">
        <!-- LISTE DE MENU -->
        <ul>
          <!-- OPTION ACCEUIL -->
          <a href="<?= url('dashCustomer', ['id' => $_SESSION['customer']['id']]) ?>">
            <li>
              <i class="fa-solid fa-chart-line"></i> Dashboard
            </li>
          </a>

          <!-- OPTION RESERVATION -->
          <a href="<?= url('reservationCustomer', ['id' => $_SESSION['customer']['id']]) ?>">
            <li>
              <i class="fa-solid fa-magnifying-glass-chart"></i> Reservation
            </li>
          </a>
          <!-- OPTION FACTURE -->
          <a href="<?= url('invoiceCustomer', ['id' => $_SESSION['customer']['id']]) ?>">
            <li><i class="fa-solid fa-square-poll-vertical"></i> Facture</li>
          </a>
          <!-- OPTION RECU -->
          <a href="<?= url('receivedCustomer', ['id' => $_SESSION['customer']['id']]) ?>">
            <li class="menu-select"><i class="fa-solid fa-square-poll-vertical"></i> Reçu</li>
          </a>

          <!-- OPTION PARAMETRE - PROFILE -->
          <!-- <a href="./parametre.html">
            <li><i class="fa-solid fa-gear"></i> Parametre</li>
          </a> -->
        </ul>

      </div>
      <!-- DECONNECTION -->
      <div class="disconnect">
        <a href="<?= url('logout') ?>"><button>Se deconnecter</button></a>
      </div>
    </div>
    <!-- PARTIE 2 DROITE -->
    <div class="rigth">
      <!-- ADMIN INFO -->
      <div class="head">
        <div>
          <img src="<?= BASE_URL; ?>public/source/images/Ellipse 1.png" alt="photo de profil" />
          <p><?= $_SESSION['customer']['lastname'] ?></p>
        </div>
      </div>
      <!-- LIST OF ITEM -->
      <div class="admin">
        <!-- TITRE -->
        <div class="title">
          <p class="title">Listes des reçus</p>
        </div>

        <!-- RECHERCHE ET FILTRES -->
        <div class="search">
          <form action="#">
            <!-- barre de recherche -->
            <div>
              <input type="date" name="" id="" />
              <button type="submit">Rechercher</button>
            </div>
          </form>
        </div>

        <!-- AJOUTER -->
        <div class="register">
          <button style="display:  none;"></button>
          <button class="refresh">refresh @</button>
        </div>

        <!-- REPERES -->
        <div class="repere-client">
          <p>Client</p>
          <p>Voiture</p>
          <p>Numero facture </p>
          <p>Montant total</p>
          <p>Montant payé</p>
          <p>Montnat restant</p>
          <p>Actions</p>
        </div>

        <!-- LISTE DES PATIENTS -->
        <div class="list-client">
          <!-- Patient -->
          <div class="client">
            <p>OUATTARA</p>
            <p>Voiture Économique</p>
            <p>12045167</p>
            <p>150 000</p>
            <p>100 000</p>
            <p>50 000</p>

            <div>
              <a href="#"><button class="set"><i class="fa-solid fa-print"></i></button></a>
              <a href="#"><button class="del"><i class=".los fa-solid fa-trash-can"></i></button></a>
            </div>
          </div>
        </div>

        <!-- PAGINATION -->
        <div class="pagination">
          <div>
            <a href="#"><button class="pre">
                <<< /button></a>
            <a href="#"><button class="post">>></button></a>
          </div>
        </div>


        <!-- PAGINATION -->
        <div class="pagination">
          <div>
            <a href="#"><button class="pre">
                <<< /button></a>
            <a href="#"><button class="post">>></button></a>
          </div>
        </div>
      </div>
    </div>
    <!-- NOTIFICATION -->
    <div class="admining">
      <!-- ajouter un admin -->
      <div class="admining-box">
        <p>Enregistrer un reçu </p>
        <form>
          <label>choisissez le client</label>
          <select name="">
            <option value=""></option>
            <option value="">GEORGES PAUL</option>
            <option value="">DELACROIX ERIC</option>
            <option value="">DUCHESS REINE</option>
          </select>

          <label>choisissez la voiture</label>
          <select name="">
            <option value=""></option>
            <option value="">GEORGES PAUL</option>
            <option value="">DELACROIX ERIC</option>
            <option value="">DUCHESS REINE</option>
          </select>

          <label>choisissez la facture</label>
          <select name="">
            <option value=""></option>
            <option value="">FACTURE-1</option>
            <option value="">FACTURE-2</option>
            <option value="">FACTURE-3</option>
          </select>

          <label>Mode de paiement</label>
          <select name="">
            <option value=""></option>
            <option value="">Carte visa</option>
            <option value="">Moyen mobile</option>
            <option value="">Physique</option>
          </select>

          <label for=""></label>
          <input type="number" name="" placeholder="Montant a payé">

          <button type="submit">Valider</button>
        </form>
      </div>
      <!-- Annuler l'enregistrenent -->
      <div class="admining-cancel">
        <i class="fa-solid fa-xmark"></i>
      </div>
    </div>

    <!-- supprimer un element -->
    <div class="delete">
      <div class="delete-box">
        <i class="fa-solid fa-triangle-exclamation"></i>
        <p>Voulez-vous supprimer ce reçu ?</p>
        <button>Confirmer</button>
      </div>
      <div class="delete-cancel">
        <i class="fa-solid fa-xmark"></i>
      </div>
    </div>

    <script src="<?= BASE_URL; ?>public/js/dashboard/dashboard.js"></script>
</body>

</html>