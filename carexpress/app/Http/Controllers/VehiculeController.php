<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VehiculeController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'matricule' => 'required|string|unique:vehicules,matricule',
            'prixLocation' => 'required|numeric',
            'anneeFabrication' => 'required|integer|between:2010,' . now()->year,
            'versionVehicule' => 'required|string',
            'carburant' => 'required|string',
            'imageVehicule' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:2048',
            'modele_id' => 'required|exists:modeles,id',
            'categorie_id' => 'required|exists:categories,id',
        ]);
        $exists = Vehicule::where('matricule', $request->matricule)->exists();
        if ($exists) {
            return redirect()->back()->with('error', 'Véhicule déjà existant');
        }
        $imgpath = null;
        if($request->hasFile('imageVehicule')){
            $img = $request->file('imageVehicule');
            $matricule = strtolower($request->matricule);
            $timecreate = now()->format('YmdHis');
            $imgname = $matricule . '_' . $timecreate . '.' . $img->getClientOriginalExtension();
            $imgpath = $img->storeAs('vehicules', $imgname, 'public');
        }
        Vehicule::create([
            'matricule' => $request->input('matricule'),
            'prixLocation' => $request->input('prixLocation'),
            'anneeFabrication' => $request->input('anneeFabrication'),
            'versionVehicule' => $request->input('versionVehicule'),
            'carburant' => $request->input('carburant'),
            'imageVehicule' => $imgpath,
            'modele_id' => $request->input('modele_id'),
            'categorie_id' => $request->input('categorie_id'),
            'transmission_id' => $request->input('transmission_id'),
        ]);
        return redirect()->route('admin.voiture')->with('success', 'Véhicule enregistré avec succès');
    }


    // display a vehicule
    public function show($matricule)
    {
        $vehicule = Vehicule::where('matricule', $matricule)->first();
        if (!$vehicule) {
            return response()->json(['message' => 'Vehicule not found'], 404);
        }
        return response()->json($vehicule);
    }
    
}
