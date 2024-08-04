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
                <p class="title">Listes des reservation</p>
            </div>

            <!-- RECHERCHE ET FILTRES -->
            <div class="search">
                <form action="#">
                    <!-- barre de recherche -->
                    <div>
                        <input type="date" placeholder="Rechercher selon numero de telephone" name=""
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
                <p>Client</p>
                <p>Voiture</p>
                <p>Date de reservation</p>
                <p>Date de debut</p>
                <p>Date de fin</p>
                <p>Status</p>
                <p>Actions</p>
            </div>

            <!-- LISTE DES PATIENTS -->
            <div class="list-client">
                <!-- Patient -->
                <div class="client">
                    <p>OUATTARA</p>
                    <p>Voiture Économique</p>
                    <p>15/04/2022</p>
                    <p>15/04/2022</p>
                    <p>15/04/2022</p>
                    <p class="status">En cours...</p>
                    <!-- <p class="status_ok">valider</p> -->
                    <div>
                        <a href="#"><button class="set"><i class="fa-solid fa-square-check"></i></button></a>
                        <a href="#"><button class="del"><i class=".los fa-solid fa-trash-can"></i></button></a>
                    </div>
                </div>

                <!-- Patient -->
                <div class="client">
                    <p>OUATTARA</p>
                    <p>Voiture Économique</p>
                    <p>15/04/2022</p>
                    <p>15/04/2022</p>
                    <p>15/04/2022</p>
                    <p class="status">En cours...</p>
                    <!-- <p class="status_ok">valider</p> -->
                    <div>
                        <a href="#"><button class="set"><i class="fa-solid fa-square-check"></i></button></a>
                        <a href="#"><button class="del"><i class=".los fa-solid fa-trash-can"></i></button></a>
                    </div>
                </div>

                <!-- Patient -->
                <div class="client">
                    <p>OUATTARA</p>
                    <p>Voiture Économique</p>
                    <p>15/04/2022</p>
                    <p>15/04/2022</p>
                    <p>15/04/2022</p>
                    <p class="status">En cours...</p>
                    <!-- <p class="status_ok">valider</p> -->
                    <div>
                        <a href="#"><button class="set"><i class="fa-solid fa-square-check"></i></button></a>
                        <a href="#"><button class="del"><i class=".los fa-solid fa-trash-can"></i></button></a>
                    </div>
                </div>

                <!-- Patient -->
                <div class="client">
                    <p>OUATTARA</p>
                    <p>Voiture Économique</p>
                    <p>15/04/2022</p>
                    <p>15/04/2022</p>
                    <p>15/04/2022</p>
                    <p class="status">En cours...</p>
                    <!-- <p class="status_ok">valider</p> -->
                    <div>
                        <a href="#"><button class="set"><i class="fa-solid fa-square-check"></i></button></a>
                        <a href="#"><button class="del"><i class=".los fa-solid fa-trash-can"></i></button></a>
                    </div>
                </div>

                <!-- Patient -->
                <div class="client">
                    <p>OUATTARA</p>
                    <p>Voiture Économique</p>
                    <p>15/04/2022</p>
                    <p>15/04/2022</p>
                    <p>15/04/2022</p>
                    <p class="status">En cours...</p>
                    <!-- <p class="status_ok">valider</p> -->
                    <div>
                        <a href="#"><button class="set"><i class="fa-solid fa-square-check"></i></button></a>
                        <a href="#"><button class="del"><i class=".los fa-solid fa-trash-can"></i></button></a>
                    </div>
                </div>

                <!-- Patient -->
                <div class="client">
                    <p>OUATTARA</p>
                    <p>Voiture Économique</p>
                    <p>15/04/2022</p>
                    <p>15/04/2022</p>
                    <p>15/04/2022</p>
                    <p class="status">En cours...</p>
                    <!-- <p class="status_ok">valider</p> -->
                    <div>
                        <a href="#"><button class="set"><i class="fa-solid fa-square-check"></i></button></a>
                        <a href="#"><button class="del"><i class=".los fa-solid fa-trash-can"></i></button></a>
                    </div>
                </div>

                <!-- Patient -->
                <div class="client">
                    <p>OUATTARA</p>
                    <p>Voiture Économique</p>
                    <p>15/04/2022</p>
                    <p>15/04/2022</p>
                    <p>15/04/2022</p>
                    <p class="status">En cours...</p>
                    <!-- <p class="status_ok">valider</p> -->
                    <div>
                        <a href="#"><button class="set"><i class="fa-solid fa-square-check"></i></button></a>
                        <a href="#"><button class="del"><i class=".los fa-solid fa-trash-can"></i></button></a>
                    </div>
                </div>

                <!-- Patient -->
                <div class="client">
                    <p>OUATTARA</p>
                    <p>Voiture Économique</p>
                    <p>15/04/2022</p>
                    <p>15/04/2022</p>
                    <p>15/04/2022</p>
                    <p class="status">En cours...</p>
                    <!-- <p class="status_ok">valider</p> -->
                    <div>
                        <a href="#"><button class="set"><i class="fa-solid fa-square-check"></i></button></a>
                        <a href="#"><button class="del"><i class=".los fa-solid fa-trash-can"></i></button></a>
                    </div>
                </div>

                <!-- Patient -->
                <div class="client">
                    <p>OUATTARA</p>
                    <p>Voiture Économique</p>
                    <p>15/04/2022</p>
                    <p>15/04/2022</p>
                    <p>15/04/2022</p>
                    <p class="status">En cours...</p>
                    <!-- <p class="status_ok">valider</p> -->
                    <div>
                        <a href="#"><button class="set"><i class="fa-solid fa-square-check"></i></button></a>
                        <a href="#"><button class="del"><i class=".los fa-solid fa-trash-can"></i></button></a>
                    </div>
                </div>

                <!-- Patient -->
                <div class="client">
                    <p>OUATTARA</p>
                    <p>Voiture Économique</p>
                    <p>15/04/2022</p>
                    <p>15/04/2022</p>
                    <p>15/04/2022</p>
                    <p class="status">En cours...</p>
                    <!-- <p class="status_ok">valider</p> -->
                    <div>
                        <a href="#"><button class="set"><i class="fa-solid fa-square-check"></i></button></a>
                        <a href="#"><button class="del"><i class=".los fa-solid fa-trash-can"></i></button></a>
                    </div>
                </div>

                <!-- Patient -->
                <div class="client">
                    <p>OUATTARA</p>
                    <p>Voiture Économique</p>
                    <p>15/04/2022</p>
                    <p>15/04/2022</p>
                    <p>15/04/2022</p>
                    <p class="status">En cours...</p>
                    <!-- <p class="status_ok">valider</p> -->
                    <div>
                        <a href="#"><button class="set"><i class="fa-solid fa-square-check"></i></button></a>
                        <a href="#"><button class="del"><i class=".los fa-solid fa-trash-can"></i></button></a>
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

    </div>
@endsection

@section('notification')
    <div class="admining">
        <!-- ajouter un admin -->
        <div class="admining-box">
            <p>Enregistrer une reservation</p>
            <form>
                <label>choisissez le client</label>
                <select name="">
                    <option value=""></option>
                    <option value="">GEORGES PAUL</option>
                    <option value="">DELACROIX ERIC</option>
                    <option value="">DUCHESS REINE</option>
                </select>

                <label>choisissez la voiture</label>
                <select name="">
                    <option value=""></option>
                    <option value="">GEORGES PAUL</option>
                    <option value="">DELACROIX ERIC</option>
                    <option value="">DUCHESS REINE</option>
                </select>

                <label for="datedebut">date de debut</label>
                <input type="date" name="" placeholder="Date de naissance" id="datedebut">

                <label for="datefin">date de fin</label>
                <input type="date" name="" placeholder="Date de naissance" id="datefin">

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
            <p>Voulez-vous supprimer cette reservation ?</p>
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
