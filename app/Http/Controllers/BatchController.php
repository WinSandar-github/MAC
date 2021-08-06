<?php

namespace App\Http\Controllers;

use App\Batch;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Course;
use Illuminate\Database\Eloquent\Builder;
use App\StudentCourseReg;
 


class BatchController extends Controller
{
    public function index()
    {
        $batches = Batch::with('course')->get();
         return response()->json([
            'data'  => $batches
        ]);
    }
    public function create()
    {
       
    }
    public function store(Request $request)
    {            
        $request->validate([
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);        
        $batch = new Batch;
        $batch->name            = $request->name;
        $batch->course_id       = $request->course_id;
        $batch->start_date      = date('Y-m-d',strtotime($request->start_date));
        $batch->end_date        = date('Y-m-d',strtotime($request->end_date));
        $batch->mac_reg_start_date      = date('Y-m-d',strtotime($request->mac_reg_start_date));
        $batch->mac_reg_end_date        = date('Y-m-d',strtotime($request->mac_reg_end_date));
        $batch->self_reg_start_date      = date('Y-m-d',strtotime($request->self_reg_start_date));
        $batch->self_reg_end_date        = date('Y-m-d',strtotime($request->self_reg_end_date));
        $batch->private_reg_start_date      = date('Y-m-d',strtotime($request->private_reg_start_date));
        $batch->private_reg_end_date        = date('Y-m-d',strtotime($request->private_reg_end_date));
        $batch->publish_status  = 1;
        $batch->moodle_course_id= 1;
        $batch->accept_application_start_date = date('Y-m-d',strtotime($request->accept_application_start_date));
        $batch->accept_application_end_date = date('Y-m-d',strtotime($request->accept_application_end_date));
        $batch->entrance_pass_start_date      =empty($request->entrance_pass_start_date)? null: date('Y-m-d',strtotime($request->entrance_pass_start_date));
        $batch->entrance_pass_end_date       = empty($request->entrance_pass_end_date)? null: date('Y-m-d',strtotime($request->entrance_pass_end_date));
        $batch->save();
        return response()->json([
            'message' => "Insert Successfully"
        ],200);
    }
    public function show($id)
    {
        $batches = Batch::where('id',$id)->with('course')->first();
        return response()->json([
            'data'  => $batches
        ]);return $batch;

        
    }
    public function edit($id)
    {
    }
        
    public function update(Request $request, $id)
    {
        $batch = Batch::find($id);
        $batch->name            = $request->name;
        $batch->course_id       = $request->course_id;
        $batch->start_date      = date('Y-m-d',strtotime($request->start_date));
        $batch->end_date        = date('Y-m-d',strtotime($request->end_date));
        $batch->mac_reg_start_date      = date('Y-m-d',strtotime($request->mac_reg_start_date));
        $batch->mac_reg_end_date        = date('Y-m-d',strtotime($request->mac_reg_end_date));
        $batch->self_reg_start_date      = date('Y-m-d',strtotime($request->self_reg_start_date));
        $batch->self_reg_end_date        = date('Y-m-d',strtotime($request->self_reg_end_date));
        $batch->private_reg_start_date      = date('Y-m-d',strtotime($request->private_reg_start_date));
        $batch->private_reg_end_date        = date('Y-m-d',strtotime($request->private_reg_end_date));
        $batch->publish_status  = 1;
        $batch->moodle_course_id= 1;
        $batch->accept_application_start_date = date('Y-m-d',strtotime($request->accept_application_start_date));  
        $batch->accept_application_end_date = date('Y-m-d',strtotime($request->accept_application_end_date));              
        $batch->entrance_pass_start_date      =empty($request->entrance_pass_start_date)? null: date('Y-m-d',strtotime($request->entrance_pass_start_date));
        $batch->entrance_pass_end_date       = empty($request->entrance_pass_end_date)? null: date('Y-m-d',strtotime($request->entrance_pass_end_date));
        $batch->save();
        return response()->json([
            'message' => "Update Successfully"
        ],200);

     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $batch = Batch::find($id);
        $batch->delete();

        return response()->json([
            'message' => "Delete Successfully"
        ],200);   
    }

    public function publish_batch($course_type_id)
    {
        
        $currentDate = Carbon::today();
        
      
        $course = Course::where('course_type_id',$course_type_id)
         ->with('course_type','active_batch')
        ->get();
                        
        return response()->json([
            'course' => $course
        ],200);
    }

    public function saveExam(Request $request){
        $batch = Batch::find($request->batch_id);
        $batch->exam_start_date = $request->exam_start_date;
        $batch->exam_end_date   = $request->exam_end_date;
        $batch->exam_place   = $request->exam_place;
        $batch->exam_time   = $request->exam_time;
        $batch->save();
        return response()->json([
            'message' => "Exam Data Added Successfully"
        ],200);
    }

    public function getExam($student_id)
    {
      
        
        $student_course = StudentCourseReg::where('student_info_id',$student_id)->with('batch')->latest()->first();
        $exam_start_date = $student_course->batch->exam_start_date;
        $exam_previous_month = Carbon::createFromFormat('Y-m-d', $exam_start_date)->subMonth();
        $currentDate = Carbon::now();
         
        if($exam_previous_month <= $currentDate && $exam_start_date > $currentDate ){
            $data = Batch::where('id',$student_course->batch->id)->with('course')->first();
        }else{
            $data = null;
        }
        return $data;

        
    }
}    