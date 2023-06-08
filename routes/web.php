<?php

use App\Http\Controller\RevisorController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
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
Route::get('/revisor/home',[RevisorController::class, 'index'])->name('revisor_index');

// accetta

Route::patch('/accept/article/{article}',[RevisorController::class, 'accept'])->name('revisor_accept');

// rifiuta

Route::patch('/reject/article/{article}',[RevisorController::class, 'reject'])->name('revisor_reject');

// diventare revisore
Route::get('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');

//  utente revisore
Route::get ('/rendi/revisore/{user}',[RevisorController::class, 'makeRevisor'])->name('make.revisor');

