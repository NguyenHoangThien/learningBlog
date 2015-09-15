<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', function () {
    return view('/admin/layout');
});
Route::get('/admin/user', 'admin\user@index');
Route::get('/admin/category', 'admin\category@index');
Route::post('/admin/categoryStore', 'admin\category@store');



Route::get('/admin/comment', function () {
    return view('/admin/layout');
});
Route::get('/admin/article', function () {
    return view('/admin/layout');
});

Route::get('/admin/role', function () {
    return view('/admin/layout');
});
Route::get('/admin/tag', function () {
    return view('/admin/layout');
});

// Route::group(array('namespace' => 'User'), function (){

// });
// Route::group(['prefix' => 'admin','middleware'=>'auth'], function () {
// 	Route::group(array('namespace' => 'Admin'), function (){
// 		Route::any('/', array('as' => 'admin.login', 'uses' => 'loginController@index'));
// 		Route::any('/do-login', array('as' => 'admin.dologin', 'uses' => 'loginController@doLogin'));
// 		Route::any('/do-logout', array('as' => 'admin.dologout', 'uses' => 'loginController@doLogout'));
// 	});
// });