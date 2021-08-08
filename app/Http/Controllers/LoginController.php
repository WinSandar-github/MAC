<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\StudentInfo;

class LoginController extends Controller
{
    public function loginValidate(Request $request)
    {
       $data = json_decode($request->getContent(), TRUE);
       if(auth()->attempt(['email' => $data['email'], 'password' => $data['password']])) 
       {
            $student = StudentInfo::where(['email' => auth::user()->email, 'password' =>auth::user()->password])->first();

            return response()->json($student,200);
       }
       return response()->json([
           'error' => 'Unauthenticated user',
           'code' => 401,
       ], 401); 
    }  
}

