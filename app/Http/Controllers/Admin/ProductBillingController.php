<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Product as Product;
use App\Model\BillingPlan as Plan;
use App\Services\ProductService as ProductService;

class ProductBillingController extends Controller
{
	public function __construct(ProductService $product_service)
	{
		$this->middleware('auth');
		$this->product_service = $product_service;
		$this->periodicity = constant('BILLING_PERIODIC');
	}

	/**
	 * Show all Billing Plans for a Product
	 *
	 * @param  integer  $productId
	 * @return Response
	*/
	public function index( $productId )
	{
		// get the product with website and plan data
		$product = Product::with('website', 'plans')
			->findOrFail($productId);

		return view('admin/products/billingplans/index', [
			'website' => $product->website,
			'product' => $product,
			'plans' => $product->plans,
		]);
	}

	/**
	 * Create a New Billing Plans for a Product
	 *
	 * @param  integer  $productId
	 * @return Response
	*/
	public function create( $productId )
	{
		$product = Product::with('website')
			->findOrFail($productId);

		return view('admin/products/billingplans/create', [
			'website' => $product->website,
			'product' => $product,
			'periodicity' => $this->periodicity,
		]);
	}

	/**
	 * Show the specified Billing Plan
	 *
	 * @param  integer  $planId
	 * @return Response
	*/
	public function show( $planId )
	{
		$plan = Plan::with('website', 'product')
			->findOrFail($planId);

		return view('admin/products/billingplans/show', [
			'website' => $plan->product->website,
			'product' => $plan->product,
			'plan' => $plan,
			'periodicity' => $this->periodicity,
		]);
	}

	/**
	 * Update the specified Billing Plan
	 *
	 * @param  Request  $request
	 * @param  integer  $planId
	 * @return Response
	*/
	public function update(Request $request, $planId)
	{
		if ($request->isMethod('PUT')) {
			$data = $request->except(['_token', '_method']);

			Plan::where('billing_plan_id', $planId)->update($data);

			// Return a flash message
			$request->session()->flash('success', 'Billing Plan was Updated!');

			return back()->withInput();
		}
	}

	/**
	 * Store a new BillingPlan
	 *
	 * @param  Request  $request
	 * @return Response
	*/
	public function store( Request $request, $productId )
	{
		if ($request->isMethod('POST')) {
			// get form data
			$data = $request->except(['_token']);
			$data['product_id'] = $productId;

			if (!is_float($data['first_month_price'])) {
				$request->session()->flash('danger', 'Sorry, First Month price must be a decimal');
				return back()->withInput();
			}
			$price = $data['price'];

			// create a new billing plan
			$plan = new Plan($data);

			// insert new plan into db
			$plan->save();

			// Return a flash message
			$request->session()->flash('success', 'Billing Plan was successfully created!');

			return redirect()->route('billing_index', ['productId' => $productId]);

		}
	}
}
