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
                <p class="title">Listes des gestionnaires</p>
            </div>

            <!-- RECHERCHE ET FILTRES -->
            <div class="search">
                <form action="{{ route('admin.gestionnaire') }}" method="GET">
                    <!-- barre de recherche -->
                    <div>
                        <input type="text" placeholder="Rechercher selon nom" name="namesearch" id="" />
                        <button type="submit">Rechercher</button>
                    </div>
                </form>
            </div>
            @if (session('success'))
                <div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                    </svg>
                    <p>{{ session('success') }}.</p>
                </div>
            @endif
            @if ($errors->any())
                <div role="alert">
                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                        Danger
                    </div>
                    <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <!-- AJOUTER -->
            <div class="register">
                <button>ajouter +</button>
                <button class="refresh">refresh @</button>
            </div>

            <!-- REPERES -->
            <div class="repere-client">
                <p>Nom</p>
                <p>Prenoms</p>
                <p>Username</p>
                <p>Email</p>
                <p>role</p>
                <p>Statut</p>
                <p>Actions</p>
            </div>

            <!-- LISTE DES PATIENTS -->
            <div class="list-client">
                <!-- Patient -->
                @foreach ($personels as $personel)
                    <div class="client">
                        <p>{{ $personel->lastname }}</p>
                        <p>{{ $personel->firstname }}</p>
                        <p>{{ $personel->username }}</p>
                        <p>{{ $personel->email }}</p>
                        <p>{{ $personel->role }}</p>
                        @if ($personel->statut == 'actif')
                            <p class="status_ok">OUI</p>
                        @else
                            <p class="status">NON</p>
                        @endif
                        <div>
                            <button class="set" onclick="resetPasswordPersonel(this)" data-url="{{ route('admin.gestionnaire.delete', ['idpersonel' => $personel->id]) }}"><i class="fa-solid fa-pen"></i></button>
                            <button style="color: red" onclick="deleteManager(this)"
                                data-url="{{ route('admin.gestionnaire.delete', ['idpersonel' => $personel->id]) }}"><i
                                    class=".los fa-solid fa-trash-can"></i></button>
                            <button onclick="changeStatus(this)"
                                data-url="{{ route('admin.gestionnaire.statut', ['idpersonel' => $personel->id]) }}"
                                title="change statut" style="color: red"><i class=".los fa-solid fa-rotate"></i></button>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- PAGINATION -->
            <div class="pagination">
                <div>
                    <x-pagination :varmodele="$personels"></x-pagination>
                </div>
            </div>


        </div>

    </div>
@endsection

@section('notification')
    <div class="admining">
        <!-- ajouter un admin -->
        <div class="admining-box">
            <p>Enregistrer un gestionnaire</p>
            <form method="POST" action="{{ route('personnel.store') }}">
                @csrf

                <label for="lastname">Nom</label>
                <input type="text" name="lastname" placeholder="Nom" value="{{ old('lastname') }}">
                @error('lastname')
                    <div>{{ $message }}</div>
                @enderror

                <label for="firstname">Prenom</label>
                <input type="text" name="firstname" placeholder="Prenom" value="{{ old('firstname') }}">
                @error('firstname')
                    <div>{{ $message }}</div>
                @enderror

                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                @error('email')
                    <div>{{ $message }}</div>
                @enderror

                <label for="role">Role</label>
                <select name="role">
                    <option value="">Choisir le rôle</option>
                    <option value="administrateur" {{ old('role') == 'administrateur' ? 'selected' : '' }}>Administrateur
                    </option>
                    <option value="manager" {{ old('role') == 'manager' ? 'selected' : '' }}>Manager</option>
                </select>
                @error('role')
                    <div>{{ $message }}</div>
                @enderror

                <label for="phone">Numero de telephone</label>
                <input type="number" name="phone" placeholder="Numero de telephone" value="{{ old('phone') }}">
                @error('phone')
                    <div>{{ $message }}</div>
                @enderror

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
            <p>Voulez-vous supprimer ce gestionnaire ?</p>
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
        //change status
        function changeStatus(button) {
            const url = button.getAttribute('data-url');
            const isConfirmed = confirm("Voulez-vous changer le statut de ce manager ?");
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
                alert("Le statut du manager n'a pas été modifié.");
            }
        }

        //delete
        function deleteManager(button) {
            const url = button.getAttribute('data-url');
            const isConfirmed = confirm("Voulez-vous supprimer ce manager ?");
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
                alert("Le manager n'a pas été supprimé.");
            }
        }
        //reset password
        function resetPasswordPersonel(button) {
            const url = button.getAttribute('data-url');
            const isConfirmed = confirm("Voulez-vous reinitialiser le mot de passe  ce manager ?");
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
                alert("Le mot de passe de ce manager n'a pas été reinitialisé.");
            }
        }
    </script>
@endsection
