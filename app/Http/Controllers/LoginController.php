<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\StudentInfo;

class LoginController extends Controller
{
    public function loginValidate(Request $request)
    {
        if (Auth::attempt(array('email' => $request->email, 'password' => $request->password)))
        {
                                
            $student=StudentInfo::where(['email' => auth::user()->email, 'password' =>auth::user()->password])->first();
            return $student;
            // return response()->json($student,200);
        }else{
            
        }
    }  
}

