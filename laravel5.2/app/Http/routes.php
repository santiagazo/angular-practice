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

Route::get('/{path0?}/{path1?}/{path2?}/{path3?}/{path4?}/{path5?}/{path6?}/{path7?}/{path8?}', function () {
    return view('index');
});
