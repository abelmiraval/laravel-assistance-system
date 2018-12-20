<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    //Cargo es una tabla independiente


	// Un cargo puede tener muchos horarios
    public function schedules(){
    	return $this->hasMany(Schedule::class);
    }

    //Un mismo cargo puede tener varios empleados
    public function employees(){
    	return $this->hasMany(Employee::class);
    }
}
	