<?php

use App\Http\Controllers\FileController;
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


Route::resource('/files', FileController::class);
Route::put('/encrypt/{file}', [FileController::class, 'encrypt'])->name('encrypt');
Route::put('/decrypt/{file}', [FileController::class, 'decrypt'])->name('decrypt');
