<!DOCTYPE html>
<html lang="fr">
<!-- HEAD -->

<head>
  <!-- META -->
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
  <link rel="stylesheet" href="<?= BASE_URL; ?>public/styles/body.css">
  <!-- JS LINK -->


  <!-- TITRE DE LA PAGE -->
  <title>CarExpress | voiture</title>

</head>

<body>
  <div class="section1">
    <div class="navbar">
      <div class="logo">
        <a href="<?= url('index'); ?>"><img src="<?= BASE_URL; ?>public/source/images/logo/logoR.png" alt=""></a>
      </div>
      <!-- <div class="menu">
                <ul>
                    <li><a href="<?= url('index'); ?>" id="active">Acceuil</a></li>
                    <li><a href="<?= url('api/View/listcar'); ?>">Cars</a></li>
                    <li><a href="../dashboard/client/dashboard.html">Mon dashboard</a></li>
                </ul>
                <li class="Deconnexion">
                    <a href="<?= url('loginuser'); ?>" >Deconnexion</a>
                </li>
               
            </div> -->

      <div class="menu">
        <ul>
          <li><a href="<?= url('index'); ?>" id="active">Acceuil</a></li>
          <li><a href="<?= url('api/View/listcar'); ?>">Cars</a></li>
        </ul>
        <li>
          <a href="<?= url('loginuser'); ?>">Se conncter</a>
        </li>

      </div>

    </div>
    <div class="container1">
      <div class="textAcceuil">
        <div>Louez votre voiture dès aujourd'hui !</div>
        <div>
          <p class="annonce">
            Bienvenue sur notre site de location de voitures. <br>
            Nous sommes ravis de vous offrir une exdivérience de location simple, rapide et pratique.
          </p>
          <div>
            <a href="" class="annonceLink">se connecter</a>
          </div>
        </div>


      </div>
      <div class="cardImage">
        <!-- <img src="<?= BASE_URL; ?>public/source/images/bgK.png" id="imageCard"> -->
      </div>
    </div>
  </div>
  <!-- body par cadre pour affichage des produits  -->
  <div class="section2">
    <div class="overview-1-header_text">
      <!-- TITRE H1 DE HEADER -->
      <h1>Trouver votre voiture en un clic !</h1>
      <!-- SOUS-TEXTE DU H1 DE HEADER -->
      <p>
        nous sommes ravis de vous offrir une exdivérience de location simple, rapide et pratique.
    </div>
  </div>

  <div class="section3">
    <main class="overview-1">
      <!-- BARREE DE RECHERHCE ET FILTRE -->
      <section class="search">
        <form action="#">
          <!-- FORM PART 1 -->
          <!-- BARRE DE RECHERCHE -->
          <input type="search" placeholder="Rechercher une voiture" name="#" />
          <!-- LE BUDGET QUE DISPOSE LE CLIENT   -->
          <select name="">
            <option value="">Votre Budget</option>
            <option value="">0 - 5000</option>
            <option value="">5000 - 10000</option>
            <option value="">10000 - 50000</option>
            <option value="">50000 - 100000</option>
            <option value="">100000 - 500000</option>
            <option value="">500000 - +1000000</option>
          </select>
          <!-- SELECT POUR LA CATEGORIE -->
          <select name="">
            <option value="">Transmission</option>
            <option value="automatique">Automatique</option>
            <option value="manuelle">Manuelle</option>
          </select>


          <button type="submit">Rechercher</button>
        </form>
      </section>
      <!-- TITRE GLOBAL DES CARTES ANNONCES -->
      <h3>Nos voitures</h3>
      <!-- SECTION DES CARTES ANNONCES -->
      <section class="container">
        <!-- CARD -->
        <?php foreach ($cars as $datacar) : ?>
          <div class="card">
            <div class="card-img">
              <?php $imgPath = BASE_URL . STORAGE . $datacar['vehiculepicture']; ?>
              <img src="<?= $imgPath; ?>" alt="house-image" />
            </div>
            <div class="card-title">
              <p>Nom de la voiture</p>
            </div>
            <div class="card-info">
              <p><span>Modele: </span> <?= $datacar['namemodele'] ?> </p>
              <p><span>Marque: </span> <?= $datacar['namemarque'] ?> </p>
              <p><span>Transmission: </span><?= $datacar['transmission'] ?></p>
              <p><span>Categorie: </span><?= ($datacar['categorie'] == 'eco') ? '<p>Economique</p>' : (($datacar['categorie'] == 'suv') ? '<p>SUV</p>' : '<p>Luxueuse</p>') ?></p>
            </div>
            <div class="card-sub">
              <div class="card-sub_info">
                <p><span>Disponible: </span><?= ($datacar['disponibilite'] == 1) ? 'Oui' : 'Non' ?></p>
                <!-- <p><span>Note: </span>4.2/5</p> -->
              </div>
              <div class="card-sub_btn">
                <a href="<?= url('api/View/detailscar', ['matricule' => urlencode($datacar['matricule'])]); ?>#info_voiture"><button id="voir">voir +</button></a>
                <a href="<?= url('api/View/detailscar', ['matricule' => urlencode($datacar['matricule'])]); ?>#info_formulaire"><button>Reserver</button></a>
              </div>
              <div class="card-type">
                <p><?= $datacar['rentprice'] ?> Dinars</p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

        <!-- end -->

      </section>
      <section class="pagination">
        <a href="#"><button>
            <i class="fa-solid fa-arrow-left-long"></i> Page 1
          </button></a>
        <a href="#"><button>Page 2 <i class="fa-solid fa-arrow-right-long"></i></button></a>
      </section>
    </main>
  </div>

  <div class="section6">
    <footer>
      <div class="contacts">
        <p>Contacts</p>
        <a href="tel:+21658486482"><i class="fa-solid fa-phone"></i> +216 58486482</a>
        <a href="mailto:services@carexpress.ci"><i class="fa-solid fa-envelope"></i> services@carexpress.ci</a>
      </div>
      <div class="partenaire">
        <p>Partenaire(s)</p>
        <img src="<?= BASE_URL; ?>public/source/images/logo/logoR.png" alt="logo-partenaires" />
      </div>
      <div class="Newletters">
        <p>Newletters</p>
        <form action="#">
          <input placeholder="E-mail" type="email" name="#" />
          <button type="submit">Souscrire</button>
          <p>
            Ne manquez plus jamais les dernières nouveautés et offres exclusives !
            Abonnez-vous dès maintenant pour bénéficier d'avantages spéciaux réservés à nos membres
          </p>
        </form>
      </div>
    </footer>
  </div>
</body>

</html>