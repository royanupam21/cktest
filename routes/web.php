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

Auth::routes();


Route::get('/', function () {
    return redirect('/user');
  });
  

Route::get('/logout', function(){
	Auth::Logout();
	return redirect('/user');
});


Route::group(['namespace' => 'User', 'prefix' => 'user'], function() {
    Route::get('/', 'AdminController@index')->name('user.login');
    Route::get('logout',function(){
    	Auth::guard('user')->logout();
		return redirect('/user');
    })->name('user.logout');
    Route::post('authlogin', 'AdminController@authlogin')->name('user.authlogin');

    Route::get('signupUser', 'AdminController@create')->name('user.signupUser');

    Route::post('createUser', 'AdminController@createAdmin')->name('user.createUser');

    Route::get('auth/google', 'AdminController@redirectToGoogle')->name('user.redirectToGoogle');
    Route::get('auth/google/callback', 'AdminController@handleGoogleCallback')->name('user.handleGoogleCallback');

// ******************************************************************
    Route::get('manage-users', 'AdminController@users')->name('admin.manage-users')->middleware('auth:web');
// *****************************************************************
});

//----------------



Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/', 'AdminController@index')->name('admin.login');
    Route::get('logout',function(){
    	Auth::guard('admin')->logout();
		return redirect('/admin');
    })->name('admin.logout');
    Route::post('authlogin', 'AdminController@authlogin')->name('admin.authlogin');

    Route::get('authtest', 'AdminController@create')->name('admin.authtest');

    Route::post('createAdmin', 'AdminController@createAdmin')->name('admin.createAdmin');



// ******************************************************************
//Profile
Route::get('manage-profile/{id}', 'AdminController@edit')->name('admin.manage-profile')->middleware('auth:admin');
Route::post('edit-my-profile', 'AdminController@editmyprofile')->name('admin.edit-my-profile')->middleware('auth:admin');
Route::post('update-my-profile', 'AdminController@update')->name('admin.update-my-profile')->middleware('auth:admin');
Route::post('ckupload', 'ManagePagesController@ckupload')->name('admin.ckupload');
// Manage User/Team
Route::get('manage-users', 'AdminController@users')->name('admin.manage-users')->middleware('auth:admin');
Route::post('createUsers', 'AdminController@createAdmin')->name('admin.createUsers')->middleware('auth:admin');
Route::post('editUsers', 'AdminController@findProfile')->name('admin.editUsers')->middleware('auth:admin');
Route::post('updateUsers', 'AdminController@updateProfile')->name('admin.updateUsers')->middleware('auth:admin');
Route::get('deleteUsers/{id}', 'AdminController@destroy')->name('admin.deleteUsers')->middleware('auth:admin');

// *****************************************************************
});

