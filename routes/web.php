<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cargosController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::resource('cargos', [cargosController::class]);

Route::get('/cargos', [App\Http\Controllers\cargosController::class, 'index'])->name('cargos');


//Route::resource('/cargos', cargosController::class);
Route::get('/cargos/update/{id}', [App\Http\Controllers\cargosController::class, 'update'])->name('update');
//Route::get('/cargos/cr', [App\Http\Controllers\cargosController::class, 'update'])->name('update');


