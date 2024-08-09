<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Vehicule;
use Auth;
use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class HomeController extends Controller
{
    //home page
    public function welcome()
    {
        return view('welcome');
    }
    //car view
    public function carview(Request $request)
    {
        $query = Vehicule::query();
        // Filtrer par nom de modèle ou marque
        if ($request->filled('marque') || $request->filled('modele')) {
            $query->whereHas('modele', function ($q) use ($request) {
                if ($request->filled('marque')) {
                    $q->whereHas('marque', function ($q) use ($request) {
                        $q->where('name', 'like', '%' . $request->input('marque') . '%');
                    });
                }
                if ($request->filled('modele')) {
                    $q->where('name', 'like', '%' . $request->input('modele') . '%');
                }
            });
        }

        // Filtrer par catégorie si le champ est rempli
        if ($request->filled('categorie') && $request->input('categorie') !== 'Choisir une categorie') {
            $query->whereHas('categorie', function ($q) use ($request) {
                $q->where('name', $request->input('categorie'));
            });
        }
        // dd($query->toSql(), $query->getBindings());
        $categories = Categorie::all();
        $vehicules = $query->paginate(8);
        return view('Vehicule.car', compact('vehicules', 'categories'));
    }
    //detail of car and reservation page
    public function detailspage($matricule)
    {
        try {
            $matricule = Crypt::decrypt($matricule);
            $vehicule = Vehicule::where('matricule', $matricule)->first();
            $codeclient = Auth::guard('customer')->check() ? Auth::guard('customer')->user()->codeclient : null;
            return view('Vehicule.view-element', compact('vehicule', 'codeclient'));
        } catch (DecryptException $e) {
            return redirect()->route('error.page')->with('error', 'Invalid matricule');
        }
    }
    //login page for customer
    public function logincustomer()
    {
        return view('Authentification.login');
    }
    //register page for customer
    public function registercustomer()
    {
        return view('Authentification.inscription');
    }
}
