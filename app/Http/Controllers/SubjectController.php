<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;

class SubjectController extends Controller
{
    public function getSubject($course_id)
    {
        $subject = Subject::where('course_id',$course_id)->get();
        return response()->json([
            'data' => $subject
        ],200);
    }
}
