@extends('layouts.dashcustomer')
@section('otherpart')
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
                    <input type="date" placeholder="Rechercher selon numero de telephone" name="" id="" />
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
            <p>Num Reservation</p>
            <p>Voiture</p>
            <p>Date de reservation</p>
            <p>Date de debut</p>
            <p>Date de fin</p>
            <p>Status</p>
            <p>Actions</p>
        </div>

        <!-- LISTE DES RESERVATIONS -->

        <div class="list-client">
            <!-- client -->
            @foreach ($reservations as $reservation)
                <div class="client">
                    <p>{{ $reservation->numreservation }}</p>
                    <p>{{ $reservation->vehicule->getVehiculeName() }}</p>
                    <p>{{ $reservation->created_at }}</p>
                    <p>{{ $reservation->debutlocation }}</p>
                    <p>{{ $reservation->finlocation }}</p>
                    <!-- <p class="status">En cours...</p> -->
                    {{-- <p class="status_ok">valider</p> --}}
                    @if ($reservation->statut_reservation == 'en attente')
                        <p class="status">En attente...</p>
                    @elseif ($reservation->statut_reservation == 'en cours')
                        <p class="status_progress">En cours...</p>
                    @elseif ($reservation->statut_reservation == 'confirme')
                        <p class="status_ok">Confirmé</p>
                    @elseif ($reservation->statut_reservation == 'annule')
                        <p class="status_cancel">Annulé.</p>
                    @endif
                    <div>
                        <!-- VALIDER -->
                        <a href="#"><button class="set"><i class="fa-solid fa-circle-check"></i></button></a>
                        <a href="#"><button class="del"><i class="fa-solid fa-ban"></i></button></a>

                        <!-- PAS VALIDER -->
                        <!-- <p>....</p> -->
                    </div>
                </div>
            @endforeach

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

        <!-- Annuler l'enregistrenent -->
        <div class="admining-cancel">
            <i class="fa-solid fa-xmark"></i>
        </div>
    </div>
    <!-- supprimer un element -->
    <div class="delete">
        <div class="delete-box">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <p>Voulez-vous annuler cette reservation ?</p>
            <button>Confirmer</button>
        </div>
        <div class="delete-cancel">
            <i class="fa-solid fa-xmark"></i>
        </div>
    </div>
@endsection
@section('scriptjs')
    <script src="{{ asset('js/dashboard/dashboard.js') }}"></script>
@endsection
