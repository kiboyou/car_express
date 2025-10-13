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
    <title>CarExpress | login-admin</title>
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
        <div
            class="navbar w-full h-40 bg-white shadow-lg fixed z-10 flex justify-between mx-auto items-center p-02 pt-5 lg:px-20 pt-5">
            <div class="logo flex items-center cursor-pointer">
                <a href="../../acceuil.html"><img src="{{ asset('source/images/logo/logoR.png') }}" alt="Logo"
                        class="w-24 h-24 md:w-32 md:h-16"></a>
            </div>
            <!-- <div class="menu hidden md:flex items-center space-x-8 pr-02 ml-10">
              <ul class="flex space-x-8">
                  <li><a href="../../acceuil.html" class="text-lg text-black hover:text-red-600 active">Acceuil</a></li>
                  <li><a href="../../body/car.html" class="text-lg text-black hover:text-red-600">Cars</a></li>
                  <li><a href="../../dashboard/admin/dashboard.html" class="text-lg text-black hover:text-red-600">Mon dashboard</a></li>
                  <li class="Deconnexion bg-red-600 text-white py-1 px-8 rounded-full cursor-pointer  hover:bg-white hover:text-red-600 transition duration-500">
                      <a href="./connexion.html">Deconnexion</a>
                  </li>
              </ul>
          </div> -->
            <div class="md:hidden">
                <button id="menu-button" class="text-black text-2xl cursor-pointer outline-none"><i
                        class="fa-solid fa-bars"></i></button>
            </div>
        </div>
        <div id="mobile-menu" class="hidden md:hidden flex flex-col items-center space-y-4 mt-01">
            <a href="../../acceuil.html" class="text-lg text-black hover:text-red-600">Acceuil</a>
            <a href="../../body/car.html" class="text-lg text-black hover:text-red-600">Cars</a>
            <a href="../../dashboard/admin/dashboard.html" class="text-lg text-black hover:text-red-600">Mon
                dashboard</a>
            <a href="./connexion.html" class="text-lg text-black hover:text-red-600">Deconnexion</a>
        </div>



        <div class="container1 bg-cover bg-center bg-no-repeat h-5/6 w-11/12 mx-auto mt-40 flex flex-col md:flex-row items-center justify-between rounded-b-3xl"
            style="background-image: linear-gradient(90deg, hwb(0 44% 35% / 0.856), #c51e1edc), url('../source/images/bg1.jpeg');">
            <div
                class="textAcceuil text-white uppercase text-xl md:text-1xl lg:text-3xl font-black md:w-2/2 p-8 md:p-16">
                <div>Bienvenue sur la page d'administration !</div>
                <p
                    class="annonce mt-4 mb-4 text-xs sm:text-sm md:text-base lg:text-lg xl:text-xl 2xl:text-2xl font-light lowercase">
                    nous sommes ravis de vous offrir une exdivérience de gestion simple, rapide et pratique.
                </p>
            </div>

        </div>

    </div>

    <div class="container mx-auto p-4 max-w-md mb-10">
        <!-- Formulaire de connexion -->
        <div
            class="container__form container--signin bg-white rounded-lg shadow-md p-6 mt-4 -translate-y-4 transition-transform flex flex-col">
            <form action="{{ route('admin.personnel') }}" method="POST" class="form" id="form2">
                <h1 class="form__title text-center text-2xl font-semibold mb-10">Connexion</h1>
                @if (session('success'))
                    <div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                        </svg>
                        <p>{{ session('success') }}.</p>
                    </div>
                @endif
                @if (session('error'))
                    <div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3" role="alert">
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                        </svg>
                        <p>{{ session('error') }}.</p>
                    </div>
                @endif
                @if ($errors->any())
                    <div role="alert">
                        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                            Danger
                        </div>
                        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                @csrf
                <input type="text" placeholder="Nom d'utilisateur" name="username" value="{{ old('username') }}"
                    class="input mt-5 mb-4 p-3 w-full rounded outline-none border border-red-200 shadow-md" />
                <div class="relative">
                    <input type="password" id="passwordInput" name="password" placeholder="Mot de passe"
                        class="input mt-3 mb-5 p-3 w-full rounded outline-none border border-red-200 shadow-md" />
                    <span id="togglePassword"
                        class="eye-icon absolute transform translate-y-6 -translate-x-6 cursor-pointer">
                        <i class="fas fa-eye text-gray-500 hover:text-gray-700"></i>
                    </span>
                </div>

                <a href="#" class="link text-blue-500 hover:underline block mb-5 p-2">Mot de passe oublié ?</a>
                <button
                    class="btn bg-green-500 hover:bg-green-700 focus:outline-none text-white font-bold py-2 px-4 rounded w-full">
                    Se connecter
                </button>
            </form>

        </div>
    </div>


    <div class="section6 w-full bg-gray-800 text-white py-10">
        <footer class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-4 justify-items-center md:mt-38">
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
                    <button type="submit"
                        class="w-full bg-red-600 text-white px-4 py-2 rounded-md">Souscrire</button>
                    <!-- <p class="text-sm mt-2">
                      Ne manquez plus jamais les dernières nouveautés et offres exclusives !
                      Abonnez-vous dès maintenant pour bénéficier d'avantages spéciaux réservés à nos membres.
                  </p> -->
                </form>
            </div>
        </footer>
    </div>

    <script src="{{ asset('js/acceuil.js') }}"></script>
</body>

</html>
