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
                @foreach ($reservations as $reservation)
                    <div class="client">
                        <p>{{ $reservation->customer->codeclient }}</p>
                        <p>{{ $reservation->vehicule->getVehiculeName() }}</p>
                        <p>{{ $reservation->created_at }}</p>
                        <p>{{ $reservation->debutlocation }}</p>
                        <p>{{ $reservation->finlocation }}</p>
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
                                <button style="color: gray" disabled><i class="fa-solid fa-square-check"></i></button>
                                <button style="color: red"
                                    data-url="{{ route('reservation.cancel', $reservation->numreservation) }}"
                                    onclick="cancelReservation(this)"><i class=".los fa-solid fa-ban"></i></button>
                            @elseif ($reservation->statut_reservation == 'confirme')
                                <button style="color: gray" disabled><i class="fa-solid fa-square-check"></i></button>
                                <button style="color: red"
                                    data-url="{{ route('reservation.cancel', $reservation->numreservation) }}"
                                    onclick="cancelReservation(this)"><i class=".los fa-solid fa-ban"></i></button>
                            @elseif ($reservation->statut_reservation == 'annule')
                                <button style="color: gray" disabled><i class="fa-solid fa-square-check"></i></button>
                                <button style="color: gray" disabled><i class=".los fa-solid fa-ban"></i></button>
                            @endif
                            {{-- <a href="#"><button class="set"><i class="fa-solid fa-square-check"></i></button></a> --}}
                            {{-- <a href="#"><button class="del"><i class=".los fa-solid fa-trash-can"></i></button></a> --}}
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- PAGINATION -->
            <div class="pagination">
                <div>
                    <x-pagination :varmodele="$reservations"></x-pagination>
                    {{-- <a href="#"><button class="pre">
                            << </button></a>
                    <a href="#"><button class="post">>></button></a> --}}
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
@section('scriptjs')
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
