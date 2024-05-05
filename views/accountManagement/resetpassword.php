<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
// if(isset($_SESSION[''])){
//   header('Location: ' . url());
//   exit;
// }
?>
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
  <link rel="shortcut icon" href="../../public/source/images/logo/logoB.png" type="image/x-icon" />
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet" />
  <!-- ICONS LINK -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- CSS FILE -->
  <link rel="stylesheet" href="<?= BASE_URL; ?>public/styles/account.css">
  <!-- JS LINK -->

  <!-- TITRE DE LA PAGE -->
  <title>CarExpress | reset password</title>
</head>

<body>
  <div class="section1">
    <div class="navbar">
      <div class="logo">
        <a href="<?= url('index'); ?>"><img src="<?= BASE_URL; ?>public/source/images/logo/logoR.png" alt=""></a>
      </div>

      <!-- USER CONNECTER -->

      <!-- <div class="menu">
            <ul>
                <li><a href="<?= url('index'); ?>" id="active">Acceuil</a></li>
                <li><a href="<?= url('cars'); ?>">Cars</a></li>
            </ul>
            <li class="Deconnexion">
                <a href="./login.html" >Deconnexion</a>
            </li>
           
        </div> -->

      <!-- USER NON CONNCTER  -->

      <!-- <div class="menu">
        <ul>
          <li><a href="<?= url('index'); ?>" id="active">Acceuil</a></li>
          <li><a href="<?= url('cars'); ?>">Cars</a></li>
        </ul>
        <li>
          <a href="<?= url('login'); ?>">Se conncter</a>
        </li>

      </div> -->
      <?php if (isset($_SESSION['customer'])) { ?>
        <div class="menu">
          <ul>
            <li><a href="<?= url('index'); ?>" id="active">Acceuil</a></li>
            <li><a href="<?= url('cars'); ?>">Cars</a></li>
            <li><a href="<?= url('404'); ?>">Mon dashboard</a></li>
          </ul>
          <li class="Deconnexion">
            <a href="<?= url('logout'); ?>">Deconnexion</a>
          </li>
        </div>
      <?php } else { ?>
        <div class="menu">
          <ul>
            <li><a href="<?= url('index'); ?>" id="active">Acceuil</a></li>
            <li><a href="<?= url('cars'); ?>">Cars</a></li>
          </ul>
          <li>
            <a href="<?= url('login'); ?>">Se connecter</a>
          </li>
        </div>
      <?php } ?>

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
    <div class="container right-panel-active">
      <!-- Sign Up -->
      <div class="container__form container--signup">
        <form action="<?= url('updatepassword') ?>" class="form" method="post" id="resetForm">
          <h2 class="form__title">RESET PASSWORD</h2>
          
          <input type="password" placeholder="mote de passe" id="passwordclient" class="input" name="passwordclient" />
          <span id="passwordError" style="color: red;"></span>
          <input type="password" placeholder="confirm ton mot de passe" id="confpasswordclient" class="input" name="confirmpassclient" />
          <span id="confpasswordError" style="color: red;"></span>
          <input type="hidden" id="idmanager" class="input" name="idmanager" value="<?= $_GET['idmanager'] ?>" />
          <button class="btn">S'incrire</button>
        </form>
      </div>

      <!-- Overlay -->
      <div class="container__overlay">
        <div class="overlay">
          <!-- <div class="overlay__panel overlay--left">
            <button class="btn" id="signIn">Se connecter</button>
          </div> -->
          <div class="overlay__panel overlay--right">
            <button class="btn" id="signUp">S'incrire</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <div>
    <form action="<?= url('api/Admin/registeradmin'); ?>" method="post">
      <input type="text" name="username" id="" placeholder="username">
      <input type="text" name="password" id="" placeholder="password">
      <button type="submit">valider</button>
    </form>
  </div> -->
  <script src="<?= BASE_URL; ?>public/js/accountManagement/account.js"></script>
  <!-- <script src="<?= BASE_URL; ?>public/js/accountManagement/validate.js"></script> -->
</body>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("resetForm");

    const passwordInput = document.getElementById("passwordclient");
    const confirmPasswordInput = document.getElementById("confpasswordclient");

    const passwordError = document.getElementById("passwordError");
    const confirmPasswordError = document.getElementById("confpasswordError");

    form.addEventListener("submit", function(event) {
      let valid = true;

      // Vérification du mot de passe
      if (passwordInput.value.trim() === "") {
        passwordError.textContent = "Le mot de passe est requis";
        valid = false;
      } else if (passwordInput.value.length < 8) {
        passwordError.textContent = "Le mot de passe doit contenir au moins 8 caractères";
        valid = false;
      } else if (passwordInput.value !== confirmPasswordInput.value) {
        confirmPasswordError.textContent = "Les mots de passe ne correspondent pas";
        valid = false;
      } else {
        passwordError.textContent = "";
        confirmPasswordError.textContent = "";
      }

      if (!valid) {
        event.preventDefault(); // Empêche l'envoi du formulaire si des erreurs sont présentes
      }
    });
  });
</script>

</html>