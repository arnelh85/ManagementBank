<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bankemployee
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
 * @property string $UserName
 * @property string $Password
 * @property int $BankEmployeeTypeID
 * 
 * @property BankemployeeType $bankemployee_type
 * @property Collection|Bankclient[] $bankclients
 *
 * @package App\Models
 */
class Bankemployee extends Model
{
	protected $table = 'bankemployees';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'BankEmployeeTypeID' => 'int'
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
		'UserName',
		'Password',
		'BankEmployeeTypeID'
	];

	public function bankemployee_type()
	{
		return $this->belongsTo(BankemployeeType::class, 'BankEmployeeTypeID');
	}

	public function bankclients()
	{
		return $this->hasMany(Bankclient::class, 'BankEmployeeID');
	}
}
