<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\CatPoblaciones;

class PoblacionesController extends Controller
{

    public function registrarPoblacion (Request $request) {

        try {

            $verificarExistencia = CatPoblaciones::where('nombrePoblacion',$request['nombrePoblacion'])
                                                 ->orWhere('nombrePoblacion','like','%'.$request['nombrePoblacion'])
                                                 ->orWhere('nombrePoblacion','like','%'.$request['nombrePoblacion'].'%')
                                                 ->orWhere('nombrePoblacion','like',$request['nombrePoblacion'].'%')
                                                 ->first();

                                                 Log::alert($verificarExistencia);

            if( !is_numeric($verificarExistencia) || count($verificarExistencia) == 0 ){
                DB::beginTransaction();
                    $poblacion                  = new CatPoblaciones;
                    $poblacion->nombrePoblacion = $request['nombrePoblacion'];
                    $poblacion->codigoPostal    = $request['codigoPostal'];
                    $poblacion->fechaAlta       = Carbon::now();
                    $poblacion->save();
                DB::commit();
            }

            return !is_numeric($verificarExistencia) || count($verificarExistencia) == 0 ? redirect('obtenerInsumosPoblaciones') : back();

        } catch (\Throwable $th) {
            Log::info($th);
            return back();
        }

    }

    public function eliminarPoblacion (CatPoblaciones $id) {
        $id->delete();
        return back();
    }

}