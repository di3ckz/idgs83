<?php

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

Route::get('/', function () {
    return view('login');
});

Route::post('/login','App\Http\Controllers\UserController@login')->name('login');
Route::get('/logout','App\Http\Controllers\UserController@logout')->name('logout');

Route::get('/inicio','App\Http\Controllers\PageController@obtenerInsumos')->name('inicio');
//Route::name('inicio')->delete('eliminarPoblacion/{id}',[PageController::class, 'obtenerInsumos']);

// Rutas modulo de control reportes
Route::post('registrarReporte','App\Http\Controllers\ReportesController@registrarReporte')->name('registrarReporte');
Route::name('eliminarReporte')->delete('eliminarReporte/{id}',[ReportesController::class, 'eliminarReporte']);

// Rutas catalogo de poblaciones
Route::post('registrarPoblacion','App\Http\Controllers\PoblacionesController@registrarPoblacion')->name('registrarPoblacion');
Route::name('eliminarPoblacion')->delete('eliminarPoblacion/{id}',[PoblacionesController::class, 'eliminarPoblacion']);

// Rutas catalogo de problemas
Route::post('registrarProblema','App\Http\Controllers\ProblemasController@registrarProblema')->name('registrarProblema');
Route::name('eliminarProblema')->delete('eliminarProblema/{id}',[ProblemasController::class, 'eliminarProblema']);

// Rutas con respecto a usuario/empleado
Route::post('actualizarEmpleado','App\Http\Controllers\UserController@actualizarEmpleado')->name('actualizarEmpleado');

// Rutas para la navegación de los reportes
Route::get('/reportes/{status}','App\Http\Controllers\PageController@obtenerInsumosReportes')->name('reportes');
//Route::name('insumosReportes')->get('insumosReportes/{status}',[PageController::class, 'obtenerInsumosReportes']);

//obtener detalle de cada reportes según se presione un click
Route::get('/detalleReporte/{id}','App\Http\Controllers\ReportesController@obtenerDetalleReporte')->name('detalleReporte');

//actualizar reporte en curso desde el modal
Route::post('actualizarReporte','App\Http\Controllers\ReportesController@actualizarReporte')->name('actualizarReporte');

//ruta para servicio atendiendo
Route::get('/atendiendo/{id}','App\Http\Controllers\ReportesController@atendiendoReporte')->name('atendiendo');