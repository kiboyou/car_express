<?php

namespace App\Http\Controllers;

use App\Models\Transmission;
use Illuminate\Http\Request;

class TransmissionController extends Controller
{

    //create new transmission
    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required|string'
        ]);
        $exists = Transmission::where('name', $request->name)->exists();
        if($exists){
            return redirect()->route('admin.transmission')->with('success','Transmission already exists');
        }
        Transmission::create($request->all());
        return redirect()->route('admin.transmission')->with('success','Transmission created successfully');
    }

    //delete transmission
    public function deleteTransmission($idtransmission)
    {
        $transmission = Transmission::where('id', $idtransmission)->first();

        if (!$transmission) {
            return response()->json(['success' => false, 'message' => 'Transmission non trouvé.']);
        }

        //delete the transmission
        $transmission->delete();

        return response()->json(['success' => true, 'message' => 'La transmission a été supprimé avec succès.']);
        // return redirect()->route('admin.customer')->with('success', 'Statut du client modifié avec succès');
    }
}
