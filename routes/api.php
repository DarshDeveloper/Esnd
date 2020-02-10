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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//admin apis
Route::post('/admin_login', 'ApiController@adminlogin');
Route::post('/admin_register', 'ApiController@adminregister');

//masnod, vmasnod, sand and vsand login apis
Route::post('/login', 'ApiController@login');

//masnod apis
Route::post('/masnod_register', 'MasnodApiController@MasnodRegister');
Route::get('/get_masnod/{id}', 'MasnodApiController@GetMasnod');
Route::post('/update_masnod', 'MasnodApiController@UpdateMasnod');
Route::post('/add_masnod_request', 'RequestApiController@AddMasnodRequest');
Route::get('/get_all_masnod_request/{masnod_id}', 'RequestApiController@GetAllMasnodRequest');
Route::get('/get_one_request/{id}', 'RequestApiController@GetOneRequest');
Route::get('/delete_masnod_request/{id}', 'RequestApiController@DeleteMasnodRequest');
Route::post('/update_masnod_request', 'RequestApiController@UpdateMasnodRequest');

//vmasnod apis
Route::post('/vmasnod_register', 'VmasnodApiController@VmasnodRegister');
Route::get('/get_vmasnod/{id}', 'VmasnodApiController@GetVmasnod');
Route::post('/update_vmasnod', 'VmasnodApiController@UpdateVmasnod');
Route::post('/approve_masnod_request', 'RequestApiController@ApproveMasnodRequest');
Route::post('/make_masnod_request_old', 'RequestApiController@MakeMasnodRequestOld');
Route::post('/add_vmasnod_request', 'RequestApiController@AddVmasnodRequest');
Route::get('/get_all_masnod_requests_for_vmasnod', 'RequestApiController@GetAllMasnodRequestsForVmasnod');
Route::get('/get_vmasnod_requests/{vmasnod_id}', 'RequestApiController@GetVmasnodRequests');
Route::post('/update_vmasnod_request', 'RequestApiController@UpdateVmasnodRequest');
Route::get('/get_all_vsand_requests_for_vmasnod', 'RequestApiController@GetAllVsandRequestsForVmasnod');
Route::post('/take_delivered_request', 'RequestApiController@TakeDeliveredRequest');
Route::get('/get_vmasnod_requests_to_update/{vmasnod_id}', 'RequestApiController@GetVmasnodRequestsToUpdate');
Route::post('/update_delivered_request', 'RequestApiController@UpdateDeliveredRequest');
Route::get('/get_all_new_masnods_to_validate', 'VmasnodApiController@GetAllNewMasnodsToValidate');
Route::post('/confirm_masnod_register', 'VmasnodApiController@ConfirmMasnodRegister');
Route::post('/escalate_masnod_register', 'VmasnodApiController@EscalateMasnodRegister');
Route::post('/hold_masnod_register', 'VmasnodApiController@HoldMasnodRegister');
Route::get('/get_hold_masnod_messages/{masnod_id}', 'VmasnodApiController@GetHoldMasnodMessages');
Route::get('/get_hold_masnod_request_messages/{request_id}', 'VmasnodApiController@GetHoldMasnodRequestMessages');
Route::get('/get_hold_sand_request_messages/{request_id}', 'VsandApiController@GetHoldSandRequestMessages');
Route::post('/hold_masnod_request', 'VmasnodApiController@HoldMasnodRequest');
Route::post('/escalate_masnod_request', 'VmasnodApiController@EscalateMasnodRequest');
Route::post('/escalate_sand_request', 'VsandApiController@EscalateSandRequest');

//sand apis
Route::post('/sand_register', 'SandApiController@SandRegister');
Route::get('/get_sand/{id}', 'SandApiController@GetSand');
Route::post('/update_sand', 'SandApiController@UpdateSand');
Route::get('/get_all_vmasnod_requests_for_sand', 'RequestApiController@GetAllVmasnodRequestsForSand');
Route::post('/update_sand_request', 'RequestApiController@UpdateSandRequest');
Route::get('/get_sand_requests/{sand_id}', 'RequestApiController@GetSandRequests');
Route::post('/delete_sand_request', 'RequestApiController@DeleteSandRequest');

//vsand apis
Route::post('/vsand_register', 'VsandApiController@VsandRegister');
Route::get('/get_vsand/{id}', 'VsandApiController@GetVsand');
Route::post('/update_vsand', 'VsandApiController@UpdateVsand');
Route::get('/get_all_sand_requests_for_vsand', 'RequestApiController@GetAllSandRequestsForVsand');
Route::post('/select_vsand_request', 'RequestApiController@SelectVsandRequest');
Route::get('/get_vsand_requests_to_update/{vsand_id}', 'RequestApiController@GetVsandRequestsToUpdate');
Route::post('/update_vsand_request', 'RequestApiController@UpdateVsandRequest');
Route::get('/get_all_new_sands_to_validate', 'VsandApiController@GetAllNewSandsToValidate');
Route::post('/confirm_sand_register', 'VsandApiController@ConfirmSandRegister');
Route::post('/escalate_sand_register', 'VsandApiController@EscalateSandRegister');
Route::post('/hold_sand_register', 'VsandApiController@HoldSandRegister');
Route::post('/hold_sand_requests', 'VsandApiController@HoldSandRequests');
