<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requirement;

class RequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requirements = Requirement::with('course')->get();
        return response()->json([
            'data' => $requirements
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requirement = new Requirement();
        $requirement->name          = $request->name;
        $requirement->require_exam  =   1;
        $requirement->course_id     = $request->course_id;
        $requirement->save();
        return response()->json([
            'message' => "Insert Successfully"
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requirement = Requirement::where('id',$id)->with('course')->get();
        return response()->json([
            'data' => $requirement
        ],200);
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
        $requirement = Requirement::find($id);
        $requirement->name          = $request->name;
        $requirement->require_exam  =   1;
        $requirement->course_id     = $request->course_id;
        $requirement->save();
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
        $requirement = Requirement::find($id);
        $requirement->delete();
        return response()->json([
            'message' => "Delete Successfully"
        ],200);

    }

    public function FilterRequirement(Request $request)
    {
        $requirement=Requirement::with('course');
        if($request->name!="")
        {
            $requirement=$requirement->where('name', 'like', '%' . $request->name. '%');
        }
        if($request->course_name!="all"){
            $requirement=$requirement->where('course_id',$request->course_name);
        }
        $requirement=$requirement->get();
        return response()->json([
            'data' => $requirement
        ],200);
    }
}
