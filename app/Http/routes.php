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

Route::group(['prefix'=>'admin'], function (){
	Route::group(['namespace'=>'admin', 'middleware'=>'auth'], function (){
		
		Route::get('/login', 'login@index');
		Route::post('/login/auth', 'login@auth');
		Route::get('/logout', function(){
			Session::flush();
			return redirect('/admin/login');
		});
		
		Route::get('/category', 'category@index');
		Route::post('/categoryStore', 'category@store');
		Route::post('/deleteCategory', 'category@destroy');

		Route::get('/role', 'role@index');
		Route::post('/roleStore', 'role@store');
		Route::post('/deleteRole', 'role@destroy');

		Route::get('/tag', 'tag@index');
		Route::post('/tagStore', 'tag@store');
		Route::post('/deleteTag', 'tag@destroy');

		Route::get('/user', 'user@index');
		Route::get('/user/create', 'user@create');
		Route::post('/user/store', 'user@store');
		Route::post('/userBand', 'user@band');

		Route::get('/article', 'article@index');
		Route::get('/article/create', 'article@create');
		Route::post('/article/store', 'article@store');
		Route::post('/article/destroy', 'article@destroy');

		Route::get('/navigator', 'navigator@index');
		Route::get('/navigator/create', 'navigator@create');
		Route::post('/navigator/store', 'navigator@store');
		Route::post('/navigator/destroy', 'navigator@destroy');

	});
});

Route::bind('searchTag', function($tag){
	return App\models\Articles::where('aTag','like','%'.$tag.'%')
								->leftJoin('categories', 'categories.cID', '=', 'articles.cID')
                                ->leftJoin('users','users.uID','=','articles.uID');
});

Route::bind('searchCategory', function($category){
	return App\models\Articles::where('cName',$category)
								->leftJoin('categories', 'categories.cID', '=', 'articles.cID')
                                ->leftJoin('users','users.uID','=','articles.uID');
});

Route::bind('post',function($id){
	return App\models\Articles::where('aIsActive',1)->where('aID',$id)
                                ->leftJoin('categories', 'categories.cID', '=', 'articles.cID')
                                ->leftJoin('users','users.uID','=','articles.uID')
                                ->first();
});

Route::group(['namespace'=>'user'], function (){
	Route::get('/', 'home@index');
	Route::get('/show-post/{post}', 'home@post');
	Route::get('/contact', 'home@contact');
	Route::get('/search/tag/{searchTag}','home@searchTag');
	Route::get('/search/category/{searchCategory}','home@searchCategory');
	Route::get('/about-me',function(){
		return view('user.about-me');
	});
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