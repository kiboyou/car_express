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
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <!-- JS LINK -->


    <!-- TITRE DE LA PAGE -->
    <title>CarExpress | Acceuil</title>

    <style>
        @layer utilities {
            .bg-custom-red {
                background-color: #c51e1e;
            }

            .text-custom-red {
                color: #c51e1e;
            }

            .border-custom-red {
                border-color: #c51e1e;
            }
        }
    </style>

</head>

<body>
    <div class="section1 w-full overflow-hidden">
        @include('includes.navbarclient')

        <div class="container1 bg-cover bg-center bg-no-repeat h-4/6 w-11/12 mx-auto mt-02 flex flex-col md:flex-row items-center justify-between rounded-b-3xl"
            style="background-image: linear-gradient(90deg, hwb(0 44% 35% / 0.856), #c51e1edc), url('{{ asset('source/images/bg1.jpeg') }}');">
            <div
                class="textAcceuil text-white uppercase text-1xl md:text-2xl lg:text-4xl font-black md:w-1/2 p-8 md:p-16">
                <div>Louez votre voiture dès aujourd'hui !</div>
                <p
                    class="annonce mt-4 mb-4 text-xs sm:text-sm md:text-base lg:text-lg xl:text-xl 2xl:text-2xl font-light lowercase">
                    Bienvenue sur notre site de location de voitures. <br>
                    Nous sommes ravis de vous offrir une expérience de location simple, rapide et pratique.
                </p>
                @auth('customer')
                    <a href="{{ route('dashcustomer.index') }}"
                        class="annonceLink mt-2 md:mt-108 text-sm md:text-lg py-2 md:py-3 px-4 md:px-8 bg-white text-red-600 rounded-full lowercase hover:bg-red-600 hover:text-white transition duration-500">
                        Mon dashboard
                    </a>
                @endauth
                @guest('customer')
                    <a href="{{ route('logincustomer') }}"
                        class="annonceLink mt-2 md:mt-108 text-sm md:text-lg py-2 md:py-3 px-4 md:px-8 bg-white text-red-600 rounded-full lowercase hover:bg-red-600 hover:text-white transition duration-500">
                        Se connecter
                    </a>
                @endguest

            </div>


            <div class="cardImage w-full md:w-1/3 mt-8 md:mt-0 hidden md:block flex justify-start">
                <img src="{{ asset('source/images/bgkey1.png') }}" id="imageCard" class="h-100 rounded-5xl">
            </div>

        </div>

    </div>

    <div class="section2 bg-gray-100 p-6">
        <div class="titre text-center text-xl md:text-4xl lg:text-4xl font-bold mb-6 md:p-5 lg:p-10">
            Grâce à nous, vous bénéficiez de
        </div>

        <div class="benefice grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="benefice-item-groupe benefice-item1 p-4 bg-white shadow-md rounded-lg">
                <img src="{{ asset('source/images/benefice/choix.svg') }}" alt=""
                    class="mx-auto mb-4 w-20 sm:w-30 md:w-40 lg:w-44">
                <div class="texte text-center text-lg md:text-xl font-semibold">
                    Large choix de véhicules
                </div>
                <p class="text-center text-gray-600">
                    Offrir une variété de véhicules permet aux clients de choisir celui qui correspond le mieux à leurs
                    besoins spécifiques
                </p>
            </div>
            <div class="benefice-item-groupe benefice-item2 p-4 bg-white shadow-md rounded-lg">
                <img src="{{ asset('source/images/benefice/reservation.png') }}" alt=""
                    class="mx-auto mb-4 w-20 sm:w-30 md:w-40 lg:w-44">
                <div class="texte text-center text-lg md:text-xl font-semibold">
                    Facilité de réservation en ligne
                </div>
                <p class="text-center text-gray-600">
                    Un site de location de véhicules offre aux clients la possibilité de réserver leur voiture en ligne
                </p>
            </div>
            <div class="benefice-item-groupe benefice-item3 p-4 bg-white shadow-md rounded-lg">
                <img src="{{ asset('source/images/benefice/T.png') }}" alt=""
                    class="mx-auto mb-4 w-20 sm:w-30 md:w-40 lg:w-44">
                <div class="texte text-center text-lg md:text-xl font-semibold">
                    Transparence des tarifs et des conditions
                </div>
                <p class="text-center text-gray-600">
                    La transparence des tarifs et des conditions de location est essentielle pour établir la confiance
                    avec les clients
                </p>
            </div>
            <div class="benefice-item-groupe benefice-item4 p-4 bg-white shadow-md rounded-lg">
                <img src="{{ asset('source/images/benefice/Sp.png') }}" alt=""
                    class="mx-auto mb-4 w-20 sm:w-30 md:w-40 lg:w-44">
                <div class="texte text-center text-lg md:text-xl font-semibold">
                    Service clientèle réactif
                </div>
                <p class="text-center text-gray-600">
                    Un bon service clientèle est essentiel pour assurer la satisfaction des clients
                </p>
            </div>
        </div>
    </div>


    <div class="section3 w-full h-[80vh] p-6 lg:p-10">
        <div class="titre text-center text-xl md:text-4xl lg:text-4xl font-bold mb-6 md:p-5 lg:p-10">
            Vous avez la possibilité de
        </div>
        <div class="besoins w-full h-full grid grid-cols-1 md:grid-cols-2 gap-4 mx-auto justify-between">
            <div
                class="besoins-item-groupe besoins-item1 w-full h-[70%] border border-[#c51e1e] rounded-2xl cursor-pointer p-4 grid grid-rows-[50%_20%_30%] hover:shadow-md transition duration-200">
                <div class="item-1">
                    <div class="titre text-center text-xl md:text-xl lg:text-2xl font-bold mb-6">
                        Réserver une voiture maintenant
                    </div>
                    <div class="texteRL w-[85%] text-center mx-auto text-lg text-[#280606] leading-7 mb-10">
                        Prêt à prendre la route ? Ne perdez pas une minute de plus ! Avec notre service de location de
                        voitures,
                        vous pouvez réserver votre véhicule idéal en quelques clics seulement. Que vous planifiez un
                        voyage d'aventure,
                        un déplacement professionnel ou des vacances en famille, nous avons la voiture parfaite pour
                        vous.
                    </div>
                    <div class="btnRL w-full flex justify-center">
                        <a href="{{ route('allcar') }}"
                            class="reservatLink mt-8 border-btn inline-block bg-white text-red-600 md:text-sm  lg:text-lg py-2 px-8 rounded-full lowercase hover:bg-red-600 hover:text-white transition duration-500">voir
                            plus pour la reservation</a>
                    </div>

                </div>
            </div>
            <div
                class="besoins-item-groupe besoins-item2 w-full h-[70%] border border-[#c51e1e] rounded-2xl cursor-pointer p-4 grid grid-rows-[50%_20%_30%] hover:shadow-md transition duration-200">
                <div class="item-1">
                    <div class="titre text-center text-xl md:text-xl lg:text-2xl font-bold mb-6">
                        Louer une voiture maintenant
                    </div>
                    <div class="texteRL w-[85%] text-center mx-auto text-lg text-[#280606] leading-7 mb-10">
                        Envie de prendre le volant et de partir à l'aventure ? Ne cherchez pas plus loin ! Avec notre
                        service de location de voitures,
                        vous pouvez louer le véhicule parfait pour votre prochain voyage en quelques étapes simples.
                    </div>
                    <div class="btnRL w-full flex justify-center">
                        <a href="{{ route('allcar') }}"
                            class="reservatLink mt-8 border-btn inline-block bg-white text-red-600 md:text-sm lg:text-lg py-2 px-8 rounded-full lowercase hover:bg-red-600 hover:text-white transition duration-500">voir
                            plus pour la reservation</a>
                    </div>

                </div>
            </div>
        </div>
    </div>




    <div class="section4 p-4 md:p-8 bg-gray-100">
        <div class="titre text-center text-xl md:text-4xl lg:text-4xl font-bold mb-6">
            Quelques produits
        </div>
        <div class="produits grid grid-cols-1 md:grid-cols-2 gap-6">
            <div
                class="produits-item-groupe produits-item1 bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 flex flex-col md:flex-row items-center">
                <div class="imgVoiture mb-4 md:mb-0 md:mr-4">
                    <img src="{{asset('source/images/produit/test1.jpeg')}}" alt=""
                        class="w-full h-auto md:w-80 object-cover rounded">
                </div>
                <div class="presentationVoiture text-center md:text-left">
                    <div class="titreVoiture text-xl font-semibold mb-2">
                        Voiture Économique
                    </div>
                    <div class="pr mb-4 text-gray-700">
                        Les voitures économiques sont idéales pour les déplacements en ville ou les courts trajets.
                        Elles offrent une consommation de carburant efficace,
                        ce qui les rend faciles à garer dans les espaces restreints.
                    </div>
                    <div class="btnCont">
                        <a href="{{ route('allcar') }}"
                            class="btnVoiture mt-8 inline-block bg-red-600 text-white py-2 px-8 rounded-full cursor-pointer  hover:bg-white hover:text-red-600 transition duration-500">voir
                            plus</a>
                    </div>
                </div>
            </div>
            <!-- Ajoutez d'autres éléments de produit ici -->
            <div
                class="produits-item-groupe produits-item1 bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 flex flex-col md:flex-row items-center">
                <div class="imgVoiture mb-4 md:mb-0 md:mr-4">
                    <img src="{{ asset('source/images/produit/test1.jpeg') }}" alt=""
                        class="w-full h-auto md:w-80 object-cover rounded">
                </div>
                <div class="presentationVoiture text-center md:text-left">
                    <div class="titreVoiture text-xl font-semibold mb-2">
                        Voiture Économique
                    </div>
                    <div class="pr mb-4 text-gray-700">
                        Les voitures économiques sont idéales pour les déplacements en ville ou les courts trajets.
                        Elles offrent une consommation de carburant efficace,
                        ce qui les rend faciles à garer dans les espaces restreints.
                    </div>
                    <div class="btnCont">
                        <a href="{{ route('allcar') }}"
                            class="btnVoiture mt-8  bg-red-600 text-white py-2 px-8 rounded-full cursor-pointer  hover:bg-white hover:text-red-600 transition duration-500">voir
                            plus</a>
                    </div>
                </div>
            </div>

            <div
                class="produits-item-groupe produits-item1 bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 flex flex-col md:flex-row items-center">
                <div class="imgVoiture mb-4 md:mb-0 md:mr-4">
                    <img src="{{ asset('source/images/produit/test1.jpeg') }}" alt=""
                        class="w-full h-auto md:w-80 object-cover rounded">
                </div>
                <div class="presentationVoiture text-center md:text-left">
                    <div class="titreVoiture text-xl font-semibold mb-2">
                        Voiture Économique
                    </div>
                    <div class="pr mb-4 text-gray-700">
                        Les voitures économiques sont idéales pour les déplacements en ville ou les courts trajets.
                        Elles offrent une consommation de carburant efficace,
                        ce qui les rend faciles à garer dans les espaces restreints.
                    </div>
                    <div class="btnCont">
                        <a href="{{ route('allcar') }}"
                            class="btnVoiture mt-8  bg-red-600 text-white py-2 px-8 rounded-full cursor-pointer  hover:bg-white hover:text-red-600 transition duration-500">voir
                            plus</a>
                    </div>
                </div>
            </div>

            <div
                class="produits-item-groupe produits-item1 bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 flex flex-col md:flex-row items-center">
                <div class="imgVoiture mb-4 md:mb-0 md:mr-4">
                    <img src="{{ asset('source/images/produit/test1.jpeg') }}" alt=""
                        class="w-full h-auto md:w-80 object-cover rounded">
                </div>
                <div class="presentationVoiture text-center md:text-left">
                    <div class="titreVoiture text-xl font-semibold mb-2">
                        Voiture Économique
                    </div>
                    <div class="pr mb-4 text-gray-700">
                        Les voitures économiques sont idéales pour les déplacements en ville ou les courts trajets.
                        Elles offrent une consommation de carburant efficace,
                        ce qui les rend faciles à garer dans les espaces restreints.
                    </div>
                    <div class="btnCont">
                        <a href="{{ route('allcar') }}"
                            class="btnVoiture mt-8  bg-red-600 text-white py-2 px-8 rounded-full cursor-pointer  hover:bg-white hover:text-red-600 transition duration-500">voir
                            plus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section5 p-4 md:p-8">
        <div class="titre text-center text-xl md:text-4xl lg:text-4xl font-bold mb-6 md:p-5 lg:p-10">
            Quelques témoignages des clients
        </div>
        <div class="temoinages flex flex-col md:flex-row justify-center items-center md:space-x-4">
            <div class="temoinages-groupe flex flex-col items-center md:items-center md:flex-1">
                <div class="temoinages-groupe-iten1 hidden md:block">
                    <!-- Placeholder for potential content -->
                </div>
                <div class="temoinages-groupe-iten2 text-center p-4">
                    Depuis que j'ai pris possession de ma nouvelle voiture, je n'ai eu que des expériences positives.
                    La voiture est en parfait état et correspond exactement à ce que je recherchais.
                    Je me sens en sécurité et confiante chaque fois que je prends la route.
                </div>
                <div
                    class="temoinages-groupe-iten3 img1 w-24 h-24 md:w-32 md:h-32 rounded-full overflow-hidden mt-4 md:mt-0">
                    <img src="{{ asset('source/images/temoin/kib.jpeg') }}" alt=""
                        class="w-full h-full object-cover">
                </div>
                <div class="nomCommentateur text-center mt-2 md:mt-0">
                    Kiboyou Mohamed
                </div>
            </div>
            <div class="temoinages-groupe flex flex-col items-center md:items-center md:flex-1">
                <div class="temoinages-groupe-iten1 hidden md:block">
                    <!-- Placeholder for potential content -->
                </div>
                <div class="temoinages-groupe-iten2 text-center p-4">
                    Depuis que j'ai pris possession de ma nouvelle voiture, je n'ai eu que des expériences positives.
                    La voiture est en parfait état et correspond exactement à ce que je recherchais.
                    Je me sens en sécurité et confiante chaque fois que je prends la route.
                </div>
                <div
                    class="temoinages-groupe-iten3 img2 w-24 h-24 md:w-32 md:h-32 rounded-full overflow-hidden mt-4 md:mt-0">
                    <img src="{{ asset('source/images/temoin/bo.jpeg') }}" alt=""
                        class="w-full h-full object-cover">
                </div>
                <div class="nomCommentateur text-center mt-2 md:mt-0">
                    Boni Angel
                </div>
            </div>
            <div class="temoinages-groupe flex flex-col items-center md:items-center md:flex-1">
                <div class="temoinages-groupe-iten1 hidden md:block">
                    <!-- Placeholder for potential content -->
                </div>
                <div class="temoinages-groupe-iten2 text-center p-4">
                    Depuis que j'ai pris possession de ma nouvelle voiture, je n'ai eu que des expériences positives.
                    La voiture est en parfait état et correspond exactement à ce que je recherchais.
                    Je me sens en sécurité et confiante chaque fois que je prends la route.
                </div>
                <div
                    class="temoinages-groupe-iten3 img3 w-24 h-24 md:w-32 md:h-32 rounded-full overflow-hidden mt-4 md:mt-0">
                    <img src="{{ asset('source/images/temoin/fa.jpeg') }}" alt=""
                        class="w-full h-full object-cover">
                </div>
                <div class="nomCommentateur text-center mt-2 md:mt-0">
                    Fanny Faga
                </div>
            </div>
        </div>
    </div>

    @include('includes.footerclient')

    <script src="{{ asset('js/acceuil.js') }}"></script>

</body>

</html>
