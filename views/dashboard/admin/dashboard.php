<!DOCTYPE html>
<html lang="en">
<!-- HEAD -->
<?php include(VIEWS . 'includes/dashhead.php'); ?>
<!-- BODY -->

<body>
  <section class="container">
    <!-- PARTIE 1 GAUCHE -->
    <div class="left">
      <!-- LOGO DU CENTRE CULTUREL COMOE -->
      <div class="logo">
        <img src="<?= BASE_URL; ?>public/source/images/logo/logoB.png" alt="logo du centre comoe" />
      </div>
      <!-- LISTE DES OPTIONS MENU -->
      <div class="list">
        <!-- LISTE DE MENU -->
        <ul>
          <!-- OPTION ACCEUIL -->
          <a href="<?= url('api/Admin/index'); ?>">
            <li class="menu-select">
              <i class="fa-solid fa-chart-line"></i> Dashboard
            </li>
          </a>
          <!-- OPTION CLIENT -->
          <a href="<?= url('api/Admin/customer'); ?>">
            <li><i class="fa-solid fa-hospital-user"></i> Client</li>
          </a>
          <!-- OPTION RESERVATION -->
          <a href="<?= url('api/Admin/reservation'); ?>">
            <li>
              <i class="fa-solid fa-magnifying-glass-chart"></i> Reservation
            </li>
          </a>
          <!-- OPTION FACTURE -->
          <a href="<?= url('api/Admin/facture'); ?>">
            <li><i class="fa-solid fa-square-poll-vertical"></i> Facture</li>
          </a>
          <!-- OPTION RECU -->
          <a href="<?= url('api/Admin/received'); ?>">
            <li><i class="fa-solid fa-square-poll-vertical"></i> Reçu</li>
          </a>

          <!-- OPTION INVENTAIRE -->
          <a href="<?= url('api/Admin/inventaire'); ?>">
            <li><i class="fa-solid fa-magnifying-glass-chart"></i> Inventaire</li>
          </a>

          <!-- OPTION GESTIONNAIRE -->
          <a href="<?= url('api/Admin/gestionnaire'); ?>">
            <li><i class="fa-solid fa-hospital-user"></i> Gestionnaire</li>
          </a>

          <!-- OPTION VOITURE -->
          <a href="<?= url('api/Admin/vehicule'); ?>">
            <li><i class="fa-solid fa-square-poll-vertical"></i> Voiture</li>
          </a>
        </ul>

      </div>
      <!-- DECONNECTION -->
      <div class="disconnect">
        <a href="<?= url('api/Admin/index'); ?>"><button>Se deconnecter</button></a>
      </div>
    </div>
    <!-- PARTIE 2 DROITE -->
    <div class="rigth">
      <!-- ADMIN INFO -->
      <div class="head">
        <div>
          <img src="<?= BASE_URL; ?>public/source/images/Ellipse 1.png" alt="photo de profil" />
          <p>Admin name</p>
        </div>
      </div>
      <!-- INFORMATIONS & CHARTS BOARD -->
      <div class="info">
        <!-- TITRE -->
        <p class="title">statistiques</p>
        <!-- BOX DES STATS -->
        <div class="box">
          <!-- CADRE -->
          <div>
            <p>Nombre de client : </p>
            <p>27</p>
          </div>

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
            <p>Nombre d'inventaire : </p>
            <p>27</p>
          </div>

          <!-- CADRE -->
          <div>
            <p>Nombre de Gestionnaire : </p>
            <p>27</p>
          </div>

          <!-- CADRE -->
          <div>
            <p>Nombre de voiture : </p>
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