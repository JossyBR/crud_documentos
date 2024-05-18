<?php

use App\Http\Controllers\DocumentoController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', [DocumentoController::class, 'index']);
// Route::get('/document/create', [DocumentController::class, 'create']);
// Route::post('/document', [DocumentController::class, 'store']);
// Route::get('/document/{id}/edit', [DocumentController::class, 'edit']);
// Route::put('/document/{id}', [DocumentController::class, 'update']);
// Route::delete('/document/{id}', [DocumentController::class, 'destroy']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
