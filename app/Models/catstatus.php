<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catstatus extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'tblcatstatus';
    protected $primarykey ='id';
    protected $fillable = [
        'idcatstatu',
        'nombreStatus',
        'descripcionStatus',
        'fechaAlta'
    ];

    public function reporte(){
        return $this->hasOne(reportes::class);
    }
    
}
