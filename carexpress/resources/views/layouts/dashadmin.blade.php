<!DOCTYPE html>
<html lang="en">
<!-- HEAD -->

<head>
    <!-- META -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <link rel="stylesheet" href="{{ asset('styles/dahboard.css') }}">
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
                <img src="{{ asset('source/images/logo/logoB.png') }}" alt="logo du centre comoe" />
            </div>
            <!-- LISTE DES OPTIONS MENU -->
            <div class="list">
                <!-- LISTE DE MENU -->
                <ul>
                    @php
                        $user = Auth::guard('personnel')->user();
                        $role = $user ? $user->role : null;
                    @endphp
                    <!-- OPTION ACCEUIL -->
                    @if ($role == 'administrateur' || $role == 'manager')
                        <a href="{{ route('admin.dashboard') }}">
                            <li class="{{ Route::currentRouteName() == 'admin.dashboard' ? 'menu-select' : '' }}">
                                <i class="fa-solid fa-chart-line"></i> Dashboard
                            </li>
                        </a>
                    @endif
                    <!-- OPTION CLIENT -->
                    @if ($role == 'administrateur')
                        <a href="{{ route('admin.customer') }}">
                            <li class="{{ Route::currentRouteName() == 'admin.customer' ? 'menu-select' : '' }}">
                                <i class="fa-solid fa-hospital-user"></i> Client
                            </li>
                        </a>
                    @endif
                    <!-- OPTION RESERVATION -->
                    @if ($role == 'administrateur' || $role == 'manager')
                        <a href="{{ route('admin.reservation') }}">
                            <li class="{{ Route::currentRouteName() == 'admin.reservation' ? 'menu-select' : '' }}">
                                <i class="fa-solid fa-magnifying-glass-chart"></i> Reservation
                            </li>
                        </a>
                    @endif
                    <!-- OPTION FACTURE -->
                    @if ($role == 'administrateur' || $role == 'manager')
                        <a href="{{ route('admin.facture') }}">
                            <li class="{{ Route::currentRouteName() == 'admin.facture' ? 'menu-select' : '' }}">
                                <i class="fa-solid fa-square-poll-vertical"></i> Facture
                            </li>
                        </a>
                    @endif
                    <!-- OPTION RECU -->
                    @if ($role == 'administrateur' || $role == 'manager')
                        <a href="{{ route('admin.received') }}">
                            <li class="{{ Route::currentRouteName() == 'admin.received' ? 'menu-select' : '' }}">
                                <i class="fa-solid fa-square-poll-vertical"></i> Reçu
                            </li>
                        </a>
                    @endif

                    <!-- OPTION INVENTAIRE -->
                    @if ($role == 'administrateur' || $role == 'manager')
                        <a href="{{ route('admin.inventaire') }}">
                            <li class="{{ Route::currentRouteName() == 'admin.inventaire' ? 'menu-select' : '' }}">
                                <i class="fa-solid fa-magnifying-glass-chart"></i> Inventaire
                            </li>
                        </a>
                    @endif

                    <!-- OPTION GESTIONNAIRE -->
                    @if ($role == 'administrateur')
                        <a href="{{ route('admin.gestionnaire') }}">
                            <li class="{{ Route::currentRouteName() == 'admin.gestionnaire' ? 'menu-select' : '' }}">
                                <i class="fa-solid fa-hospital-user"></i> Gestionnaire
                            </li>
                        </a>
                    @endif

                    <!-- OPTION VOITURE -->
                    @if ($role == 'administrateur' || $role == 'manager')
                        <a id="voiture-link" href="{{ route('admin.voiture') }}">
                            <li id="voiture"
                                class="{{ in_array(Route::currentRouteName(), ['admin.voiture', 'admin.marque', 'admin.modele', 'admin.categorie', 'admin.transmission']) ? 'menu-select' : '' }}">
                                <i class="fa-solid fa-square-poll-vertical"></i> Vehicule
                            </li>
                        </a>
                    @endif

                </ul>
                <ul id="menu-voiture">
                    <a href="{{ route('admin.voiture') }}">
                        <li>
                            <i class="fa-solid fa-square-poll-vertical"></i> Voiture
                        </li>
                    </a>
                    <a href="{{ route('admin.marque') }}">
                        <li><i class="fa-solid fa-square-poll-vertical"></i> Marque</li>
                    </a>

                    <a href="{{ route('admin.modele') }}">
                        <li><i class="fa-solid fa-square-poll-vertical"></i> Model</li>
                    </a>

                    <a href="{{ route('admin.categorie') }}">
                        <li><i class="fa-solid fa-square-poll-vertical"></i> Categorie</li>
                    </a>

                    <a href="{{ route('admin.transmission') }}">
                        <li><i class="fa-solid fa-square-poll-vertical"></i> Transmission </li>
                    </a>
                </ul>

            </div>
            <!-- DECONNECTION -->
            <div class="disconnect">
                <form id="logout-form" action="{{ route('logout.personnel') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="{{ route('logout.personnel') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><button>Se
                        deconnecter</button></a>
            </div>
        </div>
        <!-- PARTIE 2 DROITE -->
        @yield('right')
        <!-- NOTIFICATION -->
        @yield('notification')
        @yield('modalcustom')
    </section>
    @yield('jscustom')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const voitureLink = document.getElementById('voiture-link');
            const menuVoiture = document.getElementById('menu-voiture');
            let voitureClicked = false;

            voitureLink.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the default action
                voitureClicked = !voitureClicked; // Toggle the clicked state

                if (voitureClicked) {
                    menuVoiture.style.display = 'block'; // Show the submenu
                    voitureLink.setAttribute('id', 'voiture'); // Add id to the link
                } else {
                    menuVoiture.style.display = 'none'; // Hide the submenu
                    voitureLink.removeAttribute('id'); // Remove id from the link
                }
            });
        });
    </script>
    @yield('scriptjs')
</body>

</html>
