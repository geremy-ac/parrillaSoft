<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\InsumoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ReportesController;


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


Route::get('/pdfinsumos',[InsumoController::class,'PDFinsumos'])->name('descargarPDFInsumos');
Route::get('insumos/show',[InsumoController::class,'show'])->name('showInsumo');
Route::get('insumos/Listar',[InsumoController::class,'Listar'])->name('listarInsumo');
Route::get('insumos/entrada/{id}',[InsumoController::class,'FormularioEntrada'])->name('FormularioEntrada');
Route::get('insumos/insumoCrear',[InsumoController::class,'FormularioInsumo'])->name('insumoCrear');
Route::post('insumos/create',[InsumoController::class,'save'])->name('CrearInsumo');
Route::post('insumos/crearEntrada',[InsumoController::class,'crearEntrada'])->name('CrearEntrada');
Route::delete('insumos/{insumo}',[InsumoController::class, 'eliminar'])->name('insumoEliminar');

Route::get('producto/Listar',[ProductoController::class,'listar'])->name('ListarProducto');
Route::get('producto/crear',[ProductoController::class,'create'])->name('VistaCrearP');
Route::get('producto/cambiarestado/{id}/{status}',[ProductoController::class,'cambiarestado'])->name('Cestado');
Route::post('producto/create',[ProductoController::class,'crear'])->name('CrearProducto');

Route::get('ventas/Listar',[VentaController::class,'show'])->name('VistaListarV');
Route::get('ventas/vender',[VentaController::class,'create'])->name('VistaCrearV');
Route::post('ventas/vendido',[VentaController::class,'crear'])->name('CrearVenta');


Route::get('Reportes',[ReportesController::class,'index'])->name('GraficaProductos');
