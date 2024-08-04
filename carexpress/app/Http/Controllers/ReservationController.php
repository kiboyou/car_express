<?php

namespace App\Http\Controllers;

use App\Mail\ReservationConfirm;
use App\Models\Customer;
use App\Models\Facture;
use App\Models\Reservation;
use App\Models\Vehicule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Log;
use Mail;

class ReservationController extends Controller
{
    //
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'debutlocation' => 'required|date|after_or_equal:today',
    //         'finlocation' => 'required|date|after:debutlocation',
    //         'customer_id' => 'required|exists:customers,codeclient',
    //         'vehicule_id' => 'required|exists:vehicules,matricule',
    //         'paiement' => 'required|in:ligne,presentiel',
    //     ]);
    //     // dd($request->all());

    //     $numreservation = Reservation::generateNumReservation();
    //     $reservation = Reservation::create([
    //         'numreservation' => $numreservation,
    //         'debutlocation'=> $request->input('debutlocation'),
    //         'finlocation'=> $request->input('finlocation'),
    //         'customer_id'=> $request->input('customer_id'),
    //         'vehicule_id'=> $request->input('vehicule_id'),
    //         'paiement'=> $request->input('paiement'),
    //     ]);

    //     // passons a la facture
    //     $days = $reservation->debutlocation->diffInDays($reservation->finlocation);

    //     $vehicule = Vehicule::findOrFail($reservation->vehicule_id);
    //     $rentprice = $vehicule->prixLocation;

    //     $montant = $days * $rentprice;

    //     //total montant
    //     $taxes = 0.10;
    //     $total_a_payer = $montant * (1 + $taxes);

    //     //numero facture
    //     $numfacture = Facture::generateNumFacture();
    //     //creation de la facture
    //     Facture::create([
    //         'numfacture' => $numfacture,
    //         'nombre_jour' => $days,
    //         'montant' => $montant,
    //         'taxes' => $taxes,
    //         'montant_total' => $total_a_payer,
    //         'reservation_id' => $reservation->numreservation
    //     ]);

    //     //rendre le vehicule indisponible
    //     $vehicule->update(['disponibilite' => false]);

    //     $customer = Customer::findOrFail($reservation->customer_id);
    //     Mail::to($customer->email)->send(new ReservationConfirm($customer->lastname, $reservation->numreservation, $numfacture));
    //     return redirect()->back()->with('success','Réservation et facture créées avec succès!');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'debutlocation' => 'required|date|after_or_equal:today',
    //         'finlocation' => 'required|date|after:debutlocation',
    //         'customer_id' => 'required|exists:customers,codeclient',
    //         'vehicule_id' => 'required|exists:vehicules,matricule',
    //         'paiement' => 'required|in:ligne,presentiel',
    //     ]);

    //     try {
    //         $numreservation = Reservation::generateNumReservation();
    //         $reservation = Reservation::create([
    //             'numreservation' => $numreservation,
    //             'debutlocation' => Carbon::parse($request->input('debutlocation')),
    //             'finlocation' => Carbon::parse($request->input('finlocation')),
    //             'customer_id' => $request->input('customer_id'),
    //             'vehicule_id' => $request->input('vehicule_id'),
    //             'paiement' => $request->input('paiement'),
    //         ]);

    //         // Calcul des jours
    //         $days = $reservation->debutlocation->diffInDays($reservation->finlocation);

    //         $vehicule = Vehicule::findOrFail($reservation->vehicule_id);
    //         $rentprice = $vehicule->prixLocation;

    //         $montant = $days * $rentprice;

    //         // Calcul du montant total avec taxes
    //         $taxes = 0.10;
    //         $total_a_payer = $montant * (1 + $taxes);

    //         // Génération du numéro de facture
    //         $numfacture = Facture::generateNumFacture();

    //         // Création de la facture
    //         Facture::create([
    //             'numfacture' => $numfacture,
    //             'nombre_jour' => $days,
    //             'montant' => $montant,
    //             'taxes' => $taxes,
    //             'montant_total' => $total_a_payer,
    //             'reservation_id' => $reservation->id
    //         ]);

    //         // Rendre le véhicule indisponible
    //         $vehicule->update(['disponibilite' => false]);

    //         // Envoi de l'email de confirmation
    //         $customer = Customer::findOrFail($reservation->customer_id);
    //         Mail::to($customer->email)->send(new ReservationConfirm($customer->lastname, $reservation->numreservation, $numfacture));

    //         return redirect()->back()->with('success', 'Réservation et facture créées avec succès!');
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'Une erreur est survenue : ' . $e->getMessage());
    //     }
    // }


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
                'reservation_id' => $numreservation
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
}
