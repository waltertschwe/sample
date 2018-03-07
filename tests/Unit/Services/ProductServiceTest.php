<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Model\Product;
use App\Services\ProductService as ProductService;

class ProductServiceTest extends TestCase
{
	public function setUp()
	{
		parent::setUp();
		$this->service = new ProductService();
	}
	
	public function testProductModel()
	{
		$product = factory(\App\Model\Product::class)->create();
		
		$this->assertInstanceOf('\App\Model\Product', $product);
		
	}
	
	/*
	public function testGetProductsByDisplayOrder(
	{
		
		$product = factory(\App\Model\Product::class)->create([
			'name' => 'walter',
			'product_id' => 1,
			'display_order' => 3,
		]);
		
		$this->service->
	}
	*/
	public function testMustHaveActive() {
		$data = [
			'must_have' => '1_active'
		];

		$result = $this->service->processMustHaveRequirement($data);
		
		$this->assertEquals($result['must_have_active'], '1');
		$this->assertEquals($result['must_have_expired'], null);
		
		$this->assertArrayNotHasKey('must_have', $result);
	}
	
	public function testMustHaveExpired() {
		$data = [
			'must_have' => '1_expired'
		];

		$result = $this->service->processMustHaveRequirement($data);
		
		$this->assertEquals($result['must_have_expired'], '1');
		$this->assertEquals($result['must_have_active'], null);
		
		$this->assertArrayNotHasKey('must_have', $result);
	}
	
	public function testMustHaveEmpty() {
		$data = [
			'must_have' => ''
		];
		
		$result = $this->service->processMustHaveRequirement($data);
		
		$this->assertEquals($result['must_have_active'], null);
		$this->assertEquals($result['must_have_expired'], null);

		$this->assertArrayNotHasKey('must_have', $result);
	}
	
	public function testMustNotHaveActive() {
		$data = [
			'must_not_have' => '1_active'
		];

		$result = $this->service->processMustNotHaveRequirement($data);
		
		$this->assertEquals($result['must_not_have_active'], '1');
		$this->assertEquals($result['must_not_have_expired'], null);
		
		$this->assertArrayNotHasKey('must_not_have', $result);
	}
	
	public function testMustNotHaveExpired() {
		$data = [
			'must_not_have' => '1_expired'
		];

		$result = $this->service->processMustNotHaveRequirement($data);
		
		$this->assertEquals($result['must_not_have_active'], null);
		$this->assertEquals($result['must_not_have_expired'], 1);
		
		$this->assertArrayNotHasKey('must_not_have', $result);
	}
	
	public function testMustNotHaveEmpty() {
		$data = [
			'must_not_have' => ''
		];

		$result = $this->service->processMustNotHaveRequirement($data);
		
		$this->assertEquals($result['must_not_have_active'], null);
		$this->assertEquals($result['must_not_have_expired'], null);
		
		$this->assertArrayNotHasKey('must_not_have', $result);
	}
	
	public function testshowProductRequirementActive() 
	{
		$result = $this->service->showProductRequirement(1, '');
		
		$this->assertEquals($result, '1_active');
	}

	public function testshowProductRequirementExpired() 
	{
		$result = $this->service->showProductRequirement('', 1);
		
		$this->assertEquals($result, '1_expired');
	}
	
	public function testshowProductRequirementEmpty() 
	{
		$result = $this->service->showProductRequirement('', '');
		
		$this->assertEquals($result, null);
	}
}
	