<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Model\Product as Product;
use App\Model\Section as Section;

class AjaxController extends Controller
{

	/**
	 * Update the product order for a website
	 *
	 * @param  Request  $request
	 * @return Response 
	*/
	public function updateProductOrder(Request $request)
	{
		if ($request->isMethod('PUT')) {
			$websiteId = $request->input('websiteId');
			$products = $request->input('order');
			return $products;
			
			$counter = 1;
			foreach($products as $product) {
				$product = Product::find($product);
				$product->display_order = $counter++;
				$product->save();
			} 
			
			$response = [
				'status' => 'success',
				'msg' => 'Product Order Updated',
			];
		} else {
			$response = [
				'status' => 'error',
				'msg' => 'No Access: Invalid HTTP verb',
			];
		}
		
		return \Response::json($response);
	}
	
	/**
	 * Update the section order for a website
	 *
	 * @param  Request  $request
	 * @return Response 
	*/
	public function updateSectionOrder(Request $request)
	{
		if ($request->isMethod('PUT')) {
			$websiteId = $request->input('websiteId');
			$sections = $request->input('order');

			$counter = 1;
			foreach($sections as $section) {
				$section = Section::find($section);
				$section->display_order = $counter++;
				$section->save();
			} 
			
			$response = [
				'status' => 'success',
				'msg' => 'Product Order Updated',
			];
		} else {
			$response = [
				'status' => 'error',
				'msg' => 'No Access: Invalid HTTP verb',
			];
		}
		
		return \Response::json($response);
	}
}
