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
class Vente extends Model
{
	protected $table = 'Ventes';
	public $timestamps = false;

	protected $casts = [
		'plat' => 'int',
		'boisson' => 'int',
		'gerante' => 'int',
        'montant' =>'int',
        'somme' =>'int'
	];

	protected $dates = [
		'created_date',
		'updated_date',
		'deleted_date'
	];

	protected $fillable = [
		'client',
		'plat',
		'boisson',
		'typeCommande',
        'somme',
		'gerante',
        'montant',
		'created_date',
		'updated_date',
		'deleted_date'
	];

    public function vente()
    {
        return $this->hasMany('App\Models\LigneVentes', 'idVente');
    }
}
