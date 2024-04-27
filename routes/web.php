<?php

use App\Http\Controllers\AgentsController;
use App\Http\Controllers\AuctionsController;
use App\Http\Controllers\AuctionsEnteredController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\LikedPropertiesController;
use App\Http\Controllers\MainImageController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\RecommendationsController;
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

Route::get('/', [Controller::class, 'index']);

#Ingatlanok megjelenítése
Route::get('/properties', [PropertiesController::class, 'index'])->name('properties.index');

#Ingatlanok hozzáadása form megjelenítése
Route::get('/properties/create', [PropertiesController::class, 'store_index'])->name('properties.create');

#Új ingatlan eltárolása adatbázisban
Route::post('/properties/store', [PropertiesController::class, 'store'])->name('properties.store');

#Egy ingatlan részletes oldal megjelenítése
Route::get('/properties/{property}', [PropertiesController::class, 'show'])->name('properties.show');

#Ingatlanos saját posztjainak megjelenítése
Route::get('/properties_own', [PropertiesController::class, 'show_own'])->name('properties.own');

#Módosítás form megjelenítése
Route::get('properties/{property}/edit', [PropertiesController::class, 'edit'])->name('properties.edit');

#Képek kezelése form megjelenítés
Route::get('/image/{property}/edit', [ImagesController::class, 'edit']);

#Módosítás funkció
Route::put('/properties/{property}', [PropertiesController::class, 'update']);

#Poszt törlése
Route::delete('properties/{property}', [PropertiesController::class, 'destroy']);

#Képek törlése
Route::get('images/{image}',[ImagesController::class, 'destroy']);

#Képek létrehozása
Route::post('/images/{propertyID}', [ImagesController::class, 'store']);

#Főkép törlése
Route::get('main_image/{image}',[MainImageController::class, 'destroy']);

#Keresés
Route::post('search', [PropertiesController::class, 'search'])->name('properties.search');

#Kedvelt ingatlan mentése
Route::post('like/{data}', [LikedPropertiesController::class, 'store']);

#Kedvelt ingatlan törlés
Route::get('like/delete/{data}', [LikedPropertiesController::class, 'destroy']);

#Kedvelt ingatlanok megjelenítése
Route::get('/liked_properties', [LikedPropertiesController::class, 'index'])->name('liked.index');

#Saját kedvelt ingatlan törlése
Route::get('liked_prop/delete/{data}', [LikedPropertiesController::class, 'destroy_liked']);

/*Route::post('search_liked', [LikedPropertiesController::class, 'search_liked'])->name('liked_prop.search');*/

#Ingatlanos tud keresni saját ingatlanjai között
Route::post('own_search', [PropertiesController::class, 'own_search'])->name('own.properties.search');

#Ingatlanosok megjelenítése
Route::get('/agents', [AgentsController::class, 'index'])->name('agents.index');

#Ingatlanosok részletes oldal
Route::get('/agents/{agent}', [AgentsController::class, 'show']);

#Email küldése
Route::get('/email/{info}', [EmailController::class, 'sendEmail']);

#Ingatlan státusza "eladva"-ra váltása
Route::put('/sold/{property_id}', [PropertiesController::class, 'sold']);

#Hírlevél módosítása
Route::put('/notification/{user_id}', [Controller::class, 'notification_update']);

#Nyelv megváltoztatása
Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');

#Nyelv megváltoztatása 2.0
Route::get('locale/{lang}', [LangController::class, 'setLocale']);

#Aukciok megjelenitese
Route::get('/auctions', [AuctionsController::class, 'index'])->name('auctions.index');

#Aukcuó részletes megjelenítés
Route::get('/auctions/{auction_id}', [AuctionsController::class, 'show']);

#Ingatlanos saját aukciók
Route::get('/auctions_own', [AuctionsController::class, 'show_own'])->name('auctions.own');

#Felhasználó által belikeolt aukció(k) megjelenítése
Route::get('auctions_entered', [AuctionsEnteredController::class, 'index'])->name('auctions_entered.index');

#Aukció kedvelése
Route::put('enter_auction/{data}', [AuctionsEnteredController::class, 'store']);

#Licitálás
Route::put('bid/{property_id}', [AuctionsController::class, 'bid']);

#Teljes ár kifizetése
Route::put('buy/{property_id}', [AuctionsController::class, 'buy']);

#Aukciók keresése
Route::post('auction_search', [AuctionsController::class, 'search'])->name('auctions.search');

#Ingatlanos tud keresni saját aukciói között
Route::post('own_auction_search', [AuctionsController::class, 'own_search'])->name('own.auctions.search');

Route::get('entered_auction/delete/{data}', [AuctionsEnteredController::class, 'destroy']);

#Aukció (saját) lezárása
Route::put('/own_closed/{property_id}', [AuctionsController::class, 'own_closed']);

#Aukció lezárása
Route::put('/closed/{property_id}', [AuctionsController::class, 'closed']);

#Aukció törlése
Route::delete('auction/{property_id}', [AuctionsController::class, 'destroy']);

#Aukció "győztes" email küldése
Route::get('/auction_winner/{property_id}', [EmailController::class, 'closed_auction_winner']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/index', function () {
        return view('index');
    })->name('index');
});
