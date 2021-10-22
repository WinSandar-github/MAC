<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Adldap\Models\User;
use LdapRecord\Connection;
use Illuminate\Support\Facades\File;

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

Auth::routes();

Route::get('/', 'HomeController@index');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/moodle', 'TestMoodleController@index');

Route::get('/ldap-search', function (Request $request) {
    $connection = new Connection([
        'hosts' => ['ldap.forumsys.com'],
    ]);

    try {
        $connection->connect();

        $user = 'cn=read-only-admin,dc=example,dc=com';
        $password = 'password';

        if ($connection->auth()->attempt($user, $password)) {
            //$credentials = $request->only('username');
            //$username = $credentials['username'];

            //$record = $connection->query()->find('uid=curie,dc=example,dc=com');

            // if ( $record ) {
            //     dump($record);
            // } else {
            //     echo 'Not Found';
            // }

            $record = $connection->query()->in('ou=chemists,dc=example,dc=com')->get();

            dump($record);

            //dump($results);
        }

        //$credential = $request->only('email');
        //$email = $credential['email'];

        //$record = $connection->query()->where('mail', '=', $email)->first();


    } catch (\LdapRecord\Auth\BindException $e) {
        $error = $e->getDetailedError();

        echo $error->getErrorCode();
        echo $error->getErrorMessage();
        echo $error->getDiagnosticMessage();
    }

});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
    Route::get('training', ['as' => 'training.index', 'uses' => 'TrainingClassController@index']);

    Route::resource('/degree', 'DegreeController');

    Route::resource('training', 'TrainingClassController');
    Route::post('training_update/{id}', 'TrainingClassController@update')->name('training_update.update');
    Route::get('training_delete/{id}', 'TrainingClassController@delete')->name('training_delete.delete');
    Route::resource('training_type', 'TrainingTypeController');


    Route::apiResource('lms_accounts', 'MoodleControllers\LmsAccountsController');
    Route::apiResource('account', 'MoodleControllers\AccountCreateController');
    Route::post('account_update/{id}', 'MoodleControllers\AccountCreateController@update')->name('account.update');
    Route::get('account_destroy/{id}', 'MoodleControllers\AccountCreateController@destroy')->name('account.destroy');

    Route::get('admin', function () {
        return redirect('/moodle/admin');
    })->name("admin");

    // DA Application Form
    Route::patch('/approve/{id}', 'DARegisterController@approve');
    Route::patch('/reject/{id}', 'DARegisterController@reject');

    // Student Register Form
    Route::patch('/approve_student/{id}', 'StudentRegisterController@approveStudent');
    Route::patch('/reject_student/{id}', 'StudentRegisterController@rejectStudent');

    // DA Exam Form 1 Approve/Reject
    Route::patch('/approve_exam/{id}', 'ExamRegisterController@approveExam');
    Route::patch('/reject_exam/{id}', 'ExamRegisterController@rejectExam');

    //Qualify test Approve/Reject
    Route::patch('/approve_qt/{id}', 'QualifiedTest\QualifiedTestController@approveQT');
    Route::patch('/reject_qt/{id}', 'QualifiedTest\QualifiedTestController@rejectQT');
    //exam cards
    // Route::get('da1_examcard', 'ExamCardsController@DA1_ExamCard');
    // Route::get('cpa1_examcard', 'ExamCardsController@CPA1_ExamCard');

    // CPA_FF Form
    Route::patch('/approve_cpa_one_self_study/{id}', 'CPAOneRegistrationController@approve');
    Route::patch('/reject_cpa_one_self_study/{id}', 'CPAOneRegistrationController@reject');

    // CPA One Reg
    Route::patch('/approve_cpaff/{id}', 'CPAFFController@approve');
    Route::patch('/reject_cpaff/{id}', 'CPAFFController@reject');

    // PAPP Form
    Route::patch('/approve_papp/{id}', 'PAPPController@approve');
    Route::patch('/reject_papp/{id}', 'PAPPController@reject');

    // Exam Result
    Route::resource('/exam_result', 'ExamResultController');
    Route::get('/mark', 'ExamResultController@index');
    Route::get('/mark/{id}', 'ExamResultController@edit');
    Route::post('/mark/{id}', 'ExamResultController@update');

    Route::post('save_exam', 'BatchController@saveExam');

    Route::get('attend_exam_list/{course_code}','ReportController@attendExamList');
    Route::get('exam_result_list/{course_code}','ReportController@examResultList');

    Route::get('membership_edit/{id}','MembershipController@membership_edit');
    Route::get('memebership_list', 'MembershipController@membership_list')->name('membership_list');
    Route::get('entry_exam_detail/{id}','EntryExamController@entryExamDetail')->name('entry_exam_detail');
    Route::get('entry_exam_result','EntryExamController@entryExamResult');
    Route::get('entry_exam_result_detail/{id}','EntryExamController@entryExamResultDetail');
    //Entrance Exam
    Route::get('publishes_entrance_exam_list/{course_code}','ReportController@currentEntryExamList');
    Route::post('show_entrance_exam_list','ReportController@showEntranceExamList');
    Route::get('publishes_entrance_exam_result/{course_code}','ReportController@publishesEntranceExamResult');


    // CPA(FF)/PAPP Report
    Route::post('cpa_papp_yearly_list','ReportController\CpaPappReportController@cpaPappYearlyList');
    Route::post('cpa_papp_yearly_reg_list','ReportController\CpaPappReportController@cpaPappYearlyRegList');
    Route::post('cpa_papp_take_out_reg_list','ReportController\CpaPappReportController@cpaPappTakeOutRegList');
    Route::get('cpa_ff_report1','ReportController@cpa_ff_report1');
    Route::get('cpa_ff_report2','ReportController@cpa_ff_report2');
    Route::get('cpa_ff_report3','ReportController@cpa_ff_report3');
    Route::get('cpa_ff_report4','ReportController@cpa_ff_report4');
    Route::get('cpa_ff_report5','ReportController@cpa_ff_report5');
    Route::get('cpa_ff_report6','ReportController@cpa_ff_report6');
    Route::get('cpa_ff_report7','ReportController@cpa_ff_report7');
    Route::get('cpa_ff_report8','ReportController@cpa_ff_report8');

    //Firm Name Section Report
    //Audit Firm
    Route::get('audit_firm_report1','ReportController@audit_firm_report1');
    Route::get('audit_firm_report2','ReportController@audit_firm_report2');
    Route::get('audit_firm_report3','ReportController@audit_firm_report3');
    Route::get('audit_firm_report4','ReportController@audit_firm_report4');
    Route::get('audit_firm_report5','ReportController@audit_firm_report5');

    //Non Audit Firm
    Route::get('naudit_firm_report1','ReportController@naudit_firm_report1');
    Route::get('naudit_firm_report2','ReportController@naudit_firm_report2');
    Route::get('naudit_firm_report3','ReportController@naudit_firm_report3');
    Route::get('naudit_firm_report4','ReportController@naudit_firm_report4');
    Route::get('naudit_firm_report5','ReportController@naudit_firm_report5');
    Route::get('naudit_firm_report6','ReportController@naudit_firm_report6');

    Route::post("firm_individual", "ReportController\FirmReportController@firmIndividual");
    Route::post("firm_daily_attendence", "ReportController\FirmReportController@firmDailyAttendence");

    // CPA Report
    Route::get('cpa_report1','ReportController@cpa_report1');
    Route::get('cpa_report2','ReportController@cpa_report2');
    Route::get('cpa_report3','ReportController@cpa_report3');
    Route::get('cpa_report4','ReportController@cpa_report4');
    Route::get('cpa_report5','ReportController@cpa_report5');
    Route::get('cpa_report6','ReportController@cpa_report6');
    Route::get('cpa_report7','ReportController@cpa_report7');
    Route::get('cpa_report8','ReportController@cpa_report8');
    Route::get('cpa_report9','ReportController@cpa_report9');
    Route::get('cpa_report10','ReportController@cpa_report10');

    // Article Report
    Route::post('article_list','ReportController\ArticleReportController@articleList');
    Route::post('article_daily_in_out_list','ReportController\ArticleReportController@articleDailyInOutList');
    Route::post('article_intern_position_list','ReportController\ArticleReportController@articleInternPosList');
    Route::post('article_internship_list','ReportController\ArticleReportController@articleInternshipList');
    Route::get('firm_article_report1','ReportController@firm_article_report1');
    Route::get('firm_article_report2','ReportController@firm_article_report2');
    Route::get('firm_article_report3','ReportController@firm_article_report3');
    Route::get('firm_article_report4','ReportController@firm_article_report4');
    Route::get('firm_article_report5','ReportController@firm_article_report5');

    // Gov Article Report
    Route::get('gov_article_report1','ReportController@gov_article_report1');
    Route::get('gov_article_report2','ReportController@gov_article_report2');
    Route::get('gov_article_report3','ReportController@gov_article_report3');
    Route::get('gov_article_report4','ReportController@gov_article_report4');
    Route::get('gov_article_report5','ReportController@gov_article_report5');

    // Gov Mentor Report // haven't used 
    Route::get('mentor_report1','ReportController@mentor_report1');
    Route::get('mentor_report2','ReportController@mentor_report2');
    Route::get('mentor_report3','ReportController@mentor_report3');
    Route::get('mentor_report4','ReportController@mentor_report4');
    Route::get('mentor_report5','ReportController@mentor_report5');
    Route::get('mentor_report6','ReportController@mentor_report6');

    Route::post('article_mentor_registered_intern', 'ReportController\ArticleMentorReportController@articleMentorRegisteredIntern');
    Route::post('article_mentor_intern', 'ReportController\ArticleMentorReportController@articleMentorIntern');

    // School/Teacher Report
    Route::get('s_t_report1','ReportController@s_t_report1');
    Route::get('s_t_report2','ReportController@s_t_report2');
    Route::get('s_t_report3','ReportController@s_t_report3');

    Route::post('teacher_school_license/{type}', 'ReportController\TeacherSchoolReportController@teacherSchoolLicense');
    Route::post('teacher_school_private', 'ReportController\TeacherSchoolReportController@teacherSchoolPrivate');
    Route::post('teacher_school_license_plate', 'ReportController\TeacherSchoolReportController@teacherSchoolLicensePlate');


    // DA Report
    Route::get('report_list', 'ReportController@index')->name('report_list');

    Route::post('da_attend/{type}','ReportController\DaReportController@daAttendList');
    Route::post('da_reg/{type}','ReportController\DaReportController@daRegList');
    Route::post('da_exam_reg','ReportController\DaReportController@daExamRegList');
    Route::post('da_pass','ReportController\DaReportController@daPassList');
    Route::post('da_report5','ReportController\DaReportController@da_report5');
    Route::get('da_report6','ReportController\DaReportController@da_report6');
    Route::get('da_report7','ReportController\DaReportController@da_report7');
    Route::get('da_report8','ReportController\DaReportController@da_report8');
    Route::get('da_report9','ReportController\DaReportController@da_report9');

    // CPA Qualified Report
    Route::post('cpa_qualified_enrol','ReportController\CpaQualifiedReportController@cpaQualifiedList');
    Route::post('cpa_qualified_exam_enrol','ReportController\CpaQualifiedReportController@cpaQualifiedExamEnRol');
    Route::post('cpa_qualified_exam_reg','ReportController\CpaQualifiedReportController@cpaQualifiedExamReg');
    Route::post('cpa_qualified_pass','ReportController\CpaQualifiedReportController@cpaQualifiedPass');
    Route::post('cpa_qualified_fail','ReportController\CpaQualifiedReportController@cpaQualifiedFail');
    Route::get('qualified_report1','ReportController@qualified_report1');
    Route::get('qualified_report2','ReportController@qualified_report2');
    Route::get('qualify_test_detail/{id}','QualifiedTest\QualifiedTestController@qualifyTestDetail');
    Route::get('qt_fill_mark/{id}','QualifiedTest\QualifiedTestController@qualifyTestFillMark');
    Route::get('publishes_qualifiedtest_list','QualifiedTest\QualifiedTestController@currentQualifiedTestList');
    Route::get('publishes_qualifiedtest_result','QualifiedTest\QualifiedTestController@publishesQualifiedTestResult');

});
Route::post('show_qualifiedtest_list','QualifiedTest\QualifiedTestController@showPublishQTList');

