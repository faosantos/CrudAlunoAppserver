<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/create-user', 'UserController@index');
    Route::post('/create-user', 'UserController@store');
    Route::get('/delete-user/{id}', 'UserController@destroy');

    Route::get('/veiculos/{user_id?}', 'HomeController@vehicles');
    Route::get('/equipamentos/{vehicle_id?}', 'HomeController@equipments');
    
    Route::get('/client/add', 'ClientController@create');
    Route::get('client/{id}', 'ClientController@show');
    Route::get('client/delete/{id}', 'ClientController@destroy');
    Route::post('/client/add', 'ClientController@store');
    Route::post('/client/update/{id}', 'ClientController@update');

    Route::get('/veiculo/{id}', 'VehicleController@show');
    Route::get('/veiculo/add/{user_id}', 'VehicleController@create');
    Route::get('/veiculo/delete/{id}', 'VehicleController@destroy');
    Route::get('/editar-veiculo/{id}', 'VehicleController@edit');
    Route::post('/veiculo/add/{user_id}', 'VehicleController@store');
    Route::post('/veiculo-update/{id}', 'VehicleController@update');
    
    Route::get('/equipamento/{vehicle_id}', 'EquipmentController@create');
    Route::post('/equipamento/{vehicle_id}', 'EquipmentController@store');

    Route::post('/search/client', 'HomeController@findClient');
    Route::post('/search/vehicle', 'HomeController@findVehicle');

    Route::get('/agenda', 'ScheduleController@index');
});
Route::get('/', 'HomeController@index')->name('home');
Route::get('/login', function (){
    // Auth\LoginController@showLoginForm
    return redirect('/');
})->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset');



// Route::get('/', function () {
//     return view('welcome');
// });
