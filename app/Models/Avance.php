<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avance extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];

    //Relacion uno a uno inversa
    public function asignacion(){
        return $this->belongsTo(Asignacion::class);
    }

     //Relacion uno a muchos inversa
     public function reportegenerals(){
        return $this->belongsTo(Reportegeneral::class);
        }

  
}
