@extends('layouts.dashadmin')

@section('right')
    <div class="rigth">
        <!-- ADMIN INFO -->
        <div class="head">
            @include('includes.dashadminhead')
        </div>
        <!-- LIST OF ITEM -->
        <div class="admin">
            <!-- TITRE -->
            <div class="title">
                <p class="title">Listes des inventaires</p>
            </div>
            @php
                $user = Auth::guard('personnel')->user();
            @endphp
            <!-- RECHERCHE ET FILTRES -->
            <section class="search-inventaire">
                <form action="{{route('admin.inventaire.store')}}" method="POST">
                    <!-- barre de recherche -->
                    @csrf
                    <div>
                        <input type="hidden" name="idpersonnel" value="{{ $user->id }}" />
                        <label for="datedebut">Debut: </label>
                        <input type="date" name="debutinventaire" id="datedebut" />

                        <label for="datefin">Fin: </label>
                        <input type="date" name="fininventaire" id="datefin" />

                        <button type="submit">valider</button>
                    </div>
                </form>
            </section>

            <!-- AJOUTER -->
            <div class="register">
                <!-- <button>ajouter +</button>
                            <button class="refresh">refresh @</button> -->
            </div>

            <!-- REPERES -->
            <div class="repere-client">
                <p>Numero d'inventaire</p>
                <p>Date de debut</p>
                <p>Date de fin</p>
                <p>Realise Par</p>
                <p>Nombre de vehicule</p>
                <p>Actions</p>
            </div>

            <!-- LISTE DES PATIENTS -->
            <div class="list-client">
                <!-- Patient -->
                @foreach ($inventaires as $inventaire)
                    <div class="client">
                        <p>{{$inventaire->numinventaire}}</p>
                        <p>{{$inventaire->debutinventaire}}</p>
                        <p>{{$inventaire->fininventaire}}</p>
                        <p>{{$inventaire->personnel->username}}</p>
                        <p>{{$inventaire->nbrevehicule}}</p>
                        <div>
                            <a href="{{route('admin.inventaire.pdf',['debutinventaire' => $inventaire->debutinventaire, 'fininventaire' => $inventaire->fininventaire])}}"><button class="set"><i class="fa-solid fa-print"></i></button></a>
                            <!-- <a href="#"><button class="del"><i class=".los fa-solid fa-trash-can"></i></button></a> -->
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
    @endsection

    @section('notification')
        <div class="admining">
            <!-- ajouter un admin -->
            <div class="admining-box">
                <p>Enregistrer un client</p>
                <form>
                    <label for=""></label>
                    <input type="text" name="" placeholder="Nom">

                    <label for=""></label>
                    <input type="text" name="" placeholder="Prenom">

                    <label for=""></label>
                    <input type="email" name="" placeholder="Email">

                    <label for=""></label>
                    <input type="text" name="" placeholder="Sexe">

                    <label for=""></label>
                    <input type="text" name="" placeholder="adresse">

                    <label for=""></label>
                    <input type="date" name="" placeholder="Date de naissance">

                    <label for=""></label>
                    <input type="number" name="" placeholder="Numero de telephone">

                    <button type="submit">Valider</button>
                </form>
            </div>
            <!-- Annuler l'enregistrenent -->
            <div class="admining-cancel">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </div>
        <!-- supprimer un element -->
        <div class="delete">
            <div class="delete-box">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <p>Voulez-vous supprimer ce admin ?</p>
                <button>Confirmer</button>
            </div>
            <div class="delete-cancel">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </div>
    @endsection

    @section('jscustom')
        <script src="{{ asset('js/dashboard/dashboard.js') }}"></script>
        {{-- <script src="{{asset('js/dashboard/dashboard-car.js')}}"></script> --}}
    @endsection
