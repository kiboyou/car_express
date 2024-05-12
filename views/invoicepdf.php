<?php
require_once CONFIG . 'fpdf/fpdf.php';

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

// Nom de l'entreprise à gauche
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(30, 10, 'ABKM Service', 0, 1); // Nouvelle ligne après le nom de l'entreprise

// Coordonnées de l'entreprise
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(30, 5, 'Email: bm.service@gmail.com', 0, 1);
$pdf->Cell(30, 5, 'Location: Tunis, Tunisie', 0, 1);
$pdf->Cell(30, 5, 'Telephone: +21653117212', 0, 1);

// Image à droite
$pdf->Image('https://i.imgur.com/GmuXdHq.png', 170, 10, 20);

$pdf->Cell(59,10,'',0,1);

// Barre de séparation
$pdf->SetLineWidth(0.5);
$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY()); // La barre commence à x=10, même position Y que la dernière cellule

$pdf->Cell(59,10,'',0,1);
// Entête de la facture
$pdf->SetFont('Arial', 'B', 20);
$pdf->Cell(71,10,'',0,0);
$pdf->Cell(59,5, 'FACTURE',0,0,'C');

$pdf->Cell(80,30,'',0,1);

$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(71,5, 'Client',0,0);
$pdf->Cell(59,8,'',0,0);
$pdf->SetFont('Arial','', 10);
$pdf->Cell(49, 5, 'code: ' . $datainvoice['idreservation'], 0, 1);
$pdf->SetFont('Arial','', 10);
$pdf->Cell(30,5,'Nom: ' . $datainvoice['lastnamecustomer'],0,1);
$pdf->Cell(30,5,'Prenom: ' . $datainvoice['firstnamecustomer'],0,1);
$pdf->Cell(30,5,'Telephone: ' . $datainvoice['phonecustomer'],0,1);


// Ligne vide
$pdf->Cell(50,10,'',0,1);

// Entête du tableau
$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,6,'ID',1,0,'C');
$pdf->Cell(70,6, 'Description',1,0,'C');
$pdf->Cell(30,6, 'date',1,0,'C');
$pdf->Cell(23,6,'duree',1,0,'C');
$pdf->Cell(20,6,'Unit Price',1,0,'C');
$pdf->Cell(25,6,'Total',1,1,'C');

// Ligne de données avec les valeurs dynamiques
$pdf->SetFont('Arial','',10);
$pdf->Cell(20, 6, $datainvoice['lastnamecustomer'], 1, 0, 'C'); // Colonne S1
$pdf->Cell(70,6, $datainvoice['namecar'],1,0, 'C'); // Description
$pdf->Cell(30,6,$datainvoice['debutlocation'],1,0, 'C'); // Quantité
$pdf->Cell(23,6,$datainvoice['nbrejours'],1,0,'C'); // Prix unitaire
$pdf->Cell(20,6,$datainvoice['prixunitaire'],1,0,'R'); // Taxe de vente
$pdf->Cell(25,6,$datainvoice['total'],1,1, 'R'); // Total

// Ligne du subtotal
$pdf->Cell(118,6,'',0,0);
$pdf->Cell(25,6, 'Taxe',0,0);
$pdf->Cell(45,6,$datainvoice['taxes'],1,1,'R');

// Ligne du subtotal
$pdf->Cell(118,6,'',0,0);
$pdf->Cell(25,6, 'A payer',0,0);
$pdf->Cell(45,6,$datainvoice['montanttotalapayer'],1,1,'R');

// Ligne du subtotal
$pdf->Cell(118,6,'',0,0);
$pdf->Cell(25,6, 'Paye',0,0);
$pdf->Cell(45,6,$datainvoice['amount_advance'],1,1,'R');

// Ligne du subtotal
$pdf->Cell(118,6,'',0,0);
$pdf->Cell(25,6, 'Reste a payer',0,0);
$pdf->Cell(45,6,$datainvoice['resteapayer'],1,1,'R');


$pdf->Cell(80,30,'',0,1);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(71,10,'',0,0);
$pdf->Cell(59,5, 'NOUS VOUS REMERCIONS',0,0,'C');

// Sortie du PDF
$pdf->Output('Facture_' . $datainvoice['idreservation'] . '.pdf', 'D');
