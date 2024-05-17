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
              <li class="menu-select"><i class="fa-solid fa-hospital-user"></i> Gestionnaire</li>
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
              <li><i class="fa-solid fa-magnifying-glass-chart"></i> Inventaire</li>
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
          <p class="title">Listes des gestionnaires</p>
        </div>

        <!-- RECHERCHE ET FILTRES -->
        <div class="search">
          <form action="#">
            <!-- barre de recherche -->
            <div>
              <input type="number" placeholder="Rechercher selon numero de tel" name="" id="" />
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
          <p>Telephone</p>
          <p>Username</p>
          <p>Adresse</p>
          <p>statut</p>
          <p>Actions</p>
        </div>

        <!-- LISTE DES PATIENTS -->
        <div class="list-client">
          <!-- Patient -->
          <?php foreach ($managers as $manager) : ?>
            <div class="client">
              <p><?= $manager['nomgestionnaire'] ?></p>
              <p><?= $manager['prenomgestionnaire'] ?></p>
              <p><?= $manager['phonegestionnaire'] ?></p>
              <p><?= $manager['usermanager'] ?></p>
              <p><?= $manager['addressmanager'] ?></p>
              <?= ($manager['statut'] == 0) ? '<p class="status_ok">ACTIF</p>' : '<p class="status_cancel">INACTIF</p>' ?>
              <div>
                <a href="<?= url('statutmanager', ['id' => $manager['idgestionnaire']])?>"><button class="set"><i class="fa-solid fa-pen"></i></button></a>
                <!-- <a href="#"><button class="del"><i class=".los fa-solid fa-trash-can"></i></button></a> -->
              </div>
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
    <!-- NOTIFICATION -->
    <div class="admining">
      <!-- ajouter un admin -->
      <div class="admining-box">
        <p>Enregistrer un gestionnaire</p>
        <form id="managerform" action="<?= url('addmanager'); ?>" method="post">
          <label for="">Nom</label>
          <input type="text" id="namemanager" name="lastnamemanager" placeholder="YAPO">
          <span id="nameError" style="color: red; display: none;"></span>

          <label for="">Prenom</label>
          <input type="text" id="firstmanager" name="firstnamemanager" placeholder="YAPI CHRIST">
          <span id="prenomError" style="color: red; display: none;"></span>

          <label for="">Nom d'utilisateur</label>
          <input type="text" id="usernamemanager" name="usernamemanager" placeholder="yapo.yapi">
          <span id="usernameError" style="color: red; display: none;"></span>

          <label for="">E-mail</label>
          <input type="email" id="mailmanager" name="mailmanager" placeholder="jkdkjqdq@exemple.com">
          <span id="mailError" style="color: red; display: none;"></span>

          <label for="">Addresse</label>
          <input type="text" id="addressmanager" name="addressmanager" placeholder="tunis">
          <span id="addresseError" style="color: red; display: none;"></span>

          <label for="">Numero de Telephone</label>
          <input type="tel" id="phonemanager" name="phonemanager" placeholder="544656566565">
          <span id="phoneError" style="color: red; display: none;"></span>

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
        <p>Voulez-vous supprimer ce gestionnaire ?</p>
        <button>Confirmer</button>
      </div>
      <div class="delete-cancel">
        <i class="fa-solid fa-xmark"></i>
      </div>
    </div>

    <script src="<?= BASE_URL; ?>public/js/dashboard/dashboard.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById("managerform");

        const nameInput = document.getElementById("namemanager");
        const firstnameInput = document.getElementById("firstmanager");
        const emailInput = document.getElementById("mailmanager");
        const addresseInput = document.getElementById("addressmanager");
        const phoneInput = document.getElementById("phonemanager");
        const usernameInput = document.getElementById("usernamemanager");

        const nameError = document.getElementById("nameError");
        const prenomError = document.getElementById("prenomError");
        const mailError = document.getElementById("mailError");
        const phoneError = document.getElementById("phoneError");
        const addresseError = document.getElementById("addresseError");
        const usernameError = document.getElementById("usernameError");

        nameInput.addEventListener("blur", function() {
          if (nameInput.value.trim() === "") {
            nameError.style.display = "block";
            nameError.textContent = "Le nom est requis";
          } else {
            nameError.style.display = "none";
          }
        });

        firstnameInput.addEventListener("blur", function() {
          if (firstnameInput.value.trim() === "") {
            prenomError.style.display = "block";
            prenomError.textContent = "Le prénom est requis";
          } else {
            prenomError.style.display = "none";
          }
        });

        usernameInput.addEventListener("blur", function() {
          if (usernameInput.value.trim() === "") {
            usernameError.style.display = "block";
            usernameError.textContent = "Le nom d'utilisateur est requis";
          } else {
            usernameError.style.display = "none";
          }
        });

        emailInput.addEventListener("blur", function() {
          if (emailInput.value.trim() === "") {
            mailError.style.display = "block";
            mailError.textContent = "L'email est requis";
          } else {
            mailError.style.display = "none";
          }
        });

        phoneInput.addEventListener("blur", function() {
          if (phoneInput.value.trim() === "") {
            phoneError.style.display = "block";
            phoneError.textContent = "Le numéro de téléphone est requis";
          } else {
            phoneError.style.display = "none";
          }
        });

        addresseInput.addEventListener("blur", function() {
          if (addresseInput.value.trim() === "") {
            addresseError.style.display = "block";
            addresseError.textContent = "L'addresse est requis";
          } else {
            addresseError.style.display = "none";
          }
        });

        form.addEventListener("submit", function(event) {
          let valid = true;

          // Vérification du nom
          if (nameInput.value.trim() === "") {
            nameError.style.display = "block";
            nameError.textContent = "Le nom est requis";
            valid = false;
          }

          // Vérification du prénom
          if (firstnameInput.value.trim() === "") {
            prenomError.style.display = "block";
            prenomError.textContent = "Le prénom est requis";
            valid = false;
          }

          // Vérification de l'email
          if (emailInput.value.trim() === "") {
            mailError.style.display = "block";
            mailError.textContent = "L'email est requis";
            valid = false;
          }

          // Vérification du numéro de téléphone
          if (phoneInput.value.trim() === "") {
            phoneError.style.display = "block";
            phoneError.textContent = "Le numéro de téléphone est requis";
            valid = false;
          }

          if (!valid) {
            event.preventDefault(); // Empêche l'envoi du formulaire si des erreurs sont présentes
          }
        });
      });
    </script>
</body>


</html>