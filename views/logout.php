<?php
session_start();

// Déconnexion de l'utilisateur
function logout()
{
    // Détruire toutes les données de la session
    session_unset();

    // Détruire la session
    session_destroy();

    // Rediriger l'utilisateur vers la page de connexion
    header('Location: ' . url('login'));
    exit();
}

// Appel de la fonction de déconnexion
logout();
