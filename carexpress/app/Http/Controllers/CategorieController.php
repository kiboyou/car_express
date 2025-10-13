<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    //store a new category
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);
        $exists = Categorie::where('name', $request->name)->exists();
        if($exists){
            return redirect()->route('admin.categorie')->with('success','Category already exists');
        }
        $categorie = Categorie::create($request->all());
        return redirect('')->route('admin.categorie')->with('success','Category created successfully');
    }

    //delete categorie
    public function deleteCategorie($idcategorie)
    {
        $categorie = Categorie::where('id', $idcategorie)->first();

        if (!$categorie) {
            return response()->json(['success' => false, 'message' => 'Categorie non trouvé.']);
        }

        //delete the categorie
        $categorie->delete();

        return response()->json(['success' => true, 'message' => 'La categorie a été supprimé avec succès.']);
        // return redirect()->route('admin.customer')->with('success', 'Statut du client modifié avec succès');
    }
}
