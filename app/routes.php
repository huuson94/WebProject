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

Route::group(array('prefix' => '{user}', 'before' => 'isLogged'),function(){
//    Route::get('{user}', 'UserController@Profile');
//    Route::get('{user}/info', 'UsersController@info');
    Route::get('/','FEViewController@getIndex');
    Route::get('edit','FEUsersController@edit');
//    Route::resource('info','FEUserInformationsController');
    
    Route::get('profile','FEUserProfileController@show');
//    Route::get('profile/edit','FEUserProfileController@edit');
    Route::resource('post', 'FEPostsController');
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


Route::filter('checkAdmin', function()
{   if(BEUsersHelper::isAdmin()){
        $messages = array();
        $status = false;
        $messages[] = "Bạn không có quyền vào trang này";
        Session::flash('status',$status);
        Session::flash('messages', $messages);
        return Redirect::to('/');
    }
});

