<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaction
 * 
 * @property int $ID
 * @property float $TransactionAmount
 * @property Carbon|null $TransactionDate
 * @property bool|null $Is_Recipient
 * @property int $AccountID
 * 
 * @property Account $account
 *
 * @package App\Models
 */
class Transaction extends Model
{
	protected $table = 'transactions';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'TransactionAmount' => 'float',
		'Is_Recipient' => 'bool',
		'AccountID' => 'int'
	];

	protected $dates = [
		'TransactionDate'
	];

	protected $fillable = [
		'TransactionAmount',
		'TransactionDate',
		'Is_Recipient',
		'AccountID'
	];

	public function account()
	{
		return $this->belongsTo(Account::class, 'AccountID');
	}
}
