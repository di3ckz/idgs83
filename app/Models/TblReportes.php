<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblReportes extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'TblReportes';
    protected $primarykey ='PKTblReportes';
    protected $fillable = [
        'PKTblReportes',
        'FKCatProblemas',
        'FKTblEmpleadosRecibio',
        'FKCatStatus',
        'FKTblDetalleReporte',
        'FKTblClientes',
        'descripcionProblema',
        'observaciones',
        'fechaAlta'
    ];

    public function detalles(){
        return $this->hasOne(detallereporte::class);
        public $sequence = null;
    }

    public function empleado(){
        return $this->belongsTo(empleados::class);
        public $sequence = null;
    }
    public function catstatus(){
        return $this->belongsTo(catstatus::class);
        public $sequence = null;
    }
    public function catproblemas(){
        return $this->belongsTo(catproblemass::class);
        public $sequence = null;
    }
}
