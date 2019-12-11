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
// Route::group(['namespace'=>'Front','middleware'=>'auth:client'],function(){
Route::group(['namespace'=>'Front','middleware'=>'auth:client'],function(){

Route::get('/main', 'MainController@home')->name('main');

Route::post('toggle-favourite', 'MainController@toggleFavourite')->name('toggle-favourite');

Route::get('about', 'MainController@about')->name('about');
Route::get('artical/{id}', 'MainController@artical')->name('artical');
Route::get('who-we-are', 'MainController@whoWeAre')->name('who-we-are');
Route::get('contact-us', 'MainController@contactUs')->name('contact-us');
Route::post('contact-us', 'MainController@contactUsSave')->name('contact-us');

// Route::get('toggle-favourite', 'ClientfrontController@toggleFavourite')->name('toggle-favourite');
// });
// Route::get('/home', function () {
//     return view('home');
});

Auth::routes();
// Route::group(['middleware'=>['auth','auto-check-permission'],'prefix'=>'admin'],function(){


Route::get('/home', 'HomeController@index')->name('home');
Route::resource('governorate', 'GovernorateController');
Route::resource('category', 'CategoryController');
Route::resource('setting', 'SettingController');
Route::resource('city', 'CityController');
Route::resource('post', 'PostController');
Route::resource('client', 'ClientController');
Route::resource('contact', 'ContactController');
Route::resource('donation', 'DonationController');
// Route::resource('editpassword', 'EditPasswordController');
Route::get('editpassword', 'ChangePasswordController@index')->name('editpassword');
Route::post('editpassword', 'ChangePasswordController@changeAdminPassword');


Route::resource('role', 'RoleController');
Route::resource('user', 'UserController');
Route::get('admin/logout', 'Auth\LoginController@adminLogout')->name('admin.logout');
// });
// Route::prefix('clientarea')->group(function(){
    Route::get('/clienthome/login', 'Auth\ClientLoginController@showLoginForm')->name('clienthome.login');
    Route::post('/clienthome/login', 'Auth\ClientLoginController@login')->name('clienthome.login.submit');
    Route::get('/clienthome', 'ClientfrontController@index')->name('clienthome');
    Route::get('/clienthome/logout', 'Auth\ClientLoginController@logout')->name('clienthome.logout');
    Route::get('client-register', 'Front\AuthController@register');
Route::post('client-register', 'Front\AuthController@registerSave');
// });

