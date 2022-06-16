<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\InvoiceController;
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


    Route::get('/factures/preview/{invoice}', [InvoiceController::class, 'preview'])->name('facture.preview');
    Route::get('/factures/telecharger/{invoice}', [InvoiceController::class, 'download'])->name('facture.download');

    Route::get('/factures', [InvoiceController::class, 'index'])->name('facture.index');

    Route::get('/factures/nouvelle-facture', [InvoiceController::class, 'create'])->name('facture.create');
    Route::post('/factures/nouvelle-facture', [InvoiceController::class, 'store'])->name('facture.store');

    Route::post('/factures/supprimer/{invoice}', [InvoiceController::class, 'destroy'])->name('facture.destroy');


    Route::get('/devis', function () {
        return Inertia::render('Dashboard/Pages/Devis/Index');
    })->name('devis');

    Route::get('/compte', function () {
        return Inertia::render('Dashboard/Pages/Compte/Compte');
    })->name('compte');
});

Route::get('/dashboard', function () {
    return Inertia::render('myDashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
