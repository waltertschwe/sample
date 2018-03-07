<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserBilling extends Model
{
	protected $table = 'user_billing_address';
	public $primaryKey = 'user_bill_address_id';
	
	public function user() 
	{
		return $this->belongsTo('App\User', 'user_id');
	}
}
