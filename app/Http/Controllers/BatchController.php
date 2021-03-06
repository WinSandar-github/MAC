<?php

namespace App\Http\Controllers;

use App\Batch;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Course;
use Illuminate\Database\Eloquent\Builder;
use App\StudentCourseReg;
use App\ExamRegister; 

use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;


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
        $batch->name                = $request->name;
        $batch->name_mm             = $request->name_mm;
        $batch->number              = $request->number;
        $batch->course_id           = $request->course_id;
        $batch->acdm_year_start_date        = date('Y-m-d',strtotime($request->acdm_year_start_date));
        $batch->acdm_year_end_date          = date('Y-m-d',strtotime($request->acdm_year_end_date));
        $batch->start_date                  = date('Y-m-d',strtotime($request->start_date));
        $batch->end_date                    = date('Y-m-d',strtotime($request->end_date));
        $batch->mac_reg_start_date          = date('Y-m-d',strtotime($request->mac_reg_start_date));
        $batch->mac_reg_end_date            = date('Y-m-d',strtotime($request->mac_reg_end_date));
        $batch->self_reg_start_date         = date('Y-m-d',strtotime($request->self_reg_start_date));
        $batch->self_reg_end_date           = date('Y-m-d',strtotime($request->self_reg_end_date));
        $batch->private_reg_start_date      = date('Y-m-d',strtotime($request->private_reg_start_date));
        $batch->private_reg_end_date        = date('Y-m-d',strtotime($request->private_reg_end_date));
        $batch->private_reg_start_date      = date('Y-m-d',strtotime($request->private_reg_start_date));
        $batch->private_reg_end_date        = date('Y-m-d',strtotime($request->private_reg_end_date));
        $batch->exam_start_date             = date('Y-m-d',strtotime($request->exam_start_date));
        $batch->exam_end_date               = date('Y-m-d',strtotime($request->exam_end_date));
        $batch->publish_status              = 1;
        $batch->moodle_course_id            = 1;
        $batch->accept_application_start_date   = date('Y-m-d',strtotime($request->accept_application_start_date));
        $batch->accept_application_end_date     = date('Y-m-d',strtotime($request->accept_application_end_date));
        $batch->entrance_pass_start_date        =empty($request->entrance_pass_start_date)? null: date('Y-m-d',strtotime($request->entrance_pass_start_date));
        $batch->entrance_pass_end_date          = empty($request->entrance_pass_end_date)? null: date('Y-m-d',strtotime($request->entrance_pass_end_date));
        $batch->save();
        return response()->json([
            'message' => "Insert Successfully"
        ],200);
    }
    public function show($id)
    {
        $batches = Batch::where('id',$id)->with('course','exams')->first();
        return response()->json([
            'data'  => $batches
        ]);
    }

    public function LoadBatchForOfflineStudent($id)
    {
        $batches = Batch::where('id',$id)->with('course','exams')->first();
        return response()->json([
            'data'  => $batches
        ]);
    }
    
    public function edit($id)
    {
    }
        
    public function update(Request $request, $id)
    {
        $batch = Batch::find($id);
        $batch->name            = $request->name;
        $batch->name_mm           = $request->name_mm;
        $batch->number           = $request->number;
        $batch->course_id       = $request->course_id;
        $batch->acdm_year_start_date        = date('Y-m-d',strtotime($request->acdm_year_start_date));
        $batch->acdm_year_end_date          = date('Y-m-d',strtotime($request->acdm_year_end_date));
        $batch->start_date                  = date('Y-m-d',strtotime($request->start_date));
        $batch->end_date                    = date('Y-m-d',strtotime($request->end_date));
        $batch->mac_reg_start_date          = date('Y-m-d',strtotime($request->mac_reg_start_date));
        $batch->mac_reg_end_date            = date('Y-m-d',strtotime($request->mac_reg_end_date));
        $batch->self_reg_start_date         = date('Y-m-d',strtotime($request->self_reg_start_date));
        $batch->self_reg_end_date           = date('Y-m-d',strtotime($request->self_reg_end_date));
        $batch->private_reg_start_date      = date('Y-m-d',strtotime($request->private_reg_start_date));
        $batch->private_reg_end_date        = date('Y-m-d',strtotime($request->private_reg_end_date));
        $batch->exam_start_date = date('Y-m-d',strtotime($request->exam_start_date));
        $batch->exam_end_date   = date('Y-m-d',strtotime($request->exam_end_date));
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

    public function currentAttendBatch($student_id){
        $student_course = StudentCourseReg::where('student_info_id',$student_id)->with('batch')->latest()->first();
         $batch = Batch::where('id',$student_course->batch_id)->with('course')->first();
        return response()->json([
            'data' => $batch
        ]);
    }
    
    public function FilterBatch(Request $request){
        $batches = Batch::with('course');
        if($request->name!="" )
        {
            $batches = $batches->where('name', 'like', '%' . $request->name. '%');
        }
        if($request->course_name!="all"){
            $batches=$batches->where('course_id',$request->course_name);
        }
        if($request->start_date!=""){
            $s_date=date('Y-m-d',strtotime($request->start_date));
            $batches=$batches->where('start_date','>=',$s_date);
        }
        if($request->end_date!=""){
            $e_date=date('Y-m-d',strtotime($request->end_date));
            $batches=$batches->where('end_date','<=',$e_date);
        }
        $batches=$batches->orderBy('id','desc')->get();
        return DataTables::of($batches)
        ->addColumn('action', function ($batch) {
            // if(Carbon::now() >= $batch->start_date){
            //     return "<div class='btn-group'>
            //                 <button type='button' class='btn btn-primary btn-xs' onClick='showBatchExam($batch->id)'>
            //                     <li class='fa fa-graduation-cap fa-sm'></li>
            //                 </button> 
            //             </div>";
            // }else{
                return 
                "<div class='btn-group'>
                    
                    <button type='button' id='batch_edit.$batch->id' class='btn btn-primary btn-xs' onClick='showBatchInfo($batch->id)'>
                        <li class='fa fa-edit fa-sm'></li>
                    </button> 
                    <button type='button'  id='batch_delete.$batch->id'  class='btn btn-danger btn-xs' onClick='deleteBatchInfo(\"$batch->name\", $batch->id)'>
                    <li class='fa fa-trash fa-sm' ></li >
                    </button >
                </div >"
                ;
                 
            // }
        })
        ->addColumn('entry_start_date', function ($batch){
            if($batch->entrance_pass_start_date == null){
                return "-";
            }else{
                return  $batch->entrance_pass_start_date;
            }
        })
        ->addColumn('entry_end_date', function ($batch){
            if($batch->entrance_pass_end_date == null){
                return "-";
            }else{
                return  $batch->entrance_pass_end_date;
            }
        })
        ->make(true);
    }

    public function getCurrentBatch($course_id)
    {
        $current_date = date('Y,m,d');
        $batch = Batch::where('course_id',$course_id)->where('end_date','<',$current_date)->get();
        return response()->json([
            'data' => $batch
        ],200);
    }

    public function getPassedBatch($course_id)
    {
        $current_date = date('Y,m,d');
        
        $batch = Batch::where('course_id',$course_id)
                        ->where('end_date','<',$current_date)->get();

        return response()->json([
            'data' => $batch
        ],200);
    }

     public function getBatch($course_id)
    {
        $batch = Batch::where('course_id',$course_id)->get();
        return response()->json([
            'data' => $batch
        ],200);
    }
}    