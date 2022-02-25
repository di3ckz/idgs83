<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class direcciones extends Model
{
    use HasFactory;
    protected $primarykey ='iddireccion';
    protected $fillable = ['iddireccion','idcatpoblacion','coordenadas','referencias','direccion'];
}
