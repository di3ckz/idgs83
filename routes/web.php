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

Route::get('/','App\Http\Controllers\PageController@obtenerInsumos')->name('/');
Route::name('inicio')->delete('eliminarPoblacion/{id}',[PageController::class, 'obtenerInsumos']);

// Rutas modulo de control reportes
Route::post('registrarReporte','App\Http\Controllers\ReportesController@registrarReporte')->name('registrarReporte');
Route::name('eliminarReporte')->delete('eliminarReporte/{id}',[ReportesController::class, 'eliminarReporte']);

// Rutas catalogo de poblaciones
Route::post('registrarPoblacion','App\Http\Controllers\PoblacionesController@registrarPoblacion')->name('registrarPoblacion');
Route::name('eliminarPoblacion')->delete('eliminarPoblacion/{id}',[PoblacionesController::class, 'eliminarPoblacion']);

// Rutas catalogo de problemas
Route::post('registrarProblema','App\Http\Controllers\ProblemasController@registrarProblema')->name('registrarProblema');
Route::name('eliminarProblema')->delete('eliminarProblema/{id}',[ProblemasController::class, 'eliminarProblema']);