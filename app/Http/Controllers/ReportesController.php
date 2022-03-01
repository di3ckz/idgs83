<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\TblDirecciones;
use App\Models\TblClientes;
use App\Models\TblDetalleReporte;
use App\Models\TblReportes;

class ReportesController extends Controller
{

    public function registrarReporte (Request $request) {

        try {

            DB::beginTransaction();
                $direccion                      = new TblDirecciones;
                $direccion->FKCatPoblaciones    = $request['PKCatPoblaciones'];
                $direccion->coordenadas         = $request['coordenadas'];
                $direccion->referencias         = $request['referencias'];
                $direccion->direccion           = $request['direccion'];
                $direccion->save();

                $detalle = new TblDetalleReporte;
                $detalle->save();

                $cliente                    = new TblClientes;
                $cliente->FKTblDirecciones  = $direccion->id;
                $cliente->nombreCliente     = $request['nombreCliente'];
                $cliente->telefono     = $request['telefono'];
                $cliente->fechaAlta         = Carbon::now();
                $cliente->save();

                $reporte                            = new TblReportes;
                $reporte->FKCatProblemas            = $request['PKCatProblemas'];
                $reporte->FKTblEmpleadosRecibio     = 1; // esto cambiara una vez implementado el login
                $reporte->FKCatStatus               = 1; // es el primer status por defecto para recien registrado
                $reporte->FKTblDetalleReporte       = $detalle->id;
                $reporte->FKTblClientes             = $cliente->id;
                $reporte->descripcionProblema       = $request['descripcionProblema'];
                $reporte->observaciones             = $request['observaciones'];
                $reporte->fechaAlta                 = Carbon::now();
                $var = $reporte->save();
            DB::commit();

            return back();

        } catch (\Throwable $th) {
            Log::info($th);
            return back();
        }

    }

    public function eliminarReporte (TblReportes $id) {
        $id->delete();
        return back();
    }

}