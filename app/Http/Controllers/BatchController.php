<?php

namespace App\Http\Controllers;

use App\Batch;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Course;
use Illuminate\Database\Eloquent\Builder;



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
        $batch->accept_application_date = date('Y-m-d',strtotime($request->accept_application_date));
        $batch->entrance_pass_start_date      = date('Y-m-d',strtotime($request->entrance_pass_start_date));
        $batch->entrance_pass_end_date       = date('Y-m-d',strtotime($request->entrance_pass_end_date));
        $batch->save();
        return response()->json([
            'message' => "Insert Successfully"
        ],200);
    }
    public function show($id)
    {
        $batches = Batch::where('id',$id)->with('course')->get();
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
        $batch->accept_application_date = date('Y-m-d',strtotime($request->accept_application_date));        
        $batch->entrance_pass_start_date      = date('Y-m-d',strtotime($request->entrance_pass_start_date));
        $batch->entrance_pass_end_date       = date('Y-m-d',strtotime($request->entrance_pass_end_date));
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

    
}
