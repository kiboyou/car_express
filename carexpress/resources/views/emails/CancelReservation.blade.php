@extends('layouts.templatemail')

@section('mailtitle')
    Reservation Cancel
@endsection

@section('contentmail')
    <main class="p-6">
        <h3 class="text-center text-xl font-semibold mb-4">Reservation Information</h3>
        <p class="mb-4">Bonjour M. {{ $lastname }},</p>
        <p class="mb-4">
            Votre reservation {{$reservation}} a été annulé avec succès. <br>
            Merci de votre confiance..
        </p>
        <p class="mb-4">
            Cordialement,<br>
            L'administrateur.
        </p>
    </main>
@endsection
