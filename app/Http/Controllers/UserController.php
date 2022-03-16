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

        session(['usuarios' => '123456']);

        $var = session('usuarios');

        Log::alert($var);

        return count($return) > 0 ? redirect('inicio') : back();
    }

    public function logout () {
        session()->forget('usuarios');
        return redirect('/');
    }

}