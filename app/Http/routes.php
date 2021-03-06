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
use App\Models\Articles;



Route::group(['prefix' => 'admin'], function (){



	// will rewrite model

	Route::group(['namespace' => 'admin', 'middleware' => 'auth'], function () {
		
		Route::get('/login', ['as' => 'admin.login', 'uses' => 'login@index']);
		Route::post('/login/auth', ['as' => 'admin.authentication', 'uses' => 'login@auth']);
		Route::get('/logout', ['as' => 'admin.logout', 'uses' => function() {
			Session::flush();
			return redirect('/admin/login');
		}]);
		
		Route::get('/category', ['as' => 'admin.category.index', 'uses' => 'category@index']);
		Route::post('/categoryStore', ['as' => 'admin.category.store', 'uses' => 'category@store']);
		Route::post('/deleteCategory', ['as' => 'admin.category.destroy', 'uses' => 'category@destroy']);

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

		Route::get('/article', ['as' => 'admin.article.list', 'uses' => 'article@index']);
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
	return 	Articles::where('aTag','like','%'.$tag.'%')
								->leftJoin('categories', 'categories.cID', '=', 'articles.cID')
                                ->leftJoin('users', 'users.uID', '=', 'articles.uID');
});

Route::bind('searchCategory', function($category){
	return 	Articles::where('cName',$category)
								->leftJoin('categories', 'categories.cID', '=', 'articles.cID')
                                ->leftJoin('users', 'users.uID', '=', 'articles.uID');
});

Route::bind('post',function($id){
	return 	Articles::where('aIsActive',1)->where('aID',$id)
                                ->leftJoin('categories', 'categories.cID', '=', 'articles.cID')
                                ->leftJoin('users', 'users.uID', '=', 'articles.uID')
                                ->first();
});

Route::group(['namespace'=>'user'], function (){
	Route::get('/', 'home@index');
	Route::get('/show-post/{post}', 'home@post');
	Route::get('/contact', 'home@contact');
	Route::get('/search/', function(){
		return "this function will be implemented soon!";
	});
	Route::get('/search/tag/{searchTag}', 'home@searchTag');
	Route::get('/search/category/{searchCategory}', 'home@searchCategory');
	Route::get('/about-me', function(){
		return view('user.about-me');
	});
	Route::any('/crawler', 	   'functionally@crawler');
	Route::get('/sendMessage', 'functionally@message');
	Route::get('/PDF-to-Word', 'functionally@formatPDFtoWord');
	Route::get('/Word-to-PDF', 'functionally@formatWordtoPdf');

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