<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 03 Oct 2017 18:31:46 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Trabajadore
 * 
 * @property int $id
 * @property string $nombre
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property string $dni
 * @property string $estado
 * @property int $idcargo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Cargo $cargo
 * @property \Illuminate\Database\Eloquent\Collection $asistencias
 *
 * @package App\Models
 */
class Trabajadore extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'idcargo' => 'int'
	];

	protected $fillable = [
		'nombre',
		'apellido_paterno',
		'apellido_materno',
		'dni',
		'estado',
		'idcargo'
	];

	public function cargo()
	{
		return $this->belongsTo(\App\Models\Cargo::class, 'idcargo');
	}

	public function asistencias()
	{
		return $this->hasMany(\App\Models\Asistencia::class, 'idtrabajador');
	}
}
