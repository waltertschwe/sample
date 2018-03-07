<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

use App\Model\Section as Section;


class SectionService {
	
	/**
	 * Get All Sections 
	 * for an individual website
	 * 
	 * @param  websiteId
	 * @return App\Model\Section $sections;
	 */
	public function getAllSections($websiteId)
	{
		$sections = Section::where('website_id', $websiteId)
			->get();
			
		return $sections;
	}
	
	/**
	 * Get All the Trading Room Sections 
	 * for an individual website
	 * Returns a collection of Section Models
	 * 
	 * @param  websiteId
	 * @return App\Model\Section $tradingSections;
	 */
	public function getTradingRoomSections( $websiteId )
	{
		$tradingSections = Section::where('is_trading_room_section', 1)
			->where('website_id', $websiteId)
			->orderBy('name')
			->pluck('name', 'section_id');
		
			
		return $tradingSections;
	}
	
	/**
	 * Section checkbox fields
	 * 
	 * @return array $results
	 */
	public function checkBoxGroup()
	{
		return [
			'is_email_notify' => 'Send E-Mail Notifications',
			'is_email_notify_default' => 'E-Mail Notifications Default',
			'is_hide_notify_checkboxes' => 'Hide Notification Checkboxes',
			'is_hide_user_editable' => 'User Editable',
			'is_integrate_trading_room' => 'Integrate with Trading Room',
			'is_publish_comtex' => 'Publish to Comtex',
			'is_referenced' => 'Can not be Referenced',
			'is_hide_trading_options_list' => 'Hide in TradingRoom Options List',
			'is_watch_videos' => 'Watch Dropbox for Videos',
			'is_active' => 'Is Active',
		];
	}

	/**
	 * Get All the Sections That Have
	 * Email Notifications Turned On
	 * Returns a Collection of Section Models
	 * 
	 * @param  websiteId
	 * @return Illuminate\Support\Collection $sections
	 */
	public function getEmailNotifySections( $websiteId ) {
		$sections = Section::where('is_email_notify', 1)
			->where('website_id', $websiteId)
			->orderBy('name')
			->pluck('name', 'section_id');

		return $sections;
	}
}
	