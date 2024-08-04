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
                <p class="title">Listes des Transmissions</p>
            </div>

            <!-- RECHERCHE ET FILTRES -->
            <div class="search">
                <form action="#">
                    <!-- barre de recherche -->
                    <div>
                        <input type="text" name="" id="" />
                        <button type="submit">Rechercher une transmission</button>
                    </div>
                </form>
            </div>

            <!-- AJOUTER -->
            <div class="register">
                <button>ajouter +</button>
                <button class="refresh">refresh @</button>
            </div>

            <!-- REPERES -->
            <div class="repere-client marque">
                <p>Id</p>
                <p>Nom de la transmission</p>

                <p>Actions</p>
            </div>

            <!-- LISTE DES PATIENTS -->
            <div class="list-client">
                <!-- Patient -->
                @php
                    $counter = 1;
                @endphp
                @foreach ($transmissions as $transmission)
                    <div class="client marque">
                        <p>{{ $counter++ }}</p>
                        <p>{{ $transmission->name }}</p>

                        <div>
                            <a href="#"><button class="set"><i class="fa-solid fa-pen"></i></button></a>
                            <a href="#"><button class="del"><i class=".los fa-solid fa-trash-can"></i></button></a>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="client marque">
                    <p>01</p>
                    <p>Voiture Économique</p>

                    <div>
                        <a href="#"><button class="set"><i class="fa-solid fa-pen"></i></button></a>
                        <a href="#"><button class="del"><i class=".los fa-solid fa-trash-can"></i></button></a>
                    </div>
                </div> --}}
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
    <div class="admining admining_marque">
        <!-- ajouter une transmission -->
        <div class="admining-box">
            <p>Enregistrer une transmission</p>
            <form>

                <label for=""></label>
                <input type="text" name="" placeholder="Entrez le nom de la transmission">

                <button type="submit">Valider</button>
            </form>
        </div>
        <!-- Annuler l'enregistrenent -->
        <div class="admining-cancel marque">
            <i class="fa-solid fa-xmark"></i>
        </div>
    </div>
    <!-- supprimer un element -->
    <div class="delete">
        <div class="delete-box">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <p>Voulez-vous supprimer cette Transmission ?</p>
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
