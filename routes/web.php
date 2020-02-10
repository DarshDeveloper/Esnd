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

Route::get('/', function () {
  if(Auth::user())
    return redirect('/home');

  else
    return view('welcome');
});

Route::get('logout','MasnodController@logout');


Route::post('profile', 'UserController@update_avatar');

Auth::routes();

Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('masnod')->group(function () {
    Route::get('/login', 'Auth\MasnodLoginController@showLoginForm')->name('masnod.login');
    Route::get('/register', 'Auth\MasnodRegisterController@showRegistrationForm')->name('masnod.register');
    Route::post('/login', 'Auth\MasnodLoginController@login')->name('masnod.login.submit');
    Route::get('/logout', 'Auth\MasnodLoginController@logout')->name('masnod.logout');
    Route::post('/register', 'Auth\MasnodRegisterController@register');
    Route::post('add_masnod_request','MasnodController@add_masnod_request');
    Route::get('edit_masnod_request/{id}','MasnodController@edit_masnod_request');
    Route::post('update_masnod_request','MasnodController@update_masnod_request');
    Route::get('edit_masnod','MasnodController@edit_masnod');
    Route::post('update_masnod','MasnodController@update_masnod');
    Route::get('delete_masnod_request/{id}','MasnodController@delete_masnod_request');
    Route::get('dashboard','MasnodController@dashboard');
    Route::post('masnod_social_id','MasnodController@masnod_social_id');

});

Route::prefix('vmasnod')->group(function () {
    Route::get('/login', 'Auth\VmasnodLoginController@showLoginForm')->name('vmasnod.login');
    Route::post('/login', 'Auth\VmasnodLoginController@login')->name('vmasnod.login.submit');
    Route::get('/dashboard', 'VmasnodController@dashboard')->name('vmasnod.dashboard');
    Route::get('/logout', 'Auth\VmasnodLoginController@logout')->name('vmasnod.logout');
    Route::get('/register', 'Auth\VmasnodRegisterController@showRegistrationForm')->name('vmasnod.register');
    Route::post('/register', 'Auth\VmasnodRegisterController@register');
    Route::get('vmasnod_edit_request/{id}','VmasnodController@vmasnod_edit_request');
    Route::post('vmasnod_edit_request','VmasnodController@vmasnod_update_request');
    Route::get('vmasnod_deliver_request/{id}','VmasnodController@deliver_request_form');
    Route::get('masnod_profile/{id}', 'VmasnodController@view_masnod');
    Route::get('masnod_verify/{id}', 'VmasnodController@masnod_verify');
    Route::get('masnod_escalate/{id}', 'VmasnodController@masnod_escalate');
    Route::post('/approve','VmasnodController@approve_request');
    Route::post('vmasnod_delivered','VmasnodController@deliver_request');
    Route::post('vmasnod2_take_request','VmasnodController@take_vm2');
    Route::post('vmasnod_add_request','VmasnodController@vmasnod_add_request');
    Route::post('message','VmasnodController@message');
    Route::post('r_message','VmasnodController@r_message');

});

Route::prefix('sand')->group(function () {
    Route::get('/login', 'Auth\SandLoginController@showLoginForm')->name('sand.login');
    Route::post('/login', 'Auth\SandLoginController@login')->name('sand.login.submit');
    Route::get('/dashboard', 'SandController@index')->name('sand.dashboard');
    Route::get('/logout', 'Auth\SandLoginController@logout')->name('sand.logout');
    Route::get('delete_sand_request/{id}','SandController@delete_sand_request');
    Route::get('/register', 'Auth\SandRegisterController@showRegistrationForm')->name('sand.register');
    Route::post('/register', 'Auth\SandRegisterController@register');
    Route::get('sand_take_request/{id}','SandController@take_request');
    Route::post('confirm_request','SandController@confirm_request');
    Route::get('report','SandController@report');
    Route::get('report/pdf','SandController@pdf');
});


