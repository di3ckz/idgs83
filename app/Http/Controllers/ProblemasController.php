<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Models\CatProblemas;

class ProblemasController extends Controller
{

    public function registrarProblema (Request $request) {

        try {

            DB::beginTransaction();
                $poblacion                      = new CatProblemas;
                $poblacion->nombreProblema      = $request['nombreProblema'];
                $poblacion->descripcionProblema = $request['descripcionProblema'];
                $poblacion->fechaAlta           = Carbon::now();
                $poblacion->save();
            DB::commit();

            return view('inicio');

        } catch (\Throwable $th) {
            Log::info($th);
            return view('inicio');
        }

    }

    public function eliminarProblema (CatProblemas $id) {
        $id->delete();
        return view('inicio');
    }

}