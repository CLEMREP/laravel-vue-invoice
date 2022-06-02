<?php

use Illuminate\Foundation\Application;
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

Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/clients', function () {
        return Inertia::render('Dashboard/Pages/Clients/Index');
    })->name('clients');
    
    Route::get('/clients/nouveau-client', function () {
        return Inertia::render('Dashboard/Pages/Clients/Create');
    })->name('create.clients');
    
    Route::get('/factures', function () {
        return Inertia::render('Dashboard/Pages/Factures');
    })->name('factures');
    
    Route::get('/devis', function () {
        return Inertia::render('Dashboard/Pages/Devis');
    })->name('devis');
    
    Route::get('/compte', function () {
        return Inertia::render('Dashboard/Pages/Compte/Compte');
    })->name('compte');
});

Route::get('/dashboard', function () {
    return Inertia::render('myDashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
