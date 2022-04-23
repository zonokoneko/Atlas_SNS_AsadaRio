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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');



//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');



//ログイン中のページ
Auth::routes();
Route::get('/top','PostsController@index');

Route::get('/profile','UsersController@profile');
Route::post('/profile-update','UsersController@profileUpdate');

Route::get('/search', 'UsersController@search');


//フォロー・フォロワーリスト
Route::get('/follower-list','FollowsController@showFollowerPosts');
Route::get('/follow-list','FollowsController@showFollowPosts');



Route::get('/logout', 'UsersController@logout');

// 投稿画面の表示
Route::get('/top', 'PostsController@showPosts');
// 投稿処理
Route::post('post/create', 'PostsController@create');
// 投稿編集
Route::post('/update', 'PostsController@update');
// 投稿削除
Route::get('post/{id}/delete', 'PostsController@delete');

// ユーザ関連
Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'edit', 'update']]);
// フォロー/フォロー解除を追加
Route::post('users/{user}/follow', 'UsersController@follow')->name('follow');
Route::delete('users/{user}/unfollow', 'UsersController@unfollow')->name('unfollow');


