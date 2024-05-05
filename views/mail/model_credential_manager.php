<?php
    $nom = $_GET['nom'];
    $username = $_GET['username'];
    $defaultpassword = $_GET['password'];
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credential Manager</title>
    <style>
        :root {
            --primary-color: #f2f2f2;
            --secondary-color: #fff;
            --border-color: #ddd;
            --text-color: #333;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: var(--text-color);
        }

        header {
            background-image: url('https://i.imgur.com/tDr5hdQ.jpeg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        header.logo {
            width: 50px;
            height: 50px;
            margin-right: 20px;
        }

        header h1 {
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        main {
            padding: 20px;
        }

        footer {
            background-color: var(--primary-color);
            text-align: center;
            padding: 20px 0;
        }

        .contact-info {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .contact-info div {
            width: 200px;
            margin: 10px;
            padding: 10px;
            background-color: var(--secondary-color);
            border: 1px solid var(--border-color);
            border-radius: 5px;
        }

        .contact-info div h3 {
            margin-top: 0;
        }

        .contact-info div a {
            color: blue;
            text-decoration: none;
        }

        .contact-info div a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <header>
        <img src="https://i.imgur.com/Q1Bqa4B.png" alt="Logo" class="logo">
        <h1>ABKM SOCIETY</h1>
    </header>

    <main>
        <h3 style="text-align: center;">Welcome to our site</h3>
        <p>Bonjour M. <?= $nom ?>,</p>
        <p>
            Nous sommes heureux de vous annoncer que votre compte de
            gestionnaire a été créé avec succès. <br> Vous êtes désormais prêt à accéder
            à notre système et à commencer à gérer vos responsabilités.
        </p>
        <p>
            Voici vos informations de connexion :
        <ul>
            <li>Nom d'utilisateur: <?= $username ?></li>
            <li>Mot de passe temporaire: <?= $defaultpassword ?></li>
        </ul>
        Bienvenue à bord ! <br>
        <p>Cordialement,</p>
        <p>L'administrateur.</p>
        </p>
    </main>

    <footer>
        <h2>Nous Contacter</h2>
        <div class="contact-info">
            <div>
                <h3>Site Web</h3>
                <a href="">www.example.com</a>
            </div>
            <div>
                <h3>E-mail</h3>
                <p><a href="mailto:bm.service021@gmail.com">bm.service021@gmail.com</a></p>
            </div>
            <div>
                <h3>Location</h3>
                <p>Tunisie, Tunis, El Ghazela</p>
            </div>
            <div>
                <h3>Contact</h3>
                <p>+216 48 18 20 52</p>
            </div>
        </div>
    </footer>
</body>

</html>