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
    <link rel="shortcut icon" href="{{asset('source/images/logo/logoB.png')}}" type="image/x-icon" />
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet" />
    <!-- ICONS LINK -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS FILE -->
    <!-- <link rel="stylesheet" href="../../../public/styles/dahboard-client.css"> -->
    <link rel="stylesheet" href="{{asset('styles/dahboard.css')}}">
    <!-- JS LINK -->

    <!-- TITRE DE LA PAGE -->
    <title>CarExpress | dashboard-client</title>

</head>
<!-- BODY -->

<body>
    <section class="container">
        <!-- PARTIE 1 GAUCHE -->
        <div class="left">
            <!-- LOGO DU CENTRE CULTUREL COMOE -->
            <div class="logo">
                <a href="{{route('home')}}">
                    <img src="{{asset('source/images/logo/logoB.png')}}" alt="logo du centre comoe" />
                </a>
            </div>
            <!-- LISTE DES OPTIONS MENU -->
            <div class="list">
                <!-- LISTE DE MENU -->
                <ul>
                    <!-- OPTION ACCEUIL -->
                    <a href="{{route('dashcustomer.index')}}">
                        <li class="{{ Route::currentRouteName() == 'dashcustomer.index' ? 'menu-select' : '' }}">
                            <i class="fa-solid fa-chart-line"></i> Dashboard
                        </li>
                    </a>

                    <!-- OPTION RESERVATION -->
                    <a href="{{route('dashcustomer.reservation')}}">
                        <li class="{{ Route::currentRouteName() == 'dashcustomer.reservation' ? 'menu-select' : '' }}">
                            <i class="fa-solid fa-magnifying-glass-chart"></i> Reservation
                        </li>
                    </a>
                    <!-- OPTION FACTURE -->
                    <a href="{{route('dashcustomer.facture')}}">
                        <li class="{{ Route::currentRouteName() == 'dashcustomer.facture' ? 'menu-select' : '' }}">
                            <i class="fa-solid fa-square-poll-vertical"></i> Facture
                        </li>
                    </a>
                    <!-- OPTION RECU -->
                    <a href="{{route('dashcustomer.received')}}">
                        <li class="{{ Route::currentRouteName() == 'dashcustomer.received' ? 'menu-select' : '' }}">
                            <i class="fa-solid fa-square-poll-vertical"></i> Reçu
                        </li>
                    </a>

                    <!-- OPTION PARAMETRE - PROFILE -->
                    <a href="{{route('dashcustomer.parameter')}}">
                        <li class="{{ Route::currentRouteName() == 'dashcustomer.parameter' ? 'menu-select' : '' }}">
                            <i class="fa-solid fa-gear"></i> Parametre
                        </li>
                    </a>
                </ul>

            </div>
            <!-- DECONNECTION -->
            <div class="disconnect">
                <form id="logout-form" action="{{ route('logout.customer') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="{{route('logout.customer')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><button>Se deconnecter</button></a>
            </div>
        </div>
        <!-- PARTIE 2 DROITE -->
        <div class="rigth">
            <!-- ADMIN INFO -->
            <div class="head">
                <div>
                    <img src="{{asset('source/images/Ellipse 1.png')}}" alt="photo de profil" />
                    <p>{{$customer->lastname}} {{$customer->firstname}}</p>
                </div>
            </div>
            @yield('otherpart')
        </div>
        @yield('notification')
        @yield('scriptjs')
        @yield('scriptjs2')
</body>

</html>
