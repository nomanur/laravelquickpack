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
return view('front/home');
});


Route::get('/admin',['middleware'=>['auth','role','verified'], function(){
	return view('admin.index');
}])->name('admin');

Auth::routes(['verify' => true]);

Route::group([''], function() {
	//auth route
	Route::get('login', 'CustomLoginController@showLoginPage')->name('login');
	Route::post('login', 'CustomLoginController@login');
	Route::get('logout', 'Auth\LoginController@logout');

	 Route::get('register', ['as' => 'register', 'uses' => 'CustomRegisterController@showRegistrationForm']);
    Route::post('register', ['as' => 'register.post', 'uses' => 'CustomRegisterController@store']);

});

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::group(['middleware' => ['auth','role','verified']], function() {
	Route::resource('admin/users', 'AdminUsersController');
	Route::get('admin/users/{id}/profile', 'AdminUsersController@profile')->name('admin.profile');
});

Route::group(['middleware'=>['auth','verified']], function(){
	Route::get('front/home', 'CustomLoginController@showHomePage');
	Route::get('/mail', 'MailController@index')->name('mail');
	Route::post('/mail', 'MailController@sendMail');
});

Route::get('login/{service}', 'CustomLoginController@redirectToProvider');
Route::get('login/{service}/callback', 'CustomLoginController@handleProviderCallback');


Route::post('search', 'AdminUsersController@search');







/*Route::group(['middleware' => ['web']], function() {

// Login Routes...
    Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
    Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

// Registration Routes...
    Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
    Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);

// Password Reset Routes...
    Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
    Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);
});*/