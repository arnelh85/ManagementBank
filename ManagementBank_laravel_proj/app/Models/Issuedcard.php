<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Issuedcard
 * 
 * @property int $ID
 * @property string $CardType
 * @property string $Card_No
 * @property string $ExpMonth
 * @property string $ExpYear
 * @property string $SecurityCode
 * @property string $PIN_Code
 * @property Carbon|null $ModifiedDate
 * @property int $BankClientID
 * 
 * @property Bankclient $bankclient
 *
 * @package App\Models
 */
class Issuedcard extends Model
{
	protected $table = 'issuedcards';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'BankClientID' => 'int'
	];

	protected $dates = [
		'ModifiedDate'
	];

	protected $fillable = [
		'CardType',
		'Card_No',
		'ExpMonth',
		'ExpYear',
		'SecurityCode',
		'PIN_Code',
		'ModifiedDate',
		'BankClientID'
	];

	public function bankclient()
	{
		return $this->belongsTo(Bankclient::class, 'BankClientID');
	}
}
