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
                <p class="title">Listes des inventaires</p>
            </div>

            <!-- RECHERCHE ET FILTRES -->
            <section class="search-inventaire">
                <form action="#">
                    <!-- barre de recherche -->
                    <div>
                        <label for="datedebut">date de debut : </label>
                        <input type="date" name="" id="datedebut" />

                        <label for="datefin">date de fin : </label>
                        <input type="date" name="" id="datefin" />

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
                <!-- <p>Nom</p>
                <p>Prenoms</p>
                <p>Date de naissance</p>
                <p>Email</p>
                <p>Adresse</p>
                <p>Telephone</p>
                <p>Actions</p> -->
            </div>

            <!-- LISTE DES PATIENTS -->
            <div class="list-client">
                <!-- Patient -->
                <div class="client">
                    <!-- <p>OUATTARA</p>
                  <p>Kiboyou Mohamed</p>
                  <p>15/04/2022</p>
                  <p>ouattarakiboyoumohamed@gmail.com</p>
                  <p>Foyer Babel</p>
                  <p> 0759239686</p>
                  <div> -->
                    <!-- <a href="#"><button class="set"><i class="fa-solid fa-pen"></i></button></a> -->
                    <!-- <a href="#"><button class="del"><i class=".los fa-solid fa-trash-can"></i></button></a> -->
                </div>
            </div>
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
