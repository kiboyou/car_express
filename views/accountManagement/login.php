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
  <link
    rel="shortcut icon"
    href="../../public/source/images/logo/logoB.png"
    type="image/x-icon"
  />
  <link
    href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
    rel="stylesheet"
  />
  <!-- ICONS LINK -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
    integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />
    <!-- CSS FILE -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>public/styles/account.css">
    <!-- JS LINK -->
  
    <!-- TITRE DE LA PAGE -->
    <title>CarExpress | login</title>
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
                <li><a href="<?= url('api/View/listcar'); ?>">Cars</a></li>
            </ul>
            <li class="Deconnexion">
                <a href="./login.html" >Deconnexion</a>
            </li>
           
        </div> -->

        <!-- USER NON CONNCTER  -->

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
          <form action="#" class="form" id="form1">
            <h2 class="form__title">Inscription</h2>
            <input type="text" placeholder="Nom" class="input" />
            <input type="text" placeholder="Prenom" class="input" />
            <input type="email" placeholder="Email" class="input" />
            <input type="number" placeholder="Numero de telephone" class="input" />
            <input type="password" placeholder="mote de passe" class="input" />
            <input type="password" placeholder="confirm ton mote de passe" class="input" />
            <button class="btn">S'incrire</button>
          </form>
        </div>
      
        <!-- Sign In -->
        <div class="container__form container--signin">
          <form action="#" class="form" id="form2">
            <h2 class="form__title">Connexion</h2>
            <input type="email" placeholder="Email / Username pour admin" class="input" />
            
            <input type="password" placeholder="mote de passe" class="input" />
            <a href="#" class="link">mot de passe oublié ?</a>
            <button class="btn">Se connecter</button>
          </form>
        </div>
      
        <!-- Overlay -->
        <div class="container__overlay">
          <div class="overlay">
            <div class="overlay__panel overlay--left">
              <button class="btn" id="signIn">Se connecter</button>
            </div>
            <div class="overlay__panel overlay--right">
              <button class="btn" id="signUp">S'incrire</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="<?= BASE_URL; ?>public/js/accountManagement/account.js"></script>
  </body>
</html>
