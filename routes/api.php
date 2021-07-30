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
Route::resource('/cpa_register','CpaTraAddmissionDirectController');
Route::resource('/cpa_two_tra_reg','CpaTwoTraRegisterController');
Route::resource('/cpa_two_self_learner','CpaTwoRegSelfLearnerController');
Route::resource('/cpa_two_private_newbie','CpaTwoPrivateNewbieController');
Route::resource('/cpa_two_private_old','CpaTwoPrivateOldController');
Route::resource('/cpa_two_exam','CpaTwoExamRegController');
Route::resource('/course_fee','CourseFeeController');
Route::apiResource('/student_info','StudentInfoController');
Route::apiResource('/requirement','RequirementController');

Route::resource('/batch','BatchController');
Route::resource('/course','CourseController');
Route::get('/publish_batch/{course_type_id}','BatchController@publish_batch');

//papp
Route::resource('/papp','PAPPController');
Route::patch('/approve_papp/{id}', 'PAPPController@approve');
Route::patch('/reject_papp/{id}', 'PAPPController@reject');

//cpa_ff
Route::resource('/cpa_ff','CPAFFController');
Route::patch('/approve_cpaff/{id}', 'CPAFFController@approve');
Route::patch('/reject_cpaff/{id}', 'CPAFFController@reject');





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

//Student Register Form API
Route::resource('/student_register','StudentRegisterController');
Route::patch('/approve_student/{id}', 'StudentRegisterController@approveStudent');
Route::patch('/reject_student/{id}', 'StudentRegisterController@rejectStudent');

//DA2 Exam Register Form API
Route::resource('/exam_register', 'ExamRegisterController');

//DA Exam Form 1 API
Route::resource('/exam_register', 'ExamRegisterController');
Route::get('/std/{id}', 'ExamRegisterController@viewStudent');
Route::patch('/approve_exam/{id}', 'ExamRegisterController@approveExam');
Route::patch('/reject_exam/{id}', 'ExamRegisterController@rejectExam');
Route::get('/filter/{id}', 'ExamRegisterController@selectByID');

//DA Application Form API
Route::resource('/da_register', 'DARegisterController');
Route::patch('/approve/{id}', 'DARegisterController@approve');
Route::patch('/reject/{id}', 'DARegisterController@reject');

//CPA One Registration
Route::resource('/cpa_one_registration', 'CPAOneRegistrationController');
Route::post('/cpa_one_by_nrc','CPAOneRegistrationController@GetCPAOneByNRC');
Route::patch('/approve_cpa_one_student/{id}', 'CPAOneRegistrationController@approve');
Route::patch('/reject_cpa_one_student/{id}', 'CPAOneRegistrationController@reject');

//CPA two registration
Route::resource('/cpa_two_registration', 'CPATwoRegistrationController');
Route::patch('/approve_cpa_two_student/{id}', 'CPATwoRegistrationController@approve');
Route::patch('/reject_cpa_two_student/{id}', 'CPATwoRegistrationController@reject');

Route::get('/getStatus/{id}','DARegisterController@reg_feedback');
Route::post('/student_info_by_nrc','DARegisterController@GetStudentByNRC');
Route::get('/get_course_type','CourseController@getCourseType');

// Exam Result
Route::resource('/exam_result', 'ExamResultController');
Route::post('/cpa_exam_register','ExamRegisterController@cpaExamRegister');



