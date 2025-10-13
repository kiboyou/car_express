@extends('layouts.templatemail')

@section('mailtitle')
    Reservation confirmation
@endsection

@section('contentmail')
    <main class="p-6">
        <h3 class="text-center text-xl font-semibold mb-4">Reservation Information</h3>
        <p class="mb-4">Bonjour M. {{ $lastname }},</p>
        <p class="mb-4">
            Votre reservation a été effectué avec succès. <br>
            Vous devez la confirmer dans un delai de 24h sinon elle sera annulé.
        </p>
        <p class="mb-4">
            Vos informations importantes: <br>
            Numero de reservation est: <strong>{{ $reservation }}</strong> <br>
            Numero de facture est: <strong>{{ $facture }}</strong> <br>
            Veuillez les conserver précieusement. <br>
            Nous vous remercions pour votre confiance et nous vous souhaitons une agréable expérience sur notre site. <br>
        </p>
        <p class="mb-4">
            Cordialement,<br>
            L'administrateur.
        </p>
    </main>
@endsection
