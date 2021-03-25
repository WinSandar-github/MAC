<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Adldap\Models\User;
use LdapRecord\Connection;

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

Auth::routes([
    'reset' => false,
    'verify' => false,
    'register' => false,
]);

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::get('training', ['as' => 'training.index', 'uses' => 'TrainingClassController@index']);
	Route::get('user_register', 'UserRegisterController@index');
//	Route::get('student_record', 'StudentRecordController@index');
//	Route::post('student_record', 'StudentRecordController@store');
	Route::apiResource('student_record', 'StudentRecordController');
	Route::apiResource('user_register', 'UserRegisterController');
	Route::apiResource('registered_user_list', 'RegisterUserListController');
	Route::post('registered_list/{id}', 'RegisterUserListController@user_update')->name('registered_list.user_update');
	Route::resource('batch', 'BatchController');
	Route::post('batch_update/{id}', 'BatchController@update')->name('batch_update.update');
	Route::get('batch_delete/{id}', 'BatchController@destroy')->name('batch_delete.destroy');

	Route::resource('training', 'TrainingClassController');
	Route::post('training_update/{id}', 'TrainingClassController@update')->name('training_update.update');
	Route::get('training_delete/{id}', 'TrainingClassController@delete')->name('training_delete.delete');
    Route::resource('training_type', 'TrainingTypeController');
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});
