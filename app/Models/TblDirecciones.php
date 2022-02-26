<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblDirecciones extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'TblDirecciones';
    protected $primarykey ='PKTblDirecciones';
    protected $fillable = [
        'PKTblDirecciones',
        'FKCatPoblaciones',
        'coordenadas',
        'referencias',
        'direccion'
    ];

    //relacion muchos a uno
    public function catpoblaciones(){
        return $this->belongsTo(catpoblaciones::class);
    }

    public function clientes(){
        return $this->belongsTo(clientes::class);
        public $sequence = null;
    }
}
