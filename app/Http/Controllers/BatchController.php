<?php

namespace App\Http\Controllers;

use App\Batch;
use Illuminate\Http\Request;

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
        $batch->publish_status  = 1;
        $batch->moodle_course_id= 1;
        $batch->accept_application_date = date('Y-m-d',strtotime($request->acc_app_date));
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
        $batch->publish_status  = 1;
        $batch->moodle_course_id= 1;
        $batch->accept_application_date = date('Y-m-d',strtotime($request->acc_app_date));
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
}
