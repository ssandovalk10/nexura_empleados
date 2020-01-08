<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado_rol extends Model
{
      protected $fillable = [
      	'empleado_id',  'role_id'
    ];
}
