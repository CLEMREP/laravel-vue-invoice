<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EstimateController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\StripeController;
use App\Models\Invoice;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('paiement/{invoice}', [StripeController::class, 'stripe'])->name('paiement.index');
Route::post('paiement', [StripeController::class, 'stripePost'])->name('paiement.post');

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('connexion'),
        'canRegister' => Route::has('inscription'),
    ]);
});

Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/clients', [ClientController::class, 'index'])->name('client.index');

    Route::get('/clients/nouveau-client', [ClientController::class, 'create'])->name('client.create');
    Route::post('/clients/nouveau-client', [ClientController::class, 'store'])->name('client.store');

    Route::post('/clients/supprimer/{user}', [ClientController::class, 'destroy'])->name('client.destroy');

    Route::get('/clients/editer/{user}', [ClientController::class, 'edit'])->name('client.edit');
    Route::post('/clients/editer/{user}', [ClientController::class, 'update'])->name('client.update');

    Route::get('/factures', [InvoiceController::class, 'index'])->name('facture.index');

    Route::get('/factures/nouvelle-facture', [InvoiceController::class, 'create'])->name('facture.create');
    Route::post('/factures/nouvelle-facture', [InvoiceController::class, 'store'])->name('facture.store');

    Route::get('/factures/preview/{invoice}', [InvoiceController::class, 'preview'])->name('facture.preview');
    Route::get('/factures/telecharger/{invoice}', [InvoiceController::class, 'download'])->name('facture.download');

    Route::post('/factures/supprimer/{invoice}', [InvoiceController::class, 'destroy'])->name('facture.destroy');

    Route::get('/factures/editer/{invoice}', [InvoiceController::class, 'edit'])->name('facture.edit');
    Route::post('/factures/editer/{invoice}', [InvoiceController::class, 'update'])->name('facture.update');


    Route::get('/devis', [EstimateController::class, 'index'])->name('devis.index');

    Route::get('/devis/nouveau-devis', [EstimateController::class, 'create'])->name('devis.create');
    Route::post('/devis/nouveau-devis', [EstimateController::class, 'store'])->name('devis.store');

    Route::get('/devis/preview/{estimate}', [EstimateController::class, 'preview'])->name('devis.preview');
    Route::get('/devis/telecharger/{estimate}', [EstimateController::class, 'download'])->name('devis.download');

    Route::post('/devis/supprimer/{estimate}', [EstimateController::class, 'destroy'])->name('devis.destroy');

    Route::get('/compte', function () {
        return Inertia::render('Dashboard/Pages/Compte/Compte');
    })->name('compte');
});

Route::get('/dashboard', [DashboardController::class,  'index'])->name('dashboard');

require __DIR__.'/auth.php';
