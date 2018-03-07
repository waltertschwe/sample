<?php

use Illuminate\Database\Seeder;

class WebsitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('websites')->insert([
			'website_id' => constant('TECH_TRADER_PK'),
			'name' => 'The Tech Trader',
			'domain' => 'thetechtrader.com',
			'directory' => 'thetechtrader',
			'short_code' => 'ttt',
			'created_at' => new \DateTime(),
		]);
		
		DB::table('websites')->insert([
			'website_id' => constant('MP_TRADER_PK'),
			'name' => 'MPtrader',
			'domain' => 'mptrader.com',
			'directory' => 'mptrader',
			'short_code' => 'mpt',
			'created_at' => new \DateTime(),
		]);
		
		DB::table('websites')->insert([
			'website_id' => constant('SWING_TRADER_PK'),
			'name' => 'Swing Trade Online',
			'domain' => 'swingtradeonline.com',
			'directory' => 'swingtradeonline',
			'short_code' => 'sto',
			'created_at' => new \DateTime(),
		]);
		
		DB::table('websites')->insert([
			'website_id' => constant('ELLIOTT_TRADER_PK'),
			'name' => 'Elliott Wave Trader',
			'domain' => 'elliottwavetrader.net',
			'directory' => 'elliottwavetrader',
			'short_code' => 'ewt',
			'created_at' => new \DateTime(),
		]);
		
		DB::table('websites')->insert([
			'website_id' => constant('ADVICE_TRADE_PK'),
			'name' => 'AdviceTrade',
			'domain' => 'advicetrade.com',
			'directory' => 'advicetrade',
			'short_code' => 'at',
			'created_at' => new \DateTime(),
		]);
		
		DB::table('websites')->insert([
			'website_id' => constant('ATQ_TRADER_PK'),
			'name' => 'ATQuant',
			'domain' => 'atquant.com',
			'directory' => 'atquant',
			'short_code' => 'atq',
			'created_at' => new \DateTime(),
		]);
	}
}
