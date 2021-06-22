<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CpaOneTrainingAddmissionWithExam;

class CpaTraAddmissionExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cpa_tra_add_exam = CpaOneTrainingAddmissionWithExam::get();
        return response()->json([
            'data' => $cpa_tra_add_exam
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
        if($request->hasfile('photo')) {
            $file = $request->file('photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/',$name);
            $photo = '/storage/'.$name;
         }

        
        $cpa_tra_add_exam = new CpaOneTrainingAddmissionWithExam();
        $cpa_tra_add_exam->photo         =   $photo;
        $cpa_tra_add_exam->name          =   $request->name;
        $cpa_tra_add_exam->nrc_state_region = $request->nrc_state_region;
        $cpa_tra_add_exam->nrc_township  =   $request->nrc_township;
        $cpa_tra_add_exam->nrc_citizen   =   $request->nrc_citizen;
        $cpa_tra_add_exam->nrc_number    =   $request->nrc_number;
        $cpa_tra_add_exam->father_name   =   $request->father_name;
        $cpa_tra_add_exam->race_religion =   $request->race_religion;
        $cpa_tra_add_exam->birth_date    =   date('Y-m-d',strtotime($request->birth_date));
        $cpa_tra_add_exam->address       =   $request->address;
        $cpa_tra_add_exam->contact_address   =   $request->contact_address;
        $cpa_tra_add_exam->telephone         =   $request->phone;
        $cpa_tra_add_exam->email         =   $request->email;
        $cpa_tra_add_exam->occupation    =   $request->occupation;
        $cpa_tra_add_exam->position      =   $request->position;
        $cpa_tra_add_exam->organization  =   $request->organization;
        $cpa_tra_add_exam->salary        =   $request->salary;
        $cpa_tra_add_exam->office_address=   $request->office_address;
        $cpa_tra_add_exam->civil_servant =   $request->civil_servant;
        $cpa_tra_add_exam->degree        =   $request->degree;
        $cpa_tra_add_exam->university    =   $request->university;
        $cpa_tra_add_exam->major         =   $request->major;
        $cpa_tra_add_exam->graduation_time  =   $request->graduation_time;
        $cpa_tra_add_exam->seat_no      =   $request->seat_no;
        $cpa_tra_add_exam->save();

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
        $cpa_tra_add_exam = CpaOneTrainingAddmissionWithExam::find($id);
        return response()->json([
            'data' => $cpa_tra_add_exam
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
        if($request->hasfile('photo')) {
            $file = $request->file('photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/',$name);
            $photo = '/storage/'.$name;
         }else{
            $photo = $request->old_photo;
         }

        
        $cpa_tra_add_exam = CpaOneTrainingAddmissionWithExam::find($id);
        $cpa_tra_add_exam->photo         =   $photo;
        $cpa_tra_add_exam->name          =   $request->name;
        $cpa_tra_add_exam->nrc_state_region = $request->nrc_state_region;
        $cpa_tra_add_exam->nrc_township  =   $request->nrc_township;
        $cpa_tra_add_exam->nrc_citizen   =   $request->nrc_citizen;
        $cpa_tra_add_exam->nrc_number    =   $request->nrc_number;
        $cpa_tra_add_exam->father_name   =   $request->father_name;
        $cpa_tra_add_exam->race_religion =   $request->race_religion;
        $cpa_tra_add_exam->birth_date    =   date('Y-m-d',strtotime($request->birth_date));
        $cpa_tra_add_exam->address       =   $request->address;
        $cpa_tra_add_exam->contact_address   =   $request->contact_address;
        $cpa_tra_add_exam->telephone         =   $request->phone;
        $cpa_tra_add_exam->email         =   $request->email;
        $cpa_tra_add_exam->occupation    =   $request->occupation;
        $cpa_tra_add_exam->position      =   $request->position;
        $cpa_tra_add_exam->organization  =   $request->organization;
        $cpa_tra_add_exam->salary        =   $request->salary;
        $cpa_tra_add_exam->office_address=   $request->office_address;
        $cpa_tra_add_exam->civil_servant =   $request->civil_servant;
        $cpa_tra_add_exam->degree        =   $request->degree;
        $cpa_tra_add_exam->university    =   $request->university;
        $cpa_tra_add_exam->major         =   $request->major;
        $cpa_tra_add_exam->graduation_time  =   $request->graduation_time;
        $cpa_tra_add_exam->seat_no      =   $request->seat_no;
        $cpa_tra_add_exam->save();

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
        $cpa_tra_add_exam = CpaOneTrainingAddmissionWithExam::find($id);
        $cpa_tra_add_exam->delete();
        return response()->json([
            'message' => "Delete Successfully"
        ],200);
    }
}
