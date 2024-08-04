<?php

namespace App\Http\Controllers;

use App\Models\Facture;
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
}
