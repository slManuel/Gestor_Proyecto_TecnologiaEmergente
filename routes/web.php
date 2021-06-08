<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CargosController;
use App\Http\Controllers\UnidadesMedidasController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\GastoPersonalController;
use App\Http\Controllers\IngreEgreController;
use App\Http\Controllers\ProyectosController;
use App\Http\Controllers\DetallesController;
use App\Http\Controllers\UsuariosController;
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
Route::resource('cargos', CargosController::class);
Route::resource('UnidadesMedidas', UnidadesMedidasController::class);//ruta para unidades de medida 
Route::get('/unidades/create', [UnidadesMedidasController::class, 'create'])->name('createUM');
Route::get('/unidades/update/{id}', [UnidadesMedidasController::class, 'update'])->name('updateUM');
Route::get('/categorias', [CategoriasController::class, 'index'])->name('categorias');
Route::get('/categorias/update/{id}', [CategoriasController::class, 'update'])->name('updateCategorias');
Route::resource('categorias', CategoriasController::class);
Route::get('/empleados', [EmpleadosController::class, 'index'])->name('empleados');
Route::resource('empleados', EmpleadosController::class);
Route::get('/empleados/update/{id}', [EmpleadosController::class, 'update'])->name('updateEmpleados');
Route::get('/gastospersonal/{id}', [GastoPersonalController::class, 'index'])->name('gastospersonal');
Route::get('/gastospersonal/indexHP/{id}', [GastoPersonalController::class, 'indexHP'])->name('gastospersonalhp');
Route::get('/gastospersonal/update/{id}', [GastoPersonalController::class, 'update'])->name('updateGastos');
Route::get('/gastospersonal/{proy}/{emp}', [GastoPersonalController::class, 'create'])->name('pagoGP');
Route::get('/gastopersonal/destroy/{id}', [GastoPersonalController::class, 'destroy'])->name('delGastospersonal');
Route::resource('gastospersonal', GastoPersonalController::class);
//rutas para ingresos y egresos
//Route::resource('facturas', IngreEgreController::class);
Route::get('/facturas/{id}', [IngreEgreController::class, 'index'])->name('factura');
Route::get('/facturas/create/{id}', [IngreEgreController::class, 'create'])->name('facturaCreate');
//Route::get('factura','IngreEgreController@index');
//Route::put('/factura/update/{fact_id}/{id_proyecto}', [IngreEgreController::class, 'update'])->name('facturaUpdate');
Route::get('/factura/update', [IngreEgreController::class, 'update'])->name('facturaUpdate');
Route::get('/factura/destroy/{idfactura}', [IngreEgreController::class, 'destroy'])->name('facturadelete');
Route::post('/factura/store/{id}', [IngreEgreController::class, 'store'])->name('facturaStore');
Route::get('/proyectos', [ProyectosController::class, 'index'])->name('proyectos');
Route::get('/proyectos/update/{id}', [ProyectosController::class, 'update'])->name('updateProyectos');
Route::resource('proyectos', ProyectosController::class);

//detalles de facturas

Route::get('/detalles/{id}', [DetallesController::class, 'index'])->name('detalles');
Route::get('/detalles/create/{id}', [DetallesController::class, 'create'])->name('createDetalles');
Route::post('/detalles/store', [DetallesController::class, 'store'])->name('detallesStore');
Route::get('/detalle/actualizar', [DetallesController::class, 'update'])->name('detactualizar');
Route::get('/detalle/delete/{iddetalle}/{idfactura}', [DetallesController::class, 'destroy'])->name('detdelete');

//usuarios
Route::get('/personal', [UsuariosController::class, 'index'])->name('personal');
Route::get('/personal/update/{id}', [UsuariosController::class, 'update'])->name('updatePersonal');
Route::resource('personal', UsuariosController::class);

//contraseña
Route::get('/pwdupdate/{id}',[UsuariosController::class,'cambiarcontrasena'])->name('passupdate');