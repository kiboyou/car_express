<?php

namespace App\Http\Controllers;

use App\Models\Inventaire;
use App\Models\Reservation;
use Illuminate\Http\Request;

class InventaireController extends Controller
{
    //store a new inventaire
    public function store(Request $request)
    {
        $request->validate([
            'debutinventaire' => 'required|date',
            'fininventaire' => 'required|date|after:debutinventaire',
            'idpersonnel' => 'required|integer',
        ]);

        $datedebut = $request->input('debutinventaire');
        $datefin = $request->input('fininventaire');

        $numinventaire = Inventaire::generateUniqueInventaireNumber();

        $reservations = Reservation::whereDate('created_at', '>=', $datedebut)
            ->whereDate('created_at', '<=', $datefin)
            ->get();
        $nombreVehiculesReserves = $reservations->count();

        $inventaire = Inventaire::create([
            'numinventaire' => $numinventaire,
            'debutinventaire' => $datedebut,
            'fininventaire' => $datefin,
            'nbrevehicule' => $nombreVehiculesReserves,
            'idpersonnel' => $request->input('idpersonnel'),
        ]);


        // dd($request->all() ,$nombreVehiculesReserves);

        return redirect()->route('admin.inventaire')->with('success', 'Inventaire créé avec succès');
    }
}
