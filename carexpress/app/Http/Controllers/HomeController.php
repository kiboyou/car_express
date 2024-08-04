<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use Auth;
use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class HomeController extends Controller
{
    //home page
    public function welcome(){
        return view('welcome');
    }
    //car view
    public function carview(){
        $vehicules = Vehicule::paginate(8);
        return view('Vehicule.car', compact('vehicules'));
    }
    //detail of car and reservation page
    public function detailspage($matricule){
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
    public function logincustomer(){
        return view('Authentification.login');
    }
    //register page for customer
    public function registercustomer(){
        return view('Authentification.inscription');
    }
}
