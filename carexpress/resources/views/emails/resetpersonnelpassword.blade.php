@extends('layouts.templatemail')

@section('mailtitle')
    Reset Password Manager
@endsection

@section('contentmail')
    <main class="p-6">
        <h3 class="text-center text-xl font-semibold mb-4">Reset Password</h3>
        <p class="mb-4">Bonjour M. {{ $lastname }},</p>
        <p class="mb-4">
            A votre demande, nous avons reinitialiser votre mot de password !<br>
        </p>
        <p class="mb-4">
            Voici votre mot de passe temporaire :<br>
            Mot de passe : <strong>{{ $passwordtemporaire }}</strong><br>
            Merci pour votre engagement. Nous vous souhaitons une expérience enrichissante et productive sur notre plateforme !<br>
        </p>
        <p class="mb-4">
            Cordialement,<br>
            L'administrateur.
        </p>
    </main>
@endsection
