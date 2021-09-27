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

    Route::get('attend_app_list/{course_code}','ReportController@attendAppList');
    Route::get('attend_exam_list/{course_code}','ReportController@attendExamList');
    Route::get('exam_result_list/{course_code}','ReportController@examResultList');
    Route::get('current_entry_exam_list/{course_code}','ReportController@currentEntryExamList');




    Route::get('membership_edit/{id}','MembershipController@membership_edit');

    Route::get('entry_exam_detail/{id}','EntryExamController@entryExamDetail');
    Route::get('entry_exam_result','EntryExamController@entryExamResult');
    Route::get('entry_exam_result_detail/{id}','EntryExamController@entryExamResultDetail');


});
Route::post('show_registration_list','ReportController@showRegistrationList');
Route::post('show_exam_list','ReportController@showExamList');

Route::get('show_description','DescriptionController@showDescription');
Route::get('show_requirement','RequirementController@showRequirement');
Route::get('show_membership/{membership_name}','MembershipController@showMembership');

Route::resource('/batch', 'BatchController');
Route::resource('/course', 'CourseController');

//Mentor
// Route::get('mentor_list', 'MentorController@FilterMentor');
// Teacher
// Route::get('teacher_registration', 'TeacherController@FilterTeacher');


Route::get('/show_non_audit_firm_info/{id}','ShowNonAuditFirmInfoController@showNonAuditFirmInfo');

Route::group(['middleware' => 'auth'], function () {
    Route::get('cpa_ff_register_form1', 'CpaController@cpa_ff_registration_form1');
    // Route::get('cpa_ff_registration','CpaController@cpa_ff_registration')->name('cpa_ff_registration');
    Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);

    // Main Course Controller
    Route::post("/main_course", "CourseController\MainCourseController@store");
    Route::get("/main_course/{id}", "CourseController\MainCourseController@show");
    Route::patch("/main_course/{id}", "CourseController\MainCourseController@update");
    Route::delete("/main_course/{id}", "CourseController\MainCourseController@destory");
});
