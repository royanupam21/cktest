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


//Route::view('/', 'auth.login');

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
Route::get('dashboard', 'CasesController@dashboard')->name('admin.dashboard')->middleware('auth:admin');
//Profile
Route::get('manage-profile/{id}', 'AdminController@edit')->name('admin.manage-profile')->middleware('auth:admin');
Route::post('edit-my-profile', 'AdminController@editmyprofile')->name('admin.edit-my-profile')->middleware('auth:admin');
Route::post('update-my-profile', 'AdminController@update')->name('admin.update-my-profile')->middleware('auth:admin');
// WebSite CRM
Route::get('manage-pages', 'ManagePagesController@index')->name('admin.manage-pages')->middleware('auth:admin');
Route::post('createPages', 'ManagePagesController@store')->name('admin.createPages')->middleware('auth:admin');
Route::post('editPages', 'ManagePagesController@edit')->name('admin.editPages')->middleware('auth:admin');
Route::post('updatePages', 'ManagePagesController@update')->name('admin.updatePages')->middleware('auth:admin');
Route::get('deletePages/{id}', 'ManagePagesController@destroy')->name('admin.deletePages')->middleware('auth:admin');
Route::post('ckupload', 'ManagePagesController@ckupload')->name('admin.ckupload');
// WebSite Banner
Route::get('manage-banner', 'BannerController@index')->name('admin.manage-banner')->middleware('auth:admin');
Route::post('createBanner', 'BannerController@store')->name('admin.createBanner')->middleware('auth:admin');
Route::post('editBanner', 'BannerController@edit')->name('admin.editBanner')->middleware('auth:admin');
Route::post('updateBanner', 'BannerController@update')->name('admin.updateBanner')->middleware('auth:admin');
Route::get('deleteBanner/{id}', 'BannerController@destroy')->name('admin.deleteBanner')->middleware('auth:admin');
// WebSite Gallery
Route::get('manage-gallery', 'GalleryController@index')->name('admin.manage-gallery')->middleware('auth:admin');
Route::post('createGallery', 'GalleryController@store2')->name('admin.createGallery')->middleware('auth:admin');
Route::post('editGallery', 'GalleryController@edit')->name('admin.editGallery')->middleware('auth:admin');
Route::post('updateGallery', 'GalleryController@update')->name('admin.updateGallery')->middleware('auth:admin');
Route::get('deleteGallery/{id}', 'GalleryController@destroy')->name('admin.deleteGallery')->middleware('auth:admin');
//Blog
Route::get('manage-blog', 'BlogController@index')->name('admin.manage-blog')->middleware('auth:admin');
Route::post('createBlog', 'BlogController@store')->name('admin.createBlog')->middleware('auth:admin');
Route::post('editBlog', 'BlogController@edit')->name('admin.editBlog')->middleware('auth:admin');
Route::post('updateBlog', 'BlogController@update')->name('admin.updateBlog')->middleware('auth:admin');
Route::get('deleteBlog/{id}', 'BlogController@destroy')->name('admin.deleteBlog')->middleware('auth:admin');
// WebSite Testimonials
Route::get('manage-testimonials', 'TestimonialController@index')->name('admin.manage-testimonials')->middleware('auth:admin');
Route::post('createTestimonial', 'TestimonialController@store')->name('admin.createTestimonial')->middleware('auth:admin');
Route::post('editTestimonial', 'TestimonialController@edit')->name('admin.editTestimonial')->middleware('auth:admin');
Route::post('updateTestimonials', 'TestimonialController@update')->name('admin.updateTestimonials')->middleware('auth:admin');
Route::get('deleteTestimonials/{id}', 'TestimonialController@destroy')->name('admin.deleteTestimonials')->middleware('auth:admin');
// Manage User/Team
Route::get('manage-users', 'AdminController@users')->name('admin.manage-users')->middleware('auth:admin');
Route::post('createUsers', 'AdminController@createAdmin')->name('admin.createUsers')->middleware('auth:admin');
Route::post('editUsers', 'AdminController@findProfile')->name('admin.editUsers')->middleware('auth:admin');
Route::post('updateUsers', 'AdminController@updateProfile')->name('admin.updateUsers')->middleware('auth:admin');
Route::get('deleteUsers/{id}', 'AdminController@destroy')->name('admin.deleteUsers')->middleware('auth:admin');
// Manage Clients
Route::get('manage-client', 'ClientController@index')->name('manage-client')->middleware('auth:admin');
Route::post('storeClient', 'ClientController@store')->name('storeClient')->middleware('auth:admin');
Route::post('editClient', 'ClientController@edit')->name('editClient')->middleware('auth:admin');
Route::post('updateClient', 'ClientController@update')->name('updateClient')->middleware('auth:admin');
Route::get('deleteClient/{id}', 'ClientController@destroy')->name('deleteClient')->middleware('auth:admin');

//Recieved Files
Route::get('manage-recieved-files', 'RecieveController@index')->name('admin.manage-recieved-files')->middleware('auth:admin');
Route::post('createFileEntry', 'RecieveController@store')->name('admin.createFileEntry')->middleware('auth:admin');
Route::post('editFileEntry', 'RecieveController@edit')->name('admin.editFileEntry')->middleware('auth:admin');
Route::post('updateFileEntry', 'RecieveController@update')->name('admin.updateFileEntry')->middleware('auth:admin');
Route::post('approvalFileEntry', 'RecieveController@update')->name('admin.approvalFileEntry')->middleware('auth:admin');

// Manage Menu Items
Route::get('manage-menu-items', 'MenuController@index')->name('manage-menu-items')->middleware('auth:admin');
Route::post('storeMenuItems', 'MenuController@store')->name('storeMenuItems')->middleware('auth:admin');
Route::post('editMenuItems', 'MenuController@edit')->name('editMenuItems')->middleware('auth:admin');
Route::post('updateMenuItems', 'MenuController@update')->name('updateMenuItems')->middleware('auth:admin');
Route::get('deleteMenuItems/{id}', 'MenuController@destroy')->name('deleteMenuItems')->middleware('auth:admin');
Route::post('getAllMenuItems', 'MenuController@getAllMenuItems')->name('getAllMenuItems')->middleware('auth:admin');

// Manage Event Calendar
Route::get('manage-event-calendar', 'EventcalendarController@index')->name('manage-event-calendar')->middleware('auth:admin');

//------------
Route::get('managecase', 'CasesController@index')->name('managecase')->middleware('auth:admin');
Route::post('storeCases', 'CasesController@store')->name('storeCases')->middleware('auth:admin');
Route::get('viewCases', 'CasesController@viewAllRecords')->name('viewCases')->middleware('auth:admin');
Route::get('editCase/{id}', 'CasesController@edit')->name('editCase')->middleware('auth:admin');
Route::post('updateCase', 'CasesController@update')->name('updateCase')->middleware('auth:admin');
Route::get('deleteCase/{id}', 'CasesController@destroy')->name('deleteCase')->middleware('auth:admin');

// *****************************************************************
});

Route::group(['namespace' => 'Client', 'prefix' => 'client'], function() {
    Route::get('test2',function(){
    	return 'Admin2';
    });
    //Route::resource('users', 'UserController');
});

