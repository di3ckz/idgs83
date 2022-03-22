<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\TblReportes;
use App\Models\CatPoblaciones;
use App\Models\CatProblemas;

class PageController extends Controller
{
    private function obtenerTblReportes () {
        return DB::select('SELECT
                                  nombreCliente,
                                  apellidoPaterno,
                                  apellidoMaterno,
                                  nombrePoblacion,
                                  nombreProblema,
                                  fechaAlta
                           FROM generalReportes
                           WHERE status = "Pendiente"
                           ORDER BY folio ASC
                           LIMIT 5');
    }

    private function obtenerTblCatPoblaciones () {
        return CatPoblaciones::all();
    }

    private function obtenerTblCatProblemas () {
        return CatProblemas::all();
    }

    public function obtenerInsumos () {
        if ( session()->has('usuario') ) {
            $reportes       = $this->obtenerTblReportes();
            $poblaciones    = $this->obtenerTblCatPoblaciones();
            $problemas      = $this->obtenerTblCatProblemas();

            return view('inicio')
                ->with('reportes', $reportes)
                ->with('poblaciones', $poblaciones)
                ->with('problemas', $problemas);
        } else {
            return view('login');
        }
    }

    public function obtenerInsumosReportes( $status ) {
        if ( session()->has('usuario') ) {
            $reportes = DB::select('SELECT * FROM generalReportes WHERE status = "'.$status.'"');

            $poblaciones    = $this->obtenerTblCatPoblaciones();
            $problemas      = $this->obtenerTblCatProblemas();

            return view('reportes')
                 ->with('status', $status)
                 ->with('reportes', $reportes)
                 ->with('poblaciones', $poblaciones)
                 ->with('problemas', $problemas);
        } else {
            return view('login');
        }
    }

}