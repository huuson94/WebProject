<?php

Route::get('login', 'SessionsController@create');
Route::post('login', 'SessionsController@store');
Route::get('logout', 'SessionsController@destroy');
Route::get('signup', 'FEUsersController@create');
Route::resource('user','FEUsersController');
Route::resource('post', 'FEPostsController');
Route::resource('image', 'FEImagesController');
Route::resource('album', 'FEAlbumsController');
Route::resource('message', 'FEMessagesController');
Route::resource('blog', 'FEBlogsController');
Route::resource('follow', 'FEFollowsController');

Route::group(array('prefix' => 'admin', 'before' => 'checkAdmin'), function(){
    Route::get('/','BEUsersController@index');
	Route::resource('user', 'BEUsersController');
    Route::resource('album', 'BEAlbumController');
    Route::resource('image', 'BEImageController');
});

Route::group(array('prefix' => '{user}'),function(){
    Route::get('/','FEViewController@getProfile');
    Route::get('profile','FEViewController@getProfile');
    Route::get('edit','FEUsersController@edit');
    
});
Route::controller('/','FEViewController');

