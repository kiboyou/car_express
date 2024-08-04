@extends('layouts.templatemail')

@section('mailtitle')
    Welcome to our site
@endsection

@section('contentmail')
    <main class="p-6">
        <h3 class="text-center text-xl font-semibold mb-4">Welcome to our site</h3>
        <p class="mb-4">Bonjour M. {{ $lastname }},</p>
        <p class="mb-4">
            Nous sommes heureux de vous compter parmis nos clients. <br>
            Vous pouvez désormais accéder à votre compte en ligne pour consulter vos informations personnelles et vos commandes. <br>
        </p>
        <p class="mb-4">
            Votre code client est le: <strong>{{ $codeclient }}</strong> <br>
            Veuillez le conserver précieusement. <br>
            Nous vous remercions pour votre confiance et nous vous souhaitons une agréable expérience sur notre site. <br>
        </p>
        <p class="mb-4">
            Bienvenue à bord ! <br>
            Cordialement,<br>
            L'administrateur.
        </p>
    </main>
@endsection
