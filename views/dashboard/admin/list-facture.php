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
              <li class="menu-select"><i class="fa-solid fa-square-poll-vertical"></i> Facture</li>
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
          <p class="title">Listes des factures </p>
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
          <button>ajouter +</button>
          <button class="refresh">refresh @</button>
        </div>

        <!-- REPERES -->
        <div class="repere-client">
          <p>Client</p>
          <p>Voiture</p>
          <p>nombre de jours </p>
          <p>Prix unitaire</p>
          <p>Prix total</p>
          <p>Status</p>
          <p>Actions</p>
        </div>

        <!-- LISTE DES PATIENTS -->
        <div class="list-client">
          <!-- Patient -->
          <?php foreach ($invoice as $data) : ?>
            <div class="client">
              <p><?= $data['lastnamecustomer'] ?></p>
              <p><?= $data['namecar'] ?></p>
              <p><?= $data['nbrejours'] ?></p>
              <p><?= $data['prixunitaire'] ?></p>
              <p><?= $data['total'] ?></p>
              <!-- <p class="status">En cours...</p> -->
              <!-- <p class="status_ok">valider</p> -->
              <?= ($data['statutfacture'] == "non payé") ? '<p class="status">Non Payé</p>' : '<p class="status_ok">Payé</p>' ?>
              <div>
                <!-- VALIDER -->
                <a href="<?= url('invoicepdf', ['client' => $data['idclient'], 'facture' => $data['idfacture']]) ?>"><button class="set"><i class="fa-solid fa-print"></i></button></a>
                <!-- <a href="#"><button id="open-modal" class="set" data-factureID="<?= $data['idfacture']; ?>"><i class="fa-solid fa-file-invoice-dollar"></i></button></a> -->
                <button class="showInvoice" data-factureid="<?= $data['idfacture']; ?>"><i class="fa-solid fa-file-invoice-dollar"></i></button>

              </div>
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
      <div class="admining-box" id="invoice-form">
        <p>Creer un reçu </p>
        <form id="paymentForm" action="<?= url('paiement') ?>" method="post">
          <label>Numero de facture</label>
          <select id="factureID" name="factureID">
            <option selected>Choisir numero de facture</option>
            <?php foreach ($invoice as $data) : ?>
              <?php if ($data['statutfacture'] == 'non payé') : ?>
                <option value="<?= $data['idfacture']; ?>" data-montant-total="<?= $data['montanttotalapayer']; ?>" data-montant-restant="<?= $data['resteapayer']; ?>" data-montant-paye="<?= $data['amount_advance']; ?>"><?= $data['idfacture']; ?></option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>

          <label for="">Total à payer</label>
          <input type="number" id="amount_total" name="amount_total" placeholder="Montant à payer" disabled>

          <label for="">Montant Restant à Payer</label>
          <input type="number" id="amount_reste" name="amount_reste" placeholder="Montant restant" disabled>

          <label for="">Montant effectué</label>
          <input type="number" id="amount_paid" name="amount_paid" placeholder="Montant payé">

          <label for="">Reference de paiment</label>
          <input type="text" id="reference" name="reference" placeholder="reference de paiement">

          <input type="hidden" id="amount_paye" name="amount_paye">
          <input type="hidden" id="reste" name="reste">
          <input type="hidden" id="total" name="total">

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
        <p>Hello world <span id="factureid"></span> </p>
        <button>Confirmer</button>
      </div>
      <div class="delete-cancel">
        <i class="fa-solid fa-xmark"></i>
      </div>
    </div>

    <script src="<?= BASE_URL; ?>public/js/dashboard/dashboard.js"></script>
    <!-- <script src="<?= BASE_URL; ?>public/js/dashboard/dash.js"></script> -->
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        // Disable amount_paid initially
        const amountPaidInput = document.getElementById('amount_paid');
        const referPaid = document.getElementById('reference');

        referPaid.disabled = true;
        amountPaidInput.disabled = true;

        // Event listener for invoice selection
        const factureIDSelect = document.getElementById('factureID');
        factureIDSelect.addEventListener('change', function() {
          // valeur des attribut data
          const selectedOption = factureIDSelect.options[factureIDSelect.selectedIndex];
          const montantTotal = selectedOption.getAttribute('data-montant-total');
          const montantRestant = selectedOption.getAttribute('data-montant-restant');
          const montantPaye = selectedOption.getAttribute('data-montant-paye');

          //complete montant total
          document.getElementById('amount_total').value = montantTotal;
          document.getElementById('total').value = montantTotal;
          //montant restant
          document.getElementById('amount_reste').value = montantRestant;
          document.getElementById('reste').value = montantRestant;
          //montant deja paye
          document.getElementById('amount_paye').value = montantPaye;

          // Enable amount_paid when an invoice is selected
          amountPaidInput.disabled = !montantTotal; // Disable if no montantTotal
          referPaid.disabled = !montantTotal;
        });

        // Event listener for form submission
        document.getElementById('paymentForm').addEventListener('submit', function(event) {
          const amountTotal = document.getElementById('amount_total').value;
          const amountPaid = amountPaidInput.value;
          const amountRest = document.getElementById('amount_reste').value;
          const referPaidValue = referPaid.value;

          // Convert amountPaid and amountReste to float
          const amountPaidFloat = parseFloat(amountPaid);
          const amountRestFloat = parseFloat(amountRest);

          if (amountTotal.trim() === '' || amountPaid.trim() === '' || referPaidValue.trim() === '') {
            event.preventDefault();
            alert('Veuillez remplir tous les champs.');
          }
          if (amountPaid <= 0 || amountPaidFloat > amountRestFloat) {
            event.preventDefault();
            alert('Le montant a payé ne doit etre null ou  superieur au montant restant.');
          }
        });

        // Watch for changes in amount_total to enable/disable amount_paid
        document.getElementById('amount_total').addEventListener('input', function() {
          const amountTotal = this.value;
          amountPaidInput.disabled = !amountTotal; // Disable if no amountTotal
          referPaid.disabled = !montantTotal;
        });
      });
    </script>
</body>

</html>