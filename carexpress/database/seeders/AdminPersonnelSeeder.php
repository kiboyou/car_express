<?php

namespace Database\Seeders;

use App\Models\Personnel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminPersonnelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lastname = 'Admin';
        $firstname = 'Admin';

        // Créer l'administrateur
        Personnel::create([
            'lastname' => $lastname,
            'firstname' => $firstname,
            'statut' => 'actif', // Définir le statut comme actif
            'firstlogin' => false, // Définir le premier login comme faux
            'email' => 'admin@example.com', // Utiliser un email pour l'administrateur
            'phone' => '0123456789', // Utiliser un numéro de téléphone pour l'administrateur
            'role' => 'administrateur', // Définir le rôle comme administrateur
            'password' => Hash::make("Admin@1234"),
            'username' => "admin"
        ]);
    }
}
