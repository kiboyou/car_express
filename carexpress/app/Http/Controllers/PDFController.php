<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Inventaire;
use App\Models\Received;
use App\Models\Reservation;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Crypt;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    //
    public function generateInvoiceCustomer($numfacture){
        //recuperer l'id de la facture choisir
        $numfacture = Crypt::decrypt($numfacture);

        //recuperer la facture
        $facture = Facture::where('numfacture', $numfacture)->first();
        //recuperer la reservation
        $reservation = $facture->reservation;
        $montantVAT = $facture->montant * 0.10;
        $datainvoice = [
            'numfacture' => $facture->numfacture,
            'datefacture' => $facture->created_at->format('F d, Y'),
            'customername' => $reservation->customer->lastname . ' ' . $reservation->customer->firstname,
            'codeclient' => $reservation->customer->codeclient,
            'phoneclient' => $reservation->customer->phone,
            'emailclient' => $reservation->customer->email,
            'addressclient' => $reservation->customer->addresse,
            'vehiculereserve' => $reservation->vehicule->getVehiculeName(),
            'locationprice' => $reservation->vehicule->prixLocation,
            'daynum' => $facture->nombre_jour,
            'montant' => $facture->montant,
            'total' => $facture->montant_total,
            'montantVAT' => $montantVAT,
        ];

        // dd($datainvoice);
        $invoicepdf = PDF::loadView('pdf.customerinvoice', $datainvoice);

        $invoicename = 'invoice_' . $facture->numfacture . '_' . now()->format('Y-m-d_H-i-s') . '.pdf';
        return $invoicepdf->stream($invoicename);
    }

    // generate pdf for received
    public function generateReceivedCustomer($numreceive){
        //recuperer l'id de la facture choisir
        $numreceived = Crypt::decrypt($numreceive);

        //recuperer la facture
        $received = Received::where('numreceived', $numreceived)->first();
        //recuperer la reservation
        $facture = $received->facture;
        $reservation = $facture->reservation;
        $montantrestant = $facture->montant_total - $received->montant_verse;
        $datareceived = [
            'numreceived' => $received->numreceived,
            'datereceived' => $received->created_at->format('F d, Y'),
            'customername' => $reservation->customer->lastname . ' ' . $reservation->customer->firstname,
            'codeclient' => $reservation->customer->codeclient,
            'phoneclient' => $reservation->customer->phone,
            'emailclient' => $reservation->customer->email,
            'addressclient' => $reservation->customer->addresse,
            'vehiculereserve' => $reservation->vehicule->getVehiculeName(),
            'numreservation' => $reservation->numreservation,
            'numfacture' => $facture->numfacture,
            'montanttotal' => $facture->montant_total,
            'montantverse' => $received->montant_verse,
            'montantrestant' => $montantrestant,
        ];

        // dd($datareceived);
        $receivedpdf = PDF::loadView('pdf.customerreceived', $datareceived);

        $receivedcename = 'received' . $received->numreceived . '_' . now()->format('Y-m-d_H-i-s') . '.pdf';
        return $receivedpdf->stream($receivedcename);
    }



    // generate pdf for inventory
    public function printInventaire(Request $request){
        $inventaire = Inventaire::whereDate('debutinventaire', '=', $request->debutinventaire)
                            ->whereDate('fininventaire', '=', $request->fininventaire)
                            ->first();
        $reservations = Reservation::whereDate('created_at', '>=', $request->debutinventaire)
        ->whereDate('created_at', '<=', $request->fininventaire)
        ->get();

        $data = [
            'numinventaire' => $inventaire->numinventaire,
            'dateinventaire' => $inventaire->created_at->format('F d, Y'),
            'numvehicule' => $inventaire->nbrevehicule,
            'user' => $inventaire->personnel->username,
            'reservations' => $reservations,
        ];

        // dd($inventaire);
        $inventairepdf = PDF::loadView('pdf.inventaire', $data);

        $inventairename = 'inventaire_' . $inventaire->numinventaire . '_' . now()->format('Y-m-d_H-i-s') . '.pdf';
        return $inventairepdf->stream($inventairename);
    }
}
