<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Reservation</title>
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
        <p>
            Cher/Chère <?= $email ?>,
        </p>
        <p>
            Nous espérons que vous allez bien. Nous avons bien reçu votre réservation identifié [numero] de voiture pour [date de réservation]. <br> Pour garantir votre réservation, nous vous prions de bien vouloir confirmer celle-ci dans les 24 prochaines heures.
        </p>
        <p>
            Si vous avez des questions ou si vous avez besoin d'aide, n'hésitez pas à nous contacter. Nous sommes là pour vous aider à tout moment.
        </p>
        <p>
            Nous sommes impatients de vous servir et de vous offrir une expérience de location de voiture exceptionnelle.
        </p>
        <p>Cordialement,</p>
        <p>L'équipe ABKM Service.</p>
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