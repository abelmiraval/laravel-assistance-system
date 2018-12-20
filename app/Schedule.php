<?php   

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    // Un horario pertenece a un cargo
	public function charge(){
		return $this->belongsTo(Charge::class,'idcharge');
	}
}
