<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NotificationGroup extends Model
{
	protected $table = 'notification_groups';
	public $primaryKey = 'notification_group_id';


	protected $fillable = [
		'alert_type',
		'description',
		'email_default',
		'field_name',
		'line_type',
		'must_have_product_id',
		'must_not_have_product_id',
		'name',
		'sort_order',
		'website_id'
	];

	protected $guarded = [
		'_method',
		'_token', 
		'created_at',
	];
	
	/**
	 * Get the Website data for the Notification Group
	 * One Notification Group to A Website
	*/
	public function website()
	{
		return $this->belongsTo('App\Model\Website', 'website_id');
	}

	/**
	 *  
	 * Notification Group and Sections Pivot Table
	*/
	public function sections() 
	{
		return $this->belongsToMany(
			'App\Model\Section', 
			'section_notification_group', 
			'n_group_id', 
			'section_id');
	}
}
