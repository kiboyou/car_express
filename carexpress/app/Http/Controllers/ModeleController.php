<?php

namespace App\Http\Controllers;

use App\Models\Modele;
use Illuminate\Http\Request;

class ModeleController extends Controller
{
    //get all modeles
    public function index()
    {
        $modeles = Modele::all();
        return response()->json($modeles);
    }

    //create new modele
    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required|string',
            'marque_id' => 'required|integer'
        ]);
        $exists = Modele::where('name', $request->name)->exists();
        if($exists){
            return response()->json(['message' => 'Modele already exists'], 409);
        }
        Modele::create($request->all());
        return response()->json(['message' => 'Modele created successfully']);
    }
    //edit modele
    public function edit(Request $request, $modeleID)
    {
        $modele = Modele::find($modeleID);
        if(!$modele){
            return response()->json(['message' => 'Modele not found'], 404);
        }
        $request -> validate([
            'name' => 'required|string',
        ]);
        $modele->update($request->all());
        return response()->json(['message' => 'Modele updated successfully']);
    }
    //delete modele
    public function delete($modeleID)
    {
        $modele = Modele::find($modeleID);
        if(!$modele){
            return response()->json(['message' => 'Modele not found'], 404);
        }
        $modele->delete();
        return response()->json(['message' => 'Modele deleted successfully']);
    }

    public function showMarque($modeleID){
        $modele = Modele::find($modeleID);

        if(!$modele){
            return response()->json(['message' => 'Modele not found'], 404);
        }
        $marque = $modele->marque;
        if(!$marque){
            return response()->json(['message' => 'Marque not found'], 404);
        }
        return response()->json($marque);
    }
}
