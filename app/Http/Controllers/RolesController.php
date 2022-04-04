<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\CatRoles;

class RolesController extends Controller
{

    public function registrarRol (Request $request) {

        try {

            $verificarExistencia = CatRoles::where('nombreRol',$request['nombreRol'])
                                                 ->orWhere('nombreRol','like','%'.$request['nombreRol'])
                                                 ->orWhere('nombreRol','like','%'.$request['nombreRol'].'%')
                                                 ->orWhere('nombreRol','like',$request['nombreRol'].'%')
                                                 ->first();

            if ( !is_numeric($verificarExistencia) || count($verificarExistencia) == 0 ) {
                DB::beginTransaction();
                    $poblacion                  = new CatRoles;
                    $poblacion->nombreRol       = $request['nombreRol'];
                    $poblacion->descripcionRol  = $request['descripcionRol'];
                    $poblacion->fechaAlta       = Carbon::now();
                    $poblacion->save();
                DB::commit();
            }

            return !is_numeric($verificarExistencia) || count($verificarExistencia) == 0 ? back() : back();

        } catch (\Throwable $th) {
            Log::info($th);
            return back();
        }

    }

}