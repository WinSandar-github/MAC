<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Description;

use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class DescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $descriptions = Description::get();
        return response()->json([
            'data' => $descriptions
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
        // $description->require_exam  =   1;
        // $description->course_id     = $request->course_id;
        // $description->type     = $request->type;
         
        $description = new Description();
        $description->description_name          = $request->description_name;
        $description->save();
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
        $description = Description::find($id);
        return response()->json([
            'data' => $description
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
        // $description->require_exam  =   1;
        // $description->course_id     = $request->course_id;
        // $description->type     = $request->type;

        $description = Description::find($id);
        $description->description_name          = $request->description_name;
        $description->save();
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
        $description = Description::find($id);
        $description->delete();
        return response()->json([
            'message' => "Delete Successfully"
        ],200);

    }

    public function showDescription()
    {
        $descriptions = Description::get();

        return DataTables::of($descriptions)
            ->addColumn('action', function ($description) {
                return "<div class='btn-group'>
                            <button type='button' class='btn btn-primary btn-xs' onclick='showDescription($description->id)'>
                                <li class='fa fa-edit fa-sm'></li>
                            </button>
                             <button type='button' class='btn btn-danger btn-xs' onclick='deleteDescription($description->id)'>
                                <li class='fa fa-trash fa-sm'></li>
                            </button>
                        </div>";
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}