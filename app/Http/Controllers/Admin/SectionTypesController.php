<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Website as Website;
use App\Model\SectionType as SectionType;

class SectionTypesController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	/**
	 * Show all sections types for a website
	 *
	 * @param  integer  $websiteId
	 * @return Response
	*/
	public function index( $websiteId ) 
	{
		$website = Website::with('section_types')
			->findOrFail($websiteId);
			
		return view('admin/sectiontypes/index', [
			'website' => $website,
			'sectionTypes' => $website->section_types,
		]);
	}
	
	/**
	 * Show the specified Section Type
	 *
	 * @param  integer  $sectionTypeId
	 * @return Response
	*/
	public function show( $websiteId, $sectionTypeId ) 
	{
		$website = Website::findorFail($websiteId);
		$sectionType = SectionType::findOrFail($sectionTypeId);
		// NOTE: We can't use relationship of section type to website 
		// because it will return a collection of websites.
		// we need to specify in the path the website we are on.
		
		return view('admin/sectiontypes/show', [
			'website' => $website,
			'sectionType' => $sectionType,
		]);
	}
	
	/**
	 * Update the specified section type
	 *
	 * @param  Request  $request
	 * @param  integer  $websiteId
	 * @param  integer $setionTypeId
	 * @return Response
	*/
	public function update(Request $request, $websiteId, $sectionTypeId)
	{
		if ($request->isMethod('PUT')) {
			// get data from request
			$data = $request->except(['_token', '_method']);
			
			// update section type
			SectionType::where('section_type_id', $sectionTypeId)->update($data);
			
			// Return a flash message
			$request->session()->flash('success', 'Section Type was Updated!');
			
			return back()->withInput();
		}
	}
}