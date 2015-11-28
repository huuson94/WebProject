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
Route::get('{user}/photo/album', 'AlbumController@Album');
Route::get('{user}/photo/album/{album_id}', 'AlbumController@Album_detail');


Route::group(array('prefix' => '{user}'),function(){
//    Route::get('{user}', 'UserController@Profile');
//    Route::get('{user}/info', 'UsersController@info');
    Route::get('/','FEViewController@getProfile');
    Route::get('profile','FEViewController@getProfile');
    Route::get('edit','FEUsersController@edit');
//    Route::resource('info','FEUserInformationsController');
    
    
//    Route::get('profile/edit','FEUserProfileController@edit');
   
});
Route::controller('/','FEViewController');

