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
        // $data = json_decode($request->getContent(), TRUE);
        //    if(auth()->attempt(['email' => $request->password, 'password' => $request->password])) 
        //    {
            
                  // $student = StudentInfo::where(['email' => auth::user()->email, 'password' =>auth::user()->password])->first();
      
                  // return response()->json($student,200);
      
          //    }
       
    $user = StudentInfo::where('email', '=', $request->email)->with('mentor','accountancy_firm','school','teacher')->first();
      

    if($user){
     
       
        if(Hash::check($request->password, $user->password)){
            
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

