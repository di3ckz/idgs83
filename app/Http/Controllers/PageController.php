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
        return TblReportes::select('tblclientes.nombreCliente','catpoblaciones.nombrePoblacion','catproblemas.nombreProblema','tblreportes.fechaAlta')
                            ->where('FKCatStatus',1)
                            ->join('tblclientes','PKTblClientes','FKTblClientes')
                            ->join('tbldirecciones','PKTblDirecciones','FKTblDirecciones')
                            ->join('catpoblaciones','PKCatPoblaciones','tbldirecciones.FKCatPoblaciones')
                            ->join('catproblemas','PKCatProblemas','FKCatProblemas')
                            ->take(5)
                            ->get();
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