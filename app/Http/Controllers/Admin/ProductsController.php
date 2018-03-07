<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Product as Product;
use App\Model\Section as Section;
use App\Model\Website as Website;
use App\Services\ProductService as ProductService;
use App\Services\SectionService as SectionService;

class ProductsController extends Controller
{
	public function __construct(ProductService $service, SectionService $section)
	{
		$this->middleware('auth');
		$this->service = $service;
		$this->section = $section;
	}
	
	/**
	 * Show all products for a website
	 *
	 * @param  integer  $websiteId
	 * @return Response
	*/
	public function index( $websiteId ) 
	{
		// TODO: USE "with" here instead of find to get data
		$products = Website::find($websiteId)->products;
		
		if(isset($products[0])) {
			$website = $products[0]->website;
		} else {
			$website =  Website::find($websiteId);
		}
		
		return view('admin/products/index', [
			'website' => $website,
			'products' => $products,
		]);
	}
	
	/**
	 * Show the specified Product
	 *
	 * @param  integer  $productId
	 * @return Response
	*/
	public function show( $productId ) 
	{
		$product = Product::find($productId);
		$website = $product->website;
		
		// all sections for the website
		$sections = $this->section->getAllSections($website->website_id);
		
		// sections admin selected for the product
		$sectionsSelected = $this->service->getSelectedSections($product);
		
		// sections that have is_trading_room_section 
		$tradingSections = $this->section->getTradingRoomSections($website->website_id);
		
		// all products except the product selected
		$productRequirements = $this->service->buildProductRequirementDropDown(
			$website->website_id,
			$productId
		);
		
		// selects the user selected must have requirement
		$mustHave = $this->service->showProductRequirement(
			$product->must_have_active,
			$product->must_have_expired
		);
		
		// selects the user selected must not have requirement
		$mustNotHave = $this->service->showProductRequirement(
			$product->must_not_have_active,
			$product->must_not_have_expired
		);

		return view('admin/products/show', [
			'website' => $website,
			'product' => $product,
			'sections' => $sections,
			'tradingSections' => $tradingSections,
			'sectionsSelected' => $sectionsSelected,
			'products' => $productRequirements,
			'mustHave' => $mustHave,
			'mustNotHave' => $mustNotHave,
		]);
	}
	
	/**
	 * Update the specified product
	 *
	 * @param  Request  $request
	 * @param  string  $productId
	 * @return Response
	*/
	public function update(Request $request, $productId)
	{
		if ($request->isMethod('PUT')) {
			// get data from request
			$data = $request->except(['_token']);
			// TODO: figure out why _method is not being stripped out
			unset($data['product_section']);
			unset($data['_method']);

			// proccess product requirement dropdowns
			$data = $this->service->processMustHaveRequirement($data);
			$data = $this->service->processMustNotHaveRequirement($data);

			// update the product by Id
			// TODO: many to many relationship this should all be done in one step
			Product::where('product_id', $productId)->update($data);
			$product = $product = Product::find($productId);
			$product->sections()->sync($request->input('product_section'));

			// Return a flash message
			$request->session()->flash('success', 'Product was Updated!');
			
			return back()->withInput();
		}
	}
	
	/**
	 * Create a new product
	 *
	 * @param  integer  $websiteId
	 * @return Response
	*/
	public function create( $websiteId ) 
	{
		// sections that have is_trading_room_section 
		$tradingSections = $this->section->getTradingRoomSections($websiteId);
		
		// get all the products for dropdown
		// TODO: clean up this function's parameters
		$productRequirements = $this->service->buildProductRequirementDropDown(
			$websiteId,
			'',
			1
		);

		// all sections for the product
		$sections = $this->section->getAllSections($websiteId);

		return view('admin/products/create', [
			'website' => Website::find($websiteId),
			'tradingSections' => $tradingSections,
			'products' =>  $productRequirements,
			'sections' => $sections,
		]);
	}
	
	/**
	 * Re-Order Products 
	 *
	 * @param  int  $websiteId
	 * @return Response
	*/
	public function order( $websiteId ) 
	{
		// gets all products for a website and order by display_id
		$products = Website::find($websiteId)->productsOrderByDisplay;
		
		return view('admin/products/order', [
			'website' => Website::find($websiteId),
			'products' => $products
		]);
	}
	
	/**
	 * Store a new product
	 *
	 * @param  Request  $request
	 * @param  integer  $websiteId
	 * @return Response
	*/
	public function store( Request $request, $websiteId )
	{
		if ($request->isMethod('POST')) {
			// get form data
			$data = $request->except(['_token']);
			$data['website_id'] = $websiteId;
			
			// gets the checkbox data for product to sections
			if(isset($data['product_section'])) {
				$sections = $data['product_section'];
				unset($data['product_section']);
			}
			
			// process must have dropdown(s)
			$data = $this->service->processMustHaveRequirement($data);
			$data = $this->service->processMustNotHaveRequirement($data);
			
			// create a new product with form data
			$product = new Product($data);
			$product->save();
			
			// save sections that belong to the product
			if(!empty($sections)) {
				$product->sections()->attach($sections);
			}
			
			// Return a flash message
			$request->session()->flash('success', 'Product was successfully created!');
			
			return redirect()->route('product_index', ['websiteId' => $websiteId]);
		}
	}

	/**
	 * Delete a Product
	 *
	 * @param  int  $productId
	 * @return Redirect
	*/
	public function destroy( $productId )
	{
		$product = Product::find($productId);
		
		$product->delete();
		
		return back()->withInput();
	}
	
}
