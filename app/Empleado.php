<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
     protected $fillable = [
      	'nombre', 'email', 'sexo', 'area_id', 'boletin', 'description'
    ];


    public function area(){

    	 return $this->belongsTo('App\Areas');
    } 
}
