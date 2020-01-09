<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado_role extends Model
{	
	 protected $table = 'empleado_role';


      protected $fillable = [
      	'empleado_id',  'role_id'
    ];
}
