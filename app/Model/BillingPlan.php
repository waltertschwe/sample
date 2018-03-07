<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BillingPlan extends Model
{
	protected $table = 'billing_plans';
	public $primaryKey = 'billing_plan_id';
	
	// allowable fields for mass assignment
	protected $fillable =
	[
		'description',
		'extend_free_trial_days',
		'first_month_price',
		'free_trial_days',
		'name',
		'periodicity',
		'price',
		'product_id',
		'updated_at',
	];
	
	protected $guarded = 
	[
		'_method',
		'_token', 
		'created_at',
		'billing_plan_id', 
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
	 * Get Product by Billing Plan (Inverse Relationship)
	 * A Billing Plan has one Product
	*/
	
	public function product()
	{
		return $this->belongsTo('App\Model\Product', 'product_id');
	}
}
