<?php

namespace App\Http\Controllers\MoodleControllers;

use App\Http\Controllers\Controller;
use App\MoodleModel\MdlUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AccountCreateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function timeStamp() {
        return Carbon::now()->toArray()["timestamp"];
    }

    public function index()
    {
        return view('pages.lms_account_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mdl_user = new MdlUser();
        //$mdl_user->timestamps = false;
        $mdl_user->username = $request->username;
        $mdl_user->auth = $request->auth;
        $mdl_user->confirmed = 1;
        $mdl_user->suspended = ($request->suspended) ? 1 : 0;
        if ( $request->firstname != null ) {
            $mdl_user->firstname = $request->firstname;
        }
        if ( $request->lastname != null ) {
            $mdl_user->lastname = $request->lastname;
        }
        $mdl_user->email = $request->email;
        $mdl_user->password = Hash::make($request->password);
        $mdl_user->mnethostid = 1;
        $mdl_user->timezone = "Asia/Yangon";
        $mdl_user->timecreated = $this->timeStamp();
        $mdl_user->timemodified = $this->timeStamp();
        
        $saved = $mdl_user->save();

        if ( $saved ) {
            return redirect()->route('lms_accounts.index')->with('success','New Account Created Successfully.');
        } else {
            return back()->withInput()->with('error', 'Error Creating Account.Please Check.');
        }   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MoodleModel\MdlUser  $mdlUser
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_by_id = MdlUser::find($id);

        return view('pages.lms_accounts_edit', compact('user_by_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MoodleModel\MdlUser  $mdlUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MdlUser $mdlUser)
    {
        $mdl_user = MdlUser::find($request->id);
        $mdl_user->username = $request->username;
        $mdl_user->auth = $request->auth;
        $mdl_user->confirmed = 1;
        $mdl_user->suspended = ($request->suspended) ? 1 : 0;
        if ( $request->firstname != null ) {
            $mdl_user->firstname = $request->firstname;
        }
        if ( $request->lastname != null ) {
            $mdl_user->lastname = $request->lastname;
        }
        $mdl_user->email = $request->email;
        if ( $request->password != null ) {
            $mdl_user->password = Hash::make($request->password);
        }
        $mdl_user->mnethostid = 1;
        $mdl_user->timezone = "Asia/Yangon";
        //$mdl_user->timecreated = $this->timeStamp();
        $mdl_user->timemodified = $this->timeStamp();

        $saved = $mdl_user->save();

        if ( $saved ) {
            return redirect()->route('lms_accounts.index')->with('success','Account Updated Successfully.');
        } else {
            return back()->withInput()->with('error', 'Error Creating Account.Please Check.');
        }  
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MoodleModel\MdlUser  $mdlUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return "Not Actually Delete The Data. Just Testing Route";
    }
}
