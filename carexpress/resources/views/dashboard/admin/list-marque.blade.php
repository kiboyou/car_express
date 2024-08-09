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
                <p class="title">Listes des marques</p>
            </div>

            <!-- RECHERCHE ET FILTRES -->
            <div class="search">
                <form action="#">
                    <!-- barre de recherche -->
                    <div>
                        <input type="text" name="" id="" placeholder="Rechercher........" />
                        <button type="submit">Rechercher une marque</button>
                    </div>
                </form>
            </div>

            <!-- AJOUTER -->
            <div class="register">
                <button>ajouter +</button>
                <button class="refresh">refresh @</button>
            </div>

            <!-- REPERES -->
            <div class="repere-client marque">
                <p>Id</p>
                <p>Nom de la marque</p>

                <p>Actions</p>
            </div>

            <!-- LISTE DES PATIENTS -->
            <div class="list-client">
                <!-- Patient -->
                @php
                    $counter = 1;
                @endphp
                @foreach ($marques as $marque)
                    <div class="client marque">
                        <p> {{ $counter++ }} </p>
                        <p>{{ $marque->name }}</p>

                        <div>
                            {{-- <a href="#"><button class="set"><i class="fa-solid fa-pen"></i></button></a> --}}
                            <button style="color: red" onclick="deleteMarque(this)" data-url="{{route('admin.marque.delete', ['idmarque' => $marque->id])}}"><i class=".los fa-solid fa-trash-can"></i></button>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="client marque">
                    <p>01</p>
                    <p>Voiture Économique</p>

                    <div>
                        <a href="#"><button class="set"><i class="fa-solid fa-pen"></i></button></a>
                        <a href="#"><button class="del"><i class=".los fa-solid fa-trash-can"></i></button></a>
                    </div>
                </div> --}}
            </div>

            <!-- PAGINATION -->
            <div class="pagination">
                <div>
                    <x-pagination :varmodele="$marques"></x-pagination>
                    {{-- <a href="#"><button class="pre">
                            << </button></a>
                    <a href="#"><button class="post">>></button></a> --}}
                </div>
            </div>


        </div>

    </div>
@endsection

@section('notification')
    <div class="admining admining_marque">
        <!-- ajouter un model -->
        <div class="admining-box">
            <p>Enregistrer une marque</p>
            <form>

                <label for=""></label>
                <input type="text" name="" placeholder="Entrez le nom de la marque">

                <button type="submit">Valider</button>
            </form>
        </div>

        <!-- Annuler l'enregistrenent -->
        <div class="admining-cancel marque">
            <i class="fa-solid fa-xmark"></i>
        </div>
    </div>
    <!-- supprimer un element -->
    <div class="delete">
        <div class="delete-box">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <p>Voulez-vous supprimer cette marque ?</p>
            <button>Confirmer</button>
        </div>
        <div class="delete-cancel">
            <i class="fa-solid fa-xmark"></i>
        </div>
    </div>
@endsection

@section('jscustom')
    <script src="{{ asset('js/dashboard/dashboard.js') }}"></script>
    <script src="{{ asset('js/dashboard/dashboard-car.js') }}"></script>
@endsection

@section('scriptjs')
    <script>
        function deleteMarque(button) {
            const url = button.getAttribute('data-url');
            const isConfirmed = confirm("Voulez-vous supprimer cette marque ?");
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
                alert("La marque n'a pas été supprimé.");
            }
        }
    </script>
@endsection
