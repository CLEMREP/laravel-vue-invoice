<?php

use App\Http\Controllers\ClientController;
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
    return Inertia::render('Welcome');
});

Route::get('/facture/template', function () {
    return view('invoice.text');
})->name('facture.template');

Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/clients', [ClientController::class, 'index'])->name('client.index');

    Route::get('/clients/nouveau-client', [ClientController::class, 'create'])->name('client.create');
    Route::post('/clients/nouveau-client', [ClientController::class, 'store'])->name('client.store');

    Route::post('/clients/supprimer/{user}', [ClientController::class, 'destroy'])->name('client.destroy');

    Route::get('/clients/editer/{user}', [ClientController::class, 'edit'])->name('client.edit');
    Route::post('/clients/editer/{user}', [ClientController::class, 'update'])->name('client.update');

    Route::get('/factures', function () {
        return Inertia::render('Dashboard/Pages/Factures/Index');
    })->name('factures');

    Route::get('/factures/nouvelle-facture', function () {
        return Inertia::render('Dashboard/Pages/Factures/Create');
    })->name('create.factures');

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
