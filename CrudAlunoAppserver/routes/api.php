<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/', 'HomeController@index')->name('home');
// Route::get('/login', function (){
//     // Auth\LoginController@showLoginForm
//     return redirect('/');
// })->name('login');
// Route::post('login', 'Auth\LoginController@login');
// Route::get('logout', 'Auth\LoginController@logout')->name('logout');

//parte original
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('register', 'Auth\RegisterApiController@register');