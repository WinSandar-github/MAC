<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentInfo;
use App\registration_private_school;

class StudentPrivateSchoolController extends Controller
{
    public function index()
    {
        $student_infos = StudentInfo::with('student_private_school')->get();
        return response()->json([ 'data' => $student_infos],200);
    }
    public function store(Request $request){
        $date=date('Y-m-d');
        $private_school=new registration_private_school();
        $private_school->student_info_id=$request->student_id;
        $private_school->date=$date;
        $private_school->invoice_id=1;
        $private_school->invoice_date=1;
        $private_school->save();
        return "success";
    }
    public function show($id)
    {
        $self_study = StudentInfo::where('id',$id)->with('student_private_school')->get();
        return response()->json([
            'data' => $self_study
        ],200);
        
    }
}
