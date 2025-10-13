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
                <p class="title">Listes des factures </p>
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
                <button style="display:  none;">ajouter +</button>
                <button class="refresh">refresh @</button>
            </div>

            <!-- REPERES -->
            <div class="repere-client">
                <p>Client</p>
                <p>Numero de facture</p>
                <p>Numero de reservation </p>
                <p>nombre de jours</p>
                <p>Montant</p>
                <p>Total</p>
                <p>Actions</p>
            </div>

            <!-- LISTE DES PATIENTS -->
            <div class="list-client">
                <!-- Patient -->
                @foreach ($invoices as $invoice)
                    <div class="client">
                        <p>{{ $invoice->reservation->customer->codeclient }}</p>
                        <p>{{ $invoice->numfacture }}</p>
                        <p>{{ $invoice->reservation->numreservation }}</p>
                        <p>{{ $invoice->nombre_jour }}</p>
                        <p>{{ $invoice->montant }}</p>
                        <p>{{ $invoice->montant_total }}</p>
                        <!-- <p class="status_ok">valider</p> -->
                        <div>
                            @php
                                $encryptednumfacture = Crypt::encrypt($invoice->numfacture);
                            @endphp
                            <a href="{{ route('admin.facture.pdf', $encryptednumfacture) }}"><button class="set"><i
                                        class="fa-solid fa-print"></i></button></a>
                            @if ($invoice->montantrestant == 0)
                                <button class="set" disabled
                                    onclick="makePaiement('{{ $invoice->numfacture }}', '{{ $invoice->montantrestant }}')"><i
                                        class="fa-solid fa-credit-card"></i></button>
                            @else
                                <button class="set"
                                    onclick="makePaiement('{{ $invoice->numfacture }}', '{{ $invoice->montantrestant }}')"><i
                                        class="fa-solid fa-credit-card"></i></button>
                            @endif
                            {{-- <a href="#"><button class="set"><i class="fa-solid fa-pen"></i></button></a>
                            <a href="#"><button class="del"><i class=".los fa-solid fa-trash-can"></i></button></a> --}}
                        </div>
                    </div>
                @endforeach
            </div>


            <!-- PAGINATION -->
            <div class="pagination">
                <div>
                    <x-pagination :varmodele="$invoices"></x-pagination>
                </div>
            </div>


        </div>

    </div>
@endsection

@section('notification')
    <div class="admining">
        <!-- ajouter un admin -->
        <div class="admining-box">
            <p>Enregistrer une facture </p>
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

                <label>choisissez la reservation</label>
                <select name="">
                    <option value=""></option>
                    <option value="">RERSERVATION-1</option>
                    <option value="">RERSERVATION-2</option>
                    <option value="">RERSERVATION-3</option>
                </select>

                <label for=""></label>
                <input type="number" name="" placeholder="prix unitaire">

                <label for=""></label>
                <input type="number" name="" placeholder="Nombre de jours">

                <button type="submit">Valider</button>
            </form>
        </div>
        <!-- Annuler l'enregistrenent -->
        <div class="admining-cancel">
            <i class="fa-solid fa-xmark"></i>
        </div>
    </div>
    {{-- effectuer un paiement --}}
    <div class="admining" id="editModalPaiment" style="display: none;">
        <div class="admining-box">
            <p>Effectuer un paiment</p>
            <form id="editFormPaiment" method="POST">
                @csrf
                <label for=""></label>
                <input type="text" name="facture_id" placeholder="" hidden>

                <label></label>

                <label>Montant Restant a payé</label>
                <input type="number" name="montant" disabled placeholder="Montant a payé">

                <label>Montant Versé</label>
                <input type="number" name="montant_verse" placeholder="Montant payé">

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
            <p>Voulez-vous supprimer cette facture ?</p>
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
        function makePaiement(numfacture, montant) {
            const editModal = document.querySelector("#editModalPaiment");
            const editForm = document.querySelector("#editFormPaiment");

            // Remplir les champs du formulaire
            // const paiementUrl = "{{ route('admin.facture.paiment', ['numfacture' => 'NUMFACTURE_PLACEHOLDER']) }}";
            // editForm.action = paiementUrl.replace('NUMFACTURE_PLACEHOLDER', numfacture);
            const paiementUrl = "{{ route('admin.facture.paiment') }}";
            editForm.action = paiementUrl;
            // editForm.action = `/facture/paiement/${numfacture}`;
            editForm.querySelector('input[name="facture_id"]').value = numfacture;
            editForm.querySelector('input[name="montant"]').value = montant;

            // Afficher la modale
            editModal.style.display = "block";
        }
        document.querySelector(".close-form").addEventListener("click", () => {
            document.querySelector("#editModalPaiment").style.display = "none";
        });
    </script>
@endsection
