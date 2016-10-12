<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',function(){return redirect('posts.index');});

/////////////////////////***[Admin Panel]***/////////////////////////
Route::group(['middleware'=>'admin_panel', 'prefix'=>'admin'], function(){
    Route::get('/', 'homeController@index');
    Route::get('cities','cityController@index');
    Route::get('cities/create','cityController@create');
    Route::post('cities','cityController@store');
    Route::delete('cities/{city}','cityController@destroy');

    Route::get('categories','categoryController@index');
    Route::get('categories/create','categoryController@create');
    Route::post('categories','categoryController@store');
    Route::delete('categories/{category}','categoryController@destroy');

    Route::get('types','typeController@index');
    Route::get('types/create','typeController@create');
    Route::post('types','typeController@store');
    Route::delete('types/{type}','typeController@destroy');

    Route::get('terms','termController@index');
    Route::patch('terms','termController@update');

    Route::get('admins', 'adminController@index');
    Route::get('admins/create', 'adminController@create');
    Route::post('admins', 'adminController@store');
    Route::get('admins/{username}/edit', 'adminController@edit');
    Route::patch('admins/{username}/', 'adminController@update');
    Route::delete('admins/{username}', 'adminController@index');


});

/////////////////////////***[Search]***/////////////////////
Route::get('posts/search', 'PostController@search');

/////////////////////////***[Posts]***/////////////////////////
Route::get('posts','PostController@index')->name('posts.index');
Route::get('posts/create','PostController@create');
Route::get('posts/{slug}/edit','PostController@edit');
Route::post('posts','PostController@store');
Route::patch('posts/{slug}','PostController@update');
Route::get('posts/{slug}','PostController@show');
Route::delete('posts/{slug}/','PostController@close');

    /////////////////////////***[Comments]***///////////////////
    Route::post('posts/{slug}/comments','CommentController@store');
    Route::delete('comments/{comment}','CommentController@destroy');

    /////////////////////////***[Photos]***/////////////////////
    Route::post('posts/{slug}/photos','PhotoController@store');



/////////////////////////***[Profile]***/////////////////////////
Route::get('/profile', 'ProfileController@index');
Route::get('profile/edit','ProfileController@edit');
Route::patch('profile','ProfileController@update');
Route::get('profile/{username}','ProfileController@show');


/////////////////////////***[Auth]***/////////////////////////
Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');
Route::post('logout', 'Auth\LoginController@logout');

Route::post('password/email', 'Auth\forgotPasswordController@sendResetLinkEmail');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');

Route::post('password/reset/', 'Auth\ResetPasswordController@reset');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');

Route::get('register', 'Auth\RegisterController@create');
Route::get('register/confirm', 'Auth\RegisterController@confirm');
Route::post('register', 'Auth\RegisterController@store');
Route::get('register/{tempuser}/{token}','Auth\RegisterController@verify');
