<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;


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
// HOME-PAGE
Route::get('/', [PublicController::class, 'welcome'])->name('welcome');

// FORM PER AGGIUNGERE PRODOTTO
Route::get('/create',[ArticleController::class,'create'])->name('create_article');

// DETTAGLIO PRODOTTO
Route::get('/articles/detail/{article}', [ArticleController::class, 'show'])->name('show_article');

// MODIFICA PRODOTTO
Route::get('/article/edit/{article}', [ArticleController::class, 'edit'])->name('edit_article');

// MODIFICA PRODOTTO
Route::delete('/article/delete/{article}', [ArticleController::class, 'delete'])->name('delete_article');

// ROTTA RICERCA PRODOTTO
Route::get ('/ricerca/annuncio',[PublicController::class, 'search_article'])->name('search_article');

// VISTA DI TUTTI I PRODOTTI
Route::get('/items/',[ArticleController::class, 'index'])->name('items');

// VISTA PRODOTTI FILTRATI
Route::get('/items/searched',[ArticleController::class, 'search'])->name('search');

//  REVISOR CHECk
Route::get('/revisor/home',[RevisorController::class, 'index'])->middleware('is.revisor')->name('revisor_index');
// REVISOR DASHBOARD
Route::get('/revisor/dashboard/{user}',[RevisorController::class, 'dashboard'])->middleware('is.revisor')->name('revisor_dashboard');

// REVISORE-ACCETTA PRODOTTO
Route::patch('/accept/article/{article}',[RevisorController::class, 'accept_article'])->middleware('is.revisor')->name('revisor_accept');

// REVISORE-RIFIUTA PRODOTTO
Route::patch('/reject/article/{article}',[RevisorController::class, 'reject_article'])->middleware('is.revisor')->name('revisor_reject');

//RIPRISTINA PRODOTTO
Route::patch('/restore/article/{article}',[RevisorController::class, 'restore_article'])->middleware('is.revisor')->name('revisor_restore');


// Richiesta per diventare revisore
Route::get('/richiesta/revisore', [RevisorController::class, 'become_revisor'])->middleware('auth')->name('become_revisor');

//  Rotta per confermare revisore
Route::get ('/rendi/revisore/{user}',[RevisorController::class, 'make_revisor'])->name('make_revisor');
 //  Cambia lingua
Route::post('/language/{lang}',[PublicController::class, 'setLanguage'])->name('set_language_locale');

// Rotta profilo utente /Redirect Revisore
Route::get ('/user/{user}',[UserController::class, 'user_dashboard'])->name('user_dashboard');


// Rotta profili  ALTRI utenti
Route::get ('/profiles/{user}',[PublicController::class, 'users_articles'])->name('users_articles');





