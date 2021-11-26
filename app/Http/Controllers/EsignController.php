<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Esign;
use App\AccountancyFirmInformation;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class EsignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $esigns = Esign::get();
        return response()->json([
            'data' => $esigns
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
        if ($request->hasfile('esign_file')) {
            $file = $request->file('esign_file');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $esign_file = '/storage/student_info/'.$name;
        }
        $esign = new Esign();
        $esign->name = $request->name;
        $esign->position = $request->position;
        $esign->esign_file = $esign_file;
        $esign->save();
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
        $esign = Esign::find($id);
        return response()->json([
            'data' => $esign
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
        if ($request->hasfile('esign_file')) {
            $file = $request->file('esign_file');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $esign_file= '/storage/student_info/'.$name;
        }else{
            $esign_file=$request->esign_file;
        }
        $esign = Esign::find($id);
        $esign->name = $request->name;
        $esign->position = $request->position;
        $esign->esign_file = $esign_file;
        $esign->save();
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
        $esign = Esign::find($id);
        $esign->delete();
        return response()->json([
            'message' => "Delete Successfully"
        ],200);

    }

    public function FilterEsign(Request $request)
    {
        $esign=Esign::with('course');
        if($request->name!="")
        {
            $esign=$esign->where('name', 'like', '%' . $request->name. '%');
        }
        // if($request->course_name!="all"){
        //     $esign=$esign->where('course_id',$request->course_name);
        // }
        $esign=$esign->get();
        return response()->json([
            'data' => $esign
        ],200);
    }

    public function showEsign()
    {
        $esigns = Esign::get();

        return DataTables::of($esigns)
            ->addColumn('action', function ($esign) {
                return "<div class='btn-group'>
                            <button type='button' class='btn btn-primary btn-xs' onclick='showEsignInfo($esign->id)'>
                                <li class='fa fa-edit fa-sm'></li>
                            </button>
                             <button type='button' class='btn btn-danger btn-xs' onclick='deleteEsignInfo(\"$esign->name\",$esign->id)'>
                                <li class='fa fa-trash fa-sm'></li>
                            </button>
                        </div>";
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function getEsignName()
    {
        $name = Esign::get('name');
        return response()->json([
            'data' => $name
        ], 200);
    }

    public function getEsignPosition()
    {
        $position = Esign::get('position');
        return response()->json([
            'data' => $position
        ], 200);
    }

    public function getEsignId($name)
    {
        $data = Esign::where('name', $name)->first();
        return response()->json([
            'data' => $data
        ], 200);
    }

    public function checkEsignId($id){
        $data = AccountancyFirmInformation::where('id',$id)->get();
        return response()->json([
            'data' => $data
        ], 200);
    }

}
