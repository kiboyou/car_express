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
                <button style="display:  none;">ajouter +</button>
                <button class="refresh">refresh @</button>
            </div>

            <!-- REPERES -->
            <div class="repere-client">
                <p>Client</p>
                <p>Numero received</p>
                <p>Numero facture </p>
                <p>Montant Versé</p>
                <p>Montant total</p>
                <p>Montnat restant</p>
                <p>Actions</p>
            </div>

            <!-- LISTE DES PATIENTS -->
            <div class="list-client">
                <!-- Patient -->
                @foreach ($receiveds as $received)
                    <div class="client">
                        <p>{{ $received->facture->reservation->customer->codeclient }}</p>
                        <p>{{ $received->numreceived }}</p>
                        <p>{{ $received->facture->numfacture }}</p>
                        <p>{{ $received->montant_verse }}</p>
                        <p>{{ $received->facture->montant_total }}</p>
                        <p>{{ $received->restant }}</p>

                        <div>
                            @php
                                $encryptednumreceived = Crypt::encrypt($received->numreceived);
                            @endphp
                            <a href="{{ route('admin.received.pdf', $encryptednumreceived) }}"><button class="set"><i
                                        class="fa-solid fa-print"></i></button></a>
                            {{-- <a href="#"><button class="del"><i class=".los fa-solid fa-trash-can"></i></button></a> --}}
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- PAGINATION -->
            <div class="pagination">
                <div>
                    <x-pagination :varmodele="$receiveds"></x-pagination>
                </div>
            </div>


        </div>

    </div>
@endsection

@section('notification')
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

@section('jscustom')
    <script src="{{ asset('js/dashboard/dashboard.js') }}"></script>
    {{-- <script src="{{asset('js/dashboard/dashboard-car.js')}}"></script> --}}
@endsection
