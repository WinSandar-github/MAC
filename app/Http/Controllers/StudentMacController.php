<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentInfo;
use App\registration_mac;

class StudentMacController extends Controller
{
    public function index()
    {
        $student_infos = StudentInfo::with('student_mac')->get();
        return response()->json([ 'data' => $student_infos],200);
    }
    public function store(Request $request){
        $date=date('Y-m-d');
        $mac=new registration_mac();
        $mac->student_info_id=$request->student_id;
        $mac->date=$date;
        $mac->invoice_id=1;
        $mac->invoice_date=1;
        $mac->save();
        return "success";
    }
    public function show($id)
    {
        $self_study = StudentInfo::where('id',$id)->with('student_mac')->get();
        return response()->json([
            'data' => $self_study
        ],200);
        
    }
}
