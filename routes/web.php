<?php

use Illuminate\Support\Facades\Route;

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
//Route::get('/', function()
//{
////    $img = Image::make('vvv.jpeg')->resize(300, 200);
////    $img->save('bar.jpg', 60);
////    Image::make(Input::file('photo'))->resize(300, 200)->save('foo.jpg');
//
////    return $img->response('jpg');
//    return view('welcome');
//});
//Route::post('/upload', function ()
//{
//    Image::make(request()->file('uploaded_file'))->resize(300, 200)->save('foo.jpg');
//});


Route::namespace('Front')->group(function () {
    Route::get('/', 'SiteController@index')->name('home');
    Route::get('/post/{slug}', 'SiteController@view')->name('show.post');
    Route::get('/category/{slug}', 'CategoryController@view')->name('show.category');
    Route::get('/tag/{slug}', 'TagController@view')->name('show.tags');
    Route::get('/search', 'SearchController@search')->name('search');
});

Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin',
    'middleware' => 'admin'
],function (){
    Route::get('/', 'MainController@index')->name('admin.index');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/tags', 'TagController');
    Route::resource('/posts', 'PostController');
});

Route::group([
    'middleware' => 'guest'
],function (){
    Route::get('/register', 'UserController@create')->name('register');
    Route::post('/register', 'UserController@store')->name('register.store');
    Route::get('/login', 'UserController@loginForm')->name('login.create');
    Route::post('/login', 'UserController@login')->name('login');
});

Route::get('/logout', 'UserController@logout')->name('logout')->middleware('auth');
