<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomepageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CucinaPreferitaController;
use App\Http\Controllers\RistoranteController;
use App\Http\Controllers\InformazioniUtenteController;
use App\Http\Controllers\CercaCiboController;
use App\Http\Controllers\CarrelloController;

Route::get('/', [HomepageController::class, 'index']);
Route::view('/login','login');
Route::post('/login',[AuthController::class,'login']);
Route::view('/signup','signup');
Route::post('/signup',[AuthController::class,'signup']);
Route::view('/logout','logout');
Route::post('/logout',[AuthController::class,'logout']);
Route::post('/api/like-cucina', [CucinaPreferitaController::class, 'like']);
Route::post('/api/unlike-cucina', [CucinaPreferitaController::class, 'unlike']);
Route::view('/ristoranti','ristoranti');
Route::get('/ristoranti', [RistoranteController::class, 'index']);
Route::post('/cercaristoranti',[RistoranteController::class,'cercaristoranti'])->name('cercaristoranti');
Route::get('/informazioni_utente', [InformazioniUtenteController::class, 'index']);
Route::post('/aggiornainfoutente', [InformazioniUtenteController::class,'aggiornainfo'])->name('aggiornainfoutente');
Route::view('/cercacibo','cercacibo');
Route::post('/api/cercacibo', [CercaCiboController::class,'cercacibo']);
Route::post('/api/like-piatto', [CercaCiboController::class, 'like']);
Route::post('/api/unlike-piatto', [CercaCiboController::class, 'unlike']);
Route::get('/piattipreferiti',[CercaCiboController::class,'piattipreferiti']);
Route::get('/ristorante/mostra/{id}', [RistoranteController::class, 'mostra'])->name('ristorante.mostra');
Route::post('/api/aggiungialcarrello', [CarrelloController::class,'aggiungialcarrello'])->name('aggiungialcarrello');
Route::post('/api/rimuovidalcarrello', [CarrelloController::class,'rimuovidalcarrello'])->name('rimuovidalcarrello');
Route::get('/carrello',[CarrelloController::class,'index']);