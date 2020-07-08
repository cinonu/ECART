<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class configuration extends Model
{
   protected $primaryKey= 'identifier';
   protected $keyType= 'string';
   protected $fillable = ['value'];
}
