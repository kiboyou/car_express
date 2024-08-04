@extends('layouts.dashcustomer')

@section('otherpart')
    <!-- LIST OF ITEM -->
    <div class="admin">
        <!-- TITRE -->
        <div class="title">
            <p class="title">Listes des reçus</p>
        </div>

        <!-- RECHERCHE ET FILTRES -->
        <div class="search">
            <form action="#">
                <!-- barre de recherche -->
                <div>
                    <input type="date" name="" id="" />
                    <button type="submit">Rechercher</button>
                </div>
            </form>
        </div>

        <!-- AJOUTER -->
        <div class="register">
            <button style="display:  none;"></button>
            <button class="refresh">refresh @</button>
        </div>

        <!-- REPERES -->
        <div class="repere-client">
            <p>Client</p>
            <p>Voiture</p>
            <p>Numero facture </p>
            <p>Montant total</p>
            <p>Montant payé</p>
            <p>Montnat restant</p>
            <p>Actions</p>
        </div>

        <!-- LISTE DES PATIENTS -->
        <div class="list-client">
            <!-- Patient -->
            <div class="client">
                <p>OUATTARA</p>
                <p>Voiture Économique</p>
                <p>12045167</p>
                <p>150 000</p>
                <p>100 000</p>
                <p>50 000</p>

                <div>
                    <a href="#"><button class="set"><i class="fa-solid fa-print"></i></button></a>
                    <a href="#"><button class="del"><i class=".los fa-solid fa-trash-can"></i></button></a>
                </div>
            </div>
        </div>

        <!-- PAGINATION -->
        <div class="pagination">
            <div>
                <a href="#"><button class="pre">
                        <<< /button></a>
                <a href="#"><button class="post">>></button></a>
            </div>
        </div>
    </div>
@endsection

@section('notification')
    <!-- NOTIFICATION -->
    <div class="admining">
        <!-- ajouter un admin -->
        <div class="admining-box">
            <p>Enregistrer un reçu </p>
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

                <label>choisissez la facture</label>
                <select name="">
                    <option value=""></option>
                    <option value="">FACTURE-1</option>
                    <option value="">FACTURE-2</option>
                    <option value="">FACTURE-3</option>
                </select>

                <label>Mode de paiement</label>
                <select name="">
                    <option value=""></option>
                    <option value="">Carte visa</option>
                    <option value="">Moyen mobile</option>
                    <option value="">Physique</option>
                </select>

                <label for=""></label>
                <input type="number" name="" placeholder="Montant a payé">

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
            <p>Voulez-vous supprimer ce reçu ?</p>
            <button>Confirmer</button>
        </div>
        <div class="delete-cancel">
            <i class="fa-solid fa-xmark"></i>
        </div>
    </div>
@endsection

@section('scriptjs')
    <script src="{{asset('js/dashboard/dashboard.js')}}"></script>
@endsection
