<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sintoma extends Model
{
    protected $table = 'sintomas';

    public function enfermedades()
    {
    	return $this->belongsToMany('App\Enfermedad', 'enfermedad_sintomas', 'id', 'id');
    }

    public function diagnosticos()
    {
    	return $this->belongsToMany('App\Diagnostico', 'diagnostico_sintoma', 'id', 'id');
    }

}
