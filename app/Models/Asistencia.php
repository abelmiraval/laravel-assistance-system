<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 03 Oct 2017 18:31:46 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Asistencia
 * 
 * @property int $id
 * @property \Carbon\Carbon $fecha
 * @property \Carbon\Carbon $hora_entrada
 * @property \Carbon\Carbon $hora_salida
 * @property string $tardanza
 * @property string $estado
 * @property int $idtrabajador
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Trabajadore $trabajadore
 *
 * @package App\Models
 */
class Asistencia extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'idtrabajador' => 'int'
	];

	protected $dates = [
		'fecha',
		'hora_entrada',
		'hora_salida'
	];

	protected $fillable = [
		'fecha',
		'hora_entrada',
		'hora_salida',
		'tardanza',
		'estado',
		'idtrabajador'
	];

	public function trabajadore()
	{
		return $this->belongsTo(\App\Models\Trabajadore::class, 'idtrabajador');
	}
}
