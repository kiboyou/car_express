<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Customer;
use App\Models\Marque;
use App\Models\Modele;
use App\Models\Transmission;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class DashAdminController extends Controller
{
    //login page for admin
    public function login(){
        return view('dashboard.admin.connexion');
    }
    //index page for admin dashboard
    public function index(){
        return view('dashboard.admin.dashboard');
    }
    //page for categorie list
    public function categorie(){
        $categories = Categorie::all();
        return view('dashboard.admin.list-categorie', compact('categories'));
    }
    //page for customer list
    public function customer(){
        $customers = Customer::paginate(10);
        return view('dashboard.admin.list-client', compact('customers'));
    }
    //page for facture list
    public function facture(){
        return view('dashboard.admin.list-facture');
    }
    //page for gestionnaire list
    public function gestionnaire(){
        return view('dashboard.admin.list-gestionnaire');
    }
    //page for inventaire list
    public function inventaire(){
        return view('dashboard.admin.list-inventaire');
    }
    //page for marque list
    public function marque(){
        $marques = Marque::paginate(10);
        return view('dashboard.admin.list-marque', compact('marques'));
    }
    //page for modele list
    public function modele(){
        $modeles = Modele::paginate(10);
        $marques = Marque::all();
        return view('dashboard.admin.list-model', compact('modeles', 'marques'));
    }
    //page for received list
    public function received(){
        return view('dashboard.admin.list-recu');
    }
    //page for reservation list
    public function reservation(){
        return view('dashboard.admin.list-reservation');
    }
    //page for transmission list
    public function transmission(){
        $transmissions = Transmission::all();
        return view('dashboard.admin.list-transmission' , compact('transmissions'));
    }
    //page for voiture list
    public function voiture(){
        $categories = Categorie::all();
        $modeles = Modele::all();
        $transmissions = Transmission::all();
        $vehicules =  Vehicule::paginate(10);
        return view('dashboard.admin.list-voiture', compact('categories', 'transmissions', 'modeles', 'vehicules'));
    }
}

