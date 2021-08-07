<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SchoolRegister;
use App\StudentInfo;
use Hash;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $school = SchoolRegister::orderBy('created_at','desc')->get();
        return  response()->json([
            'data' => $school
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
        $school = new SchoolRegister();
        $school->name_mm = $request->name_mm;
        $school->name_eng = $request->name_eng;
        $school->father_name_mm = $request->father_name_mm;
        $school->father_name_eng = $request->father_name_eng;
        $school->date_of_birth = date('y-m-d', strtotime($request->dob));
        $school->degree = $request->degree;
        $school->address = $request->address;
        $school->phone = $request->phone;
        $school->email = $request->email;
        $school->password = $request->password;
        $school->nrc_state_region = $request->nrc_state_region;
        $school->nrc_township = $request->nrc_township;
        $school->nrc_citizen = $request->nrc_citizen;
        $school->nrc_number = $request->nrc_number;
        $school_type = "";
        foreach($request->school_type as $type){
            $school_type = $school_type.$type.',';
           
        }
        $school->type = rtrim($school_type, ',');
        $school->save();
        if($request->hasFile('attachment')){
            $fileName = $school->id.'.'.$request->file('attachment')->getClientOriginalExtension();
            $request->file('attachment')->storeAs('attachment/school/', $fileName);
            $school->attachment=$fileName;
            $school->save();
        }
        //Student Info
        $std_info = new StudentInfo();
        $std_info->school_id = $school->id;
        $std_info->email = $request->email;
        $std_info->password = Hash::make($request->password);
        $std_info->save();
 
        return response()->json([
            'message' => 'Success Registration.'
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
        $school = SchoolRegister::find($id);
        return  response()->json([
            'data' => $school
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

    public function approve_school_register(Request $request, $id)
    {
        $school = SchoolRegister::find($id);
        $school->approve_reject_status = 1;
        $school->save();
        return response()->json([
            'message' => 'You have approved this user.'
        ],200);
    }

    public function reject_school_register(Request $request, $id)
    {
        $school = SchoolRegister::find($id);
        $school->approve_reject_status = 2;
        $school->save();
        return response()->json([
            'message' => 'You have rejected this user.'
        ],200);
    }
}
