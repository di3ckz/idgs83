<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleados extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'tblempleados';
    protected $primarykey ='id';
    protected $fillable = [
        'idempleado',
        'idcatrol',
        'nombreUsuario',
        'apellidoPaterno',
        'apellidoMterno', 
        'fechaAlta',
        'usuario',
        'password'
    ];
    public function reportes(){
        return $this->hasOne(reportes::class);
    }

    public function rol(){
        return $this->hasOne(catroles::class);
    }

}
