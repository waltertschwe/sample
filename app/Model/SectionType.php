<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SectionType extends Model
{
	protected $table = 'section_types';
	public $primaryKey = 'section_type_id';
	
	/**
	* Get the Section that belongs to the SectionType
	*/
	public function section()
	{
		return $this->belongsTo('App\Model\Section');
	}
	
	/**
	* Get a collection of websites for an individual seciton type
	*/
	public function website()
	{
		return $this->belongsToMany(
			'App\Model\Website', 
			'website_section_type_pivot',
			'section_type_id',
			'website_id'
		);
	}
}
