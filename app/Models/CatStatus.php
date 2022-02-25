<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatStatus extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'CatStatus';
    protected $primarykey ='id';
    protected $fillable = [
        'PKCatStatus',
        'nombreStatus',
        'descripcionStatus',
        'fechaAlta'
    ];

    public function reporte(){
        return $this->hasOne(reportes::class);
    }
    
}
