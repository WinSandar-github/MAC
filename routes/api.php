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
Route::get('/audit_register_list/{status}/{firm_type}', 'AccFirmInfController@FilterAuditRegistration');
Route::get('/audit_data/{id}','AccFirmInfController@auditData');
Route::patch('/approve_auditfirm/{id}', 'AccFirmInfController@approve');
Route::post('/reject_auditfirm/{id}', 'AccFirmInfController@reject');
Route::patch('/approve_non_auditfirm/{id}', 'AccFirmInfController@approve');
Route::post('/reject_non_auditfirm/{id}', 'AccFirmInfController@reject');

// Mentor
Route::patch('/approve_mentor_student/{id}', 'MentorController@approve');
Route::patch('/reject_mentor_student/{id}', 'MentorController@reject');
Route::patch('/renewMentor/{id}', 'MentorController@renewMentor');

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

//Requirement
Route::apiResource('/requirement','RequirementController');
Route::post('/filter_requirement','RequirementController@FilterRequirement');

//Batch
Route::resource('/batch','BatchController');
Route::post('/filter_batch','BatchController@FilterBatch');


//Exam
Route::resource('/exam','ExamController');
Route::post('/filter_exam','ExamController@FilterExam');

//Course
Route::resource('/course','CourseController');
Route::get('/filter_course/{course_name}','CourseController@FilterCourse');
Route::get('/get_main_course', 'CourseController@getMainCourse');
Route::get('/course_by_course_code/{code}','CourseController@loadCourseByCourseCode');
Route::get('/publish_batch/{course_type_id}','BatchController@publish_batch');

//papp
Route::resource('/papp','PAPPController');
Route::get('/papp_register_list/{status}', 'PAPPController@FilterPappRegistration');
Route::patch('/approve_papp/{id}', 'PAPPController@approve');
Route::patch('/reject_papp/{id}', 'PAPPController@reject');
Route::get('/papp_by_stuId/{stu_id}','PAPPController@getPappByStuId');
Route::patch('/approve_papp_payment/{id}', 'PAPPController@approvePapp');
Route::get('/check_payment_papp/{id}', 'PAPPController@checkPaymentPapp');

//cpa_ff
Route::resource('/cpa_ff','CPAFFController');
Route::get('/cpa_ff_register_list/{status}', 'CPAFFController@FilterCpaffRegistration');
Route::patch('/approve_cpaff/{id}', 'CPAFFController@approve');
Route::patch('/reject_cpaff/{id}', 'CPAFFController@reject');
Route::get('/cpaff_by_stuId/{stu_id}','CPAFFController@getCpaffByStuId');
Route::get('/get_cpaff/{stu_id}','CPAFFController@getCpaff');
Route::patch('/approve_cpaff_payment/{id}', 'CPAFFController@approveCpaff');
Route::get('/check_payment_cpaff/{id}', 'CPAFFController@checkPaymentCpaff');

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

Route::apiResource('/descriptions','DescriptionController');
Route::apiResource('/memberships','MembershipController');

Route::get('/get_exam_student/{id}','ExamRegisterController@getExamByStudentID');
//Student Register Form API
Route::resource('/student_register','StudentRegisterController');
Route::get('/show_student_register/{id}','StudentRegisterController@showStudentRegister');
Route::patch('/approve_student/{id}', 'StudentRegisterController@approveStudent');
Route::patch('/reject_student/{id}', 'StudentRegisterController@rejectStudent');
Route::post('/filter_registration','StudentRegisterController@FilterRegistration');
// Route::get('/filter_registration/{type}','StudentRegisterController@FilterRegistration');

Route::post('save_exam','BatchController@saveExam');

//DA2 Exam Register Form API
Route::resource('/exam_register', 'ExamRegisterController');
Route::get('/get_passed_exam_student/{id}','ExamRegisterController@getPassedExamByStudentID');
//DA Exam Form 1 API
Route::resource('/exam_register', 'ExamRegisterController');
Route::get('/std/{id}', 'ExamRegisterController@viewStudent');
Route::patch('/approve_exam/{id}', 'ExamRegisterController@approveExam');
Route::patch('/reject_exam/{id}', 'ExamRegisterController@rejectExam');
// Route::post('/filter', 'ExamRegisterController@FilterExamRegistration');
Route::post('/filter', 'ExamRegisterController@FilterExamRegistration');
// Route::post('/filter_exam_register', 'ExamRegisterController@FilterExamRegister');
Route::post('/filter_exam_register', 'ExamRegisterController@FilterExamRegister');

