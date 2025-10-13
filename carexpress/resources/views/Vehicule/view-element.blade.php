@extends('layouts.templatecar')

@section('content')
    <div class="titre text-center text-xl md:text-4xl lg:text-4xl mt-5 font-bold mb-6 md:p-6 lg:p-10">
        Caractéristiques de la voiture
    </div>

    <div class="section3 p-4 md:p-10 mx-auto flex flex-col items-center">
        <div class="besoins flex flex-col md:flex-row w-full max-w-6xl">
            <div class="besoins-item-groupe besoins-item1 md:w-1/2 p-4 w-full h-96">
                <img src="{{ asset('storage/' . $vehicule->imageVehicule) }}" alt="lux car"
                    class="w-full h-full object-cover bg-center rounded-lg shadow-lg">
            </div>
            <div class="besoins-item-groupe besoins-item2 md:w-1/2 p-4 flex flex-col justify-center">
                <div class="item-1">
                    <div class="titreBesoin text-2xl font-bold mb-4 text-center md:text-left">
                        {{ $vehicule->getVehiculeName() }}
                    </div>
                    <div class="card-info space-y-4 text-lg">
                        <p><span class="font-semibold">Model : </span> {{ $vehicule->modele->name }} </p>
                        <p><span class="font-semibold">Marque : </span> {{ $vehicule->modele->marque->name }} </p>
                        <p><span class="font-semibold">Transmission : </span> {{ $vehicule->transmission->name }} </p>
                        <p><span class="font-semibold">Categorie : </span> {{ $vehicule->categorie->name }} </p>
                        <p><span class="font-semibold">Prix : </span>{{ $vehicule->prixLocation }} €</p>
                        <p><span class="font-semibold">Disponible : </span>
                            <span
                                class="font-semibold {{ $vehicule->disponibilite ? 'text-green-600' : 'text-red-600' }}">{{ $vehicule->disponibilite ? 'OUI' : 'NON' }}
                            </span>
                        </p>
                    </div>
                    <div class="texteRL mt-4 text-gray-700 text-justify">
                        Envie de prendre le volant et de partir à l'aventure ? Ne cherchez pas plus loin ! Avec notre
                        service de location de voitures,
                        vous pouvez louer le véhicule parfait pour votre prochain voyage en quelques étapes simples.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="titre text-red-600 text-center text-xl md:text-4xl lg:text-4xl mt-5 font-bold mb-3 md:p-2">
                            voiture indisponible : Formulaire de reservation indisponible !
                        </div> -->

    @if ($vehicule->disponibilite)
        <div class="titre text-center text-xl md:text-4xl lg:text-4xl mt-5 font-bold mb-3 md:p-2">
            Formulaire de reservation
        </div>
        {{-- notification --}}
        @if (session('success'))
            <div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                </svg>
                <p>{{ session('success') }}.</p>
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
        {{-- end notification --}}
        <div class="section-view2 p-4 md:p-10 mx-auto max-w-4xl">
            <div class="formulaire bg-white p-6 rounded-lg shadow-lg mb-50">
                <form action="{{ route('reservation.store') }}" method="POST" id="reservationForm">
                    @csrf
                    <input type="text" name="customer_id" value="{{ $codeclient ?? 'not connected' }}" hidden>
                    <input type="text" name="vehicule_id" value="{{ $vehicule->matricule }}" hidden>
                    <div class="form-groupe form2 grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                        <div class="select md:col-span-2">
                            <select name="paiement" id=""
                                class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500">
                                <option value="">Choisissez votre mode de paiement</option>
                                <option value="ligne">en ligne</option>
                                <option value="presentiel">en presentiel</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-groupe form4 grid grid-cols-1 md:grid-cols-2 gap-4 mt-8">
                        <div class="input1">
                            <label for="date1" class="block mb-2">Date de début</label>
                            <input type="date" name="debutlocation" id="date1"
                                class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500">
                        </div>
                        <div class="input1">
                            <label for="date2" class="block mb-2">Date de fin</label>
                            <input type="date" name="finlocation" id="date2"
                                class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500">
                        </div>
                    </div>
                    <div class="form-groupe form-btn flex flex-col sm:flex-row sm:justify-between mt-6">
                        <button id="effacer" type="reset"
                            class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 sm:px-2 sm:py-1 mb-2 sm:mb-0 focus:outline-none">Effacer
                            le formulaire</button>
                        <button id="valider_reservation" type="submit"
                            class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 sm:px-2 sm:py-1 focus:outline-none">Valider
                            le formulaire</button>
                    </div>

                </form>
            </div>
        </div>
    @else
        <div class="titre text-center text-xl md:text-4xl lg:text-4xl mt-5 font-bold mb-3 md:p-2">
            Ce vehicule est indisponible pour le moment !
        </div>
    @endif
@endsection

@section('jscript')
    <script>
        // Vérifiez si le client est connecté
        const clientEstConnecte = "{{ Auth::guard('customer')->check() }}";

        // Gérer la soumission du formulaire
        document.getElementById('valider_reservation').addEventListener('click', function(event) {
            if (!clientEstConnecte) {
                event.preventDefault();
                alert('Veuillez vous connecter avant de passer une réservation.');
            }
        });
    </script>
@endsection
