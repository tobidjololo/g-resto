<?php

/**
 * Created by Reliese Model.
 */

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
class Categorie extends Model
{
	protected $table = 'categorie';
	public $timestamps = false;

	protected $dates = [
		'created_date',
		'updated_date',
		'deleted_date'
	];

	protected $fillable = [
		'nom',
		'created_date',
		'updated_date',
		'deleted_date'
	];

    public function cities()
    {
        return $this->hasMany('App\Models\Produit', 'categorie');
    }
}
