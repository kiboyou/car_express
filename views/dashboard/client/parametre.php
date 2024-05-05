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
    href="../../../public/source/images/logo/logoB.png"
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
    <link rel="stylesheet" href="../../../public/styles/dahboard.css">
    <!-- JS LINK -->
  
    <!-- TITRE DE LA PAGE -->
    <title>CarExpress | dashboard-admin</title>

  </head>
  <!-- BODY -->
  <body>
    <section class="container">
      <!-- PARTIE 1 GAUCHE -->
      <div class="left">
        <!-- LOGO DU CENTRE CULTUREL COMOE -->
        <div class="logo">
          <img src="../../../public/source/images/logo/logoB.png" alt="logo du centre comoe" />
        </div>
        <!-- LISTE DES OPTIONS MENU -->
        <div class="list">
          <ul>
            <!-- OPTION ACCEUIL -->
            <a href="./dashboard.html"
              ><li >
                <i class="fa-solid fa-chart-line"></i> Dashboard
              </li></a
            >
           
            <!-- OPTION RESERVATION -->
            <a href="./list-reservation.html"
              ><li>
                <i class="fa-solid fa-magnifying-glass-chart"></i> Reservation
              </li></a
            >
            <!-- OPTION FACTURE -->
            <a href="./list-facture.html"
              ><li><i class="fa-solid fa-square-poll-vertical"></i> Facture</li></a
            >
             <!-- OPTION RECU -->
             <a href="./list-recu.html"
             ><li><i class="fa-solid fa-square-poll-vertical"></i> Reçu</li></a>

             <!-- OPTION PARAMETRE - PROFILE -->
              <a href="./parametre.html"
              ><li class="menu-select"><i class="fa-solid fa-gear"></i> Parametre</li></a>
          </ul>        
        </div>
        <!-- DECONNECTION -->
        <div class="disconnect">
          <a href="../index.html"><button>Se deconnecter</button></a>
        </div>
      </div>
       <!-- PARTIE 2 DROITE -->
       <div class="rigth">
        <!-- ADMIN INFO -->
        <div class="head">
          <div>
            <img src="../../../public/source/images/Ellipse 1.png" alt="photo de profil" />
            <p>Ouattara kiboyou M.</p>
          </div>
        </div>
        <!-- LIST OF ITEM -->
        
      <script src="../../../public/js/dashboard/dashboard.js"></script>
  </body>
</html>
