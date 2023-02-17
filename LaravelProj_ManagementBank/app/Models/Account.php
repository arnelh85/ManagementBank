<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Account
 * 
 * @property int $ID
 * @property string $Account_No
 * @property float $Balance
 * @property int $BankClientID
 * 
 * @property Bankclient $bankclient
 * @property Collection|Transaction[] $transactions
 *
 * @package App\Models
 */
class Account extends Model
{
	protected $table = 'accounts';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'Balance' => 'float',
		'BankClientID' => 'int'
	];

	protected $fillable = [
		'Account_No',
		'Balance',
		'BankClientID'
	];

	public function bankclient()
	{
		return $this->belongsTo(Bankclient::class, 'BankClientID');
	}

	public function transactions()
	{
		return $this->hasMany(Transaction::class, 'AccountID');
	}
}
