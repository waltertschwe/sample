<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

use App\User as User;

class AdminService {

	/**
	 * Test if two strings are equal
	 *
	 * @param  string $stringOne
	 * @param  string $stringTwo
	 * @return boolean $result
	 */
	public function isStringEqual( $stringOne, $stringTwo )
	{
		return (strcasecmp($stringOne, $stringTwo) == 0) ? true : false;
	}

	/**
	 * Test if two integers are equal
	 *
	 * @param  int $intOne
	 * @param  int $intTwo
	 * @return boolean $result
	 */
	public function isIntegerEqual( $intOne, $intTwo )
	{
		return ($intOne == $intTwo) ? true: false;
	}

	/**
	 * Gets sections that are associated to ad Admin User
	 *
	 * @param  App\User $user
	 * @return Array $sectionsSelected
	*/
	public function getSelectedSections( User $user )
	{
		$sectionsSelected = [];
		foreach($user->admin_sections as $section) {
			$sectionsSelected[] = $section->section_id;
		}

		return $sectionsSelected;
	}

	/**
	 * Process password and confirm password data from Admin User Form
	 *
	 * @param  string  $password
	 * @param  string  $confirmPassword
	 * @return boolean
	*/
	public function processPasswordFields( $password, $confirmPassword )
	{
		if(!$password && $confirmPassword || $password && !$confirmPassword) {
			return false;
		}

		if($password && $confirmPassword) {
			$isEqual = $this->isStringEqual($password, $confirmPassword);
			return ($isEqual) ? true : false;
		}
	}
}
