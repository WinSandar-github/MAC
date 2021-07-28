<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentInfo;
use App\ExamResult;
use App\ExamRegister;

class ExamResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exam_results = StudentInfo::with('exam_result')->get();
        return response()->json([ 
            'data' => $exam_results
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $std_data = ExamRegister::where('batch_id',$request->batch_id)->get('student_info_id');
        $student_info_id = $std_data[0]['student_info_id'];
        $reg_data = ExamRegister::where('batch_id',$request->batch_id)->get('id');
        $registeration_id = $reg_data[0]['id'];

        foreach($request->subject_name as $subject_name){
            $sub_name[] = $subject_name;
        }
        foreach($request->mark as $mark){
            $marks[] = $mark;
        }
        foreach($request->grade as $grade){
            $gd[] = $grade;
        }

        $date = date('Y-m-d');
        $exam_result = new ExamResult();
        $exam_result->student_info_id  = $student_info_id;
        $exam_result->registeration_id = $registeration_id;
        $exam_result->subject_name     = implode(",", $sub_name);
        $exam_result->mark             = implode(",", $marks);
        $exam_result->grade            = implode(",", $gd);
        $exam_result->date             = $date;
        $exam_result->save();

        return response()->json($exam_result,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
