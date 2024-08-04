<?php

namespace App\Http\Controllers;

use App\Models\Transmission;
use Illuminate\Http\Request;

class TransmissionController extends Controller
{
    //get all transmissions
    public function index()
    {
        $transmissions = Transmission::all();
        return response()->json($transmissions);
    }

    //create new transmission
    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required|string'
        ]);
        $exists = Transmission::where('name', $request->name)->exists();
        if($exists){
            return response()->json(['message' => 'Transmission already exists'], 409);
        }
        Transmission::create($request->all());
        return response()->json(['message' => 'Transmission created successfully']);
    }
}
