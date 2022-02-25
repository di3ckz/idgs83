<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catroles extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'tblcatroles';
    protected $primarykey ='id';
    protected $fillable = [
        'idcatrol',
        'nombrerol',
        'descripcion',
        'fechaAlta'
        
    ];

    public function empleado(){
        return $this->belongsTo(empleados::class);
    }
}
