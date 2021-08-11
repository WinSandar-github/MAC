<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExamRegister;
use App\StudentInfo;
use App\StudentRegister;
use App\StudentCourseReg;
use App\Batch;

class ExamRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exam_registers = ExamRegister::all();
        return response()->json([
            'data' => $exam_registers
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
        
        $student_info_id = $request->student_id;
        $exam_type = StudentRegister::where('student_info_id', $student_info_id)->latest()->get('type');
        $type = $exam_type[0]['type'];
        $batch = StudentCourseReg::where('student_info_id', $student_info_id)->latest()->get('batch_id');
        $batch_id = $batch[0]['batch_id'];
        
        if ($request->hasfile('invoice_image')) 
        {
            $file = $request->file('invoice_image');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/exam_register/',$name);
            $invoice_image = '/storage/exam_register/'.$name;
        }
        $date = date('Y-m-d');
        $invoice_date = date('Y-m-d');
      
        $exam = new ExamRegister();
        $exam->student_info_id = $request->student_id;
        $exam->date = $date;
        $exam->invoice_image = $invoice_image;
        $exam->invoice_date = $invoice_date;
        $exam->private_school_name = $request->private_school_name;
        $exam->grade = 0;
        $exam->batch_id = $batch_id;
        $exam->is_full_module = $request->is_full_module;
        $exam->exam_type_id = $type;
        $exam->form_type = $request->form_type;
        $exam->status = 0;
        $exam->save();

     
        
        return "You have successfully registerd!";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $exam_register = ExamRegister::where('batch_id',$id)->get();
        // return response()->json([
        //     'data' => $exam_register
        // ],200);
        $exam_register = ExamRegister::where('id',$id)->get();
        return response()->json([
            'data' => $exam_register
        ],200);
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

    public function approveExam($id)
    {
        $approve = ExamRegister::find($id);
        $approve->status = 1;
        $approve->save();
        return response()->json([
            'message' => "You have successfully approved that form!"
        ],200);
    }

    public function rejectExam($id)
    {
        $reject = ExamRegister::find($id);
        $reject->status = 2;
        $reject->save();
        return response()->json([
            'message' => "You have successfully rejected that form!"
        ],200);
    }

    public function selectByFormType($id)
    {
        if($id=="all"){
            $exam_register = ExamRegister::with('student_info')->get();
        }
        else 
        {
            $exam_register = ExamRegister::where('batch_id', $id)->with('student_info')->get();
        }
        return response()->json([
            'data' => $exam_register
        ],200);
    }

    public function viewStudent($id)
    {
        $exam_register = ExamRegister::where('id', $id)->with('student_info')->get();
        return response()->json([
            'data' => $exam_register
        ],200);
    }

    public function cpaExamRegister(Request $request)
    {
         
        $student_info_id = $request->student_id;
        $exam_type = StudentRegister::where('student_info_id', $student_info_id)->latest()->get('type');
        $type = $exam_type[0]['type'];
        $batch = StudentCourseReg::where('student_info_id', $student_info_id)->latest()->get('batch_id');
        $batch_id = $batch[0]['batch_id'];
        
       
        // $student_info_id = $request->student_id;        
       
        // $batch_id = StudentCourseReg::where('student_info_id', $student_info_id)->first()->batch_id;
        // $exam_type = Batch::where('id',$batch_id)->first()->course_id;
        
        
   
        if ($request->hasfile('invoice_image')) 
        {
            $file = $request->file('invoice_image');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/exam_register/',$name);
            $invoice_image = '/storage/exam_register/'.$name;
        }
        $date = date('Y-m-d');
        $invoice_date = date('Y-m-d');
      
        $exam = new ExamRegister();
        $exam->student_info_id = $request->student_id;
        $exam->last_ans_exam_no= $request->last_ans_exam_no;
        $exam->last_ans_module = $request->last_ans_module;
        $exam->date = $date;
        $exam->invoice_image = $invoice_image;
        $exam->invoice_date = $invoice_date;
        $exam->private_school_name = $request->private_school_name;
        $exam->grade = 0;
        $exam->batch_id = $batch_id;
        $exam->is_full_module = $request->is_full_module;
        //exam type id mean mac self study private school
        $exam->exam_type_id = $type;
        $exam->form_type = $request->form_type;
        $exam->status = 0;
        $exam->save();

        $student_info = StudentInfo::find($request->student_id);
        $student_info->approve_reject_status  =  3;
        $student_info->save();
        return "You have successfully registerd!";
    }
    
    public function getExamByStudentID($id){
        $exam_register = ExamRegister::where('student_info_id',$id)->with('course')->get();
        
        return response()->json([
            'data' => $exam_register
        ],200);

    }
    public function getExamStatus($id)
    {
        $stu_course_reg = StudentCourseReg::where('student_info_id',$id)->with('batch')->latest()->first();
        $student_register = ExamRegister::where('student_info_id',$id)->where('form_type',$stu_course_reg->batch->course_id)->first();
        
         $status = $student_register != NULL ? $student_register->status : null;
        
        return response()->json($status,200);
    }


    

    public function FilterExamRegister(){
        $student_infos = ExamRegister::with('student_info')->get();
        return response()->json([ 
            'data' => $student_infos
        ],200);
    }

}
