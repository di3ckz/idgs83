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
use App\Http\Controllers\PageController;

class ClientesController extends Controller
{

    public function inactivarCliente ( $id ) {
        try {
            TblClientes::where('PKTblClientes', $id)
                       ->update(['Activo' => 0]);

            return back();
        } catch (\Throwable $th) {
            Log::info($th);
            return back();
        }
    }

    public function activarCliente ( $id ) {
        try {
            TblClientes::where('PKTblClientes', $id)
                       ->update(['Activo' => 1]);

            return back();
        } catch (\Throwable $th) {
            Log::info($th);
            return back();
        }
    }

    public function detalleCliente ( $PKTblClientes ) {
        return TblClientes::where( 'PKTblClientes', $PKTblClientes )->get();
    }

}