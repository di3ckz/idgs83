<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatPoblaciones extends Model
{
    use HasFactory;
        public $timestamps=false;
        protected $table = 'CatPoblaciones';
        protected $primarykey ='id';
        protected $fillable =[
        
            'PKCatPoblaciones',
            'nombrePoblacion',
            'codigopstal',
            'fechaAlta'
        ];
    //relacion uno a muchos
        public function direcciones(){
        return $this->hasMany(direcciones::class);
    }
    
}
