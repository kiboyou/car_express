@extends('layouts.templatecar')

@section('content')
    <div class="section3 p-4 md:p-6 lg:p-8">
        <main class="overview-1 w-full md:w-4/5 lg:w-3/4 mx-auto">
            <!-- SEARCH AND FILTER BAR -->
            <section class="search p-4 md:p-6 lg:p-8 text-center">
                <form action="{{ route('allcar') }}" method="GET"
                    class="w-4/5 mx-auto grid grid-cols-1 md:grid-cols-4 gap-2">
                    <!-- SEARCH BAR -->
                    <input type="search" placeholder="Rechercher par la marque" name="marque"
                        class="w-full px-4 py-2 rounded-md text-gray-800 outline-none border border-red-600 shadow-md" />
                    <input type="search" placeholder="Rechercher par le modele" name="modele"
                        class="w-full px-4 py-2 rounded-md text-gray-800 outline-none border border-red-600 shadow-md" />
                    <!-- CLIENT'S BUDGET -->
                    {{-- <select name="budget"
                        class="w-full px-4 py-2 rounded-md text-gray-800 outline-none border border-red-600 shadow-md">
                        <option selected>Votre Budget</option>
                        <option value="10-50">10€ - 50€</option>
                        <option value="50-100">50€ - 100€</option>
                        <option value="100-200">100€ - 200€</option>
                    </select> --}}
                    <!-- CATEGORY SELECT -->
                    <select name="categorie"
                        class="w-full px-4 py-2 rounded-md text-gray-800 outline-none border border-red-600 shadow-md">
                        <option selected>Choisir une categorie</option>
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->name }}"> {{ $categorie->name }} </option>
                        @endforeach
                    </select>
                    <!-- SUBMIT BUTTON -->
                    <div class="flex space-x-2">
                        <!-- SUBMIT BUTTON -->
                        <button type="submit"
                            class="w-full md:w-auto bg-red-600 text-white px-4 py-2 rounded-md shadow-md hover:scale-105 active:scale-95">
                            Rechercher
                        </button>

                        <!-- RESET BUTTON -->
                        <a href="{{ route('allcar') }}"
                            class="w-full md:w-auto bg-gray-600 text-white px-4 py-2 rounded-md shadow-md text-center hover:scale-105 active:scale-95">
                            Réinitialiser
                        </a>
                    </div>
                </form>
            </section>
        </main>
    </div>
    @if (session('success'))
        <div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                    d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
            </svg>
            <p>{{ session('success') }}.</p>
        </div>
    @endif
    <div class="titre text-center text-xl md:text-4xl lg:text-4xl font-bold mb-6 md:p-6 lg:p-10">
        Nos voitures
    </div>

    <!-- SECTION DES CARTES ANNONCES -->
    <section
        class="container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10 p-4 md:p-2  cursor-pointer mx-auto justify-between">
        <!-- CARD -->
        @foreach ($vehicules as $vehicule)
            <div
                class="card bg-white shadow-lg rounded-lg overflow-hidden transform transition duration-500 hover:scale-105 w-80 h-96">
                <div class="card-img">
                    <img src="{{ asset('storage/' . $vehicule->imageVehicule) }}" alt="house-image"
                        class="w-full h-48 object-cover" />
                </div>
                <div class="card-title p-4">
                    <p class="text-lg font-bold text-red-600">{{ $vehicule->getVehiculeName() }}</p>
                </div>
                <div class="card-info p-4 space-y-2">
                    <p><span class="font-semibold">Model : </span> {{ $vehicule->modele->name }} </p>
                    <p><span class="font-semibold">Marque : </span> {{ $vehicule->modele->marque->name }} </p>
                    <p><span class="font-semibold">Transmission : </span>{{ $vehicule->transmission->name }}</p>
                    <p><span class="font-semibold">Categorie : </span>{{ $vehicule->categorie->name }}</p>
                    <p><span class="font-semibold">Prix : </span> <span class="font-semibold">{{ $vehicule->prixLocation }}
                            €</span> </p>
                    <p><span class="font-semibold">Disponible: </span>
                        <span
                            class="font-semibold {{ $vehicule->disponibilite ? 'text-green-600' : 'text-red-600' }}">{{ $vehicule->disponibilite ? 'OUI' : 'NON' }}
                        </span>
                    </p>
                </div>
                @php
                    $encryptedMatricule = Crypt::encrypt($vehicule->matricule);
                @endphp
                <div class="card-sub bg-gray-100 p-4 flex justify-between items-center flex-wrap">
                    <a href="{{ route('detailscar', ['matricule' => $encryptedMatricule]) }}#info_voiture">
                        <button id="voir" class="bg-red-600 text-white px-4 py-2 rounded-md"
                            data-url="{{ route('detailscar', ['matricule' => $encryptedMatricule]) }}"
                            onclick="detailsPage(this)">
                            voir +
                        </button>
                    </a>
                    <a href="{{ route('detailscar', $encryptedMatricule) }}#info_formulaire"><button
                            class="bg-red-600 text-white px-4 py-2 rounded-md">Reserver</button></a>
                </div>
            </div>
        @endforeach

        <!-- end -->
    </section>

    <!-- PAGINATION -->
    <section class="pagination flex justify-center space-x-4 p-4 mt-20">
        @if ($vehicules->onFirstPage())
            <button disabled class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md"><i
                    class="fa-solid fa-arrow-left-long"></i> Page précedente</button>
        @else
            <a href="{{ $vehicules->previousPageUrl() }}"><button class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md"><i
                        class="fa-solid fa-arrow-left-long"></i> Page précedente</button></a>
        @endif
        @if ($vehicules->hasMorePages())
            <a href="{{ $vehicules->nextPageUrl() }}"><button class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md">Page
                    suivante <i class="fa-solid fa-arrow-right-long"></i></button></a>
        @else
            <button disabled class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md">Page
                suivante <i class="fa-solid fa-arrow-right-long"></i></button>
        @endif
    </section>
@endsection

@section('jscript')
    <script>
        function detailsPage(button) {
            let url = button.getAttribute('data-url');
            // alert(url);
            window.location.href = url
        }
    </script>
@endsection
