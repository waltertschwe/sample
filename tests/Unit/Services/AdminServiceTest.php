<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Services\AdminService as AdminService;

class AdminServiceTest extends TestCase
{
	public function setUp()
	{
		parent::setUp();
		$this->service = new AdminService();
	}
	
	public function testisStringEqualTrue()
	{
		$stringOne = 'advicetrade';
		$stringTwo = 'advicetrade';
		
		$result = $this->service->isStringEqual($stringOne, $stringTwo);
		
		$this->assertTrue($result);	
	}
	
	public function testisStringEqualFalse()
	{
		$stringOne = 'advicetrade';
		$stringTwo = 'advicetradeX';
		
		$result = $this->service->isStringEqual($stringOne, $stringTwo);
		
		$this->assertFalse($result);
	}
	
	public function testisIntegerEqualTrue()
	{
		$intOne = 1;
		$intTwo = 1;

		$result = $this->service->isIntegerEqual($intOne, $intTwo);

		$this->assertTrue($result);
	}
	
	public function testisIntegerEqualFalse()
	{
		$intOne = 1;
		$intTwo = 2;

		$result = $this->service->isIntegerEqual($intOne, $intTwo);

		$this->assertFalse($result);
	}
}
