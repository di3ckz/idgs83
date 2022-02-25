<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reportes extends Model
{
    use HasFactory;
    protected $primarykey ='idreporte';
    protected $fillable = ['idreporte','idcatproblema','idempleadorecibio','idcatstatu',
    'iddetallereporte','idcliente','descripcionProblema','observaciones','fechaAlta'];
}
