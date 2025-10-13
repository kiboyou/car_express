<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Received;
use App\Models\Reservation;
use Auth;
use Illuminate\Http\Request;

class DashCustomerController extends Controller
{
    //home page
    public function index()
    {
        $customer = Auth::guard('customer')->user();
        //client id
        $customerId = $customer->codeclient;
        //get stats
        $nbreReservation = Reservation::where('customer_id', $customer->codeclient)->count();
        $nbreFacture = Facture::whereIn('reservation_id', function ($query) use ($customerId) {
            $query->select('numreservation')
                ->from('reservations')
                ->where('customer_id', $customerId);
        })->count();
        $nbreReceived = Received::whereIn('facture_id', function ($query) use ($customerId) {
            $query->select('numfacture')
                ->from('factures')
                ->whereIn('reservation_id', function ($subQuery) use ($customerId) {
                    $subQuery->select('numreservation')
                        ->from('reservations')
                        ->where('customer_id', $customerId);
                });
        })->count();
        return view('dashboard.client.dashboard', compact('customer', 'nbreReservation', 'nbreFacture', 'nbreReceived'));
    }

    //facture page
    public function facturehome()
    {
        $customer = Auth::guard('customer')->user();
        // reservation du client
        $reservation = Reservation::where('customer_id', $customer->codeclient)->get();

        //factures associes a ces reservations
        $factures = Facture::whereIn('reservation_id', $reservation->pluck('numreservation'))->get();
        return view('dashboard.client.list-facture', compact('customer', 'factures'));
    }

    //received page
    public function receivedhome()
    {
        $customer = Auth::guard('customer')->user();

        // Récupérer les réservations du client
        $reservations = Reservation::where('customer_id', $customer->codeclient)->get();

        // Récupérer les factures associées aux réservations
        $factures = Facture::whereIn('reservation_id', $reservations->pluck('numreservation'))->get();

        // Récupérer les reçus associés aux factures
        $receiveds = Received::whereIn('facture_id', $factures->pluck('numfacture'))->get();

        return view('dashboard.client.list-recu', compact('customer', 'receiveds'));
    }

    //reservation page
    public function reservationhome()
    {
        $customer = Auth::guard('customer')->user();
        $reservations = Reservation::where('customer_id', $customer->codeclient)->get();
        return view('dashboard.client.list-reservation', compact('customer', 'reservations'));
    }

    //parametre page
    public function parameterhome()
    {
        $customer = Auth::guard('customer')->user();
        return view('dashboard.client.parametre', compact('customer'));
    }
}
