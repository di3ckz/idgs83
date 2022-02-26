<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblEmpleados extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'TblEmpleados';
    protected $primarykey ='id';
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
        return $this->hasOne(reportes::class);
    }

    public function rol(){
        return $this->hasOne(catroles::class);
    }

}
