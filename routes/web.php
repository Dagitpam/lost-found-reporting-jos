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


/*
Route::get('/about', function () {
    return view('pages.about');
});*/ 
// Route::get('/', 'pagesController@index');
Route::get('/', 'pagesController@login');
Route::get('/about', 'pagesController@about');
Route::get('/services', 'pagesController@services');
Route::get('/contact', 'pagesController@contact');

Route::resource('Posts', 'PostsController');
Route::resource('Found', 'ReportFoundItemController');
Route::resource('ClaimF', 'ClaimFoundItemController');
Route::POST('tSelect', 'ClaimFoundItemController@transferSelect');
Route::POST('tToggle','PostsController@transferToggle');
Route::POST('tToggle1','ReportFoundItemController@transferToggle');
Route::POST('editUser','HomeController@selectUser');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/destroy', 'HomeController');
