<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
// Route::group(['middleware' => 'auth', 'web'], function()
// {
// 	Route::controllers([
// 		'document' => 'DocumentController',
// 		'realtor' => 'RealtorController',
// 		'lender' => 'LenderController',
// 		'client' => 'ClientController',
// 		'user' => 'UserController',
// 	]);


// 	/*
// 	|-----------------------------------------------------------------------
// 	| Admin Routes
// 	|-----------------------------------------------------------------------
// 	*/
// 	Route::group(['middleware' => 'admin'], function()
// 	{
// 		Route::controllers([
// 			'admin/fireteam' => 'Admin\FireteamController',
// 			'admin/roles' => 'Admin\RolesController',
// 		]);

// 	});
// });



// /*
// |--------------------------------------------------------------------------
// | Public Routes
// |--------------------------------------------------------------------------
// */

Route::auth();
Route::group(['middleware' => 'web'], function()
{
	Route::controllers([
		'auth' => 'Auth\SDKAuthController',
		'sandbox' => 'SandboxController',
	]);

	Route::get('/', function()
	{
		return view('index');
	});
});

