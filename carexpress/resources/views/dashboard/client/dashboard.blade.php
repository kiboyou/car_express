@extends('layouts.dashcustomer')

@section('otherpart')
    <!-- INFORMATIONS & CHARTS BOARD -->
    <div class="info">
        <!-- TITRE -->
        <p class="title">statistiques</p>
        <!-- BOX DES STATS -->
        <div class="box">

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
                <p>NOMBRE TOTAL : </p>
                <p>{{$nbreReservation+$nbreFacture+$nbreReceived}}</p>
            </div>

            <!-- GRAPHIQUE -->
            <!-- <div></div> -->
        </div>
    </div>
@endsection
