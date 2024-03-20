<?php

use App\Http\Controllers\ImagesController;
use App\Http\Controllers\PropertiesController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

#Ingatlanok megjelenítése
Route::get('/properties', [PropertiesController::class, 'index'])->name('properties.index');

#Ingatlanok hozzáadása form megjelenítése
Route::get('/properties/create', [PropertiesController::class, 'store_index'])->name('properties.create');

#Új ingatlan eltárolása adatbázisban
Route::post('/properties/store', [PropertiesController::class, 'store'])->name('properties.store');

#Egy ingatlan részletes oldal megjelenítése
Route::get('/properties/{property}', [PropertiesController::class, 'show']);

#Ingatlanos saját posztjainak megjelenítése
Route::get('/properties_own', [PropertiesController::class, 'show_own'])->name('properties.own');

#Módosítás form megjelenítése
Route::get('properties/{property}/edit', [PropertiesController::class, 'edit'])->name('properties.edit');

#Poszt törlése
Route::delete('properties/{property}', [PropertiesController::class, 'destroy']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/index', function () {
        return view('index');
    })->name('index');
});