//DA Application Form API
Route::resource('/da_register', 'DARegisterController');
Route::patch('/approve/{id}', 'DARegisterController@approve');
Route::patch('/reject/{id}', 'DARegisterController@reject');
Route::post('/filter_student_info','DARegisterController@FilterApplicationList');
Route::post('/send_email', 'DARegisterController@send_email');

//CPA One Registration
Route::resource('/cpa_one_registration', 'CPAOneRegistrationController');
Route::post('/cpa_one_by_nrc','CPAOneRegistrationController@GetCPAOneByNRC');
Route::patch('/approve_cpa_one_student/{id}', 'CPAOneRegistrationController@approve');
Route::patch('/reject_cpa_one_student/{id}', 'CPAOneRegistrationController@reject');

//CPA two registration
Route::resource('/cpa_two_registration', 'CPATwoRegistrationController');
Route::patch('/approve_cpa_two_student/{id}', 'CPATwoRegistrationController@approve');
Route::patch('/reject_cpa_two_student/{id}', 'CPATwoRegistrationController@reject');

//Exam Result
Route::resource('/exam_result','ExamResultController');
Route::get('/search_exam_result/{batch_id}','ExamResultController@SearchExamResult');

Route::get('/getStatus/{id}','DARegisterController@reg_feedback');
Route::get('/getAuditFormStatus/{id}','DARegisterController@auditFormStatus');
Route::get('/getAuditStatus/{id}','AccFirmInfController@auditStatus');
Route::get('/getNonAuditStatus/{id}','AccFirmInfController@nonAuditStatus');
Route::get('/getDateRange/{id}','AccFirmInfController@dateRange');
Route::get('/getNonAuditDateRange/{id}','AccFirmInfController@nonAuditDateRange');
Route::get('/checkVerify/{id}','AccFirmInfController@checkVerify');
Route::get('/nonAuditCheckVerify/{id}','AccFirmInfController@nonAuditCheckVerify');
Route::get('/audit_update/{id}','AccFirmInfController@auditUpdate');
Route::post('/renew_subscribe','AccFirmInfController@renewSubscribe');
// Route::patch('/renew_subscribe/{id}','AccFirmInfController@renewSubscribe');

Route::post('/student_info_by_nrc','DARegisterController@GetStudentByNRC');
Route::get('/get_course_type','CourseController@getCourseType');
Route::get('/course_by_course_type/{course_type_id}','CourseController@loadCourseByCourseType');
Route::get('/get_requirement_id','CourseController@getRequirement');
Route::post('/cpa_exam_register','ExamRegisterController@cpaExamRegister');

Route::get('/get_current_batch_studentId_student/{id}','ExamRegisterController@getExamByStudentID');
Route::get('/get_exam_student/{id}','ExamRegisterController@getExamByStudentID');
Route::post('/loginValidate', 'LoginController@loginValidate');
Route::post('/mobileLogin', 'LoginController@mobileLogin');

//Store DA/CPA Two Application Form
Route::post('store_cpa_da_two_app_form','CpaController@store_da_cpa_app_form');

//for school registration
Route::resource('/school','SchoolController\SchoolController');
Route::post('/filter_school','SchoolController\SchoolController@FilterSchool');
Route::post('/approve_school_register', 'SchoolController\SchoolController@approve_school_register');
Route::post('/reject_school_register', 'SchoolController\SchoolController@reject_school_register');
Route::patch('/approve_school/{id}', 'SchoolController\SchoolController@approveSchool');
Route::get('/check_payment_school/{id}', 'SchoolController\SchoolController@checkPayment');

//for teacher registration
Route::resource('/teacher','TeacherController\TeacherController');
Route::post('/filter_teacher','TeacherController\TeacherController@FilterTeacher');
Route::post('/approve_teacher_register', 'TeacherController\TeacherController@approve_teacher_register');
Route::patch('/approve_teacher/{id}', 'TeacherController\TeacherController@approveTeacher');
Route::get('/check_payment_teacher/{id}', 'TeacherController\TeacherController@check_payment');

