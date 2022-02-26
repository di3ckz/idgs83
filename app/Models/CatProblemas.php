<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatProblemas extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'CatProblemas';
    protected $primarykey ='PKCatProblemas';
    protected $fillable = [
        'PKCatProblemas',
        'nombreProblema',
        'descripcionProblema',
        'fechaAlta'
        
    ];
    public function reporte(){
        return $this->hasOne(reportes::class);
        public $sequence = null;
    }
    
}
