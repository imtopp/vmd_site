<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ["as"=>"frontend_home","uses"=>"Frontend\HomeController@index"]);

//[Administrator]
Route::get('/administrator/index', ["as"=>"backend_dashboard","uses"=>"Backend\BackendController@index"]);

//Banner
Route::post('/administrator/banner/read', ["as"=>"backend_banner_read","uses"=>"Backend\BannerController@read"]);
Route::post('/administrator/banner/create', ["as"=>"backend_banner_create","uses"=>"Backend\BannerController@create"]);
Route::post('/administrator/banner/update', ["as"=>"backend_banner_update","uses"=>"Backend\BannerController@update"]);
Route::post('/administrator/banner/delete', ["as"=>"backend_banner_delete","uses"=>"Backend\BannerController@delete"]);
//Brand
Route::post('/administrator/brand/read', ["as"=>"backend_brand_read","uses"=>"Backend\BrandController@read"]);
Route::post('/administrator/brand/create', ["as"=>"backend_brand_create","uses"=>"Backend\BrandController@create"]);
Route::post('/administrator/brand/update', ["as"=>"backend_brand_update","uses"=>"Backend\BrandController@update"]);
Route::post('/administrator/brand/delete', ["as"=>"backend_brand_delete","uses"=>"Backend\BrandController@delete"]);
//Category
Route::post('/administrator/category/read', ["as"=>"backend_category_read","uses"=>"Backend\CategoryController@read"]);
Route::post('/administrator/category/create', ["as"=>"backend_category_create","uses"=>"Backend\CategoryController@create"]);
Route::post('/administrator/category/update', ["as"=>"backend_category_update","uses"=>"Backend\CategoryController@update"]);
Route::post('/administrator/category/delete', ["as"=>"backend_category_delete","uses"=>"Backend\CategoryController@delete"]);
//Configuration
Route::post('/administrator/configuration/read', ["as"=>"backend_configuration_read","uses"=>"Backend\ConfigurationController@read"]);
Route::post('/administrator/configuration/create', ["as"=>"backend_configuration_create","uses"=>"Backend\ConfigurationController@create"]);
Route::post('/administrator/configuration/update', ["as"=>"backend_configuration_update","uses"=>"Backend\ConfigurationController@update"]);
Route::post('/administrator/configuration/delete', ["as"=>"backend_configuration_delete","uses"=>"Backend\ConfigurationController@delete"]);
//DisplayCategory
Route::post('/administrator/display-category/read', ["as"=>"backend_display_category_read","uses"=>"Backend\DisplayCategoryController@read"]);
Route::post('/administrator/display-category/create', ["as"=>"backend_display_category_create","uses"=>"Backend\DisplayCategoryController@create"]);
Route::post('/administrator/display-category/update', ["as"=>"backend_display_category_update","uses"=>"Backend\DisplayCategoryController@update"]);
Route::post('/administrator/display-category/delete', ["as"=>"backend_display_category_delete","uses"=>"Backend\DisplayCategoryController@delete"]);
//Gender
Route::post('/administrator/gender/read', ["as"=>"backend_gender_read","uses"=>"Backend\GenderController@read"]);
Route::post('/administrator/gender/create', ["as"=>"backend_gender_create","uses"=>"Backend\GenderController@create"]);
Route::post('/administrator/gender/update', ["as"=>"backend_gender_update","uses"=>"Backend\GenderController@update"]);
Route::post('/administrator/gender/delete', ["as"=>"backend_gender_delete","uses"=>"Backend\GenderController@delete"]);
//Product
Route::post('/administrator/product/read', ["as"=>"backend_product_read","uses"=>"Backend\ProductController@read"]);
Route::post('/administrator/product/update', ["as"=>"backend_product_update","uses"=>"Backend\ProductController@update"]);
Route::post('/administrator/product/create', ["as"=>"backend_product_create","uses"=>"Backend\ProductController@create"]);
Route::post('/administrator/product/delete', ["as"=>"backend_product_delete","uses"=>"Backend\ProductController@delete"]);
//ProductImage
Route::post('/administrator/product-image/read', ["as"=>"backend_product_image_read","uses"=>"Backend\ProductImageController@read"]);
Route::post('/administrator/product-image/update', ["as"=>"backend_product_image_update","uses"=>"Backend\ProductImageController@update"]);
Route::post('/administrator/product-image/create', ["as"=>"backend_product_image_create","uses"=>"Backend\ProductImageController@create"]);
Route::post('/administrator/product-image/delete', ["as"=>"backend_product_image_delete","uses"=>"Backend\ProductImageController@delete"]);
//ProductSize
Route::post('/administrator/product-size/read', ["as"=>"backend_product_size_read","uses"=>"Backend\ProductSizeController@read"]);
Route::post('/administrator/product-size/update', ["as"=>"backend_product_size_update","uses"=>"Backend\ProductSizeController@update"]);
Route::post('/administrator/product-size/create', ["as"=>"backend_product_size_create","uses"=>"Backend\ProductSizeController@create"]);
Route::post('/administrator/product-size/delete', ["as"=>"backend_product_size_delete","uses"=>"Backend\ProductSizeController@delete"]);
//ProductStore
Route::post('/administrator/product-store/read', ["as"=>"backend_product_store_read","uses"=>"Backend\ProductStoreController@read"]);
Route::post('/administrator/product-store/update', ["as"=>"backend_product_store_update","uses"=>"Backend\ProductStoreController@update"]);
Route::post('/administrator/product-store/create', ["as"=>"backend_product_store_create","uses"=>"Backend\ProductStoreController@create"]);
Route::post('/administrator/product-store/delete', ["as"=>"backend_product_store_delete","uses"=>"Backend\ProductStoreController@delete"]);
//SizeController
Route::post('/administrator/size/read', ["as"=>"backend_size_read","uses"=>"Backend\SizeController@read"]);
Route::post('/administrator/size/update', ["as"=>"backend_size_update","uses"=>"Backend\SizeController@update"]);
Route::post('/administrator/size/create', ["as"=>"backend_size_create","uses"=>"Backend\SizeController@create"]);
Route::post('/administrator/size/delete', ["as"=>"backend_size_delete","uses"=>"Backend\SizeController@delete"]);
//StoreController
Route::post('/administrator/store/read', ["as"=>"backend_store_read","uses"=>"Backend\StoreController@read"]);
Route::post('/administrator/store/update', ["as"=>"backend_store_update","uses"=>"Backend\StoreController@update"]);
Route::post('/administrator/store/create', ["as"=>"backend_store_create","uses"=>"Backend\StoreController@create"]);
Route::post('/administrator/store/delete', ["as"=>"backend_store_delete","uses"=>"Backend\StoreController@delete"]);
