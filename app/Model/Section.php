<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
	protected $table = 'sections';
	public $primaryKey = 'section_id';
	
	protected $fillable = [
		'description',
		'email_description',
		'is_active',
		'is_email_notify',
		'is_email_notify_default',
		'is_hide_notify_checkboxes',
		'is_hide_user_editable',
		'is_hide_trading_options_list',
		'is_integrate_with_trading_room',
		'is_referenced',
		'is_watch_videos',
		'name',
		'room_name',
		'section_type_id',
		'url_path',
		'website_id',
	];
	
	protected $guarded = [
		'_method',
		'_token', 
		'created_at',
		'section_id', 
	];
	
	/**
	 * Get the Website for the Section
	 * A Section has a Website
	*/
	public function website()
	{
		return $this->belongsTo(
			'App\Model\Website', 
			'website_id'
		);
	}
	
	/**
	 * Get Products for the Section
	 * A Section has many products
	*/
	public function products()
	{
		return $this->belongsToMany(
			'App\Model\Product', 
			'product_section', 
			'section_id', // foreign key name of the model
			'product_id'  // foreign key we are joining to
		);
	}

	/**
	 * Get the SectionType from the Section 
	 * Section has one to one relationship with SectionType
	*/
	public function sectiontype()
	{
		return $this->hasOne(
			'App\Model\SectionType', 
			'section_type_id'
		);
	}
	
	/**
	 * Get The The Admin Users for a Section 
	 * A Section has many Admin Users
	*/
	public function admin_users()
	{
		return $this->belongsToMany(
			'App\User', 
			'admin_user_section_pivot',
			'section_id',	// foreign key name of the model
			'user_id'		// foreign key we are joining to
		);
	}
}
