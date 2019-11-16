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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    
    'prefix' => 'v1','namespace' => 'Api'
    //معناها هم تحت مسمى ايهالجروب ده
// تاني واحده ده معناها لو انا حاطه كلو تحت فولدر واحد هكتب اسمو
], function () {
    Route::get('governorates', 'MainController@governorates');
    Route::get('cities', 'MainController@cities');
    Route::get('categories', 'MainController@categories');
    Route::get('blood-types', 'MainController@bloodTypes');
    Route::get('settings', 'MainController@settings');



    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('reset-password', 'AuthController@resetPassword');
    Route::post('new-password', 'AuthController@newPassword');
    Route::post('contacts', 'MainController@contacts');

    Route::group([
        'middleware' => 'auth:api'
    ], function () {
       
        Route::get('posts', 'MainController@posts');
        Route::get('donation-orders', 'MainController@donationOrders');
        Route::get('donation-order', 'MainController@donationOrder');
        Route::get('notifications', 'MainController@notifications');
        Route::get('get-notification-settings','MainController@getNotificationSettings');
        Route::get('my-favourits','MainController@myFavourits');
        Route::get('unread-notification-count','MainController@unreadNotificationCount');
        Route::post('toggle-favourits', 'MainController@toggleFavourits');

        Route::post('create-donation-order','MainController@createDonationOrder');
        Route::get('post', 'MainController@post');
        Route::post('profile', 'AuthController@profile');
         
        Route::post('register-notification-token','AuthController@registerNotificationToken');
        Route::post('remove-notification-token','AuthController@removeNotificationToken');

        Route::post('update-notification-settings','MainController@updateNotificationSettings');

    });
});

//api/v1/roote