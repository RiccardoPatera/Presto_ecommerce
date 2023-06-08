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

// HomeRevisor
Route::get('/revisor/home', [RevisorController::class, 'index'])->name('revisor.index');
// AccAnnunci
Route::Patch('/accetta/annuncio/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->name('revisor.acceptAnnouncement');
// RifAnnunci
Route::Patch('/rifiuta/annuncio/{announcement}',[RevisorController::class, 'rejectAnnouncement'])->name('revisor.rejectAnnouncement');
// richesta revisore
Route::get('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
// rendi utente revisore
Route::get('/rendi/revisore/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');