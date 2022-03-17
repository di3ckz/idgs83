<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Models\TblEmpleados;

class UserController extends Controller
{

    public function login (Request $request) {
        $return = TblEmpleados::where([
                                        ["usuario",$request['usuario']],
                                        ["contrasenia",$request['contrasenia']]
                                     ])
                              ->get();

        session(['usuario' => $return]);

        return count($return) > 0 ? redirect('inicio') : back();
    }

    public function actualizarEmpleado ( Request $request ) {
        try {

            if ( !is_string($request['contrasenia']) ) {
                $data = [
                    'nombreEmpleado'    => $request['nombreEmpleado'],
                    'apellidoPaterno'   => $request['apellidoPaterno'],
                    'apellidoMaterno'   => $request['apellidoMaterno'],
                    'usuario'           => $request['usuario']
                ];
            } else {
                $data = [
                    'nombreEmpleado'    => $request['nombreEmpleado'],
                    'apellidoPaterno'   => $request['apellidoPaterno'],
                    'apellidoMaterno'   => $request['apellidoMaterno'],
                    'usuario'           => $request['usuario'],
                    'contrasenia'       => $request['contrasenia']
                ];
            }

            TblEmpleados::where("PKTblEmpleados",session('usuario')[0]->{'PKTblEmpleados'})
                        ->update($data);

            return $this->logout();

        } catch (\Throwable $th) {

            Log::info($th);
            return back();
            
        }
    }

    public function logout () {
        session()->flush();
        return redirect('/');
    }

}