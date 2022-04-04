<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\TblReportes;
use App\Models\CatPoblaciones;
use App\Models\CatProblemas;
use App\Models\CatRoles;

class PageController extends Controller
{
    private function obtenerTblReportes () {
        return DB::select('SELECT
                                  folio,
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
        return CatPoblaciones::where('Activo', 1)->get();
    }

    private function obtenerTblCatProblemas () {
        return CatProblemas::where('Activo', 1)->get();
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

    public function obtenerInsumosReportes ( $status ) {
        if ( session()->has('usuario') ) {
            $reportes = DB::select('SELECT * FROM generalReportes WHERE status = "'.$status.'"');
            $detalleReporte = DB::select('SELECT * FROM generalReportes WHERE status = "'.$status.'" LIMIT 1');

            $poblaciones    = $this->obtenerTblCatPoblaciones();
            $problemas      = $this->obtenerTblCatProblemas();

            return view('reportes')
                 ->with('status', $status)
                 ->with('reportes', $reportes)
                 ->with('poblaciones', $poblaciones)
                 ->with('problemas', $problemas)
                 ->with('detalleReporte', $detalleReporte);
        } else {
            return view('login');
        }
    }

    public function obtenerInsumosRoles ( ) {
        $roles = CatRoles::where('Activo', 1)->get();

        $poblaciones    = $this->obtenerTblCatPoblaciones();
        $problemas      = $this->obtenerTblCatProblemas();

        $cont = 0;
        foreach ($roles as $item) {
            $roles[$cont]['fechaAlta'] = Carbon::parse($roles[$cont]['fechaAlta'])->format('d-m-Y');
            $cont += 1;
        }

        return view('insumos')
             ->with('busqueda','Roles')
             ->with('roles', $roles)
             ->with('poblaciones', $poblaciones)
             ->with('problemas', $problemas);
    }

    public function obtenerInsumosProblemas ( ) {
        $poblaciones    = $this->obtenerTblCatPoblaciones();
        $problemas      = $this->obtenerTblCatProblemas();

        $cont = 0;
        foreach ($problemas as $item) {
            $problemas[$cont]['fechaAlta'] = Carbon::parse($problemas[$cont]['fechaAlta'])->format('d-m-Y');
            $cont += 1;
        }

        return view('insumos')
             ->with('busqueda','Problemas')
             ->with('poblaciones', $poblaciones)
             ->with('problemas', $problemas);
    }

    public function obtenerInsumosPoblaciones ( ) {
        $poblaciones    = $this->obtenerTblCatPoblaciones();
        $problemas      = $this->obtenerTblCatProblemas();

        $cont = 0;
        foreach ($poblaciones as $item) {
            $poblaciones[$cont]['fechaAlta'] = Carbon::parse($poblaciones[$cont]['fechaAlta'])->format('d-m-Y');
            $cont += 1;
        }

        return view('insumos')
             ->with('busqueda','Poblaciones')
             ->with('poblaciones', $poblaciones)
             ->with('problemas', $problemas);
    }

}