<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enfermedad extends Model
{
    protected $table = 'enfermedad';

    public function sintomas()
    {
    	return $this->belongsToMany('App\Sintoma');
    }
}
