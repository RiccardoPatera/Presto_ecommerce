<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
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

Route::get('/', [PublicController::class, 'welcome'])->name('welcome');
Route::get('/create',[ArticleController::class,'create'])->name('create_article');

// Rotta per dettaglio articolo
Route::get('/articles/detail/{article}', [ArticleController::class, 'show'])->name('show_article');

Route::get('/items',[ArticleController::class, 'index'])->name('items');

// Home revisor
Route::get('/revisor/home',[RevisorController::class, 'index'])->middleware('is.revisor')->name('revisor_index');

// accetta

Route::patch('/accept/article/{article}',[RevisorController::class, 'accept_article'])->middleware('is.revisor')->name('revisor_accept');

// rifiuta
Route::patch('/reject/article/{article}',[RevisorController::class, 'reject_article'])->middleware('is.revisor')->name('revisor_reject');


// Richiesta per diventare revisore
 Route::get('/richiesta/revisore', [RevisorController::class, 'become_Revisor'])->middleware('auth')->name('become.revisor');

//  Rotta per confermare revisore
 Route::get ('/rendi/revisore/{user}',[RevisorController::class, 'make_Revisor'])->name('make.revisor');


