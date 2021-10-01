<?php

namespace App\Http\Controllers;

use App\Exam;
use Illuminate\Http\Request;
use App\ExamType;

use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::with('course','batch')->get();
     
        return response()->json([
            'data'  => $exams
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'exam_start_date' => 'required',
            'exam_end_date' => 'required',
        ]);

        $exam = new Exam;
        $exam->batch_id           = $request->batch_id;
        $exam->course_id          =  $request->course_id;
        $exam->exam_type_id       =  $request->exam_type_id; 
        $exam->exam_start_date    =  $request->exam_start_date;
        $exam->exam_end_date      =  $request->exam_end_date;
        $exam->exam_start_time    =  $request->exam_start_time;
        $exam->exam_end_time      =  $request->exam_end_time;
        $exam->exam_place         =  $request->exam_place;
        if($exam->save()){
            return response()->json(['message' => "Insert Successfully"],200);
        }else{
            return response()->json(['message' => "Error While Data Save!"], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exam = Exam::find($id);
        return response()->json([
            'data' => $exam
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
           
            'exam_start_date' => 'required',
            'exam_end_date' => 'required',
        ]);        
        $exam = Exam::find($id);
        $exam->batch_id           = $request->batch_id;
        $exam->course_id       =  $request->course_id;
        $exam->exam_type_id       =  $request->exam_type_id;
        $exam->exam_start_date      =  $request->exam_start_date;
        $exam->exam_end_date        =  $request->exam_end_date;
        $exam->exam_start_time      =  $request->exam_start_time;
        $exam->exam_end_time        =  $request->exam_end_time;
        $exam->exam_place      =  $request->exam_place;
        
        $exam->save();
        return response()->json([
            'message' => "Update Successfully"
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        $exam = Exam::find($id);
        return response()->json([
            'messagse' => 'Delete Successfully'
        ],200);
    }

    public function FilterExam(Request $request){
        $exams = Exam::with('course','batch');
        
        $exams=$exams->get();
        return DataTables::of($exams)
        ->addColumn('action', function ($exam) {
             
            return    "<div class='btn-group'>
                    
                    <button type='button' id='exam_edit.$exam->id' class='btn btn-primary btn-xs' onClick='showExamInfo($exam->id)'>
                        <li class='fa fa-edit fa-sm'></li>
                    </button> 
                    <button type='button'  id='exam_delete.$exam->id'  class='btn btn-danger btn-xs' onClick='deleteExamInfo($exam->id)'>
                    <li class='fa fa-trash fa-sm' ></li >
                    </button >
                </div >"
                ;
                 
            
        })
       
        ->make(true);
    }

    public function getExamType()
    {
        $exam_types = ExamType::get();
        return response()->json([
            'data' => $exam_types
        ],200);
    }
}
