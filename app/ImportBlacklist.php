<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportBlacklist extends Model
{
      protected $fillable = [

    	'fullname','phone', 'message',
    ];
}
