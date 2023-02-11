<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bankclient
 * 
 * @property int $ID
 * @property string $LastName
 * @property string $FirstName
 * @property Carbon $BirthDate
 * @property string $PersonalID_No
 * @property string $City
 * @property string $Country
 * @property string $Address
 * @property string $PhoneNumber
 * @property string $Email
 * @property int|null $BankEmployeeID
 * 
 * @property Bankemployee|null $bankemployee
 * @property Collection|Account[] $accounts
 * @property Collection|Issuedcard[] $issuedcards
 *
 * @package App\Models
 */
class Bankclient extends Model
{
	protected $table = 'bankclients';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'BankEmployeeID' => 'int'
	];

	protected $dates = [
		'BirthDate'
	];

	protected $fillable = [
		'LastName',
		'FirstName',
		'BirthDate',
		'PersonalID_No',
		'City',
		'Country',
		'Address',
		'PhoneNumber',
		'Email',
		'BankEmployeeID'
	];

	public function bankemployee()
	{
		return $this->belongsTo(Bankemployee::class, 'BankEmployeeID');
	}

	public function accounts()
	{
		return $this->hasMany(Account::class, 'BankClientID');
	}

	public function issuedcards()
	{
		return $this->hasMany(Issuedcard::class, 'BankClientID');
	}
}
