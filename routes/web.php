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

// Rutas catalogos
    // poblaciones
    Route::post('registrarPoblacion','App\Http\Controllers\PoblacionesController@registrarPoblacion')->name('registrarPoblacion');

    // problemas
    Route::post('registrarProblema','App\Http\Controllers\ProblemasController@registrarProblema')->name('registrarProblema');

    // roles
    Route::post('registrarRol','App\Http\Controllers\RolesController@registrarRol')->name('registrarRol');

// Rutas con respecto a usuario/empleado
Route::post('actualizarEmpleado','App\Http\Controllers\UserController@actualizarEmpleado')->name('actualizarEmpleado');

// Rutas para la navegación de los reportes
Route::get('/reportes/{status}','App\Http\Controllers\PageController@obtenerInsumosReportes')->name('reportes');
//Route::name('insumosReportes')->get('insumosReportes/{status}',[PageController::class, 'obtenerInsumosReportes']);

//obtener detalle de cada reportes según se presione un click
Route::get('/detalleReporte/{id}','App\Http\Controllers\ReportesController@obtenerDetalleReporte')->name('detalleReporte');

//actualizar reporte en curso desde el modal
Route::post('actualizarReporte','App\Http\Controllers\ReportesController@actualizarReporte')->name('actualizarReporte');

// Cambiar a vista de insumos correspondiente
Route::get('/obtenerInsumosRoles','App\Http\Controllers\PageController@obtenerInsumosRoles')->name('obtenerInsumosRoles');
Route::get('/obtenerInsumosProblemas','App\Http\Controllers\PageController@obtenerInsumosProblemas')->name('obtenerInsumosProblemas');
Route::get('/obtenerInsumosPoblaciones','App\Http\Controllers\PageController@obtenerInsumosPoblaciones')->name('obtenerInsumosPoblaciones');

//rutas para servicios de estado reporte
Route::get('/atendiendo/{id}','App\Http\Controllers\ReportesController@atendiendoReporte')->name('atendiendo');
Route::get('/desatendiendo/{id}','App\Http\Controllers\ReportesController@desatendiendoReporte')->name('desatendiendo');
Route::get('/atender/{id}','App\Http\Controllers\ReportesController@atenderReporte')->name('atender');
Route::get('/retomar/{id}','App\Http\Controllers\ReportesController@retomarReporte')->name('retomar');

// rutas para servicios de estado en insumos
Route::get('/inactivarRol/{id}','App\Http\Controllers\RolesController@inactivarRol')->name('inactivarRol');
Route::get('/activarRol/{id}','App\Http\Controllers\RolesController@activarRol')->name('activarRol');

Route::get('/inactivarProblema/{id}','App\Http\Controllers\ProblemasController@inactivarProblema')->name('inactivarProblema');
Route::get('/activarProblema/{id}','App\Http\Controllers\ProblemasController@activarProblema')->name('activarProblema');

Route::get('/inactivarPoblacion/{id}','App\Http\Controllers\PoblacionesController@inactivarPoblacion')->name('inactivarPoblacion');
Route::get('/activarPoblacion/{id}','App\Http\Controllers\PoblacionesController@activarPoblacion')->name('activarPoblacion');