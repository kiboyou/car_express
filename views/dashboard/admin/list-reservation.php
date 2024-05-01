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
            <li class="menu-select">
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
            <li><i class="fa-solid fa-magnifying-glass-chart"></i> Inventaire</li>
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
          <p class="title">Listes des reservation</p>
        </div>

        <!-- RECHERCHE ET FILTRES -->
        <div class="search">
          <form action="#">
            <!-- barre de recherche -->
            <div>
              <input type="date" placeholder="Rechercher selon numero de telephone" name="" id="" />
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
          <p>Client</p>
          <p>Voiture</p>
          <p>Date de reservation</p>
          <p>Date de debut</p>
          <p>Date de fin</p>
          <p>Status</p>
          <p>Actions</p>
        </div>

        <!-- LISTE DES PATIENTS -->
        <div class="list-client">
          <!-- Patient -->
          <div class="client">
            <p>OUATTARA</p>
            <p>Voiture Économique</p>
            <p>15/04/2022</p>
            <p>15/04/2022</p>
            <p>15/04/2022</p>
            <p class="status">En cours...</p>
            <!-- <p class="status_ok">valider</p> -->
            <div>
              <a href="#"><button class="set"><i class="fa-solid fa-square-check"></i></button></a>
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
        <p>Enregistrer une reservation</p>
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

          <label for="datedebut">date de debut</label>
          <input type="date" name="" placeholder="Date de naissance" id="datedebut">

          <label for="datefin">date de fin</label>
          <input type="date" name="" placeholder="Date de naissance" id="datefin">

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
        <p>Voulez-vous supprimer cette reservation ?</p>
        <button>Confirmer</button>
      </div>
      <div class="delete-cancel">
        <i class="fa-solid fa-xmark"></i>
      </div>
    </div>

    <script src="<?= BASE_URL; ?>public/js/dashboard/dashboard.js"></script>
</body>

</html>