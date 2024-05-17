<?php require_once CONFIG . 'adminCheckLogin.php' ?>
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
          <a href="<?= $_SERVER['HTTP_REFERER'] ?>">
            <li>
              <i class="fa-solid fa-arrow-left"></i> BACK
            </li>
          </a>
        </ul>
      </div>
      <!-- DECONNECTION -->
      <!-- <div class="disconnect">
        <a href="<?= url('logout'); ?>"><button>Se deconnecter</button></a>
      </div> -->
    </div>
    <!-- PARTIE 2 DROITE -->
    <div class="rigth">
      <!-- ADMIN INFO -->
      <div class="head">
        <div>
          <img src="<?= BASE_URL; ?>public/source/images/Ellipse 1.png" alt="photo de profil" />
          <p>
            <? if ($_SESSION['role'] == "administrator") { ?>
          <p><?= $_SESSION['admin']['username'] ?></p>
        <? } else { ?>
          <p><?= $_SESSION['manager']['username'] ?></p>
        <? } ?>
        </p>
        </div>
      </div>
      <!-- LIST OF ITEM -->
      <div class="admin">
        <!-- TITRE -->
        <div class="title">
          <!-- <p class="title">Details</p> -->
        </div>

        <div class="search">
          <p style="font-size: 20px;" class="title">Details de l'inventaire </p>
        </div>
        <!-- AJOUTER -->
        <div class="register">
          <!-- <button disabled>ajouter +</button> -->
          <!-- <button class="refresh">refresh @</button> -->
        </div>

        <!-- REPERES -->
        <div class="repere-client">
          <p>Matricule</p>
          <p>Marque</p>
          <p>Modele</p>
          <p>Categorie</p>
          <p>Prix de location</p>
          <p>Transmission</p>
        </div>

        <!-- LISTE DES PATIENTS -->
        <div id="inventoryTableData" class="list-client">
          <!-- Patient -->
          <?php foreach ($result as $data) : ?>
            <div class="client">
              <p><?= $data['matricule'] ?></p>
              <p><?= $data['marque'] ?></p>
              <p><?= $data['modele'] ?></p>
              <p><?= $data['categorie'] ?></p>
              <p><?= $data['rentprice'] ?></p>
              <p><?= $data['transmission'] ?></p>
            </div>
          <?php endforeach; ?>
        </div>

        <!-- PAGINATION -->
        <div class="pagination">
          <div>
            <a href="#"><button class="pre">
                << </button></a>
            <a href="#"><button class="post">>></button></a>
          </div>
        </div>


      </div>

    </div>
    <script src="<?= BASE_URL; ?>public/js/dashboard/dashboard.js"></script>
</body>

</html>