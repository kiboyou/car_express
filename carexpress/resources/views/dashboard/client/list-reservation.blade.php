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
                        @if ($reservation->statut_reservation == 'en attente')
                            <button style="color: green"
                                data-url="{{ route('reservation.confirm', $reservation->numreservation) }}"
                                onclick="confirmReservation(this)"><i class="fa-solid fa-square-check"></i></button>
                            <button style="color: red"
                                data-url="{{ route('reservation.cancel', $reservation->numreservation) }}"
                                onclick="cancelReservation(this)"><i class=".los fa-solid fa-ban"></i></button>
                        @elseif ($reservation->statut_reservation == 'en cours')
                            <button style="color: gray"
                                data-url="{{ route('reservation.confirm', $reservation->numreservation) }}" disabled
                                onclick="confirmReservation(this)"><i class="fa-solid fa-square-check"></i></button>
                            <button style="color: red"
                                data-url="{{ route('reservation.cancel', $reservation->numreservation) }}"
                                onclick="cancelReservation(this)"><i class=".los fa-solid fa-ban"></i></button>
                        @elseif ($reservation->statut_reservation == 'confirme')
                            <button style="color: gray"
                                data-url="{{ route('reservation.confirm', $reservation->numreservation) }}" disabled
                                onclick="confirmReservation(this)"><i class="fa-solid fa-square-check"></i></button>
                            <button style="color: red"
                                data-url="{{ route('reservation.cancel', $reservation->numreservation) }}"
                                onclick="cancelReservation(this)"><i class=".los fa-solid fa-ban"></i></button>
                        @elseif ($reservation->statut_reservation == 'annule')
                            <button style="color: gray"
                                data-url="{{ route('reservation.confirm', $reservation->numreservation) }}" disabled
                                onclick="confirmReservation(this)"><i class="fa-solid fa-square-check"></i></button>
                            <button style="color: gray"
                                data-url="{{ route('reservation.cancel', $reservation->numreservation) }}" disabled
                                onclick="cancelReservation(this)"><i class=".los fa-solid fa-ban"></i></button>
                        @endif
                        <!-- VALIDER -->
                        {{-- <a href="#"><button class="set"><i class="fa-solid fa-circle-check"></i></button></a>
                        <a href="#"><button class="del"><i class="fa-solid fa-ban"></i></button></a> --}}

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
                        << </button></a>
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
@section('scriptjs2')
    <script>
        function confirmReservation(button) {
            const url = button.getAttribute('data-url');
            const isConfirmed = confirm("Voulez-vous confirmer la reservation ?");
            if (isConfirmed) {
                fetch(url, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert(data.message);
                            // Actualiser la page ou mettre à jour l'interface utilisateur si nécessaire
                            location.reload();
                        } else {
                            alert(data.message);
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        alert("There was an error processing your request.");
                    });
            } else {
                alert("La reservation n'a pas été confirmé.");
            }
        }

        function cancelReservation(button) {
            const url = button.getAttribute('data-url');
            const isConfirmed = confirm("Voulez-vous annuler la reservation ?");
            if (isConfirmed) {
                fetch(url, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert(data.message);
                            // Actualiser la page ou mettre à jour l'interface utilisateur si nécessaire
                            location.reload();
                        } else {
                            alert(data.message);
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        alert("There was an error processing your request.");
                    });
            } else {
                alert("La reservation n'a pas été annule.");
            }
        }
    </script>
@endsection
