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

Route::get('/', [DocumentoController::class, 'index'])->name('documentos.index');
Route::get('/documento/create', [DocumentoController::class, 'create'])->name('documentos.create');
Route::post('/documento', [DocumentoController::class, 'store'])->name('documentos.store');

Route::get('/documento/{id}/edit', [DocumentoController::class, 'edit'])->name('documentos.edit');
Route::put('/documento/{id}', [DocumentoController::class, 'update'])->name('documentos.update');
Route::delete('/documento/{id}', [DocumentoController::class, 'destroy'])->name('documentos.destroy');
Route::get('/search', [DocumentoController::class, 'search'])->name('documentos.search');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
