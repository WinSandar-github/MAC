<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentInfo;
use App\registration_self_study;

class StudentSelfStudyController extends Controller
{
    public function index()
    {
        $student_infos = StudentInfo::with('student_self_study')->get();
        return response()->json([ 'data' => $student_infos],200);
    }
    public function store(Request $request){
        $date=date('Y-m-d');
        foreach($request->reg_reason as $reg_reason){
            $registration_reason[]=$reg_reason;
        }
        $self_study=new registration_self_study();
        $self_study->student_info_id=$request->student_id;
        $self_study->registration_reason=implode(",",$registration_reason);
        $self_study->date=$date;
        $self_study->invoice_id=1;
        $self_study->invoice_date=1;
        $self_study->save();
        return "success";
    }
    public function show($id)
    {
        $self_study = StudentInfo::where('id',$id)->with('student_self_study')->get();
        return response()->json([
            'data' => $self_study
        ],200);
        
    }
}