//Audit DATA
Route::get('/getAuditStatus/{id}','AccFirmInfController@auditFeedback');
Route::get('/check_payment_audit/{id}', 'AccFirmInfController@check_payment');
Route::patch('/approve_audit_payment/{id}', 'AccFirmInfController@approvePayment');

Route::get('/getNonAuditStatus/{id}','AccFirmInfController@nonAuditFeedback');

//Non-Audti DATA
Route::get('/get_non_audit_register_data/{id}','AccFirmInfController@getNonAuditData');
Route::get('/check_payment_non_audit/{id}', 'AccFirmInfController@check_payment');
Route::patch('/approve_non_audit_payment/{id}', 'AccFirmInfController@approvePayment');

//Update Non-Audit register form
Route::post('/update_acc_firm_info/{id}','AccFirmInfController@update');

//Get Exam filter by student id
Route::get('/get_exam/{student_info_id}','BatchController@getExam');

//Get Current Batch filter by student id
Route::get('/get_current_batch_studentId/{student_info_id}','BatchController@currentAttendBatch');

//login validate for mobile
Route::post('/loginValidate', 'LoginController@loginValidate');
Route::post('/mobileLogin', 'LoginController@mobileLogin');

//Exam Status
Route::get('/get_exam_status/{id}','ExamRegisterController@getExamStatus');

//Pass or fail student
Route::patch('/pass_exam/{id}', 'ExamResultController@passExam');
Route::patch('/fail_exam/{id}', 'ExamResultController@rejectExam');

// Route::apiResource('mentor','MentorController');
Route::resource('mentor','MentorController');
Route::post('/filter_mentor','MentorController@FilterMentor');
// Route::apiResource('mentor','MentorController');
// Route::resource('mentor','MentorController');
Route::get('check_service','CurrentCheckServiceController@getCurrentCheckService');
Route::get('check_service_private','CurrentCheckServiceController@getCheckServicePrivate');
Route::get('check_service_self','CurrentCheckServiceController@getCheckServiceSelf');
Route::get('check_mentor_mac','MentorController@getMentorMAC');
Route::get('check_mentor_self_private','MentorController@getMentorSelfandPrivate');

Route::get('user_profile/{id}','StudentInfoController@userProfile');

Route::get('get_type/{id}', 'StudentRegisterController@getType');

//School Status
Route::get('getSchoolStatus/{id}', 'SchoolController\SchoolController@schoolStatus');

//Teacher Status
Route::get('getTeacherStatus/{id}', 'TeacherController\TeacherController@teacherStatus');

Route::post('/update_mentor','StudentRegisterController@updateMentor');


//Mentor Status
Route::get('getMentorStatus/{id}', 'MentorController@mentorStatus');

//Mentor Api
// Route::get('getMentor', 'MentorController@getMentor');

//Store app and register on student register
Route::post('store_student_app_reg','StudentRegisterController@store_student_app_reg');
//Email Verification
Route::patch('/check_code/{id}', 'DARegisterController@checkCode');

Route::post('get_attendes_student','StudentRegisterController@getAttendesStudent');

Route::post('approve_exam_list','StudentRegisterController@‌approveExamList');

// Get all courses
Route::get('/get_courses','CourseController@getCourses');

Route::patch('update_profile/{id}','StudentInfoController@updateProfile');

Route::post('update_pwd','LoginController@updatePwd');
//Chart
Route::post('/chart_filter','DARegisterController@ChartFilter');
Route::post('/reg_chart_filter','StudentRegisterController@RegChartFilter');

//Unique Email and NRC Check in DA One Application
Route::post('unique_email', 'DARegisterController@unique_email');
// Route::post('unique_nrc', 'DARegisterController@unique_nrc');

//Generate Serial and Personal Number
Route::get('/generate_personal_no/{code}','ApiController@generatePersonalNo');
Route::get('/generate_sr_no/{code}','ApiController@generateSrNo');
Route::get('/generate_exam_sr_no/{batch_id}','ApiController@generateExamSrNo');
Route::get('/generate_app_sr_no/{code}','ApiController@generateAppSrNo');

