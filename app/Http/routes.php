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


Route::auth();
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::group(['prefix' => 'item'], function () {

});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('table', 'TableController');
    Route::resource('item', 'ItemController');
    Route::resource('category', 'categoryController');
    Route::resource('customer', 'CustomerController');
    Route::resource('supplier', 'SupplierController');
    Route::resource('promotion', 'PromotionController');
    Route::resource('user', 'UserController');
    Route::resource('exchange', 'ExchangeController');
    Route::resource('purchase', 'PurchaseController');
    Route::resource('order', 'OrderController');

    /*For Validate*/
    Route::group(['prefix' => 'validate'], function () {
        Route::post('category', 'CategoryController@valid');
        Route::post('table', 'TableController@valid');
        Route::post('user', 'UserController@valid');
        Route::post('item', 'ItemController@valid');
    });
    Route::group(['prefix' => 'data'], function () {
        Route::get('category', 'CategoryController@data');
    });
    /*For Delete*/
    Route::group(['prefix' => 'destroy'], function () {
        Route::post('category', 'CategoryController@destroy');
        Route::post('table', 'TableController@destroy');
        Route::post('customer', 'CustomerController@destroy');
        Route::post('supplier', 'SupplierController@destroy');
        Route::post('user', 'UserController@destroy');
    });
    /*For Edit*/
    Route::group(['prefix' => 'edit'], function () {
        Route::post('category', 'CategoryController@edit');
        Route::post('table', 'TableController@edit');
        Route::post('customer', 'CustomerController@edit');
        Route::post('supplier', 'SupplierController@edit');
        Route::post('user', 'UserController@edit');
        Route::post('item', 'ItemController@edit');
    });
    Route::group(['prefix' => 'update'], function () {
        Route::post('category', 'CategoryController@update');
        Route::post('table', 'TableController@update');
        Route::post('customer', 'CustomerController@update');
        Route::post('supplier', 'SupplierController@update');
        Route::post('user', 'UserController@update');
        Route::post('item', 'ItemController@update');
    });
    Route::group(['prefix' => 'list'], function () {
        Route::get('customer', 'CustomerController@lists');
    });

    /*this is comment*/

});