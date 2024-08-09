<?php

namespace App\Http\Controllers;

use App\Mail\receivedPaiment;
use App\Mail\ReservationConfirm;
use App\Models\Customer;
use App\Models\Facture;
use App\Models\Received;
use App\Models\Reservation;
use App\Models\Vehicule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Log;
use Mail;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'debutlocation' => 'required|date|after_or_equal:today',
            'finlocation' => 'required|date|after:debutlocation',
            'customer_id' => 'required|exists:customers,codeclient',
            'vehicule_id' => 'required|exists:vehicules,matricule',
            'paiement' => 'required|in:ligne,presentiel',
        ]);

        try {
            // Log::info('Début de la création de la réservation');

            $reservation = new Reservation();
            $numreservation = $reservation->generateNumReservation();

            $reservation = Reservation::create([
                'numreservation' => $numreservation,
                'debutlocation' => Carbon::parse($request->input('debutlocation')),
                'finlocation' => Carbon::parse($request->input('finlocation')),
                'customer_id' => $request->input('customer_id'),
                'vehicule_id' => $request->input('vehicule_id'),
                'paiement' => $request->input('paiement'),
            ]);

            // Log::info('Réservation créée avec succès', ['reservation_id' => $numreservation]);

            // Log::info('Début de la création de la facture');
            // Calcul des jours
            $days = $reservation->debutlocation->diffInDays($reservation->finlocation);

            $vehicule = Vehicule::findOrFail($reservation->vehicule_id);
            $rentprice = $vehicule->prixLocation;

            $montant = $days * $rentprice;

            // Calcul du montant total avec taxes
            $taxes = 0.10;
            $total_a_payer = $montant * (1 + $taxes);

            // Génération du numéro de facture
            $numfacture = Facture::generateNumFacture();

            // Création de la facture
            Facture::create([
                'numfacture' => $numfacture,
                'nombre_jour' => $days,
                'montant' => $montant,
                'taxes' => $taxes,
                'montant_total' => $total_a_payer,
                'reservation_id' => $numreservation,
                'montantrestant' => $total_a_payer
            ]);

            // Log::info('Facture créée avec succès', ['numfacture' => $numfacture]);

            // Rendre le véhicule indisponible
            $vehicule->update(['disponibilite' => false]);

            // Envoi de l'email de confirmation
            $customer = Customer::findOrFail($reservation->customer_id);

            // Log::info('Info facture', ['lastname'=> $customer->lastname, 'jours' => $days, 'emailclient' =>$customer->email, 'numfacture' => $numfacture, 'numreservation' => $numreservation]);
            Mail::to($customer->email)->send(new ReservationConfirm($customer->lastname, $numreservation, $numfacture));

            // Log::info('Email de confirmation envoyé avec succès', ['email' => $customer->email]);

            return redirect()->back()->with('success', 'Réservation et facture créées avec succès!');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la création de la réservation ou de la facture', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }

    //make a paiment
    public function makePaiementbyCustomer(Request $request){
        $request->validate([
            'facture_id' => 'required|exists:factures,numfacture',
            'montant_verse' => 'required|numeric|min:0',
        ]);
        $numreceived = Received::generateNumReceived();
        $montantverser = $request->input('montant_verse');

        $facture = Facture::where('numfacture', $request->input('facture_id'))->firstOrFail();
        $reservation = $facture->reservation;
        if ($montantverser > $facture->montantrestant) {
            return back()->withErrors(['montant_verse' => 'Le montant versé ne peut pas être supérieur au montant restant.']);
        }
        $restant =  $facture->montantrestant - $montantverser;
        Received::create([
            'numreceived' => $numreceived,
            'montant_verse' => $montantverser,
            'facture_id' => $request->input('facture_id'),
            'restant' => $restant,
        ]);

        $facture->montantrestant -= $montantverser;
        $facture->save();

        //verifier statut reservation
        if($reservation->statut_reservation == 'en attente'){
            $reservation->statut_reservation = 'confirme';
            $reservation->save();
        }

        // Envoi de l'email de confirmation
        Mail::to($facture->reservation->customer->email)->send(new receivedPaiment($numreceived, $facture->reservation->customer->lastname, $facture->reservation->created_at, $montantverser));
        return redirect()->route('dashcustomer.facture')->with('success', 'Paiement effectué avec succès.');
    }
    public function makePaiementbyPersonnel(Request $request){
        $request->validate([
            'facture_id' => 'required|exists:factures,numfacture',
            'montant_verse' => 'required|numeric|min:0',
        ]);
        $numreceived = Received::generateNumReceived();
        $montantverser = $request->input('montant_verse');

        $facture = Facture::where('numfacture', $request->input('facture_id'))->firstOrFail();

        //info reservation
        $reservation = $facture->reservation;

        if ($montantverser > $facture->montantrestant) {
            return back()->withErrors(['montant_verse' => 'Le montant versé ne peut pas être supérieur au montant restant.']);
        }

        // dd($reservation->statut_reservation);
        $restant =  $facture->montantrestant - $montantverser;
        Received::create([
            'numreceived' => $numreceived,
            'montant_verse' => $montantverser,
            'facture_id' => $request->input('facture_id'),
            'restant' => $restant,
        ]);

        $facture->montantrestant -= $montantverser;
        $facture->save();

        //verifier statut reservation
        if($reservation->statut_reservation == 'en attente'){
            $reservation->statut_reservation = 'confirme';
            $reservation->save();
        }

        // Envoi de l'email de confirmation
        Mail::to($facture->reservation->customer->email)->send(new receivedPaiment($numreceived, $facture->reservation->customer->lastname, $facture->reservation->created_at, $montantverser));
        return redirect()->route('admin.facture')->with('success', 'Paiement effectué avec succès.');
    }

    //confirm reservation
    public function confirmReservation($numreservation)
    {
        $reservation = Reservation::where('numreservation', $numreservation)->first();

        if (!$reservation) {
            return response()->json(['success' => false, 'message' => 'Réservation non trouvée.']);
        }

        //inverser le statut
        $reservation->statut = "confirme";
        $reservation->save();

        return response()->json(['success' => true, 'message' => 'Le statut de la réservation a été modifié avec succès.']);
    }
    //cancel reservation
    public function cancelReservation($numreservation)
    {
        $reservation = Reservation::where('numreservation', $numreservation)->first();

        if (!$reservation) {
            return response()->json(['success' => false, 'message' => 'Réservation non trouvée.']);
        }

        //inverser le statut
        $reservation->statut = "annule";
        $reservation->save();

        return response()->json(['success' => true, 'message' => 'Le statut de la réservation a été modifié avec succès.']);
    }
}
