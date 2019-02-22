<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|

*/

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
	Route::apiResource('users', 'UserController');
});


