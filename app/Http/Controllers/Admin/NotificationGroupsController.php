<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\NotificationGroup as Group;
use App\Model\Website as Website;
use App\Services\SectionService as SectionService;

class NotificationGroupsController extends Controller
{
	public function __construct(SectionService $section_service)
	{
		$this->middleware('auth');
		$this->section_service = $section_service;
	}

	/**
	 * Show all Notification Groups for a website
	 *
	 * @param  integer  $websiteId
	 * @return Response
	*/
	public function index( $websiteId ) 
	{
		$website = Website::with('notification_groups')
			->findOrFail($websiteId);
		
		return view('admin/sections/notifygroups/index', [
			'groups' => $website->notification_groups,
			'website' => $website,
		]);
	}
	
	/**
	 * Create a new Notification Group For a Website
	 *
	 * @param  integer  $websiteId
	 * @return Response
	*/
	public function create( $websiteId ) 
	{
		$website = Website::with('section_types')
			->findOrFail($websiteId);

		$sections = $this->section_service->getEmailNotifySections($websiteId);

		return view('admin/sections/notifygroups/create', [
			'sections' => $sections,
			'website' => $website,
		]);
	}

	/**
	 * Store a new Notification Group
	 *
	 * @param  Request  $request
	 * @param  int      $websiteId
	 * @return Response
	*/
	public function store( Request $request, $websiteId )
	{
		if ($request->isMethod('POST')) {
			// get form data
			$data = $request->except(['_token']);
			$data['website_id'] = $websiteId;

			// gets the checkbox data for sections to groups
			if(isset($data['group_section'])) {
				$sections = $data['group_section'];
				unset($data['group_section']);
			}

			// create a new Notification group and save
			$group = new Group($data);
			$group->save();	

			// save sections that belong to the notification group
			if(!empty($sections)) {
				$group->sections()->attach($sections);
			}

			// Return a flash message
			$request->session()->flash('success', 'Notification group was successfully created!');
			
			return redirect()->route('notification_group_index', ['websiteId' => $websiteId]);		
		}
	}
	/**
	 * Show the specified Notification Group
	 *
	 * @param  integer  $notificationGroupId
	 * @return Response
	*/
	public function show( $notificationGroupId ) 
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
