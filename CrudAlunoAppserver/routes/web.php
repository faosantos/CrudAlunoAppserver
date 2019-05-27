
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

    Route::get('/turmas/{user_id?}', 'HomeController@turmas');
    Route::get('/equipamentos/{turma_id?}', 'HomeController@equipments');
    
    Route::get('/aluno/add', 'AlunoController@create');
    Route::get('aluno/{id}', 'AlunoController@show');
    Route::get('aluno/delete/{id}', 'AlunoController@destroy');
    Route::post('/aluno/add', 'AlunoController@store');
    Route::post('/aluno/update/{id}', 'AlunoController@update');

    Route::get('/turma/{id}', 'TurmaController@show');
    Route::get('/turma/add/{user_id}', 'TurmaController@create');
    Route::get('/turma/delete/{id}', 'TurmaController@destroy');
    Route::get('/editar-turma/{id}', 'TurmaController@edit');
    Route::post('/turma/add/{user_id}', 'TurmaController@store');
    Route::post('/turma-update/{id}', 'TurmaController@update');
    
    Route::get('/equipamento/{turma_id}', 'EquipmentController@create');
    Route::post('/equipamento/{turma_id}', 'EquipmentController@store');

    Route::post('/search/aluno', 'HomeController@findAluno');
    Route::post('/search/turma', 'HomeController@findTurma');

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
