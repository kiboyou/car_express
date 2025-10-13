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
    <link rel="shortcut icon" href="{{ asset('source/images/logo/logoB.png') }}" type="image/x-icon" />
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet" />
    <!-- ICONS LINK -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS FILE -->
    <link rel="stylesheet" href="{{ asset('styles/custom.css') }}">
    <!-- <link rel="stylesheet" href="../public/styles/main.css"> -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <!-- JS LINK -->


    <!-- TITRE DE LA PAGE -->
    <title>CarExpress | voiture</title>

</head>

<body>
    <div class="section1 w-full overflow-hidden">
        @include('includes.navbarclient')


        <div class="container1 bg-cover bg-center bg-no-repeat h-5/6 w-11/12 mx-auto mt-02 flex flex-col md:flex-row items-center justify-between rounded-b-3xl"
            style="background-image: linear-gradient(90deg, hwb(0 44% 35% / 0.856), #c51e1edc), url('{{ asset('source/images/bg1.jpeg') }}');">
            <div
                class="textAcceuil text-white uppercase text-xl md:text-1xl lg:text-3xl font-black md:w-1/2 p-8 md:p-16">
                <div>Trouver votre voiture en un clic !</div>
                <p
                    class="annonce mt-4 mb-4 text-xs sm:text-sm md:text-base lg:text-lg xl:text-xl 2xl:text-2xl font-light lowercase">
                    nous sommes ravis de vous offrir une exdivérience de location simple, rapide et pratique.
                </p>
            </div>

        </div>

    </div>

    @yield('content')

    <div class="section6 bg-gray-800 text-white py-10 mt-38">
        <footer class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-4 justify-items-center">
            <div class="contacts flex flex-col items-center md:items-start">
                <p class="text-lg font-bold mb-2 text-gray-400">Contacts</p>
                <a href="tel:+21658486482" class="mb-1"><i class="fa-solid fa-phone"></i> +216 58486482</a>
                <a href="mailto:services@carexpress.ci"><i class="fa-solid fa-envelope"></i>
                    services@carexpress.ci</a>
            </div>
            <div class="partenaire flex flex-col items-center md:items-start">
                <p class="text-lg font-bold mb-2 text-gray-400">Partenaire(s)</p>
                <img src="{{ asset('source/images/logo/logoB.png') }}" alt="logo-partenaires"
                    class="w-24 filter grayscale hover:filter-none" />
            </div>
            <div class="newsletters flex flex-col items-center md:items-start">
                <p class="text-lg font-bold mb-2 text-gray-400">Newsletters</p>
                <form action="#" class="space-y-4">
                    <input placeholder="E-mail" type="email" name="#"
                        class="w-full px-4 py-2 rounded-md text-gray-800 outline-none" />
                    <button type="submit" class="w-full bg-red-600 text-white px-4 py-2 rounded-md">Souscrire</button>
                    <!-- <p class="text-sm mt-2">
                      Ne manquez plus jamais les dernières nouveautés et offres exclusives !
                      Abonnez-vous dès maintenant pour bénéficier d'avantages spéciaux réservés à nos membres.
                  </p> -->
                </form>
            </div>
        </footer>
    </div>

    <script src="{{ asset('js/acceuil.js') }}"></script>
    @yield('jscript')
</body>

</html>
