<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reportes extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'tblreportes';
    protected $primarykey ='id';
    protected $fillable = [
        'idreporte',
        'idcatproblema',
        'idempleadorecibio',
        'idcatstatu',
        'iddetallereporte',
        'idcliente',
        'descripcionProblema',
        'observaciones',
        'fechaAlta'
    ];

    public function detalles(){
        return $this->hasOne(detallereporte::class);
    }

    public function empleado(){
        return $this->belongsTo(empleados::class);
    }
    public function catstatus(){
        return $this->belongsTo(catstatus::class);
    }
    public function catproblemas(){
        return $this->belongsTo(catproblemass::class);
    }
}
