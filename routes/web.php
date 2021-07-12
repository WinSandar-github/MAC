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

Route::get('/ldap-search', function(Request $request) {
    $connection = new Connection([
        'hosts'    => ['ldap.forumsys.com'],
   ]);

   try {
    $connection->connect();

    $user='cn=read-only-admin,dc=example,dc=com';
    $password='password';

    if ($connection->auth()->attempt($user, $password))
    {
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
	
    Route::resource('/degree','DegreeController');
    Route::resource('/course','CourseController');
    Route::resource('/batch','BatchController');

	Route::resource('training', 'TrainingClassController');
	Route::post('training_update/{id}', 'TrainingClassController@update')->name('training_update.update');
	Route::get('training_delete/{id}', 'TrainingClassController@delete')->name('training_delete.delete');
    Route::resource('training_type', 'TrainingTypeController');


    Route::apiResource('lms_accounts', 'MoodleControllers\LmsAccountsController');
    Route::apiResource('account', 'MoodleControllers\AccountCreateController');
    Route::post('account_update/{id}', 'MoodleControllers\AccountCreateController@update')->name('account.update');
    Route::get('account_destroy/{id}', 'MoodleControllers\AccountCreateController@destroy')->name('account.destroy');
    
    Route::get('admin', function() {
        return redirect('/moodle/admin');
    })->name("admin");

    // DA Form Approval
    Route::post('{id}/daapproval', 'ApproveRejectController@update');
    Route::resource('da_approval', 'ApproveRejectController');
});

    Route::group(['middleware' => 'auth'], function () {
        Route::get('cpa_ff_register_form1','CpaController@cpa_ff_registration_form1');
        Route::get('cpa_ff_registration','CpaController@cpa_ff_registration')->name('cpa_ff_registration');
        Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
    });










