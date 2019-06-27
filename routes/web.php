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

Auth::routes();

Route::get('/admin', function () {
	if (Auth::guest()) {
		return redirect('/login');
	} else {
		//exit(Auth::user()->name);
		if (Auth::user()->level >= "1") {
			return redirect('/admin/dashboard');
		} else {
			return redirect('/home');
		}
	}
})->name('admin.index');


Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home/setkey', 'HomeController@ajax_setkey')->name('home.setkey');

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
Route::get('/admin/dashboard', 'admin\DashboardController@show');
Route::get('/admin/users', 'admin\UsersController@show')->name('admin.users');
Route::post('/admin/users', 'admin\UsersController@search')->name('admin.users.search');
Route::get('/admin/users/create', 'admin\UsersController@create')->name('admin.users.create');
Route::post('/admin/users/create', 'admin\UsersController@store')->name('admin.users.store');
Route::get('/admin/users/{id}/edit', 'admin\UsersController@edit')->name('admin.users.edit');
Route::post('/admin/users/{id}/edit', 'admin\UsersController@update')->name('admin.users.update');
Route::post('/admin/users/on_off', 'admin\UsersController@ajax_on_off')->name('admin.users.on_off');

Route::get('/admin/messages', 'admin\MessagesController@show')->name('admin.messages');
Route::post('/admin/messages', 'admin\MessagesController@search')->name('admin.messages.search');
Route::get('/admin/messages/create', 'admin\MessagesController@create')->name('admin.messages.create');
Route::post('/admin/messages/create', 'admin\MessagesController@store')->name('admin.messages.store');
Route::get('/admin/messages/{id}/edit', 'admin\MessagesController@edit')->name('admin.messages.edit');
Route::post('/admin/messages/{id}/edit', 'admin\MessagesController@update')->name('admin.messages.update');
});