<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Customer;
use App\Models\Facture;
use App\Models\Inventaire;
use App\Models\Marque;
use App\Models\Modele;
use App\Models\Personnel;
use App\Models\Received;
use App\Models\Reservation;
use App\Models\Transmission;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class DashAdminController extends Controller
{
    //login page for admin
    public function login()
    {
        return view('dashboard.admin.connexion');
    }
    //index page for admin dashboard
    public function index()
    {
        $nbreVehicule = Vehicule::count();
        $nbreClient = Customer::count();
        $nbreReservation = Reservation::count();
        $nbreFacture = Facture::count();
        $nbreInventaire = Inventaire::count();
        $nbrePersonnel = Personnel::count();
        $nbreReceived = Received::count();
        return view('dashboard.admin.dashboard', compact('nbreVehicule', 'nbreClient', 'nbreReservation', 'nbreFacture', 'nbreInventaire', 'nbrePersonnel', 'nbreReceived'));
    }
    //page for categorie list
    public function categorie()
    {
        $categories = Categorie::all();
        return view('dashboard.admin.list-categorie', compact('categories'));
    }
    //page for customer list
    public function customer()
    {
        $customers = Customer::paginate(10);
        return view('dashboard.admin.list-client', compact('customers'));
    }
    //page for facture list
    public function facture()
    {
        $invoices = Facture::paginate(10);
        return view('dashboard.admin.list-facture', compact('invoices'));
    }
    //page for gestionnaire list
    public function gestionnaire(Request $request)
    {
        $query = Personnel::query();

        if ($request->has('namesearch')) {
            $search = $request->input('namesearch');
            $query->where('lastname', 'LIKE', "%{$search}%")
                ->orWhere('firstname', 'LIKE', "%{$search}%");
        }
        $personels = Personnel::paginate(10);
        return view('dashboard.admin.list-gestionnaire', compact('personels'));
    }
    //page for inventaire list
    public function inventaire()
    {
        $inventaires = Inventaire::paginate(10);
        return view('dashboard.admin.list-inventaire', compact('inventaires'));
    }
    //page for marque list
    public function marque()
    {
        $marques = Marque::paginate(10);
        return view('dashboard.admin.list-marque', compact('marques'));
    }
    //page for modele list
    public function modele()
    {
        $modeles = Modele::paginate(10);
        $marques = Marque::all();
        return view('dashboard.admin.list-model', compact('modeles', 'marques'));
    }
    //page for received list
    public function received()
    {
        $receiveds = Received::paginate(10);
        return view('dashboard.admin.list-recu', compact('receiveds'));
    }
    //page for reservation list
    public function reservation()
    {
        $reservations = Reservation::paginate(10);
        return view('dashboard.admin.list-reservation', compact('reservations'));
    }
    //page for transmission list
    public function transmission()
    {
        $transmissions = Transmission::all();
        return view('dashboard.admin.list-transmission', compact('transmissions'));
    }
    //page for voiture list
    public function voiture()
    {
        $categories = Categorie::all();
        $modeles = Modele::all();
        $transmissions = Transmission::all();
        $vehicules = Vehicule::paginate(10);
        return view('dashboard.admin.list-voiture', compact('categories', 'transmissions', 'modeles', 'vehicules'));
    }

    //reset password form
    public function resetpasswordform(){
        return view('dashboard.admin.resetpasswordform');
    }
}