Route::post('show_registration_list','ReportController@showRegistrationList');
Route::post('show_exam_list','ReportController@showExamList');


Route::get('show_description','DescriptionController@showDescription');
Route::get('show_requirement','RequirementController@showRequirement');
Route::get('show_membership/{membership_name}','MembershipController@showMembership');
Route::resource('/batch', 'BatchController');
Route::resource('/course', 'CourseController');
Route::get('attend_app_list/{course_code}','ReportController@attendAppList');


//Mentor
// Route::get('mentor_list', 'MentorController@FilterMentor');
// Teacher
// Route::get('teacher_registration', 'TeacherController@FilterTeacher');

// Certificate Controller
Route::get('/certificate/{id}', 'CertificateController\CertificateController@index')->name('certificate');

Route::get('/show_non_audit_firm_info/{id}','ShowNonAuditFirmInfoController@showNonAuditFirmInfo');
Route::get('/show_non_audit_reconnect_info/{id}','ShowNonAuditFirmInfoController@showReconnectNonAuditFirmInfo');

Route::group(['middleware' => 'auth'], function () {
    Route::get('cpa_ff_register_form1', 'CpaController@cpa_ff_registration_form1');
    // Route::get('cpa_ff_registration','CpaController@cpa_ff_registration')->name('cpa_ff_registration');

    // Main Course Controller
    Route::post("/main_course", "CourseController\MainCourseController@store");
    Route::get("/main_course/{id}", "CourseController\MainCourseController@show");
    Route::patch("/main_course/{id}", "CourseController\MainCourseController@update");
    Route::delete("/main_course/{id}", "CourseController\MainCourseController@destory");

    // // DA Application List
    // Route::get('/da_app_indi/{id}', 'DARegisterController@daOneAppListIndi')->name('da_app_indi');
    // Route::get('/student_profile', 'DARegisterController@studentProfile')->name('student_profile');

    // // CPA Application List
    // Route::get('/cpa_app_indi/{id}', 'DARegisterController@cpaOneAppListIndi')->name('cpa_app_indi');

    // // DA Register List
    // Route::get('/da_registration/private_school_reg/{id}', 'StudentRegisterController@privateSchoolReg')->name('private_school_reg');
    // Route::get('/da_registration/mac_reg/{id}', 'StudentRegisterController@macReg')->name('mac_reg');
    // Route::get('/da_registration/self_study_reg/{id}', 'StudentRegisterController@self_study_Reg')->name('self_study_reg');

    // CPA Register List
    
    // offline user
    Route::get('/offline_user', 'OfflineUserController\OfflineUserController@index')->name('offline_user');
    Route::get('/da_cpa_offline_detail', 'OfflineUserController\OfflineUserController@DetailDA_CPAOfflineStudent');

    Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});
