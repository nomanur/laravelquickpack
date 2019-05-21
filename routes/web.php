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


Route::get('/admin',['middleware'=>'role', function(){
	return view('admin.index');
}])->name('admin');
Auth::routes();

Route::group([], function() {
	//auth route
	Route::get('login', 'CustomLoginController@showLoginPage')->name('login');
	Route::post('login', 'CustomLoginController@login');
	Route::get('logout', 'Auth\LoginController@logout');
	//Route::post('logout', 'LoginController@logout')->name('logout');
	// Registration Routes...
/*if (config('register'))
{
	Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
	Route::post('register', 'RegisterController@register');
}*/
// Password Reset Routes...
/*if (config('reset'))
{
	Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
	Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
	Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
	Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');
}*/
// Email Verification Routes...
/*if (config('verify'))
{
	Route::get('email/verify', 'VerificationController@show')->name('verification.notice');
	Route::get('email/verify/{id}', 'VerificationController@verify')->name('verification.verify');
	Route::get('email/resend', 'VerificationController@resend')->name('verification.resend');
}*/
});
//auth route
/*Route::get('login', 'LoginController@showLoginForm')->name('login');
Route::post('login', 'LoginController@login');
Route::post('logout', 'LoginController@logout')->name('logout');
// Registration Routes...
if (config('register'))
{
Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'RegisterController@register');
}
// Password Reset Routes...
if (config('reset'))
{
Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');
}
// Email Verification Routes...
if (config('verify'))
{
Route::get('email/verify', 'VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'VerificationController@resend')->name('verification.resend');
}*/
//auth route end
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth', 'role']], function() {
	Route::resource('admin/users', 'AdminUsersController');
});

Route::group(['middleware'=>['auth']], function(){
	Route::get('front/home', 'CustomLoginController@showHomePage');
});