<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Models\TblReportes;
use App\Models\CatPoblaciones;
use App\Models\CatProblemas;

class PageController extends Controller
{

    public function obtenerInsumos () {
        $reportes       = TblReportes::where('FKCatStatus',1)
                                     ->take(5)
                                     ->get();
        $poblaciones    = CatPoblaciones::all();
        $problemas      = CatProblemas::all();

        return view('inicio')
             ->with('reportes', $reportes)
             ->with('poblaciones', $poblaciones)
             ->with('problemas', $problemas);

        return view('inicio');
    }

}
