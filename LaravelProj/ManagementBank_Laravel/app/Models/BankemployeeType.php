<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BankemployeeType
 * 
 * @property int $ID
 * @property int $EmployeeType
 * @property string $Description
 * 
 * @property Collection|Bankemployee[] $bankemployees
 *
 * @package App\Models
 */
class BankemployeeType extends Model
{
	protected $table = 'bankemployee_types';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'EmployeeType' => 'int'
	];

	protected $fillable = [
		'EmployeeType',
		'Description'
	];

	public function bankemployees()
	{
		return $this->hasMany(Bankemployee::class, 'BankEmployeeTypeID');
	}
}
