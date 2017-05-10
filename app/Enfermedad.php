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

    public function especialidad()
    {
        return $this->belongsTo('App\Especialidad');
    }

    public function diagnosticos()
    {
    	return $this->belongsToMany('App\Diagnostico', 'diagnostico_enfermedad', 'id', 'id');
    }


}
