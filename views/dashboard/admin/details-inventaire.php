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
          <a href="<?= url('admin'); ?>">
            <li>
              <i class="fa-solid fa-chart-line"></i> Dashboard
            </li>
          </a>
          <?php if ($_SESSION['role'] == 'administrator') : ?>
            <!-- OPTION CLIENT -->
            <a href="<?= url('customer'); ?>">
              <li><i class="fa-solid fa-hospital-user"></i> Client</li>
            </a>
            <!-- OPTION GESTIONNAIRE -->
            <a href="<?= url('manager'); ?>">
              <li><i class="fa-solid fa-hospital-user"></i> Gestionnaire</li>
            </a>
          <?php elseif ($_SESSION['role'] == 'manager') : ?>
            <!-- OPTION RESERVATION -->
            <a href="<?= url('reservation'); ?>">
              <li>
                <i class="fa-solid fa-magnifying-glass-chart"></i> Reservation
              </li>
            </a>
            <!-- OPTION FACTURE -->
            <a href="<?= url('invoice'); ?>">
              <li><i class="fa-solid fa-square-poll-vertical"></i> Facture</li>
            </a>
            <!-- OPTION RECU -->
            <a href="<?= url('received'); ?>">
              <li><i class="fa-solid fa-square-poll-vertical"></i> Reçu</li>
            </a>
            <!-- OPTION INVENTAIRE -->
            <a href="<?= url('inventaire'); ?>">
              <li class="menu-select"><i class="fa-solid fa-magnifying-glass-chart"></i> Inventaire</li>
            </a>
            <!-- OPTION VOITURE -->
            <a href="<?= url('car'); ?>">
              <li><i class="fa-solid fa-square-poll-vertical"></i> Voiture</li>
            </a>
          <?php endif; ?>
        </ul>
      </div>
      <!-- DECONNECTION -->
      <div class="disconnect">
        <a href="<?= url('logout'); ?>"><button>Se deconnecter</button></a>
      </div>
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
          <p class="title">Details</p>
        </div>

        <!-- AJOUTER -->
        <div class="register">
          <button>ajouter +</button>
          <button class="refresh">refresh @</button>
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
        <p>Enregistrer un client</p>
        <form>
          <label for=""></label>
          <input type="text" name="" placeholder="Nom">

          <label for=""></label>
          <input type="text" name="" placeholder="Prenom">

          <label for=""></label>
          <input type="email" name="" placeholder="Email">

          <label for=""></label>
          <input type="text" name="" placeholder="Sexe">

          <label for=""></label>
          <input type="text" name="" placeholder="adresse">

          <label for=""></label>
          <input type="date" name="" placeholder="Date de naissance">

          <label for=""></label>
          <input type="number" name="" placeholder="Numero de telephone">

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
        <p>Voulez-vous supprimer ce admin ?</p>
        <button>Confirmer</button>
      </div>
      <div class="delete-cancel">
        <i class="fa-solid fa-xmark"></i>
      </div>
    </div>

    <script src="<?= BASE_URL; ?>public/js/dashboard/dashboard.js"></script>
</body>

</html>