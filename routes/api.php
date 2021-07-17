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
Route::resource('/course_fee','CourseFeeController');
Route::apiResource('/student_info','StudentInfoController');
Route::apiResource('/requirement','RequirementController');
Route::resource('/course','CourseController');
Route::resource('/papp','PAPPController');


Route::get('/audit_firm_type','ApiController@audit_firm_type');
Route::get('/audit_staff_type','ApiController@audit_staff_type');
Route::get('/audit_total_staff_type','ApiController@audit_total_staff_type');
Route::get('/cpa_one_training_ground','ApiController@cpa_one_training_ground');
Route::get('/education_level','ApiController@education_level');
Route::get('/local_foreign','ApiController@local_foreign');
Route::get('/module','ApiController@module');
Route::get('/non_audit_total_staff','ApiController@non_audit_total_staff');
Route::get('/organization_structure','ApiController@organization_structure');
Route::get('/cpa_one_training_ground','ApiController@cpa_one_training_ground');
Route::get('/type_service_provided','ApiController@type_service_provided');


Route::get('student_course', 'CourseController@studentCourse');
Route::resource('/student_selfstudy','StudentSelfStudyController');
Route::resource('/student_privateschool','StudentPrivateSchoolController');
Route::resource('/student_mac','StudentMacController');








