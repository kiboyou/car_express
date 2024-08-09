@extends('layouts.dashadmin')
@section('right')
    <div class="rigth">
        <!-- ADMIN INFO -->
        <div class="head">
            @include('includes.dashadminhead');
        </div>
        <!-- INFORMATIONS & CHARTS BOARD -->
        <div class="info">
            <!-- TITRE -->
            <p class="title">statistiques</p>
            <!-- BOX DES STATS -->
            <div class="box">
                <!-- CADRE -->
                <div>
                    <p>Nombre de client : </p>
                    <p>{{$nbreClient}}</p>
                </div>

                <!-- CADRE -->
                <div>
                    <p>Nombre de reservation : </p>
                    <p>{{$nbreReservation}}</p>
                </div>

                <!-- CADRE -->
                <div>
                    <p>Nombre de facture : </p>
                    <p>{{$nbreFacture}}</p>
                </div>

                <!-- CADRE -->
                <div>
                    <p>Nombre de reçu : </p>
                    <p>{{$nbreReceived}}</p>
                </div>

                <!-- CADRE -->
                <div>
                    <p>Nombre d'inventaire : </p>
                    <p>{{$nbreInventaire}}</p>
                </div>

                <!-- CADRE -->
                <div>
                    <p>Nombre de Gestionnaire : </p>
                    <p>{{$nbrePersonnel}}</p>
                </div>

                <!-- CADRE -->
                <div>
                    <p>Nombre de voiture : </p>
                    <p>{{$nbreVehicule}}</p>
                </div>

                <!-- CADRE -->
                <div>
                    <p>NOMBRE TOTAL : </p>
                    <p>{{$nbreVehicule+$nbreClient+$nbreReservation+$nbreFacture+$nbreInventaire+$nbrePersonnel+$nbreReceived}}</p>
                </div>

                <!-- GRAPHIQUE -->
                <!-- <div></div> -->
            </div>
        </div>
    </div>
@endsection
