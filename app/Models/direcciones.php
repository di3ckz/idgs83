<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class direcciones extends Model
{
    use HasFactory;
    protected $primarykey ='iddireccion';
    protected $fillable = ['iddireccion','idcatpoblacion','coordenadas','referencias','direccion'];


    //relacion muchos a uno
    public function catpoblaciones(){
        return $this->belongsTo(catpoblaciones::class);
    }

    public function clientes(){
        return $this->belongsTo(clientes::class);
    }
}
