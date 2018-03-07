<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
	protected $table = 'websites';
	public $primaryKey = 'website_id';
	
	/**
	 * Get Users for the Website
	 * One Website to many Users
	*/
	public function users()
	{
		return $this->hasMany('App\User', 'website_id')
			->where('is_admin', '=', 0);
	}
	
	/**
	 * Get Amin Users for the Website
	 * One Website to many Users
	*/
	public function admin_users()
	{
		return $this->hasMany('App\User', 'website_id')
			->where('is_admin', '=', 1);
	}
	
	/**
	 * Get the products for the website
	 * One Website to many Prodcuts
	*/
	public function products()
	{
		return $this->hasMany('App\Model\Product', 'website_id')
			->orderBy('display_order');
	}
	
	/**
	 * Get the sections for the website
	 * One Website to many Sections
	*/
	public function sections()
	{
		return $this->hasMany('App\Model\Section', 'website_id');
	}
	
	/**
	 * Get the products for the website
	 * One Website to many Prodcuts and order it by display_order
	*/
	public function productsOrderByDisplay()
	{
		return $this->hasMany('App\Model\Product', 'website_id')
			->orderBy('display_order');
	}

	/**
	 * Get the sections for the website
	 * One Website to many Prodcuts and order it by display_order
	*/
	public function sectionsOrderByDisplay()
	{
		return $this->hasMany('App\Model\Section', 'website_id')
			->orderBy('display_order');
	}
	
	/**
	 * Get the ACTIVE promtions for each website
	 * One Website has many ACTIVE promotions
	*/
	public function current_promotions()
	{
		return $this->hasMany('App\Model\Promotion', 'website_id')
			->where('is_active', '=', 1);
	}
	
	/**
	 * Get the INACTIVE promtions for each website
	 * One Website has many INACTIVE promotions
	*/
	public function historical_promotions()
	{
		return $this->hasMany('App\Model\Promotion', 'website_id')
			->where('is_active', '=', 0);
	}
	
	/**
	 * Get Section Types for the individual Website
	 * Many websites can have many section types
	*/
	public function section_types()
	{
		return $this->belongsToMany(
			'App\Model\SectionType', 
			'website_section_type_pivot', 
			'website_id', 
			'section_type_id'
		);
	}
	
	/**
	 * Get NotificationGroups for the individual website
	 * A website can have many notification groups
	*/
	public function notification_groups()
	{
		return $this->hasMany(
			'App\Model\NotificationGroup', 
			'website_id');
	}
	
	/**
	 * Get NotificationGroups for the individual website
	 * A website can have many notification groups
	*/
	public function email_notification_groups()
	{
		return $this->hasMany(
			'App\Model\EmailNotificationGroup', 
			'website_id');
	}
}
