<?php

Route::controller('/user','UserController');
Route::controller('/session','SessionController');
Route::controller('/album','AlbumController');
// Route::filter('check-user',function(){
// 	if (!Session::has($user)) {
// 		return Redirect::to('/');
// 	}
// })
// Route::group(array('before' => 'check-user'),function(){})
Route::get('{user}', 'UserController@Profile');
Route::get('{user}/info', 'UserController@Info');
Route::get('{user}/photo', 'UserController@Photo');
Route::get('{user}/blog', 'UserController@Blog');
Route::controller('/','ViewController');

