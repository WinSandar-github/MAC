<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

// Route::group(['middleware'=>'auth'], function () {
//     Route::apiResource('account', 'MoodleControllers\AccountCreateController');
// });

//Route::apiResource('account', 'MoodleControllers\AccountCreateController');


Route::resource('/acc_firm_info','AccFirmInfController');
Route::resource('/cpa_full_form','CpaFullFormController');
Route::resource('/cpa_one_reg','CpaOneRegisterController');
Route::resource('/cpa_one_exam','CpaOneExamRegController');
Route::resource('/cpa_one_self_learner','CpaOneRegSelfLearnerController');
Route::resource('/cpa_private_newbie','CpaPrivateNewbieController');
Route::resource('/cpa_private_old','CpaPrivateOldController');
Route::resource('/cpa_addmission_exam','CpaTraAddmissionExamController');
Route::resource('/cpa_addmission_direct','CpaTraAddmissionDirectController');
Route::resource('/cpa_two_tra_reg','CpaTwoTraRegisterController');
Route::resource('/cpa_two_self_learner','CpaTwoRegSelfLearnerController');
Route::resource('/cpa_two_private_newbie','CpaTwoPrivateNewbieController');
Route::resource('/cpa_two_private_old','CpaTwoPrivateOldController');
Route::resource('/cpa_two_exam','CpaTwoExamRegController');



