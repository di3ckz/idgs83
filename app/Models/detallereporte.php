<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detallereporte extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'tbldetallereporte';
    protected $primarykey ='id';
    protected $fillable = [
        'iddetallereporte',
        'diagnostico',
        'solucion',
        'idempleadoactualizo',
        'fechaActualizacion',
        'idempleadoatencion',
        'fechaAtencion',
        'idempleadoatendiendo',
        'fechaAtendiendo'
    ];

     public function reportes(){
        return $this->belongsTo(detallereporte::class);
    }
   
}
