<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Database\Seeder;

use App\Http\Controllers\Controller;
use App\Model\Website as Website;
use App\Services\AdminService as AdminService;
use App\User as User;

class AdminController extends Controller
{
	
	public function __construct(AdminService $service)
	{
		$this->middleware('auth');
		$this->service = $service;
	}
	
	/**
	 * Users Index - View All Users
	 * for a Website
	 *
	 * @param  integer  $websiteId
	 * @return Response
	*/
	public function users( $websiteId ) 
	{
		$website = Website::with('users')
			->findOrFail($websiteId);

		return view('admin/users/index', [
			'website' => $website,
			'users' => $website->users,
		]);
	}
	
	/**
	 * User Profile - View Individual user data
	 *
	 * @param  integer  $userId
	 * @return Response
	*/
	public function userProfile( $userId ) 
	{
		$user = User::with('website', 'address')
			->findOrFail($userId);

		return view('admin/users/profile', [ 
			'website' => $user->website,
			'address' => $user->address,
			'user' => $user,
		]);
	}
	
	public function updateProfile( Request $request, $userId )
	{
		if ($request->isMethod('PUT')) {
			// get form data
			$data = $request->except(['_token', '_method']);
			
			## TODO: move checkbox checks out of controller into a service
			if ($request->has('is_duplicate')) {
				$data['is_duplicate'] = true;
			}
			
			if ($request->has('no_contact')) {
				$data['no_contact'] = true;	
			}

			User::where('user_id', $userId)->update($data);
			
			// Return a flash message
			$request->session()->flash('success', 'User Profile was Updated!');
			
			return back()->withInput();
		}
	}
	
	/**
	 * View Admin Users
	 *
	 * @param  integer  $websiteId
	 * @return Response
	*/
	public function adminUsers( $websiteId )
	{
		$website = Website::with('admin_users')
			->findOrFail($websiteId);

		return view('admin/adminusers/index', [
			'website' => $website,
			'users' => $website->admin_users,
		]);
	}

	/**
	 * Create an Admin User
	 *
	 * @param  integer  $websiteId
	 * @return Response
	*/
	public function adminCreate( $websiteId )
	{
		$website = Website::with('sections')
			->findOrFail($websiteId);

		return view('admin/adminusers/create', [
			'website' => $website,
			'sections' => $website->sections,
		]);
	}
	
	/**
	 * Store a new Admin User
	 *
	 * @param  Request  $request
	 * @param  integer $websiteId
	 * @return Response
	*/
	public function adminStore( Request $request, $websiteId )
	{
		if ($request->isMethod('POST')) {
			$data = $request->except(['_token']);
			$data['website_id'] = $websiteId;
			$data['is_admin'] = 1;
			
			// process password
			$isPasswordEqual = $this->service->isStringEqual(
				$data['password'], 
				$data['confirm_password']
			);

			if($isPasswordEqual) {
				$encryptedPassword = bcrypt($data['password']);
				$data['password'] = $encryptedPassword;
				$data['created_at'] = new \DateTime();
				unset($data['confirm_password']);
			} else {
				## TODO: setup error flash messages so they appear on page in red error
				$request->session()->flash('success', '"Password" and "Confirm Password" fields do not match.');

				return back()->withInput();
			}
			
			// process checkbox data
			if(isset($data['user_section'])) {
				$sections = $data['user_section'];
				unset($data['user_section']);
			}

			// create a new admin user
			$user = new User($data);
			$user->save();
			
			// save sections that belong to the product
			if(!empty($sections)) {
				$user->admin_sections()->attach($sections);
			}
			
			// Return a flash message
			$request->session()->flash('success', 'New Admin was created!');
			
			return redirect()->route('admin_index', ['websiteId' => $websiteId]);
		}
	}

	/**
	 * Editn an Admin User
	 *
	 * @param  integer  $websiteId
	 * @param  integer $userId
	 * @return Response
	*/
	public function adminEdit( $websiteId, $userId )
	{
		$user = User::with('website')
			->findOrFail($userId);
		
		// test if the website and user id being modified match
		$isWebUserValid = $this->service->isIntegerEqual(
			(int)$websiteId,
			$user->website->website_id
		);
			
		if(!$isWebUserValid) {
			// Return a flash message
			// ##TODO: fix error flash messaging showing up on page
			$request->session()->flash(
				'success', 
				'Sorry the Editor you are tying to modify belongs to another website'
			);
			
			return redirect()->route('admin_index', ['websiteId' => $websiteId]);
		} else {
			return view('admin/adminusers/show', [
				'sections' => $user->website->sections,
				'sectionsSelected' => $this->service->getSelectedSections($user),
				'user' => $user,
				'website' => $user->website,
			]);
		}
	}
	
	/**
	 * Update an Administrators data and section access
	 *
	 * @param  Request  $request
	 * @param  int      $websiteId
	 * @param  int      $userId
	 * @return Response 
	*/
	public function adminUpdate( Request $request, $websiteId, $userId ) 
	{
		$data = $request->except(['_token', '_method']);
		
		// remove checkbox selection from data get later from the request
		unset($data['user_section']);
		
		// get user data
		$user = User::findOrFail($userId);
		
		// *** TODO: The below can be slightly refactored so we don't have 
		// two save operations.  The password and confirm password logic 
		// add some complexity that can probably be moved to the front end ***
		
		//process password fields
		$password = $data['password'];
		$confirmPassword = $data['confirm_password'];
		unset($data['password']);
		unset($data['confirm_password']);
		if(!$password && !$confirmPassword) {
			
			// no new password update data and section access
			$user->update($data);
			$user->admin_sections()->sync($request->input('user_section'));
		} else {
			$isValidPw = $this->service->processPasswordFields($password, $confirmPassword);
			if($isValidPw) {
				// new valid password encrypt
				$data['password'] = bcrypt($password);
				$user->update($data);
				
				// no new password update data and section access
				$user->update($data);
				$user->admin_sections()->sync($request->input('user_section'));
			} else {
				// ##TODO: fix error flash messaging showing up on page
				$request->session()->flash(
					'success', 
					'Sorry Passwords do not match or a password field has been left empty'
				);
				
				return redirect()->route(
					'admin_show', [ 
					'websiteId' => $websiteId,
					'user_id' => $userId,
				] );
			}
		}
		
		// Return a flash message
		$request->session()->flash('success', 'Admin User updated');
			
		return redirect()->route(
			'admin_show', 
			['websiteId' => $websiteId,
			'user_id' => $userId
			]);
		
		
	}
	/**
	 * View Banned users
	 *
	 * @param  integer  $websiteId
	 * @return Response
	*/
	public function userBan( $websiteId ) 
	{
		return view('admin/users/user-ban');
	}
}
	