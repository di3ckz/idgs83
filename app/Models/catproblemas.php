<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catproblemas extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'tblcatproblemas';
    protected $primarykey ='id';
    protected $fillable = [
        'idcatproblema',
        'nombreProblema',
        'descripcionProblema',
        'fechaAlta'
        
    ];
    public function reporte(){
        return $this->hasOne(reportes::class);
    }
    
}
