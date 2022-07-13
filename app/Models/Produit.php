<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Produit
 *
 * @property int $id
 * @property string|null $nom
 * @property int|null $quantiteStock
 * @property int|null $quantiteAlert
 * @property int|null $prix
 * @property int|null $categorie
 * @property Carbon|null $created_date
 * @property Carbon|null $updated_date
 * @property Carbon|null $deleted_date
 *
 * @package App\Models
 */
class Produit extends Model
{
	protected $table = 'Produit';
	public $timestamps = false;

	protected $casts = [
		'quantiteStock' => 'int',
		'quantiteAlert' => 'int',
		'prix' => 'int',
		'categorie' => 'int'
	];

	protected $dates = [
		'created_date',
		'updated_date',
		'deleted_date'
	];

	protected $fillable = [
		'nom',
		'quantiteStock',
		'quantiteAlert',
		'prix',
		'categorie',
		'created_date',
		'updated_date',
		'deleted_date'
	];

    public function editor()
    {
        return $this->belongsTo('App\Models\Categorie', 'categorie');
    }
}
