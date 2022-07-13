<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Vente
 *
 * @property int $id
 * @property string $client
 * @property int $plat
 * @property int $boisson
 * @property string $typeCommande
 * @property int $gerante
 * @property Carbon $created_date
 * @property Carbon $updated_date
 * @property Carbon|null $deleted_date
 *
 * @package App\Models
 */
class LigneVentes extends Model
{
	protected $table = 'LigneVentes';
	public $timestamps = false;

	protected $casts = [
		'idVente' => 'int',
        'prix' =>'int'
	];

	protected $dates = [
		'created_date',
		'updated_date',
		'deleted_date'
	];

	protected $fillable = [
		'idVente',
		'produit',
		'prix',
		'created_date',
		'updated_date',
		'deleted_date'
	];

    public function editor()
    {
        return $this->belongsTo('App\Models\Vente', 'idVente');
    }

}
