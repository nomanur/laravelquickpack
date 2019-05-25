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

