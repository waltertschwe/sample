<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = 'products';
	public $primaryKey = 'product_id';
	/*
	protected $fillable =
	[
		'updated_at',
	]
	;
	*/
	protected $guarded = [
		'_method',
		'_token', 
		'created_at',
		'product_id', 
	];

	/**
	 * Get the Website from the Product
	 * One Product to A Website
	*/
	public function website()
	{
		return $this->belongsTo('App\Model\Website', 'website_id');
	}
	
	/**
	 * Get Sections from the Product
	 * Many products can have many sections
	*/
	public function sections()
	{
		return $this->belongsToMany(
			'App\Model\Section', 
			'product_section', 
			'product_id', 
			'section_id');
	}
	
	/**
	 * Get Billing Plans By Product
	 * A Product has many Billing Plans
	*/
	public function plans()
	{
		return $this->hasMany('App\Model\BillingPlan', 'product_id');
	}

}
