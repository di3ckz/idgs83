<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catpoblaciones extends Model
{
    use HasFactory;
        public $timestamps=false;
        protected $table = 'tblcatpoblaciones';
        protected $primarykey ='id';
        protected $fillable =[
        
            'idcatpoblacion',
            'nombrePoblacion',
            'codigopstal',
            'fechaAlta'
        ];
    //relacion uno a muchos
        public function direcciones(){
        return $this->hasMany(direcciones::class);
    }
    
}
