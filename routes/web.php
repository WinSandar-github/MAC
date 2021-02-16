<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Adldap\Laravel\Facades\Adldap;

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

Route::get('/test', 'UserController@index');

Route::get('/', 'HomeController@index')->name('home');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/ldap-search', function(Request $request) {
    try {
        $credentials = $request->only('username');

        $username = $credentials['username'];

        $ldapuser = Adldap::search()->where(env('LDAP_USER_ATTRIBUTE'), '=', $username . "")->first();

        return response()->json($ldapuser);
        
    } catch (\Exception $e) {
        return response()->json(["message" => $e->getMessage()], 200);
    }
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});



