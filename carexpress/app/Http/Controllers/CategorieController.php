<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    //get all categories
    public function index()
    {
        return response()->json(Categorie::all());
    }

    //store a new category
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);
        $exists = Categorie::where('name', $request->name)->exists();
        if($exists){
            return response()->json(['message' => 'Category already exists'], 409);
        }
        $categorie = Categorie::create($request->all());
        return response()->json($categorie, 201);
    }
}
