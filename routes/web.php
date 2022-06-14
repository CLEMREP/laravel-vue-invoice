<?php

use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\DB;
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
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('/facture/template', function () {
    return view('invoice.text');
})->name('facture.template');

Route::get('/connexion', function () {
    return Inertia::render('Auth/Connexion',
    [
        'canResetPassword' => Route::has('password.request'),
        'status' => session('status'),
    ]);
})->name('connexion');

Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/clients', function () {
        return Inertia::render('Dashboard/Pages/Clients/Index', ['users' => DB::table('users')->paginate(10), 'addresses' => DB::table('addresses')->paginate(10)]);
    })->name('clients');

    Route::get('/clients/nouveau-client', function () {
        return Inertia::render('Dashboard/Pages/Clients/Create');
    })->name('create.clients');

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
