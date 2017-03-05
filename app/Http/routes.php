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
Route::post('/menu-category', ["as"=>"frontend_category_menu","uses"=>"Frontend\LayoutController@getAllCategory"]);

Route::group(['prefix' => 'browse'], function(){ //Browse Route
  Route::get('/', ["as"=>"frontend_browse","uses"=>"Frontend\BrowseController@index"]);
  Route::post('/get-product-lists', ["as"=>"frontend_browse_get_product_lists","uses"=>"Frontend\BrowseController@getProductLists"]);
});

Route::group(['prefix' => 'detail'], function(){ //Detail Route
  Route::get('/{product}', ["as"=>"frontend_detail","uses"=>"Frontend\DetailController@index"]);
});

Route::group(['prefix' => 'administrator'], function(){ //Administrator Route
  //[Administrator]
  Route::get('/index', ["as"=>"backend_dashboard","uses"=>"Backend\BackendController@index"]);

  Route::group(['prefix' => 'banner'], function(){ //Banner Route
    Route::post('/read', ["as"=>"backend_banner_read","uses"=>"Backend\BannerController@read"]);
    Route::post('/create', ["as"=>"backend_banner_create","uses"=>"Backend\BannerController@create"]);
    Route::post('/update', ["as"=>"backend_banner_update","uses"=>"Backend\BannerController@update"]);
    Route::post('/delete', ["as"=>"backend_banner_delete","uses"=>"Backend\BannerController@destroy"]);
  });

  Route::group(['prefix' => 'brand'], function(){ //Brand Route
    Route::post('/read', ["as"=>"backend_brand_read","uses"=>"Backend\BrandController@read"]);
    Route::post('/create', ["as"=>"backend_brand_create","uses"=>"Backend\BrandController@create"]);
    Route::post('/update', ["as"=>"backend_brand_update","uses"=>"Backend\BrandController@update"]);
    Route::post('/delete', ["as"=>"backend_brand_delete","uses"=>"Backend\BrandController@destroy"]);
  });

  Route::group(['prefix' => 'category'], function(){ //Category Route
    Route::post('/read', ["as"=>"backend_category_read","uses"=>"Backend\CategoryController@read"]);
    Route::post('/create', ["as"=>"backend_category_create","uses"=>"Backend\CategoryController@create"]);
    Route::post('/update', ["as"=>"backend_category_update","uses"=>"Backend\CategoryController@update"]);
    Route::post('/delete', ["as"=>"backend_category_delete","uses"=>"Backend\CategoryController@destroy"]);
  });

  Route::group(['prefix' => 'configuration'], function(){ //Configuration Route
    Route::post('/read', ["as"=>"backend_configuration_read","uses"=>"Backend\ConfigurationController@read"]);
    Route::post('/update', ["as"=>"backend_configuration_update","uses"=>"Backend\ConfigurationController@update"]);
  });

  Route::group(['prefix' => 'display-category'], function(){ //Display Category Route
    Route::post('/read', ["as"=>"backend_display_category_read","uses"=>"Backend\DisplayCategoryController@read"]);
    Route::post('/update', ["as"=>"backend_display_category_update","uses"=>"Backend\DisplayCategoryController@update"]);
  });

  Route::group(['prefix' => 'gender'], function(){ //Gender Route
    Route::post('/read', ["as"=>"backend_gender_read","uses"=>"Backend\GenderController@read"]);
  });

  Route::group(['prefix' => 'product'], function(){ //Product Route
    Route::post('/read', ["as"=>"backend_product_read","uses"=>"Backend\ProductController@read"]);
    Route::post('/update', ["as"=>"backend_product_update","uses"=>"Backend\ProductController@update"]);
    Route::post('/create', ["as"=>"backend_product_create","uses"=>"Backend\ProductController@create"]);
    Route::post('/delete', ["as"=>"backend_product_delete","uses"=>"Backend\ProductController@destroy"]);
  });

  Route::group(['prefix' => 'product-image'], function(){ //Product Image Route
    Route::post('/read', ["as"=>"backend_product_image_read","uses"=>"Backend\ProductImageController@read"]);
    Route::post('/update', ["as"=>"backend_product_image_update","uses"=>"Backend\ProductImageController@update"]);
    Route::post('/create', ["as"=>"backend_product_image_create","uses"=>"Backend\ProductImageController@create"]);
    Route::post('/delete', ["as"=>"backend_product_image_delete","uses"=>"Backend\ProductImageController@destroy"]);
  });

  Route::group(['prefix' => 'product-size'], function(){ //Product Size Route
    Route::post('/read', ["as"=>"backend_product_size_read","uses"=>"Backend\ProductSizeController@read"]);
    Route::post('/update', ["as"=>"backend_product_size_update","uses"=>"Backend\ProductSizeController@update"]);
    Route::post('/create', ["as"=>"backend_product_size_create","uses"=>"Backend\ProductSizeController@create"]);
    Route::post('/delete', ["as"=>"backend_product_size_delete","uses"=>"Backend\ProductSizeController@destroy"]);
  });

  Route::group(['prefix' => 'product-store'], function(){ //Product Store Route
    Route::post('/read', ["as"=>"backend_product_store_read","uses"=>"Backend\ProductStoreController@read"]);
    Route::post('/update', ["as"=>"backend_product_store_update","uses"=>"Backend\ProductStoreController@update"]);
    Route::post('/create', ["as"=>"backend_product_store_create","uses"=>"Backend\ProductStoreController@create"]);
    Route::post('/delete', ["as"=>"backend_product_store_delete","uses"=>"Backend\ProductStoreController@destroy"]);
  });

  Route::group(['prefix' => 'size'], function(){ //Size Route
    Route::post('/read', ["as"=>"backend_size_read","uses"=>"Backend\SizeController@read"]);
    Route::post('/update', ["as"=>"backend_size_update","uses"=>"Backend\SizeController@update"]);
    Route::post('/create', ["as"=>"backend_size_create","uses"=>"Backend\SizeController@create"]);
    Route::post('/delete', ["as"=>"backend_size_delete","uses"=>"Backend\SizeController@destroy"]);
  });

  Route::group(['prefix' => 'store'], function(){ //Store Route
    Route::post('/read', ["as"=>"backend_store_read","uses"=>"Backend\StoreController@read"]);
  });
});
