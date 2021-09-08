<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requirement;

use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class RequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requirements = Requirement::get();
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
        // $requirement->require_exam  =   1;
        // $requirement->course_id     = $request->course_id;
        // $requirement->type     = $request->type;

        $requirement = new Requirement();
        $requirement->requirement_name          = $request->requirement_name;
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
        $requirement = Requirement::find($id);
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
        // $requirement->require_exam  =   1;
        // $requirement->course_id     = $request->course_id;
        // $requirement->type     = $request->type;

        $requirement = Requirement::find($id);
        $requirement->requirement_name          = $request->requirement_name;
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
        // if($request->course_name!="all"){
        //     $requirement=$requirement->where('course_id',$request->course_name);
        // }
        $requirement=$requirement->get();
        return response()->json([
            'data' => $requirement
        ],200);
    }

    public function showRequirement()
    {
        $requirements = Requirement::get();

        return DataTables::of($requirements)
            ->addColumn('action', function ($requirement) {
                return "<div class='btn-group'>
                            <button type='button' class='btn btn-primary btn-xs' onclick='showRequirementInfo($requirement->id)'>
                                <li class='fa fa-edit fa-sm'></li>
                            </button>
                             <button type='button' class='btn btn-danger btn-xs' onclick='deleteRequirementInfo(\"$requirement->requirement_name\",$requirement->id)'>
                                <li class='fa fa-trash fa-sm'></li>
                            </button>
                        </div>";
            })
            ->rawColumns(['action'])
            ->make(true);
    }

   
}
