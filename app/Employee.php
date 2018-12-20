<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

	// Un empleado solo tiene un cargo
	//Descripcion: Cuando registro empleado solo se registra una vez y con un solo cargo
   	
   	public function charge(){
		return $this->belongsTo(Charge::class,'idcharge');
	}

	// Un empleado puede tener muchas asistencias
	public function attendances(){
		return $this->hasMany(Attendance::class);
	}
}
