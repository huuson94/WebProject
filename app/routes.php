<?php

Route::get('login', 'SessionsController@create');
Route::post('login', 'SessionsController@store');
Route::get('logout', 'SessionsController@destroy');
Route::get('signup', 'FEUsersController@create');
Route::resource('user','FEUsersController');
Route::group(array('prefix' => '{user}', 'before' => 'isLogged'),function(){
//    Route::get('{user}', 'UserController@Profile');
//    Route::get('{user}/info', 'UsersController@info');
    Route::get('/','FEViewController@getIndex');
    Route::get('info/edit','FEUserInformationsController@edit');
    Route::get('profile','FEUserProfileController@show');
//    Route::get('profile/edit','FEUserProfileController@edit');
    Route::resource('album', 'FEAlbumsController');
    Route::resource('blog', 'FEBlogsController');
});
//Route::resource('session','FESessionsController');
Route::resource('album','FEAlbumsController');

// Route::filter('check-user',function(){
// 	if (!Session::has($user)) {
// 		return Redirect::to('/');
// 	}
// })
// Route::group(array('before' => 'check-user'),function(){})
Route::controller('/','FEViewController');

