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
  <link rel="stylesheet" href="<?= BASE_URL; ?>public/styles/dahboard-client.css">
  <!-- JS LINK -->

  <!-- TITRE DE LA PAGE -->
  <title>CarExpress | dashboard-client</title>

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
            <li class="menu-select">
              <i class="fa-solid fa-chart-line"></i> Dashboard
            </li>
          </a>

          <!-- OPTION RESERVATION -->
          <a href="<?= url('reservationCustomer' , ['id' => $_SESSION['customer']['id']]) ?>">
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
            <li><i class="fa-solid fa-square-poll-vertical"></i> Reçu</li>
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
      <!-- INFORMATIONS & CHARTS BOARD -->
      <div class="info">
        <!-- TITRE -->
        <p class="title">statistiques <?php echo $idcustomer ?></p> 
        <!-- BOX DES STATS -->
        <div class="box">

          <!-- CADRE -->
          <div>
            <p>Nombre de reservation : </p>
            <p>27</p>
          </div>

          <!-- CADRE -->
          <div>
            <p>Nombre de facture : </p>
            <p>27</p>
          </div>

          <!-- CADRE -->
          <div>
            <p>Nombre de reçu : </p>
            <p>27</p>
          </div>

          <!-- CADRE -->
          <div>
            <p>NOMBRE TOTAL : </p>
            <p>300</p>
          </div>

          <!-- GRAPHIQUE -->
          <!-- <div></div> -->
        </div>
      </div>
    </div>
</body>

</html>