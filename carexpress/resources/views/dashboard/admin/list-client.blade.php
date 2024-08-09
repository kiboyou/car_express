@extends('layouts.dashadmin')
@section('right')
    <div class="rigth">
        <!-- ADMIN INFO -->
        <div class="head">
            @include('includes.dashadminhead');
        </div>
        <!-- LIST OF ITEM -->
        <div class="admin">
            <!-- TITRE -->
            <div class="title">
                <p class="title">Listes des clients</p>
            </div>

            <!-- RECHERCHE ET FILTRES -->
            <div class="search">
                <form action="#">
                    <!-- barre de recherche -->
                    <div>
                        <input type="number" placeholder="Rechercher selon numero de telephone" name=""
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
                <p>code client</p>
                <p>Prenoms</p>
                <p>Nom</p>
                <p>Email</p>
                <p>Telephone</p>
                <p>statut</p>
                <p>Actions</p>
            </div>

            <!-- LISTE DES PATIENTS -->
            <div class="list-client">
                <!-- Patient -->
                @foreach ($customers as $customer)
                    <div class="client">
                        <p>{{ $customer->codeclient }}</p>
                        <p>{{ $customer->firstname }}</p>
                        <p>{{ $customer->lastname }}</p>
                        <p>{{ $customer->email }}</p>
                        <p>{{ $customer->phone }}</p>
                        @if ($customer->statut == 'actif')
                            <p class="status_ok">actif</p>
                        @else
                            <p class="status">inactif</p>
                        @endif
                        <div>
                            {{-- <a href="#">
                                <button class="set"><i class="fa-solid fa-pen"></i></button>
                            </a> --}}
                            <button class="set" onclick="reinitCustomerPassword('{{ $customer->codeclient }}')"
                                title="reinit password"><i class="fa-solid fa-pen"></i></button>
                            <button onclick="changeStatus(this)"
                                data-url="{{ route('admin.customer.statut', ['codeclient' => $customer->codeclient]) }}"
                                title="change statut" style="color: red"><i class=".los fa-solid fa-rotate"></i></button>
                            <button onclick="changeStatus(this)"
                                data-url="{{ route('admin.customer.delete', ['codeclient' => $customer->codeclient]) }}"
                                title="change statut" style="color: red"><i class=".los fa-solid fa-trash-can"></i></button>
                            {{-- <a href="#">
                                <button onclick="changeStatus('{{ $customer->codeclient }}', '{{ $customer->statut }}')"
                                    title="change statut" style="color: red"><i
                                        class=".los fa-solid fa-rotate"></i></button>
                            </a> --}}
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- PAGINATION -->
            <div class="pagination">
                <div>
                    <x-pagination :varmodele="$customers"></x-pagination>
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
            <p>Voulez-vous supprimer ce client ?</p>
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
        // function changeStatus(codeclient, statutclient) {
        //     const message = statutclient == "actif" ?
        //         "Le client est actif, voulez-vous le rendre inactif ?" :
        //         "Le client est inactif, voulez-vous le rendre actif ?";
        //     console.log(codeclient, statutclient);

        //     const isConfirmed = confirm(message);
        //     if (isConfirmed) {
        //         // Logique pour mettre à jour le statut du véhicule
        //         // alert("Le statut du client a été mis à jour.");
        //         fetch('/admin/customer/changestatus', {
        //                 method: 'POST',
        //                 headers: {
        //                     'Content-Type': 'application/json',
        //                     'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        //                 },
        //                 body: JSON.stringify({
        //                     codeclient: codeclient
        //                 })
        //             })
        //             .then(response => response.json())
        //             .then(data => {
        //                 alert(data.message);
        //                 // Actualiser la page ou mettre à jour l'interface utilisateur si nécessaire
        //             })
        //             .catch(error => console.error('Erreur:', error));
        //     } else {
        //         alert("Le statut du client n'a pas été modifié.");
        //     }
        // }
        function changeStatus(button) {
            const url = button.getAttribute('data-url');
            const isConfirmed = confirm("Voulez-vous changer le statut de ce client ?");
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
                alert("Le statut du client n'a pas été modifié.");
            }
        }

        function reinitCustomerPassword(codeclient) {
            console.log(codeclient);

            const isConfirmed = confirm("Voulez vous reinitialiser le mot de passe de ce client ?");
            if (isConfirmed) {
                // Logique pour mettre à jour le statut du véhicule
                alert("Le mot de passe du client a été réinitialisé.");
            } else {
                alert("Le mot de passe du client n'a pas été réinitialisé.");
            }
        }

        function deleteCustomer(button) {
            const url = button.getAttribute('data-url');
            const isConfirmed = confirm("Voulez-vous supprimer ce client ?");
            if (isConfirmed) {
                fetch(url, {
                        method: 'DELETE',
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
                alert("Le client n'a pas été supprimé.");
            }
        }
    </script>
@endsection
