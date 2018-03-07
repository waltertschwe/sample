<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use Notifiable;

	protected $table = 'users';
	public $primaryKey = 'user_id';

	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
		'alt_email',
		'cell_number',
		'chat_handle',
		'email',
		'firstname',
		'is_admin',
		'is_duplicate',
		'lastname',
		'no_contact',
		'password',
		'phone',
		'website_id',
	];

	/**
	* The attributes that should be hidden for arrays.
	*
	* @var array
	*/
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * Get the Website from the User
	 * One User to a Website
	*/
	public function website()
	{
		return $this->belongsTo(
			'App\Model\Website',
			'website_id'
		);
	}

	/**
	 * Get the Billing Address of the User
	 * A User Has One Billing Address
	*/
	public function address()
	{
		return $this->hasOne(
			'App\Model\UserBilling',
			'user_id'
		);
	}

	/**
	 * Get The Sections for an Admin User
	 * A Admin User has access to many secitons
	*/
	public function admin_sections()
	{
		return $this->belongsToMany(
			'App\Model\Section',
			'admin_user_section_pivot',
			'user_id',	// foreign key name of the model
			'section_id'	// foreign key we are joining to
		);
	}

	/**
	 * Get The Role For the Admin User
	 * A Admin User has access to many Roles
	*/
	public function roles()
	{
	  	return $this
	    	->belongsToMany(‘App\Role’)
	    	->withTimestamps();
	}
}
