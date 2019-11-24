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
    return view('welcome');
});

// Route::get('/home', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('governorate', 'GovernorateController');
Route::resource('category', 'CategoryController');
Route::resource('setting', 'SettingController');
Route::resource('city', 'CityController');
Route::resource('post', 'PostController');
Route::resource('client', 'ClientController');
Route::resource('contact', 'ContactController');
Route::resource('donation', 'DonationController');
Route::resource('editpassword', 'EditPasswordController');
Route::get('editpassword', 'ChangePasswordController@index')->name('editpassword');
Route::post('editpassword', 'ChangePasswordController@changeAdminPassword');
// Route::post('editpassword', 'EditPasswordController@');