//show description
Route::get('showDescription/{membership_name}','MembershipController@showDescription');

// Exam Department
Route::get('get_exam_department','ExamDepartmentController@getExamDepartment');
//cpa entry exam
Route::post('cpa_entry_exam','EntryExamController@cpaOneEntryExam');
Route::post('cpa_entry_app','EntryExamController@cpaOneEntryApp');


Route::post('entry_exam_filter','EntryExamController@entryExamFilter');

Route::post('/filter_entry_exam_result', 'EntryExamController@filterEntryExamResult');
Route::get('get_batch/{course_id}','BatchController@getBatch');

Route::get('get_exam_type','ExamController@getExamType');




// subject
Route::post('getSubject','SubjectController\SubjectController@getSubject');

// education history
Route::post('getEducationHistory','TeacherController\TeacherController@getEducationHistory');


//Pass or fail  student
Route::patch('/pass_entry_exam/{id}', 'EntryExamController@passEntryExam');
Route::patch('/fail_entry_exam/{id}', 'EntryExamController@failEntryExam');


// education history
Route::post('checkEmail','SchoolController\SchoolController@checkEmail');

// Apprentice Accountant
Route::get('/acc_app', 'ArticleController\ArticleController@index');
Route::get('/acc_app/{id}', 'ArticleController\ArticleController@show');
Route::post('/article_firm_register', 'ArticleController\ArticleController@store');
Route::post('/filter_firm_article','ArticleController\ArticleController@FilterArticle');
Route::patch('/approve_article/{id}', 'ArticleController\ArticleController@approve');
Route::patch('/reject_article/{id}', 'ArticleController\ArticleController@reject');

// Qualified Test
Route::apiResource('/qualifiedtest','QualifiedTest\QualifiedTestController');
Route::post('/get_qualifiedtest_user','QualifiedTest\QualifiedTestController@get_user');

//payment
Route::get('get_fees/{id}','CourseController@getFees');
Route::post('/article_gov_register', 'ArticleController\ArticleController@saveGovArticle');
Route::post('/filter_gov_article','ArticleController\ArticleController@FilterGovArticle');
Route::patch('/approve_gov_article/{id}', 'ArticleController\ArticleController@approveGov');
Route::patch('/reject_gov_article/{id}', 'ArticleController\ArticleController@rejectGov');
Route::get('/gov_article_show/{id}', 'ArticleController\ArticleController@showGovArticle');

Route::post('/article_resign_register', 'ArticleController\ArticleController@saveResignArticle');
Route::post('/filter_resign_article','ArticleController\ArticleController@FilterResignArticle');
Route::patch('/approve_resign_article/{id}', 'ArticleController\ArticleController@approveResign');
Route::patch('/reject_resign_article/{id}', 'ArticleController\ArticleController@rejectResign');
Route::get('/resign_article_show/{id}', 'ArticleController\ArticleController@showResignArticle');
Route::post('/save_contract_date', 'ArticleController\ArticleController@saveContractDate');
Route::post('/save_done_form', 'ArticleController\ArticleController@saveDoneForm');
Route::post('/filter_done_article','ArticleController\ArticleController@filterDoneArticle');

Route::post('/save_gov_contract_date', 'ArticleController\ArticleController@saveGovContractDate');
Route::post('/save_gov_done_form', 'ArticleController\ArticleController@saveGovDoneForm');
Route::post('/filter_gov_done_article','ArticleController\ArticleController@filterGovDoneArticle');
Route::patch('/approve_done_gov_article/{id}', 'ArticleController\ArticleController@approveDoneGov');
Route::patch('/reject_done_gov_article/{id}', 'ArticleController\ArticleController@rejectDoneGov');
Route::patch('/approve_done_article/{id}', 'ArticleController\ArticleController@approveDone');
Route::patch('/reject_done_article/{id}', 'ArticleController\ArticleController@rejectDone');

// Payment
Route::get('/get_invoice/{id}', 'PaymentController\PaymentController@getInvoice');
Route::get('/payment_info/{id}', 'PaymentController\PaymentController@index');