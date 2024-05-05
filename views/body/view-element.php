<?php
session_start();
?>
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
    <link rel="stylesheet" href="<?= BASE_URL; ?>public/styles/modal.css">
    <!-- JS LINK -->
    <!-- TITRE DE LA PAGE -->
    <title>CarExpress | view-element</title>

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
                    <li><a href="<?= url('cars'); ?>">Cars</a></li>
                </ul>
                <li class="Deconnexion">
                    <a href="<?= url('login'); ?>" >Deconnexion</a>
                </li>
               
            </div> -->

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
                        <li><a href="<?= url('dashCustomer'); ?>">Mon dashboard</a></li>
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

                </div>


            </div>
            <div class="cardImage">
                <!-- <img src="../public/source/images/bgK.png" id="imageCard"> -->
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
            <section class="search"></section>
            <span id="info_voiture"></span>
            <div class="section-view1">
                <div class="titre">
                    Caractéristiques de la voiture
                </div>
                <div class="besoins">
                    <div class="besoins-item-groupe besoins-item1">
                        <?php $imgPath = BASE_URL . STORAGE . $detailcar['vehiculepicture']; ?>
                        <img src="<?= $imgPath; ?>" alt="">
                    </div>

                    <div class="besoins-item-groupe besoins-item2">
                        <div class="item-1">
                            <div class="titreBesoin">
                                Nom de la voiture
                            </div>
                            <div class="card-info">
                                <p><span>Modele : </span> <?= $detailcar['namemodele'] ?> </p>
                                <p><span>Marque : </span> <?= $detailcar['namemarque'] ?> </p>
                                <p><span>Transmission : </span><?= ($detailcar['transmission'] == 'auto') ? 'Automatique' : 'Manuelle' ?></p>
                                <p><span>Categorie : </span><?= ($detailcar['categorie'] == 'eco') ? 'Economique' : (($detailcar['categorie'] == 'suv') ? 'SUV' : 'Luxueuse') ?></p>
                                <p><span>Prix : </span><?= $detailcar['rentprice'] ?> Dinars</p>
                                <p><span>Disponible : </span> <?= ($detailcar['disponibilite'] == 1) ? '<span id="oui">Oui</span>' : '<span id="non">Non</span>' ?></p>

                            </div>
                            <div class="texteRL">
                                Envie de prendre le volant et de partir à l'aventure ? Ne cherchez pas plus loin ! Avec notre service de location de voitures,
                                vous pouvez louer le véhicule parfait pour votre prochain voyage en quelques étapes simples.
                                vous pouvez louer le véhicule parfait pour votre prochain voyage en quelques étapes simples.

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <span id="info_formulaire"></span>
            <div class="section-view2">
                <div class="titre_produits">
                    Formulaire de reservation
                </div>
                <div class="formulaire">
                    <form action="">
                        <div class="form-groupe form1">
                            <div class="input1">
                                <input type="text" name="" id="" placeholder="Entrez votre nom">
                            </div>
                            <div class="input1">
                                <input type="text" name="" id="" placeholder="Entrez votre prenom">
                            </div>
                            <div class="input1">
                                <input type="email" name="" id="" placeholder="Entrez votre email">
                            </div>
                        </div>
                        <div class="form-groupe form2">
                            <div class="input1">
                                <input type="text" name="" id="" placeholder="Entrez votre numero de telephon">
                            </div>
                            <div class="input1">
                                <input type="text" name="" id="" placeholder="Entrez votre adresse">
                            </div>
                            <div class="select">
                                <select name="" id="">
                                    <option value="">choisissez votre mode de paiement</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-groupe form3">
                            <!-- <div class="select">
                                <select name="" id="">
                                    <option value="">choisissez le nom de votre voiture</option>
                                    <option value=""></option>
                                    <option value=""></option>
                                    <option value=""></option>
                                </select>
                            </div> -->
                            <div class="input1">
                                <input type="text" name="" id="" placeholder="Entrez la marque votre voitutre" value="<?= $detailcar['namemarque'] ?>">
                            </div>
                            <div class="input1">
                                <input type="text" name="" id="" placeholder="Entrez le model votre voiture" value="<?= $detailcar['namemodele'] ?>">
                            </div>
                        </div>
                        <div class="form-groupe form4">
                            <div class="input1">
                                <label for="date1">date de debut</label>
                                <input type="date" name="" id="date1">
                            </div>
                            <div class="input1">
                                <label for="date2">date de fin</label>
                                <input type="date" name="" id="date2">
                            </div>
                        </div>
                        <input type="hidden" name="idcustomer" value="<?= $_SESSION['customer']['id'] ?>">
                        <div class="form-groupe form-btn">
                            <button id="effacer" type="reset">effacer le formulaire</button>
                            <button id="valider">valider le formulaire</button>
                        </div>
                    </form>
                </div>
                </section>
        </main>
    </div>

    <!-- Fenêtre modale -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Veuillez vous connecter pour pouvoir valider le formulaire.</p><br>
        </div>
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
<!-- JavaScript pour contrôler le modal -->
<!-- <script>
    // Récupérer le bouton et le modal
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("openModalBtn");

    // Récupérer le bouton de fermeture
    var span = document.getElementsByClassName("close")[0];

    // Quand l'utilisateur clique sur le bouton, ouvrir le modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // Quand l'utilisateur clique sur le bouton de fermeture, fermer le modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // Quand l'utilisateur clique en dehors du modal, fermer le modal
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script> -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Récupérez la référence du bouton Valider
        var validerBtn = document.getElementById('valider');
        // Récupérez la référence de la fenêtre modale
        var modal = document.getElementById('myModal');

        // Ajoutez un gestionnaire d'événements au clic sur le bouton Valider
        validerBtn.addEventListener('click', function() {
            <?php if (empty($_SESSION['customer'])) : ?>
                // Affichez la fenêtre modale si l'utilisateur n'est pas connecté
                modal.style.display = 'block';
                validerBtn.disabled = true;
            <?php endif; ?>
        });

        // Ajoutez un gestionnaire d'événements pour fermer la fenêtre modale en cliquant sur le bouton de fermeture
        var closeBtn = modal.querySelector('.close');
        closeBtn.addEventListener('click', function() {
            modal.style.display = 'none';
            validerBtn.disabled = false;
        });
    });
</script>

</html>