@extends('layouts.dashadmin')

@section('right')
    <div class="rigth">
        <!-- ADMIN INFO -->
        <div class="head">
            <div>
                <img src="../../../public/source/images/Ellipse 1.png" alt="photo de profil" />
                <p>Ouattara kiboyou M.</p>
            </div>
        </div>
        <!-- LIST OF ITEM -->
        <div class="admin">
            <!-- TITRE -->
            <div class="title">
                <p class="title">Listes des voitures</p>
            </div>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- RECHERCHE ET FILTRES -->
            <div class="search">
                <form action="#">
                    <!-- barre de recherche -->
                    <div>
                        <input type="number" placeholder="Rechercher selon numero de telephone" name=""
                            id="" />
                        <button type="submit">Rechercher</button>
                    </div>
                </form>
            </div>

            <!-- AJOUTER -->
            <div class="register">
                <button>ajouter +</button>
                <button class="refresh">refresh @</button>
            </div>

            <!-- REPERES -->
            <div class="repere-client">
                <p>Identification</p>
                <p>Prix / jours</p>
                <p>Caburant</p>
                <p>vehicule</p>
                <p>Transmission</p>
                <p>disponible</p>
                <p>Actions</p>
            </div>

            <!-- LISTE DES PATIENTS -->
            <div class="list-client">
                <!-- Patient -->
                @foreach ($vehicules as $car)
                    <div class="client">
                        <p>{{ $car->matricule }}</p>
                        <p> {{ $car->prixLocation }} € </p>
                        <p> {{ $car->carburant }} </p>
                        <p> {{ $car->getVehiculeName() }} </p>
                        <p> {{ $car->transmission->name }} </p>
                        <!-- <p class="status">NON</p> -->
                        @if ($car->disponibilite)
                            <p class="status_ok">OUI</p>
                        @else
                            <p class="status">NON</p>
                        @endif
                        <div>
                            <a href="#">
                                <button class="set"
                                    onclick="editCar('{{ $car->id }}', '{{ $car->matricule }}', '{{ $car->transmission_id }}', '{{ $car->carburant }}', '{{ $car->prixLocation }}')"><i
                                        class="fa-solid fa-pen"></i></button>
                            </a>
                            <a href="#">
                                <button class=""
                                    onclick="confirmStatus('{{ $car->matricule }}', '{{ $car->disponible }}')"><i
                                        class=".los fa-solid fa-trash-can"></i></button>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- PAGINATION -->
            <div class="pagination">
                <div>
                    <a href="#"><button class="pre">
                            << </button></a>
                    <a href="#"><button class="post">>></button></a>
                </div>
            </div>


        </div>

    </div>
@endsection

@section('notification')
    {{-- ajouter un vehicule --}}
    <div class="admining">
        <!-- ajouter un admin -->
        <div class="admining-box">
            <p>Enregistrer une voiture</p>
            <form action="{{ route('vehicule.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for=""></label>
                <input type="text" name="matricule" placeholder="Identification de la voiture">

                <label>Enregistrer l'image</label>
                <input type="file" name="imageVehicule"
                    accept="image/jpeg, image/png, image/jpg, image/gif, image/svg+xml, image/webp, image/avif">

                <label></label>
                <select name="categorie_id">
                    <option>Choisir une categorie</option>
                    @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id }}"> {{ $categorie->name }} </option>
                    @endforeach
                </select>

                <label></label>
                <select name="modele_id">
                    <option value="">Choisir un modele</option>
                    @foreach ($modeles as $modele)
                        <option value="{{ $modele->id }}"> {{ $modele->marque->name }} {{ $modele->name }} </option>
                    @endforeach
                </select>

                <label for="">Année de fabrication du vehicule</label>
                <input type="number" name="anneeFabrication" placeholder="">

                <label for="">Version du vehicule</label>
                <input type="text" name="versionVehicule" placeholder="">

                <label></label>
                <select name="transmission_id">
                    <option value="">Choisir une transmission</option>
                    @foreach ($transmissions as $transmission)
                        <option value="{{ $transmission->id }}"> {{ $transmission->name }} </option>
                    @endforeach
                </select>

                <label></label>
                <select name="carburant">
                    <option value="">choisir le type caburant</option>
                    <option value="essence">Essence</option>
                    <option value="diesel">Diesel</option>
                </select>

                <label for="">Prix de location</label>
                <input type="number" name="prixLocation" placeholder="">

                <button type="submit">Valider</button>
            </form>
        </div>
        <!-- Annuler l'enregistrenent -->
        <div class="admining-cancel">
            <i class="fa-solid fa-xmark"></i>
        </div>
    </div>
    {{-- modifier un vehicule --}}
    <div class="admining" id="editModal" style="display: none;">
        <div class="admining-box">
            <p>Modifier une voiture</p>
            <form id="editForm" action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label for=""></label>
                <input type="text" name="matricule" placeholder="Identification de la voiture" hidden>

                <label></label>
                <select name="transmission_id">
                    <option value="">Choisir une transmission</option>
                    @foreach ($transmissions as $transmission)
                        <option value="{{ $transmission->id }}"> {{ $transmission->name }} </option>
                    @endforeach
                </select>

                <label></label>
                <select name="carburant">
                    <option value="">choisir le type caburant</option>
                    <option value="essence">Essence</option>
                    <option value="diesel">Diesel</option>
                </select>

                <label for="">Prix de location</label>
                <input type="number" name="prixLocation" placeholder="">

                <button type="submit">Valider</button>
            </form>
        </div>
        <div class="admining-cancel close-form">
            <i class="fa-solid fa-xmark"></i>
        </div>
    </div>
    <!-- supprimer un element -->
    <div class="delete">
        <div class="delete-box">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <p>Voulez-vous supprimer cette voiture ?</p>
            <button>Confirmer</button>
        </div>
        <div class="delete-cancel">
            <i class="fa-solid fa-xmark"></i>
        </div>
    </div>
@endsection

@section('jscustom')
    <script src="{{ asset('js/dashboard/dashboard.js') }}"></script>
    <script src="{{ asset('js/dashboard/dashboard-car.js') }}"></script>
@endsection

@section('scriptjs')
    <script>
        function editCar(id, matricule, transmission, carburant, prix) {
            const editModal = document.querySelector("#editModal");
            const editForm = document.querySelector("#editForm");

            // Remplir les champs du formulaire
            editForm.action = `/vehicule/${id}`;
            editForm.querySelector('input[name="matricule"]').value = matricule;
            editForm.querySelector('select[name="transmission_id"]').value = transmission;
            editForm.querySelector('select[name="carburant"]').value = carburant;
            editForm.querySelector('input[name="prixLocation"]').value = prix;

            // Afficher la modale
            editModal.style.display = "block";
        }

        document.querySelector(".close-form").addEventListener("click", () => {
            document.querySelector("#editModal").style.display = "none";
        });

        function confirmStatus(carId, disponible) {
            const message = disponible == 1 ?
                "Le véhicule est disponible, voulez-vous le rendre indisponible ?" :
                "Le véhicule est indisponible, voulez-vous le rendre disponible ?";
            console.log(carId, disponible);

            const isConfirmed = confirm(message);
            if (isConfirmed) {
                // Logique pour mettre à jour le statut du véhicule
                alert("Le statut du véhicule a été mis à jour.");
            } else {
                alert("Le statut du véhicule n'a pas été modifié.");
            }
        }
    </script>
@endsection
