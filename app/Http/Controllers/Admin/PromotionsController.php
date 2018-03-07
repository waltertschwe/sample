<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Product as Product;
use App\Model\Website as Website;
use App\Services\ProductService as ProductService;

class PromotionsController extends Controller
{
	public function __construct(ProductService $product_service)
	{
		$this->middleware('auth');
		$this->product_service = $product_service;
	}
	
	/**
	 * Show all current promotions for a website
	 *
	 * @param  integer  $websiteId
	 * @return Response
	*/
	public function current( $websiteId )
	{
		$website = Website::with('current_promotions')
			->findOrFail($websiteId);

		return view('admin/promotions/current', [
			'website' => $website,
			'promotions' => $website->current_promotions,
		]);
	}
	
	/**
	 * Get all Old Promotions
	 *
	 * @param  integer  $websiteId
	 * @return Response
	*/
	public function historical( $websiteId )
	{
		$website = Website::with('historical_promotions')
			->findOrFail($websiteId);
		
		return view('admin/promotions/historical', [
			'website' => $website,
			'promotions' => $website->historical_promotions,
		]);
	}
	
	/**
	 * Create a New Promotion
	 *
	 * @param  integer  $websiteId
	 * @return Response
	*/
	public function create( $websiteId )
	{
		$website = Website::findOrFail($websiteId);
		
		$productRequirements = $this->product_service->buildProductRequirementDropDown(
			$websiteId,
			'',
			1
		);
		
		return view('admin/promotions/create', [
			'website' => $website,
			'products' =>  $productRequirements,
		]);
	}
	
	/**
	 * Persist and Save Promotion to DB
	 *
	 * @param  integer  $websiteId
	 * @return Response
	*/
	public function store( $websiteId )
	{
		
	}
}
	