Route::prefix('vsand')->group(function () {
    Route::get('/login', 'Auth\VsandLoginController@showLoginForm')->name('vsand.login');
    Route::post('/login', 'Auth\VsandLoginController@login')->name('vsand.login.submit');
    Route::get('/dashboard', 'VsandController@index')->name('vsand.dashboard');
    Route::get('/logout', 'Auth\VsandLoginController@logout')->name('vsand.logout');
    Route::get('/vsand_take_request/{id}', 'VsandController@take_request_form');
    Route::get('/vsand_edit_request/{id}', 'VsandController@edit_request_form');
    Route::post('/vsand_take_request', 'VsandController@take_request');
    Route::post('/recieve/{id}', 'VsandController@recieve');
    Route::get('/register', 'Auth\VsandRegisterController@showRegistrationForm')->name('vsand.register');
    Route::post('/register', 'Auth\VsandRegisterController@register');
    Route::post('/message','VsandController@r_message');
    Route::get('/edit_sand/{sand}','VsandController@edit_sand');
    Route::post('/edit_sand','VsandController@change_sand');
});


// mostafa naser

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/distance', 'HomeController@calc')->name('calc');
Route::post('/distance', 'HomeController@calc')->name('calc');
// Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::get('/masnodslist', 'Auth\AdminController@getmasnods')->name('masnodslist');
Route::get('/sandslist', 'Auth\AdminController@getsands')->name('sandslist');
Route::get('/vmasnodslist', 'Auth\AdminController@getVmasnods')->name('Vmasnods.dashboard');
Route::get('/vsandslist', 'Auth\AdminController@getVsands')->name('Vsands.dashboard');
Route::post('/editsand', 'Auth\AdminController@sand_edit')->name('sand_edit');
Route::get('/sand_profile/{id}','Auth\AdminController@get_sand');
Route::post('/editmasnod', 'Auth\AdminController@masnod_edit')->name('masnod_edit');
Route::get('/masnod_profile/{id}','Auth\AdminController@get_masnod');
Route::get('/masnod_hold_message/{id}','Auth\AdminController@get_masnod_hold_message');
Route::get('/masnod_profile_esc/{id}','Auth\AdminController@get_masnod_esc');
Route::post('/editvmasnod', 'Auth\AdminController@vmasnod_edit')->name('vmasnod_edit');
Route::get('/vmasnod_profile/{id}','Auth\AdminController@get_vmasnod');
Route::post('/editvsand', 'Auth\AdminController@vsand_edit')->name('vsand_edit');
Route::get('/vsand_profile/{id}','Auth\AdminController@get_vsand');
Route::get('/sandslist/{id}','Auth\AdminController@sand_destroy');
Route::get('/vsandslist/{id}','Auth\AdminController@vsand_destroy');
Route::get('/vmasnodslist/{id}','Auth\AdminController@vmasnod_destroy');
Route::get('/masnodslist/{id}','Auth\AdminController@masnod_destroy');

Route::post('/vmasnod/register', 'Auth\AdminController@Vmasnod_Register');
Route::get('/vmasnod/register', 'Auth\AdminController@showRegistrationForm')->name('vmasnod.register');
Route::post('/vsand/register', 'Auth\AdminController@Vsand_Register');
Route::get('/vsand/register', 'Auth\AdminController@VsandRegistrationForm')->name('vsand.register');

Route::get('/drequests', 'Auth\AdminController@getdonereq')->name('requestsdone');
Route::get('/mrequests', 'Auth\AdminController@getmasnodpendingreq')->name('requestspending');
Route::get('/vmrequests', 'Auth\AdminController@getvmasnodpendingreq')->name('requestspending');
Route::get('/vsrequests', 'Auth\AdminController@getvsandpendingreq')->name('requestspending');
Route::get('/srequests', 'Auth\AdminController@getsandpendingreq')->name('requestspending');
Route::get('/m_esc', 'Auth\AdminController@getmasnodescalation')->name('masnodescalations');
Route::get('/s_esc', 'Auth\AdminController@getsandescalation')->name('sandescalations');
Route::get('/r_esc', 'Auth\AdminController@getreqescalation')->name('requestescalations');
Route::get('/m_hold', 'Auth\AdminController@getmasnodhold')->name('m_hold');
Route::get('/m_req_hold', 'Auth\AdminController@getmasnod_req_hold')->name('m_req_hold');
Route::get('/s_req_hold', 'Auth\AdminController@get_s_req_hold')->name('s_req_hold');
Route::post('/editrequest', 'Auth\AdminController@request_edit')->name('request_edit');
Route::get('/request_profile/{id}','Auth\AdminController@get_request');
Route::get('/mrequests/{id}','Auth\AdminController@request_destroy');


Route::get('paymentlist','Auth\AdminController@paymentlist');
Route::get('test','VmasnodController@test');
