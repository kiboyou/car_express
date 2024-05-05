<?php
// Fonction de vérification de connexion
function adminCheckLoggedIn()
{
    // Démarrer la session si ce n'est pas déjà fait
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    // session_start();
    // Vérifier si l'utilisateur est connecté en vérifiant l'existence des variables de session
    $loggedIn = $_SESSION['isLogginadmin'] ?? false;
    if ($loggedIn) {
        // //user deja connecte
        return;
    }
    // Si l'utilisateur n'est pas connecté, le rediriger vers la page d'index
    header('Location: ' . url('login'));
    exit();
}
adminCheckLoggedIn();
