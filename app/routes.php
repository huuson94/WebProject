<?php

Route::get('login', 'SessionsController@create');
Route::post('login', 'SessionsController@store');
Route::get('logout', 'SessionsController@destroy');
Route::get('signup', 'FEUsersController@create');
Route::resource('user','FEUsersController');

Route::group(array('prefix' => 'admin', 'before' => 'checkAdmin'), function(){
    Route::get('/','BEUsersController@index');
	Route::resource('user', 'BEUsersController');
    Route::post('/user/search','BEUsersController@search');
});

Route::group(array('prefix' => '{user}'),function(){
//    Route::get('{user}', 'UserController@Profile');
//    Route::get('{user}/info', 'UsersController@info');
    Route::get('/','FEViewController@getProfile');
    Route::get('profile','FEViewController@getProfile');
    Route::get('edit','FEUsersController@edit');
    Route::get('following','FEViewController@getFollowing');
//    Route::resource('info','FEUserInformationsController');
    
    
//    Route::get('profile/edit','FEUserProfileController@edit');
   
});
Route::controller('/','FEViewController');

