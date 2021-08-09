<?php

namespace App\Http\Controllers;

use Auth;
use App\StudentInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
    public function mobileLogin(Request $request){
        $user = StudentInfo::where('email', '=', $request->email)->first();
        if($user){
            if(Hash::check('INPUT PASSWORD', $user->password) == true){
                return response()->json($user,200);
            }
            else{
                return response()->json([
                    'error' => 'Unauthenticated user',
                    'code' => 401,
                ], 401); 
            }
        }
        else{
            return response()->json([
                'error' => 'Unauthenticated user',
                'code' => 401,
            ], 401); 
        }
    }
}

