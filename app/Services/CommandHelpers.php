<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class CommandHelpers {
	
	public function getWebsitePrimaryKey( $oldDbName ) 
	{
		switch ($oldDbName) {
			case "thetechtrader":
				$webSiteId = constant('TECH_TRADER_PK');
				break;
			case "mptrader":
				$webSiteId = constant('MP_TRADER_PK');
				break;
			case "swingtradeonline":
				$webSiteId = constant('SWING_TRADER_PK');
				break;
			case "elliottwavetrader":
				$webSiteId = constant('ELLIOTT_TRADER_PK');
				break;
			case "advicetrade":
				$webSiteId = constant('ADVICE_TRADE_PK');
				break;
			case "atquant":
				$webSiteId = constant('ATQ_TRADER_PK');
				break;
			default:
				$webSiteId = 0;
		}
		
		return $webSiteId;
	}
	
	public function getLastInsertIdTable( $primaryKey, $table ) 
	{
		$result = DB::connection('mysql')
			->select('SELECT ' .$primaryKey . 
				' FROM ' . $table .
				' ORDER BY ' . $primaryKey . 
				' DESC LIMIT 1'	
			);
		
		// return the next availble ID	
		if($result) {
			return ++$result[0]->$primaryKey;
		} else {
			// no data in table start primary key with 1
			return 1;
		}
		
	}
}
