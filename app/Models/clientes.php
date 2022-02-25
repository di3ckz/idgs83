<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    use HasFactory;
    protected $primarykey ='idcliente';
    protected $fillable = ['idcliente','iddireccion','nmbre','telefono','fechaAlta'];

    //relacion uno a uno
    public function direcciones(){
        return $this->hasOne(clientes::class);
    }
}
