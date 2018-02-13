<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// dynamicjs is a context ho brings views like a js context to use all blade variables on js files
Route::name('dynamicjs.')->prefix('dynamicjs')->group(function()
{
    Route::get('base.js','DynamicjsController@base')->name('base.js');
});
// default escope for external calls
Route::post('/rest','RestController@intercept')->name('rest');
// main route
Route::name('site.')->group(function(){
    Route::get('/','HomeController@index')->name('index');
});
