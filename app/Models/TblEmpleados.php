<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblEmpleados extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'TblEmpleados';
    protected $primarykey ='PKTblEmpleados';
    protected $fillable = [
        'PKTblEmpleados',
        'FKCatRoles',
        'nombreUsuario',
        'apellidoPaterno',
        'apellidoMaterno', 
        'fechaAlta',
        'usuario',
        'contrasenia',
        'fechaAlta'
    ];
    public function reportes(){
        return $this->hasOne(TblDetalleReporte::class);
    }
    public $sequence = null;


    public function rol(){
        return $this->hasOne(CatRoles::class);
    }
    public $sequence = null;


}
