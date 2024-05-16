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
              <li><i class="fa-solid fa-magnifying-glass-chart"></i> Inventaire</li>
            </a>
            <!-- OPTION VOITURE -->
            <a href="<?= url('car'); ?>">
              <li class="menu-select"><i class="fa-solid fa-square-poll-vertical"></i> Voiture</li>
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
          <p class="title">Listes des voitures</p>
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

        <!-- <?php include(VIEWS . 'includes/alerts.php'); ?> -->

        <!-- AJOUTER -->
        <div class="register">
          <button>ajouter voiture</button>
          <button class="button1">ajouter marque</button>
          <button class="button2">ajouter model</button>
        </div>

        <!-- REPERES -->
        <div class="repere-client">
          <p>Identification</p>
          <p>Categorie</p>
          <p>Marque</p>
          <p>Modèle</p>
          <p>Transmission</p>
          <p>disponible</p>
          <p>Actions</p>
        </div>

        <!-- LISTE DES PATIENTS -->
        <div class="list-client">
          <?php foreach ($cars as $datacar) : ?>
            <div class="client">
              <p><?= $datacar['matricule'] ?></p>
              <?= ($datacar['categorie'] == 'eco') ? '<p>Economique</p>' : (($datacar['categorie'] == 'suv') ? '<p>SUV</p>' : '<p>Luxueuse</p>') ?>
              <p><?= $datacar['namemarque'] ?></p>
              <p><?= $datacar['namemodele'] ?></p>
              <?= ($datacar['transmission'] == 'auto') ? '<p>Automatique</p>' : '<p>Manuelle</p>' ?>
              <!-- <p class="status">NON</p> -->
              <?= ($datacar['disponibilite'] == 1) ? '<p class="status_ok">Oui</p>' : '<p class="status">Non</p>' ?>

              <div>
                <!-- <a href="#"><button class="set"><i class=".los fa-solid fa-pen"></i></button></a> -->
                <a href="<?= url('available', ['matricule' => $datacar['matricule']])?>"><button class="del"><i class=".los fa-solid fa-pen"></i></button></a>
              </div>
            </div>
          <?php endforeach; ?>
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
        <p>Enregistrer une voiture</p>
        <form method="POST" action="<?= url('api/Admin/addvehicule'); ?>" enctype="multipart/form-data">

          <label>choisissez le modele</label>
          <select name="modele">
            <option selected>Selectionnez un modele</option>
            <?php foreach ($modele as $datamodele) : ?>
              <option value="<?= $datamodele['idmodele']; ?>"><?= $datamodele['vehicule']; ?></option>
            <?php endforeach; ?>
          </select>

          <label>choisissez la Categorie</label>
          <select name="categorie">
            <option selected>Selectionnez une categorie</option>
            <option value="eco">Economique</option>
            <option value="suv">S.U.V</option>
            <option value="luxe">Luxueuse</option>
          </select>

          <label>choisissez la Transmission</label>
          <select name="transmission">
            <option selected>Selectionnez une transmission</option>
            <option value="auto">Automatique</option>
            <option value="manuel">Manuelle</option>
          </select>

          <label>Image de la voiture</label>
          <input type="file" name="vehiculepicture" placeholder=""><br>

          <label for="vehiculeprice">Prix de location</label>
          <input type="text" name="vehiculeprice" placeholder="Prix de location par jour">

          <label>disponible</label>
          <select name="disponibilite">
            <option selected>Selectionnez une disponibilité</option>
            <option value="1">OUI</option>
            <option value="0">NON</option>
          </select>

          <button type="submit">Valider</button>
        </form>
      </div>
      <!-- Annuler l'enregistrenent -->
      <div class="admining-cancel">
        <i class="fa-solid fa-xmark"></i>
      </div>
    </div>

    <!-- Enregistrer une marque -->
    <div class="admining admining_marque">
      <!-- ajouter une marque -->
      <div class="admining-box">
        <p>Enregistrer une marque</p>
        <form method="post" id="marqueForm" action="<?= url('api/Admin/addmarque'); ?>">

          <label for="marque"></label>
          <input type="text" name="marque" id="marque" placeholder="Entrez le nom">

          <button type="submit">Valider</button>
        </form>
      </div>

      <!-- Annuler l'enregistrenent -->
      <div class="admining-cancel marque">
        <i class="fa-solid fa-xmark"></i>
      </div>
    </div>

    <div class="admining admining_model">
      <!-- ajouter une marque -->
      <div class="admining-box">
        <p>Enregistrer un model</p>
        <form method="POST" id="modelForm" action="<?= url('api/Admin/addmodele'); ?>">
          <label>choisissez une marque</label>
          <select name="marque" id="marqueSelect">
            <option selected>Selectionnez</option>
            <?php foreach ($marque as $datamarque) : ?>
              <option value="<?= $datamarque['idmarque']; ?>"><?= $datamarque['namemarque']; ?></option>
            <?php endforeach; ?>
          </select>
          <label for="modele"></label>
          <input type="text" name="modele" id="modele" placeholder="Entrez le model correspondant" disabled>
          <button type="submit">Valider</button>
        </form>
      </div>

      <!-- Annuler l'enregistrenent -->
      <div class="admining-cancel model">
        <i class="fa-solid fa-xmark"></i>
      </div>

    </div>

    <div class="admining admining_disponibilite">
      <!-- ajouter une marque -->
      <div class="admining-box">
        <p>Enregistrer une marque</p>
        <form method="post" id="" action="">

          <label for="marque"></label>
          <input type="text" name="marque" id="marque" placeholder="Entrez le nom">

          <button type="submit">Valider</button>
        </form>
      </div>

      <!-- Annuler l'enregistrenent -->
      <div class="admining-cancel available">
        <i class="fa-solid fa-xmark"></i>
      </div>
    </div>

    <!-- supprimer un element -->
    <!-- <div class="delete">
      <div class="delete-box">
        <i class="fa-solid fa-triangle-exclamation"></i>
        <form>
          <input type="hidden" id="idCar" name="idCar">
          <select name="disponible" id="disponible" required>
            <option selected>Choisir une disponibilité</option>
            <option value="1">Disponible</option>
            <option value="0">Indisponible</option>
          </select>
          <button type="submit">Confirmer</button>
        </form>
      </div>
      <div class="delete-cancel">
        <i class="fa-solid fa-xmark"></i>
      </div>
    </div> -->

    <script src="<?= BASE_URL; ?>public/js/dashboard/dashboard.js"></script>
    <script src="<?= BASE_URL; ?>public/js/dashboard/dashboard-car.js"></script>
    <script src="<?= BASE_URL; ?>public/js/reload.js"></script>
    <script src="<?= BASE_URL; ?>public/js/validate.js"></script>
</body>

</html>