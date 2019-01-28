<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::prefix('v1')->group(function () {
    Route::post('register', 'UserController@register');
    Route::post('login', 'UserController@login');
    Route::post('logout', 'UserController@logout')->name('logout');
    

    Route::get('paper_formats', 'PaperFormatController@index');
    
    Route::get('pages', 'PageController@index');
    
    Route::get('paper_types', 'PaperTypeController@index');
    
    Route::get('product_configurations', 'ProductConfigurationController@index');
    Route::get('product_configurations/filter/paper_format_id/{paper_format_id}/page_id/{page_id}/paper_type_id/{paper_type_id}', 'ProductConfigurationController@filterByFormatPageType');
    
    Route::get('product_quantity_prices', 'ProductQuantityPriceController@index');
    Route::get('product_quantity_prices/{id}', 'ProductQuantityPriceController@show');
    Route::get(
        'product_quantity_prices/filter/product_configuration_id/{product_configuration_id}',
        'ProductQuantityPriceController@filterByProductConfigurationID'
    );
    
    Route::post('carts', 'CartController@store');
});
