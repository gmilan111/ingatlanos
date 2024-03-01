<?php

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

Route::get('/properties', [PropertiesController::class, 'index'])->name('properties.index');

Route::get('/properties/create', [PropertiesController::class, 'store_index'])->name('properties.create');
Route::post('/properties/store', [PropertiesController::class, 'store'])->name('properties.store');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/index', function () {
        return view('index');
    })->name('index');
});
