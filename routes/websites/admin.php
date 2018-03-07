<?php

Route::get('/', function () {
	return view('auth/login');
}); 
// Admin User Routes
Route::get("/admin/website/{websiteId}/users", "Admin\AdminController@users")
	->name("user_index");

Route::get("/admin/users/profile/{userId}", "Admin\AdminController@userProfile")
	->name("user_profile");

Route::put("/admin/users/profile/{userId}", "Admin\AdminController@updateProfile")
	->name("user_update");

Route::get("/admin/website/{websiteId}/users/ban", "Admin\AdminController@userBan")
	->name("user_ban");
	
// ADMIN USER ROUTES	
Route::get("/admin/website/{websiteId}/admin-users", "Admin\AdminController@adminUsers")
	->name("admin_index");
	
Route::get("/admin/website/{websiteId}/admin-users/create", "Admin\AdminController@adminCreate")
	->name("admin_create");
	
Route::post("/admin/website/{websiteId}/admin-users/create", "Admin\AdminController@adminStore")
	->name("admin_store");
	
Route::get("/admin/website/{websiteId}/admin-user/{userId}", "Admin\AdminController@adminEdit")
	->name("admin_show");
	
Route::put("/admin/website/{websiteId}/admin-user/{userId}", "Admin\AdminController@adminUpdate")
	->name("admin_update");

// End Admin User Routes

// Start AJAX Routes
Route::put("/admin/product/order-update", "Admin\AjaxController@updateProductOrder")
	->name("admin_ajax_product_order");
	
Route::put("/admin/section/order-update", "Admin\AjaxController@updateSectionOrder")
	->name("admin_ajax_section_order");
// End AJAX Routes

// Start Product Routes
Route::get("/admin/website/{websiteId}/product/create", "Admin\ProductsController@create")
	->name("product_create");

Route::post("/admin/{websiteId}/product/store", "Admin\ProductsController@store")
	->name("product_store");

Route::get("/admin/website/{websiteId}/products", "Admin\ProductsController@index")
	->name("product_index");
Route::get("/admin/product/{productId}", "Admin\ProductsController@show")
	->name("product_show");

Route::get("/admin/website/{websiteId}/product/order", "Admin\ProductsController@order")
	->name("product_order");

Route::put("/admin/product/{productId}", "Admin\ProductsController@update");
Route::get("/admin/product/delete/{productId}", "Admin\ProductsController@destroy")
	->name("product_delete");
// End Product Routes

// Start Product Billing Routes
Route::get("/admin/product/{productId}/billing/create", 
	"Admin\ProductBillingController@create")
	->name("billing_create");

Route::post("/admin/product/{productId}/billing/store", 
	"Admin\ProductBillingController@store")
	->name("billing_store");

Route::get("/admin/product/{productId}/billing", 
	"Admin\ProductBillingController@index")
	->name("billing_index");

Route::get("/admin/billing/{billingId}", "Admin\ProductBillingController@show")
	->name("billing_show");
	
Route::put("/admin/billing/{billingId}", "Admin\ProductBillingController@update");
Route::post("/admin/product/{productId}/billing/create", "Admin\ProductBillingController@store");

// End Product Billing Routes

// Start Promotion Routes 
Route::get("/admin/website/{websiteId}/promotions/create", 
	"Admin\PromotionsController@create")
	->name("promotion_create");

Route::put("/admin/website/{websiteId}/promotions/create", 
	"Admin\PromotionsController@create")
	->name("promotion_store");

Route::get("/admin/website/{websiteId}/current-promotions", 
	"Admin\PromotionsController@current")
	->name("promotions_current");
	
Route::get("/admin/website/{websiteId}/historical-promotions", 
	"Admin\PromotionsController@historical")
	->name("promotions_historical");
// End Promotion Routes

// Start Section Routes
Route::get("/admin/website/{websiteId}/sections/create", "Admin\SectionsController@create")
	->name("section_create");

Route::get("/admin/section/delete/{sectionId}", "Admin\SectionsController@destroy")
	->name("section_delete");

Route::post("/admin/website/{websiteId}/section/create", "Admin\SectionsController@store")
	->name("section_store");

Route::get("/admin/website/{websiteId}/sections", "Admin\SectionsController@index")
	->name("section_index");

Route::get("/admin/section/{sectionId}", "Admin\SectionsController@show")
	->name("section_show");

Route::put("/admin/section/{sectionId}", "Admin\SectionsController@update")
	->name("section_update");

Route::get("/admin/website/{websiteId}/section/order", "Admin\SectionsController@order")
	->name("section_order");
// End Section Routes

// Start Section Type Routes
Route::get("/admin/website/{websiteId}/section-types", "Admin\SectionTypesController@index")
	->name("section_type_index");
	
Route::get("/admin/website/{websiteId}/section-types/{sectionTypeId}", "Admin\SectionTypesController@show")
	->name("section_type_show");

Route::put("/admin/website/{websiteId}/section-types/{sectionTypeId}", "Admin\SectionTypesController@update")
	->name("section_type_update");
// End Section Type Routes

// Start Notification Group Routes
Route::get("/admin/website/{websiteId}/notification-groups", "Admin\NotificationGroupsController@index")
	->name("notification_group_index");
	
Route::get("/admin/notification-group/{notification_group_id}", "Admin\NotificationGroupsController@show")
	->name("notification_group_show");

Route::get("/admin/website/{websiteId}/notification-group/create", "Admin\NotificationGroupsController@create")
	->name("notification_group_create");

Route::post("/admin/website/{websiteId}/notification-group/create", "Admin\NotificationGroupsController@store")
	->name("notification_group_store");


// End Notification Group Routes
	
// Start Email Notification Group Routes
Route::get("/admin/website/{websiteId}/email-notification-groups", "Admin\EmailNotificationGroupsController@index")
	->name("email_notification_group_index");

Route::get("/admin/notification-group/{email_notification_group_id}", "Admin\EmailNotificationGroupsController@show")
	->name("email_notification_group_show");
	
Route::get("/admin/website/{websiteId}/email-notification-group/create", "Admin\EmailNotificationGroupsController@create")
	->name("email_notification_group_create");
// End Email Notification Group Routes