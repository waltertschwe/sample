<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RouteTest extends TestCase
{
	use WithoutMiddleware;

	public function testProductRoutes()
	{
		## TODO: figure out why unit testing isn't working with routing
		//$response = $this->call('GET', '/admin/website/2/products');
		
		//$this->assertEquals(200, $response->status());
	}

}
