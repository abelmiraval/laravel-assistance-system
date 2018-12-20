<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{

    // La asistencia le pertenece a un usuario
     public function employee(){
    	return $this->belongsTo(Employee::class,'idemployee');
    }
}
