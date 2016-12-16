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

Route::get('/', function () {
    return view('frontend/index');
});

Route::get('/cal', function () {
    return view('frontend/cal');
});

Route::auth();

Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {

    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('/foods', 'FoodsController@index')->name('admin_foods_list');
    Route::get('/logout', 'DashboardController@logout')->name('logout');

});

##############
### IMPORT ###
##############
//Route::get('/import/importFood', 'ImportController@importFood');
//Route::get('/import/foodDetails', 'ImportController@foodDetails');
//Route::get('/import/nutrients', 'ImportController@nutrients');

//Route::get('/', 'HomeController@index');
