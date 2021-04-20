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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified', 'status'])->group(function () {
    Route::get('/accueil', 'App\Http\Controllers\HomeController@redirect');
    Route::get('/accueil/{id}/{name}', 'App\Http\Controllers\HomeController@index')->name('home');
    Route::get('/etablissement', 'App\Http\Controllers\EtablissementController@index')->name('etablissement.index')->middleware('etablissement');

    Route::middleware(['session_etablissement'])->group(function () {
        Route::get('/annee', 'App\Http\Controllers\AnneeScolaireController@index')->name('annee.index');
    });
});

