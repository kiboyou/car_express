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
                <p class="title">Listes des models</p>
            </div>

            <!-- RECHERCHE ET FILTRES -->
            <div class="search">
                <form action="#">
                    <!-- barre de recherche -->
                    <div>
                        <input type="text" name="" id="" placeholder="Rechercher un model" />
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

            <div class="repere-client model">
                <p>Id</p>
                <p>Nom de la marque</p>
                <p>Nom du model </p>
                <p>Actions</p>
            </div>

            <!-- LISTE DES PATIENTS -->
            <div class="list-client">
                <!-- Patient -->
                @php
                    $counter = 1;
                @endphp
                @foreach ($modeles as $modele)
                    <div class="client model">
                        <p> {{ $counter++ }} </p>
                        <p>{{ $modele->marque->name }}</p>
                        <p>{{ $modele->name }}</p>
                        <div>
                            <a href="#"><button class="set"><i class="fa-solid fa-pen"></i></button></a>
                            <a href="#"><button class="del"><i class=".los fa-solid fa-trash-can"></i></button></a>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- PAGINATION -->
            <div class="pagination">
                @if ($modeles->onFirstPage())
                    <button class="pre" disabled> << </button>
                @else
                    <a href="{{ $modeles->previousPageUrl() }}"><button class="pre"> << </button></a>
                @endif

                @if ($modeles->hasMorePages())
                    <a href="{{ $modeles->nextPageUrl() }}"><button class="post"> >> </button></a>
                @else
                    <button class="post" disabled>>></button>
                @endif
                {{-- <div>
                        <p>Page {{ $modeles->currentPage() }} of {{ $modeles->lastPage() }}</p>
                    </div> --}}
                {{-- <div>
                    <p>Page {{ $modeles->currentPage() }} of {{ $modeles->lastPage() }}</p>
                </div> --}}
                {{-- <div>
                    <a href="#"><button class="pre">
                            << </button></a>
                    <a href="#"><button class="post">>></button></a>
                </div> --}}
            </div>
        </div>
    </div>
@endsection

@section('notification')
    <div class="admining admining_model">
        <!-- ajouter une marque -->
        <div class="admining-box">
            <p>Enregistrer un model</p>
            <form>

                <label for=""></label>
                <input type="text" name="" placeholder="Entrez le nom du model">

                <label>choisissez la Marque</label>
                <select name="">
                    <option value=""></option>
                    <option value="">MARQUE-1</option>
                    <option value="">MARQUE-2</option>
                    <option value="">MARQUE-3</option>
                </select>
                <button type="submit">Valider</button>
            </form>
        </div>

        <!-- Annuler l'enregistrenent -->
        <div class="admining-cancel model">
            <i class="fa-solid fa-xmark"></i>
        </div>

    </div>
    <!-- supprimer un element -->
    <div class="delete">
        <div class="delete-box">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <p>Voulez-vous supprimer ce model ?</p>
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
