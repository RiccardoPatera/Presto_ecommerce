<?php

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
Route::get('/articles/detail/{id}', [ArticleController::class, 'show'])->name('show_article');

Route::get('/items',[ArticleController::class, 'index'])->name('items');
