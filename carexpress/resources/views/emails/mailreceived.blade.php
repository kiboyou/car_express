@extends('layouts.templatemail')

@section('mailtitle')
    Reçu de paiment
@endsection

@section('contentmail')
    <main class="p-6">
        <h3 class="text-center text-xl font-semibold mb-4">Recçu n° {{$numreceive}}</h3>
        <p class="mb-4">Bonjour M. {{ $lastname }},</p>
        <p class="mb-4">
            Votre paiement de {{ $montantverser }} a été effectué avec succès. <br>
            Pour votre reservation du {{ $daterservation }}. <br>
            Vous pouvez imprimer votre reçu dans votre espace client. <br>
            Merci de votre confiance.
        </p>
        <p class="mb-4">
            Cordialement,<br>
            L'administrateur.
        </p>
    </main>
@endsection
