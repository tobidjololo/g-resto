<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Recette
 *
 * @property int $id
 * @property string $nom
 * @property int $prix
 * @property Carbon $created_date
 * @property Carbon $updated_date
 * @property Carbon|null $deleted_date
 *
 * @package App\Models
 */
class Recette extends Model
{
	protected $table = 'Recettes';
	public $timestamps = false;

	protected $casts = [
		'prix' => 'int'
	];

	protected $dates = [
		'created_date',
		'updated_date',
		'deleted_date'
	];

	protected $fillable = [
		'nom',
		'prix',
		'created_date',
		'updated_date',
		'deleted_date'
	];

}
