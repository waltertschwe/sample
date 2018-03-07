<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\EmailNotifcationGroup as Group;
use App\Model\Website as Website;
use App\Services\SectionService as SectionService;

class EmailNotificationGroupsController extends Controller
{
	public function __construct(SectionService $section_service)
	{
		$this->middleware('auth');
		$this->section_service = $section_service;
	}
	
	/**
	 * Show all Email Notification Groups for a website
	 *
	 * @param  integer  $websiteId
	 * @return Response
	*/
	public function index( $websiteId ) 
	{
		$website =  Website::with('email_notification_groups')
			->findOrFail($websiteId);
		
		return view('admin/sections/emailnotifygroups/index', [
			'groups' => $website->email_notification_groups,
			'website' => $website,
		]);
	}
	
	/**
	 * Create a new Email Notification Group For a Website
	 *
	 * @param  integer  $websiteId
	 * @return Response
	*/
	public function create( $websiteId ) 
	{
		$website = Website::with('section_types')
			->findOrFail($websiteId);

		$sections = $this->section_service->getEmailNotifySections($websiteId);

		return view('admin/sections/emailnotifygroups/create', [
			'sections' => $sections,
			'website' => $website,
		]);
	}


	/**
	 * Show the specified Email Notification Group
	 *
	 * @param  integer  $emailNotificationGroupId
	 * @return Response
	*/
	public function show( $emailNotificationGroupId ) 
	{
		$group = Group::with('website')
			->findOrFail($notificationGroupId);

		$sections = $this->section_service->getEmailNotifySections($group->website->website_id);

		return view('admin/sections/notifygroups/show', [
			'group' => $group,
			'sections' => $sections,
			'website' => $group->website
		]);
	}
}
