<div
    class="navbar w-full h-30 bg-white shadow-lg fixed z-10 flex justify-between mx-auto items-center p-02 pt-5 lg:px-20 pt-5">
    <div class="logo flex items-center cursor-pointer">
        <a href="{{ route('home') }}"><img src="{{ asset('source/images/logo/logoR.png') }}" alt="Logo"
                class="w-24 h-12 md:w-32 md:h-16"></a>
    </div>
    <div class="menu hidden md:flex items-center space-x-8 pr-02 ml-10">
        <ul class="flex space-x-8">
            <li><a href="{{ route('home') }}" class="text-lg text-black hover:text-red-600 active">Acceuil</a></li>
            <li><a href="{{ route('allcar') }}" class="text-lg text-black hover:text-red-600">Cars</a></li>
            <li><a href="{{ Auth::guard('customer')->check() ? route('dashcustomer.index') : route('logincustomer') }}"
                    class="text-lg text-black hover:text-red-600">Mon
                    dashboard</a></li>
            @auth('customer')
                <form id="logout-form" action="{{ route('logout.customer') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <li
                    class="Deconnexion bg-red-600 text-white py-1 px-8 rounded-full cursor-pointer  hover:bg-white hover:text-red-600 transition duration-500">
                    <a href="{{ route('logout.customer') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Deconnexion</a>
                </li>
            @endauth
            @guest('customer')
                <li
                    class="Deconnexion bg-red-600 text-white py-1 px-8 rounded-full cursor-pointer  hover:bg-white hover:text-red-600 transition duration-500">
                    <a href="{{ route('logincustomer') }}">Connexion</a>
                </li>
            @endguest
        </ul>
    </div>
    <div class="md:hidden">
        <button id="menu-button" class="text-black text-2xl cursor-pointer outline-none"><i
                class="fa-solid fa-bars"></i></button>
    </div>
</div>
<div id="mobile-menu" class="hidden md:hidden flex flex-col items-center space-y-4 mt-01">
    <a href="{{ route('home') }}" class="text-lg text-black hover:text-red-600">Acceuil</a>
    <a href="{{ route('allcar') }}" class="text-lg text-black hover:text-red-600">Cars</a>
    <a href="{{ route('dashcustomer.index') }}" class="text-lg text-black hover:text-red-600">Mon dashboard</a>
    <a href="{{ route('logincustomer') }}" class="text-lg text-black hover:text-red-600">Connexion</a>
</div>
