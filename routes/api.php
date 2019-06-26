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
Route::group(['namespace' => 'API'], function () {
   // Route::group(['prefix' => 'auth'], function () {
        Route::post('register', 'UsersController@register');
        Route::post('login', 'UsersController@login');
        Route::post('logout', 'UsersController@logout');
        Route::post('refresh', 'UsersController@refresh');
        Route::post('linkedin', 'UsersController@linkedin');

   // });

    Route::group(['middleware' => 'jwt.auth'], function () {
        // User Details Route group
        Route::group(['prefix' => 'user'], function () {
            Route::get('details', 'UsersController@details');
            Route::post('set-up', 'AccountSetupController@index');

        });

    });
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
