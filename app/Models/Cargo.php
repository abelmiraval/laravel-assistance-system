<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 03 Oct 2017 18:31:46 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Cargo
 * 
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $horarios
 * @property \Illuminate\Database\Eloquent\Collection $trabajadores
 *
 * @package App\Models
 */
class Cargo extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $fillable = [
		'nombre',
		'descripcion'
	];

	public function horarios()
	{
		return $this->hasMany(\App\Models\Horario::class, 'idcargos');
	}

	public function trabajadores()
	{
		return $this->hasMany(\App\Models\Trabajadore::class, 'idcargo');
	}
}
