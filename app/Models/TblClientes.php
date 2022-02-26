<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblClientes extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'TblClientes';
    protected $primarykey ='PKTblClientes';
    protected $fillable = [
        'PKTblClientes',
        'FKTblDirecciones',
        'nombreCliente',
        'telefono',
        'fechaAlta'
    ];

    //relacion uno a uno
    public function direcciones(){
        return $this->hasOne(TblClientes::class);
    }
    public $sequence = null;

}
