<?php
// Start Authentication Routes (temp )
Auth::routes();
// End Authentication Routes

// Admin Routes
require_once "websites/admin.php";

// MP Trader Routing
Route::namespace('mp-trader')->group(function () {
	require_once "websites/mp-trader.php";
});

// Advice Trade Routing
Route::namespace('advicetrade')->group(function () {
	require_once "websites/advicetrade.php";
});

// Elliott Wave Trader Routing
Route::namespace('elliottwave')->group(function () {
	require_once "websites/elliottwave.php";
});

// Swing Trader Trader Routing
Route::namespace('swingtrader')->group(function () {
	require_once "websites/swingtrader.php";
});

// Tech Trader Routing
Route::namespace('swingtrader')->group(function () {
	require_once "websites/techtrader.php";
});

// AT Quant Routing
Route::namespace('atquant')->group(function () {
	require_once "websites/atquant.php";
});

// TEMP API ROUTE
## TODO: MOVE TO API SECTION
Route::get('/api/users', function() {
	## TODO: make selectable fields dynamic
	$users = \App\User::select('id','firstname', 'lastname', 'email')->get()->toJson();
	
	return $users;
});




