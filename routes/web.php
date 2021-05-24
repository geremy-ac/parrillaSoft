<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\InsumoController;
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
    return view('auth/login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('home/index', [HomeController::class, 'index'])->name('Index');

Route::resource('users', UserController::class)->only(['index','edit','update'])->names('users');




Route::get('insumos/Listar',[InsumoController::class,'Listar'])->name('listarInsumo');
Route::get('insumos/entrada/{id}',[InsumoController::class,'FormularioEntrada'])->name('FormularioEntrada');
Route::get('insumos/crear',[InsumoController::class,'FormularioCrear'])->name('FormularioInsumo');
Route::post('insumos/create',[InsumoController::class,'create'])->name('CrearInsumo');
Route::post('insumos/crearEntrada',[InsumoController::class,'crearEntrada'])->name('CrearEntrada');
Route::delete('insumos/{insumo}',[InsumoController::class, 'eliminar'])->name('insumoEliminar');
Route::get('insumos/formularioEditar/{id}', [InsumoController::class, 'FormularioEditarEntrada'])->name('entradaEditar');
Route::get('insumos/formularioEditarEntrada/{id}', [InsumoController::class, 'formularioEditar'])->name('insumoEditar');
Route::put('insumos/formularioEditarEntrada/{insumo}',[InsumoController::class,'actualizar'])->name('insumoActualizar');
Route::put('insumos/{entrada}',[InsumoController::class,'actualizarEntrada'])->name('entradaActualizar');
Route::delete('insumos/formularioEditarEntrada/{entrada}',[InsumoController::class, 'eliminarEntrada'])->name('entradaEliminar');

