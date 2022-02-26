<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Models\CatPoblaciones;

class PoblacionesController extends Controller
{

    public function registrarPoblacion (Request $request) {

        try {

            DB::beginTransaction();
                $poblacion                  = new CatPoblaciones;
                $poblacion->nombrePoblacion = $request['nombrePoblacion'];
                $poblacion->codigoPostal    = $request['codigoPostal'];
                $poblacion->fechaAlta       = Carbon::now();
                $poblacion->save();
            DB::commit();

            return view('inicio');

        } catch (\Throwable $th) {
            Log::info($th);
            return view('inicio');
        }

    }

    public function eliminarPoblacion (CatPoblaciones $id) {
        $id->delete();
        return view('inicio');
    }

}