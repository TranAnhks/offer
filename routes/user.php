<?php

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|

*/

Route::group(['prefix' => 'user', 'namespace' => 'User'], function() {
	Route::post('register', 'RegisterController@register')->name('admin.register');
});


