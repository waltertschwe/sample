<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmailNotificationGroup extends Model
{
	protected $table = 'email_notification_groups';
	public $primaryKey = 'email_notification_id';
	
	/**
	 * Get the Website data for the Email Notification Group
	 * One Email Notification Group to A Website
	*/
	public function website()
	{
		return $this->belongsTo('App\Model\Website');
	}
}
