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
          <!-- OPTION CLIENT -->
          <a href="<?= url('customer'); ?>">
            <li><i class="fa-solid fa-hospital-user"></i> Client</li>
          </a>
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

          <!-- OPTION GESTIONNAIRE -->
          <a href="<?= url('manager'); ?>">
            <li><i class="fa-solid fa-hospital-user"></i> Gestionnaire</li>
          </a>

          <!-- OPTION VOITURE -->
          <a href="<?= url('car'); ?>">
            <li><i class="fa-solid fa-square-poll-vertical"></i> Voiture</li>
          </a>
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
          <p><?= $_SESSION['admin'] ?></p>
        </div>
      </div>
      <!-- LIST OF ITEM -->
      <div class="admin">
        <!-- TITRE -->
        <div class="title">
          <p class="title">Listes des inventaires</p>
        </div>

        <!-- RECHERCHE ET FILTRES -->
        <div class="search">
          <form action="#">
            <!-- barre de recherche -->
            <div>
              <input type="number" placeholder="Rechercher selon numero de telephone" name="" id="" />
              <button type="submit">Rechercher</button>
            </div>
          </form>
        </div>

        <!-- AJOUTER -->
        <div class="register">
          <button>ajouter +</button>
          <button class="refresh">refresh @</button>
        </div>

        <!-- REPERES -->
        <div class="repere-client">
          <p>Nom</p>
          <p>Prenoms</p>
          <p>Date de naissance</p>
          <p>Email</p>
          <p>Adresse</p>
          <p>Telephone</p>
          <p>Actions</p>
        </div>

        <!-- LISTE DES PATIENTS -->
        <div class="list-client">
          <!-- Patient -->
          <div class="client">
            <p>OUATTARA</p>
            <p>Kiboyou Mohamed</p>
            <p>15/04/2022</p>
            <p>ouattarakiboyoumohamed@gmail.com</p>
            <p>Foyer Babel</p>
            <p> 0759239686</p>
            <div>
              <a href="#"><button class="set"><i class="fa-solid fa-pen"></i></button></a>
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