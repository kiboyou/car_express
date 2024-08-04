<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    //get all marques
    public function index()
    {
        $marques = Marque::all();
        return response()->json($marques);
    }

    //create new marque
    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required|string'
        ]);
        $exists = Marque::where('name', $request->name)->exists();
        if($exists){
            return response()->json(['message' => 'Marque already exists'], 409);
        }
        Marque::create($request->all());
        return response()->json(['message' => 'Marque created successfully']);
    }
    //edit marque
    public function edit(Request $request, $marqueID)
    {
        $marque = Marque::find($marqueID);
        if(!$marque){
            return response()->json(['message' => 'Marque not found'], 404);
        }
        $request -> validate([
            'name' => 'required|string',
        ]);
        $marque->update($request->all());
        return response()->json(['message' => 'Marque updated successfully']);
    }
    //delete marque
    public function delete($marqueID)
    {
        $marque = Marque::find($marqueID);
        if(!$marque){
            return response()->json(['message' => 'Marque not found'], 404);
        }
        $marque->delete();
        return response()->json(['message' => 'Marque deleted successfully']);
    }

    public function findModeleByMarque($marqueId){
        $marque = Marque::find($marqueId);
        if(!$marque){
            return response()->json(['message' => 'Marque not found'], 404);
        }
        $modeles = $marque->modeles;
        return response()->json($modeles);
    }
}
