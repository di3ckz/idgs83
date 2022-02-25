<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatRoles extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'CatRoles';
    protected $primarykey ='id';
    protected $fillable = [
        'PKCatRoles',
        'nombrerol',
        'descripcion',
        'fechaAlta'
        
    ];

    public function empleado(){
        return $this->belongsTo(empleados::class);
    }
}
