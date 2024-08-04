<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Reservation;
use Auth;
use Illuminate\Http\Request;

class DashCustomerController extends Controller
{
    //home page
    public function index(){
        $customer = Auth::guard('customer')->user();
        return view('dashboard.client.dashboard', compact('customer'));
    }

    //facture page
    public function facturehome(){
        $customer = Auth::guard('customer')->user();
        // reservation du client
        $reservation = Reservation::where('customer_id', $customer->codeclient)->get();

        //factures associes a ces reservations
        $factures = Facture::whereIn('reservation_id', $reservation->pluck('numreservation'))->get();
        return view('dashboard.client.list-facture', compact('customer', 'factures'));
    }

    //received page
    public function receivedhome(){
        $customer = Auth::guard('customer')->user();
        return view('dashboard.client.list-recu' , compact('customer'));
    }

    //reservation page
    public function reservationhome(){
        $customer = Auth::guard('customer')->user();
        $reservations = Reservation::where('customer_id', $customer->codeclient)->get();
        return view('dashboard.client.list-reservation' , compact('customer', 'reservations'));
    }

    //parametre page
    public function parameterhome(){
        $customer = Auth::guard('customer')->user();
        return view('dashboard.client.parametre', compact('customer'));
    }
}
