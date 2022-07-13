<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Categorie
 *
 * @property int $id
 * @property string $nom
 * @property Carbon $created_date
 * @property Carbon $updated_date
 * @property Carbon|null $deleted_date
 *
 * @package App\Models
 */
class Constantes extends Model
{
	protected $table = 'Constantes';
	public $timestamps = false;

	protected $dates = [
		'created_date',
		'updated_date',
		'deleted_date'
	];

    protected $casts = [
		'valeur' => 'float'
	];

	protected $fillable = [
		'nom',
        'valeur',
		'created_date',
		'updated_date',
		'deleted_date'
	];
}
