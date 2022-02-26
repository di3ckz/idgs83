<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatRoles extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'CatRoles';
    protected $primarykey ='PKCatRoles';
    protected $fillable = [
        'PKCatRoles',
        'nombreRol',
        'descripcionRol',
        'fechaAlta'
        
    ];

    public function empleado(){
        return $this->belongsTo(TblEmpleados::class);
    }
    public $sequence = null;

}
