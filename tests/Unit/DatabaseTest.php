<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DatabaseTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
	
	public function testWebsites() 
	{
		$this->assertDatabaseHas('websites', [
			'name' => 'The Tech Trader',
			'name' => 'MPtrader',
			'name' => 'Swing Trade Online',
			'name' => 'Elliott Wave Trader',
			'name' => 'AdviceTrade',
			'name' => 'ATQuant',
		]);
		
		$this->assertDatabaseHas('websites', [
			'domain' => 'thetechtrader.com',
			'domain' => 'mptrader.com',
			'domain' => 'swingtradeonline.com',
			'domain' => 'elliottwavetrader.net',
			'domain' => 'advicetrade.com',
			'domain' => 'atquant.com',
		]);
	}
}
