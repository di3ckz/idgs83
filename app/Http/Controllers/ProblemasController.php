<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\CatProblemas;

class ProblemasController extends Controller
{

    public function registrarProblema (Request $request) {

        try {

            $verificarExistencia = CatProblemas::where('nombreProblema',$request['nombreProblema'])
                                                 ->orWhere('nombreProblema','like','%'.$request['nombreProblema'])
                                                 ->orWhere('nombreProblema','like','%'.$request['nombreProblema'].'%')
                                                 ->orWhere('nombreProblema','like',$request['nombreProblema'].'%')
                                                 ->first();

            if ( !is_numeric($verificarExistencia) || count($verificarExistencia) == 0 ) {
                DB::beginTransaction();
                    $poblacion                      = new CatProblemas;
                    $poblacion->nombreProblema      = $request['nombreProblema'];
                    $poblacion->descripcionProblema = $request['descripcionProblema'];
                    $poblacion->fechaAlta           = Carbon::now();
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