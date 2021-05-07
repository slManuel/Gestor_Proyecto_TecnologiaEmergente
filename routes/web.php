<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CargosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\EmpleadosController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/cargos', [CargosController::class, 'index'])->name('cargos');
Route::get('/cargos/update/{id}', [CargosController::class, 'update'])->name('updateCargos');
//Route::post('/cargos/store/{nombre}',[CargosController::class,'store'])->name('cargosStore');
Route::resource('cargos', CargosController::class);
Route::get('/categorias', [CategoriasController::class, 'index'])->name('categorias');
Route::get('/categorias/update/{id}', [CategoriasController::class, 'update'])->name('updateCategorias');
Route::resource('categorias', CategoriasController::class);
Route::get('/empleados', [EmpleadosController::class, 'index'])->name('empleados');
Route::resource('empleados', EmpleadosController::class);
Route::get('/empleados/update/{id}', [EmpleadosController::class, 'update'])->name('updateEmpleados');
