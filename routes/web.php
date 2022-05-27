<?php

use App\Http\Controllers\WordsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', fn() => view('words') )->name('home');
Route::get('/previous-search', fn() => view('previous-search') )->name('previous-search');
Route::post('words', [WordsController::class, 'words'])->name('words');
Route::get('getWords', [WordsController::class, 'getWords'])->name('get-words');

