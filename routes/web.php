<?php

use App\Http\Controllers\DocumentoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DocumentoController::class, 'index'])->name('documentos.index')->middleware('auth');
Route::get('/documento/create', [DocumentoController::class, 'create'])->name('documentos.create')->middleware('auth');
Route::post('/documento', [DocumentoController::class, 'store'])->name('documentos.store')->middleware('auth');

Route::get('/documento/{id}/edit', [DocumentoController::class, 'edit'])->name('documentos.edit')->middleware('auth');
Route::put('/documento/{id}', [DocumentoController::class, 'update'])->name('documentos.update')->middleware('auth');
Route::delete('/documento/{id}', [DocumentoController::class, 'destroy'])->name('documentos.destroy')->middleware('auth');
Route::get('/search', [DocumentoController::class, 'search'])->name('documentos.search')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
