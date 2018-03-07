<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

use App\Model\Product as Product;


class ProductService {
	
	/**
	 * Gets sections that are tied to products
	 * product and sections are a many to many relationship
	 * product->section contains pivot table data of product_section
	 *
	 * @param  App\Model\Product $product
	 * @return Array $sectionsSelected
	*/
	public function getSelectedSections(Product $product) 
	{
		$sectionsSelected = [];
		foreach($product->sections as $section) {
			$sectionsSelected[] = $section->section_id;
		}
		
		return $sectionsSelected;
	}
	
	/**
	 * Build the Product Requirement Dropdown for all Products
	 * except the one that is selected 
	 * If we are creating a new product don't exclude any products
	 *
	 *  @param $websiteId
	 *  @param $productId
	 *  @param $isCreate
	 *  @return Array $productRequirements
	*/
	public function buildProductRequirementDropDown( $websiteId, $productId = '', $isCreate = 0 ) 
	{
		if($isCreate) {
			$products = Product::where('website_id', $websiteId)
				->pluck('name', 'product_id');
		} else {
			$products = Product::where('website_id', $websiteId)
				->where('product_id', '!=', $productId)
				->pluck('name', 'product_id');
		}
			
		$productRequirements = [];
		foreach($products as $k => $v) {
			$productRequirements[$k . "_active"] = 'ACTIVE Subscription for "' . $v . '"';
			$productRequirements[$k . "_expired"] = 'EXPIRED Subscription for ' . $v . '"';
		}

		return $productRequirements;
	}
	
	/**
	 * modify the form request drop down must_have
	 * and populate either "must_have_active", "must_have_expired",
	 * or if nothing selected both will be set to null
	 *
	 *  @param data - form data
	 *  @return Array $data
	*/
	public function processMustHaveRequirement( $data ) 
	{
		if($data['must_have']) {
			$parts = explode("_", $data['must_have']);
			if($parts[1] === "active") {
				$data['must_have_active'] = $parts[0];
				$data['must_have_expired'] = null;
			} else {
				$data['must_have_expired'] = $parts[0];
				$data['must_have_active'] = null;
			}
		} else {
			$data['must_have_active'] = null;
			$data['must_have_expired'] = null;
		}
		
		unset($data['must_have']);
		
		return $data;
	}
	
	/**
	 * modify the form request drop down must_have
	 * and populate either "must_not_have_active", 
	 * "must_not_have_expired", or if nothing selected 
	 * both will be set to null
	 *
	 *  @param data - form data
	 *  @return Array $data
	*/
	public function processMustNotHaveRequirement( $data ) 
	{
		if($data['must_not_have']) {
			$parts = explode("_", $data['must_not_have']);
			if($parts[1] === "active") {
				$data['must_not_have_active'] = $parts[0];
				$data['must_not_have_expired'] = null;
			} else {
				$data['must_not_have_expired'] = $parts[0];
				$data['must_not_have_active'] = null;
			}
		} else {
			$data['must_not_have_active'] = null;
			$data['must_not_have_expired'] = null;
		}
		unset($data['must_not_have']);
		
		return $data;
	}
	
	/**
	 *  takes the product ID and appends either "_active" or
	 *  "_expired" so they can be displayed in the drop down
	 *
	 *  @param active
	 *  @param expired
	 *  @return string
	*/
	public function showProductRequirement( $active, $expired ) 
	{
		if($active) {
			return $active . "_active";
		}
		
		if($expired) {
			return $expired . "_expired";
		}
		
		return null;
	}
	
	/**
	 * gets all Products for a website and are returned
	 * by display order
	 * 
	 * @param websiteId
	 * 
	 */
	 public function getProductsByDisplayOrder( $websiteId ) 
	 {
	 	$products = Product::where('website_id', $websiteId)
			->orderBy('display_order', 'desc')
			->pluck('name', 'product_id', 'display_order');
			
		return $products;
	 }
}
	