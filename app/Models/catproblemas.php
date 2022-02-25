<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catproblemas extends Model
{
    use HasFactory;
    protected $primarykey ='idcatproblemas';
    protected $fillable = ['idcatproblema','nombreProblema','descripcionProblema',
                            'fechaAlta'
        
    ];
    public function reporte(){
        return $this->hasOne(reportes::class);
    }
    
}
