@extends('layouts.templatemail')

@section('mailtitle')
    Welcome Manager
@endsection

@section('contentmail')
    <main class="p-6">
        <h3 class="text-center text-xl font-semibold mb-4">Welcome to your new job</h3>
        <p class="mb-4">Bonjour M. {{ $lastname }},</p>
        <p class="mb-4">
            Nous sommes ravis de vous accueillir en tant que manager au sein de notre équipe !<br>
            Vous pouvez désormais accéder à votre compte en ligne pour consulter vos informations personnelles et gérer vos tâches.<br>
        </p>
        <p class="mb-4">
            Voici vos identifiants de connexion :<br>
            Nom d'utilisateur : <strong>{{ $username }}</strong><br>
            Mot de passe : <strong>{{ $passwordtemporaire }}</strong><br>
            Merci pour votre engagement. Nous vous souhaitons une expérience enrichissante et productive sur notre plateforme !<br>
        </p>
        <p class="mb-4">
            Bienvenue à bord ! <br>
            Cordialement,<br>
            L'administrateur.
        </p>
    </main>
@endsection
