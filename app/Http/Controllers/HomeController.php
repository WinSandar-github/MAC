<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Membership;
use App\CourseType;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.dashboard');
    }

    public function showDescription($name)
    {      
        if($name == "DA" || $name == "CPA"){       
            $course_desc = CourseType::where('course_code', 'like',  $name.'%')->get();
            return response()->json([
                'data' => $course_desc
            ],200);
        }else{
            $membership_desc = Membership::where('membership_name', 'like', $name. '%')->get();
            return response()->json([
                'data' => $membership_desc
            ],200);
        }
    }

}
