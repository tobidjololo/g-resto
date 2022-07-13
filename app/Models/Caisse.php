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
class Caisse extends Model
{
	protected $table = 'Caisse';
	public $timestamps = false;

	protected $dates = [
		'created_date',
		'updated_date',
		'deleted_date'
	];

    protected $casts = [
		'montant' => 'int',
        'solde' => 'float'
	];

	protected $fillable = [
		'typeOperation',
        'nomOpérant',
        'prenomOpérant',
        'raison',
        'montant',
        'solde',
		'created_date',
		'updated_date',
		'deleted_date'
	];
}
