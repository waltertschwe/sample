<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Website as Website;
use App\Model\Section as Section;
use App\Model\SectionType as SectionType;
use App\Services\SectionService as SectionService;

class SectionsController extends Controller
{
	public function __construct(SectionService $section)
	{
		$this->middleware('auth');
		$this->service = $section;
	}
	
	/**
	 * Show all sections for a website
	 *
	 * @param  integer  $websiteId
	 * @return Response
	*/
	public function index( $websiteId ) 
	{
		// get all sections dynamically by websiteId
		$sections = Website::find($websiteId)->sections;
		$website = $sections[0]->website;
		
		return view('admin/sections/index', [
			'website' => $website,
			'sections' => $sections,
		]);
			
	}
	
	/**
	 * Create a new section for a website
	 *
	 * @param  integer  $websiteId
	 * @return Response
	*/
	public function create( $websiteId ) 
	{
		$website = Website::with('section_types')
			->findOrFail($websiteId);
		
		return view('admin/sections/create', [
			'checkboxes' => $this->service->checkBoxGroup(),
			'sectionTypes' => $website->section_types,
			'website' => $website,
		]);
	}
	
	/**
	 * Display a single section
	 *
	 * @param  integer  $sectionId
	 * @return Response
	*/
	public function show( $sectionId ) {
		$section = Section::find($sectionId); 
		$website = $section->website;

		return view('admin/sections/show', [
			'checkboxes' => $this->service->checkBoxGroup(),
			'section' => $section,
			'sectionTypes' => $website->section_types,
			'website' => $website,
		]);
	}
	
	/**
	 * Update the specified section
	 *
	 * @param  Request  $request
	 * @param  string   $id
	 * @return Response
	*/
	public function update(Request $request, $sectionId)
	{
		if ($request->isMethod('PUT')) {
			// get data from request
			$data = $request->except(['_token', '_method']);

			// update the product by Id
			Section::where('section_id', $sectionId)->update($data);

			// Return a flash message
			$request->session()->flash('success', 'Section was Updated!');

			return back()->withInput();
		}
	}
	
	/**
	 * Store a new section
	 *
	 * @param  Request $request
	 * @param  int     $websiteId
	 * @return Response
	*/
	public function store(Request $request, $websiteId)
	{
		if ($request->isMethod('POST')) {
			// get data from request
			$data = $request->except(['_token']);
			$data['website_id'] = $websiteId;

			$section = new Section($data);
			$section->save();
			
			// Return a flash message
			$request->session()->flash('success', 'Section was successfully created!');
			
			return redirect()->route('section_index', ['websiteId' => $websiteId]);
		}
	}
	
	/**
	 * Re-Order Sections 
	 *
	 * @param  int  $websiteId
	 * @return Response
	*/
	public function order( $websiteId ) 
	{
		$sections = Website::find($websiteId)->sectionsOrderByDisplay;
		
		return view('admin/sections/order', [
			'website' => Website::find($websiteId),
			'sections' => $sections
		]);
	}

	/**
	 * Delete a Section
	 *
	 * @param  int  $sectionId
	 * @return Redirect
	*/
	public function destroy( $sectionId )
	{
		$section = Section::find($sectionId);

		$section->delete();
		
		return back()->withInput();

	}
}
