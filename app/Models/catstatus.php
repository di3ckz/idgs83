<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catstatus extends Model
{
    use HasFactory;
    protected $primarykey ='idcatstatu';
    protected $fillable = ['idcatstatu','nombreStatus','descripcionStatus','fechaAlta'];
}
