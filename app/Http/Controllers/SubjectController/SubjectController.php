<?php

namespace App\Http\Controllers\SubjectController;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Subject;
use DB;
class SubjectController extends Controller
{
    public function getSubject(Request $request)
    {
        if($request->course_id){
            $subject = DB::table('subjects')->join('courses', 'courses.id','=', 'subjects.course_id')
            ->select('courses.id', 'courses.code', 'subjects.subject_name', 'subjects.id as subject_id')
            ->where('courses.course_type_id',$request->course_id)
            ->get();
    
            $group = $subject->groupBy('code')->toArray();
    
            return response()->json([
                'data' => $group
            ],200);
        }
        else{
            $subject = DB::table('subjects')->join('courses', 'courses.id','=', 'subjects.course_id')
            ->select('courses.id', 'courses.code','courses.cpa_subject_fee','courses.da_subject_fee', 'subjects.subject_name', 'subjects.id as subject_id')
            ->where('subjects.id',$request->subject_id)
            ->get();
    
            $group = $subject->groupBy('code')->toArray();
            
            return response()->json([
                'data' => $subject,
                'group_data'=>$group
            ],200);
        }
        
    }
    
}
