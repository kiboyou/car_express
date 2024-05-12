<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
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
    <link rel="shortcut icon" href="<?= BASE_URL; ?>public/source/images/logo/logoB.png" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet" />
    <!-- ICONS LINK -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS FILE -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>public/styles/main.css">
    <!-- JS LINK -->


    <!-- TITRE DE LA PAGE -->
    <title>CarExpress | Acceuil</title>

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
                    <li><a href="./acceuil.html" id="active">Acceuil</a></li>
                    <li><a href="./body/car.html">Cars</a></li>
                    <li><a href="./dashboard/client/dashboard.html">Mon dashboard</a></li>
                </ul>
                <li class="Deconnexion">
                    <a href="./accountManagement/login.html" >Deconnexion</a>
                </li>
               
            </div> -->

            <!-- USER NON CONNCTER  -->

            <!-- <div class="menu">
                <ul>
                    <li><a href="<?= url('index'); ?>" id="active">Acceuil</a></li>
                    <li><a href="<?= url('cars'); ?>">Cars</a></li>
                </ul>
                <li>
                    <a href="<?= url('login'); ?>">Se connecter</a>
                </li>
            </div> -->
            <?php if (isset($_SESSION['customer'])) { ?>
                <div class="menu">
                    <ul>
                        <li><a href="<?= url('index'); ?>" id="active">Acceuil</a></li>
                        <li><a href="<?= url('cars'); ?>">Cars</a></li>
                        <li><a href="<?= url('dashCustomer', ['id' => $_SESSION['customer']['id']]); ?>">Mon dashboard</a></li>
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
                        <!-- <a href="<?= url('login'); ?>" class="annonceLink">se connecter</a> -->
                        <?= isset($_SESSION['customer']) ? '<a href="' . url('dashCustomer', ['id' => $_SESSION['customer']['id']]) . '" class="annonceLink">voir mon dashboard</a>' : '<a href="' . url('login') . '" class="annonceLink">se connecter</a>' ?>
                    </div>
                </div>


            </div>
            <div class="cardImage">
                <img src="<?= BASE_URL; ?>public/source/images/bgK.png" id="imageCard">
            </div>
        </div>
    </div>
    <div class="section2">
        <div class="titre">
            Grâce à nous, vous bénéficiez de
        </div>
        <div class="benefice">
            <div class="benefice-item-groupe benefice-item1">
                <img src="<?= BASE_URL; ?>public/source/images/benefice/choix.svg" alt="">
                <div class="texte">
                    Large choix de véhicules
                </div>
                <p>
                    Offrir une variété de véhicules permet aux clients de choisir celui qui correspond le mieux à leurs besoins spécifiques
                </p>
            </div>
            <div class="benefice-item-groupe benefice-item2">
                <img src="<?= BASE_URL; ?>public/source/images/benefice/reservation.png" alt="">
                <div class="texte">
                    Facilité de réservation en ligne
                </div>
                <p>
                    Un site de location de véhicules offre aux clients la possibilité de réserver leur voiture en ligne
                </p>
            </div>
            <div class="benefice-item-groupe benefice-item3">
                <img src="<?= BASE_URL; ?>public/source/images/benefice/T.png" alt="">
                <div class="texte">
                    Transparence des tarifs et des conditions
                </div>
                <p>
                    La transparence des tarifs et des conditions de location est essentielle pour établir la confiance avec les clients
                </p>
            </div>
            <div class="benefice-item-groupe benefice-item4">
                <img src="<?= BASE_URL; ?>public/source/images/benefice/Sp.png" alt="">
                <div class="texte">
                    Service clientèle réactif
                </div>
                <p>
                    Un bon service clientèle est essentiel pour assurer la satisfaction des clients
                </p>
            </div>
        </div>
    </div>
    <div class="section3">
        <div class="titre">
            Vous avez la posibilité de
        </div>
        <div class="besoins">
            <div class="besoins-item-groupe besoins-item1">
                <div class="item-1">
                    <div class="titreBesoin">
                        Réserver une voiture maintenant
                    </div>
                    <div class="texteRL">
                        Prêt à prendre la route ? Ne perdez pas une minute de plus ! Avec notre service de location de voitures,
                        vous pouvez réserver votre véhicule idéal en quelques clics seulement. Que vous planifiez un voyage d'aventure,
                        un déplacement professionnel ou des vacances en famille, nous avons la voiture parfaite pour vous.
                    </div>
                    <div class="btnRL">
                        <a href="<?= url('cars'); ?>" class="reservatLink">voir plus pour la reservation</a>
                    </div>
                </div>
            </div>
            <div class="besoins-item-groupe besoins-item2">
                <div class="item-1">
                    <div class="titreBesoin">
                        Louer une voiture maintenant
                    </div>
                    <div class="texteRL">
                        Envie de prendre le volant et de partir à l'aventure ? Ne cherchez pas plus loin ! Avec notre service de location de voitures,
                        vous pouvez louer le véhicule parfait pour votre prochain voyage en quelques étapes simples.
                    </div>
                    <div class="btnRL">
                        <a href="<?= url('cars'); ?>" class="reservatLink">voir plus pour louer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section4">
        <div class="titre_produits">
            Quelques produits
        </div>
        <div class="produits">
            <div class="part1">
                <div class="produits-item-groupe produits-item1">
                    <div class="imgVoiture">
                        <img src="<?= BASE_URL; ?>public/source/images/produit/test1.jpeg" alt="">
                    </div>
                    <div class="presentationVoiture">
                        <div class="titreVoiture">
                            Voiture Économique
                        </div>
                        <div class="pr">
                            Les voitures économiques sont idéales pour les déplacements en ville ou les courts trajets.
                            Elles offrent une consommation de carburant efficace,
                            ce qui les rend faciles à garer dans les espaces restreints
                        </div>
                        <div class="btnCont">
                            <a href="<?= url('cars'); ?>" class="btnVoiture">voir plus</a>
                        </div>
                    </div>
                </div>
                <div class="produits-item-groupe produits-item2">
                    <div class="imgVoiture">
                        <img src="<?= BASE_URL; ?>public/source/images/produit/Maybach2.jpeg" alt="">
                    </div>
                    <div class="presentationVoiture">
                        <div class="titreVoiture">
                            Voiture Cabriolet
                        </div>
                        <div class="pr">
                            Les cabriolets sont parfaits pour les journées ensoleillées et les escapades décontractées.
                            Ils offrent la possibilité de conduire avec le toit ouvert
                        </div>
                        <div class="btnCont">
                            <a href="<?= url('cars'); ?>" class="btnVoiture">voir plus</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="part2">
                <div class="produits-item-groupe produits-item3">
                    <div class="imgVoiture">
                        <img src="<?= BASE_URL; ?>public/source/images/produit/Maybach.jpeg" alt="">
                    </div>
                    <div class="presentationVoiture">
                        <div class="titreVoiture">
                            Voiture de luxe
                        </div>
                        <div class="pr">
                            Les voitures de luxe offrent un niveau supérieur de confort, de performance et de raffinement.
                            Elles sont équipées des dernières technologies et des finitions haut de gamme
                        </div>
                        <div class="btnCont">
                            <a href="<?= url('cars'); ?>" class="btnVoiture">voir plus</a>
                        </div>
                    </div>
                </div>
                <div class="produits-item-groupe produits-item4">
                    <div class="imgVoiture">
                        <img src="<?= BASE_URL; ?>public/source/images/produit/lux.jpeg" alt="">
                    </div>
                    <div class="presentationVoiture">
                        <div class="titreVoiture">
                            Voiture Berline
                        </div>
                        <div class="pr">
                            Les berlines offrent un espace intérieur généreux et un confort de conduite supérieur.
                            Elles sont idéales pour les voyages sur de longues distances ou les déplacements professionnels
                        </div>
                        <div class="btnCont">
                            <a href="<?= url('api/View/listcar'); ?>" class="btnVoiture">voir plus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section5">
        <div class="titre">
            Quelques temoinages des clients
        </div>
        <div class="temoinages">
            <div class="temoinages-groupe">
                <div class="temoinages-groupe-iten1">
                    ``
                </div>
                <div class="temoinages-groupe-iten2">
                    Depuis que j'ai pris possession de ma nouvelle voiture, je n'ai eu que des expériences positives.
                    La voiture est en parfait état et correspond exactement à ce que je recherchais.
                    Je me sens en sécurité et confiante chaque fois que je prends la route.

                </div>
                <div class="temoinages-groupe-iten3 img1">
                    <!-- <img src="../public/source/images/temoin/kib.jpeg" alt=""> -->
                </div>
                <div class="nomCommentateur">
                    Kiboyou Mohamed
                </div>
            </div>
            <div class="temoinages-groupe">
                <div class="temoinages-groupe-iten1">
                    ``
                </div>
                <div class="temoinages-groupe-iten2">
                    Depuis que j'ai pris possession de ma nouvelle voiture, je n'ai eu que des expériences positives.
                    La voiture est en parfait état et correspond exactement à ce que je recherchais.
                    Je me sens en sécurité et confiante chaque fois que je prends la route.

                </div>
                <div class="temoinages-groupe-iten3 img2">
                    <!-- <img src="../public/source/images/temoin/ange_boni_pic.jpg" alt=""> -->
                </div>
                <div class="nomCommentateur">
                    Boni Angel
                </div>
            </div>
            <div class="temoinages-groupe">
                <div class="temoinages-groupe-iten1">
                    ``
                </div>
                <div class="temoinages-groupe-iten2">
                    Depuis que j'ai pris possession de ma nouvelle voiture, je n'ai eu que des expériences positives.
                    La voiture est en parfait état et correspond exactement à ce que je recherchais.
                    Je me sens en sécurité et confiante chaque fois que je prends la route.

                </div>
                <div class="temoinages-groupe-iten3 img3">
                    <!-- <img src="../public/source/images/temoin/ange_boni_pic.jpg" alt=""> -->
                </div>
                <div class="nomCommentateur">
                    Fanny Faga
                </div>
            </div>
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

</html>