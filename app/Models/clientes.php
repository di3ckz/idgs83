<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'tblclientes';
    protected $primarykey ='id';
    protected $fillable = [
        'idcliente',
        'iddireccion',
        'nmbre',
        'telefono',
        'fechaAlta'
    ];

    //relacion uno a uno
    public function direcciones(){
        return $this->hasOne(clientes::class);
    }
}
