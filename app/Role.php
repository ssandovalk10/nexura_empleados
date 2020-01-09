<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

	  protected $fillable = [
      	'nombre',
    ];
     

    public function Empleado()
    {
    	return $this->belongsToMany('App\Empleado');
    }
}
