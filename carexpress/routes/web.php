<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashAdminController;
use App\Http\Controllers\DashCustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\ModeleController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TransmissionController;
use App\Http\Controllers\VehiculeController;
use Illuminate\Support\Facades\Route;

//home page
Route::prefix('')->group(function(){
    Route::get('/', [HomeController::class, 'welcome'])->name('home');
    Route::get('/car', [HomeController::class, 'carview'])->name('allcar');
    Route::get('/details/{matricule}', [HomeController::class, 'detailspage'])->name('detailscar');
    Route::get('/login', [HomeController::class, 'logincustomer'])->name('logincustomer');
    Route::get('/register', [HomeController::class, 'registercustomer'])->name('registercustomer');
});

//route for customer dashboard
Route::prefix('dashboardcustomer')->middleware('auth.customer')->group(function(){
    Route::get('/', [DashCustomerController::class, 'index'])->name('dashcustomer.index');
    Route::get('/facture', [DashCustomerController::class, 'facturehome'])->name('dashcustomer.facture');
    Route::get('/facture/{numfacture}', [PDFController::class, 'generateInvoiceCustomer'])->name('pdf.invoice');
    Route::get('/received', [DashCustomerController::class, 'receivedhome'])->name('dashcustomer.received');
    Route::get('/reservation', [DashCustomerController::class, 'reservationhome'])->name('dashcustomer.reservation');
    Route::get('/parametre', [DashCustomerController::class, 'parameterhome'])->name('dashcustomer.parameter');
});



//route for administration login
Route::prefix('admin')->group(function () {
    Route::get('/', [DashAdminController::class, 'login'])->name('admin.login');
    Route::post('/', [AuthController::class, 'loginPersonnel'])->name('login.personnel');
    // Route::post('customer', [AuthController::class, 'loginCustomer'])->name('login.customer');
    Route::get('/dashboard', [DashAdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/categorie', [DashAdminController::class, 'categorie'])->name('admin.categorie');
    Route::get('/customer', [DashAdminController::class, 'customer'])->name('admin.customer');
    Route::get('/facture', [DashAdminController::class, 'facture'])->name('admin.facture');
    Route::get('/gestionnaire', [DashAdminController::class, 'gestionnaire'])->name('admin.gestionnaire');
    Route::get('/inventaire', [DashAdminController::class, 'inventaire'])->name('admin.inventaire');
    Route::get('/marque', [DashAdminController::class, 'marque'])->name('admin.marque');
    Route::get('/modele', [DashAdminController::class, 'modele'])->name('admin.modele');
    Route::get('/received', [DashAdminController::class, 'received'])->name('admin.received');
    Route::get('/reservation', [DashAdminController::class, 'reservation'])->name('admin.reservation');
    Route::get('/transmission', [DashAdminController::class, 'transmission'])->name('admin.transmission');
    Route::get('/voiture', [DashAdminController::class, 'voiture'])->name('admin.voiture');
});

// route for marques
Route::prefix('marque')->group(function () {
    Route::get('/', [MarqueController::class, 'index'])->name('marque.index');
    Route::post('/', [MarqueController::class, 'store'])->name('marque.store');
    Route::put('/{marqueId}', [MarqueController::class, 'edit'])->name('marque.edit');
    Route::delete('/{marqueId}', [MarqueController::class, 'delete'])->name('marque.delete');
    Route::get('/{marqueId}', [MarqueController::class, 'findModeleByMarque'])->name('marque.modeles');
});

// route for modeles
Route::prefix('modele')->group(function () {
    Route::get('/', [ModeleController::class, 'index'])->name('modele.index');
    Route::post('/', [ModeleController::class, 'store'])->name('modele.store');
    Route::put('/{modeleId}', [ModeleController::class, 'edit'])->name('modele.edit');
    Route::delete('/{modeleId}', [ModeleController::class, 'delete'])->name('modele.delete');
    Route::get('/{modeleId}', [ModeleController::class, 'showMarque'])->name('modele.marque');
});

// route for transmissions
Route::prefix('transmission')->group(function () {
    Route::get('/', [TransmissionController::class, 'index'])->name('transmission.index');
    Route::post('/', [TransmissionController::class, 'store'])->name('transmission.store');
});

// route for categories
Route::prefix('categorie')->group(function () {
    Route::get('/', [CategorieController::class, 'index'])->name('categorie.index');
    Route::post('/', [CategorieController::class, 'store'])->name('categorie.store');
});

//route for manage vehicules
Route::prefix('vehicule')->group(function () {
    Route::post('/', [VehiculeController::class, 'store'])->name('vehicule.store');
    Route::get('/{matricule}', [VehiculeController::class, 'show'])->name('vehicule.show');
});

// route for manage customers
Route::prefix('customer')->group(function () {
    Route::post('/', [CustomerController::class, 'store'])->name('customer.store');
});

// route for personnels
Route::prefix('personnel')->group(function () {
    Route::post('/', [PersonnelController::class, 'store'])->name('personnel.store');
});

// route for manage reservation
Route::prefix('reservation')->group(function () {
    Route::post('/', [ReservationController::class, 'store'])->name('reservation.store');
});

//route for manage login
Route::prefix('login')->group(function(){
    Route::post('/customer', [AuthController::class, 'logincustomer'])->name('login.customer');
    Route::post('/logout', [AuthController::class, 'logoutCustomer'])->name('logout.customer');
});
