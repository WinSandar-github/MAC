<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CpaTwoRegPrivateTrainOld;
class CpaTwoPrivateOldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reg_pri_tra_old = CpaTwoRegPrivateTrainOld::get();
        return response()->json([
            'data' => $reg_pri_tra_old
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
        if ($request->hasfile('photo')) {
            $file = $request->file('photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/',$name);
            $photo = '/storage/'.$name;
         }
        $reg_pri_tra_old = new CpaTwoRegPrivateTrainOld();
        $reg_pri_tra_old->private_training_name =   $request->pri_tra_name;
        $reg_pri_tra_old->academic_year =   $request->aca_year;
        $reg_pri_tra_old->photo         =   $photo;
        $reg_pri_tra_old->name_mm       =   $request->name_mm;
        $reg_pri_tra_old->name_en       =   $request->name_en;
        $reg_pri_tra_old->nrc_state_region = $request->nrc_state_region;
        $reg_pri_tra_old->nrc_township  =   $request->nrc_township;
        $reg_pri_tra_old->nrc_citizen   =   $request->nrc_citizen;
        $reg_pri_tra_old->nrc_number    =   $request->nrc_number;
        $reg_pri_tra_old->father_name_mm=   $request->father_name_mm;
        $reg_pri_tra_old->father_name_en=   $request->father_name_en;
        $reg_pri_tra_old->race_religion=   $request->race_religion;
        $reg_pri_tra_old->birth_date    =   date('Y-m-d',strtotime($request->birth_date));
        $reg_pri_tra_old->education     =   $request->education;
        $reg_pri_tra_old->position      =   $request->position;
        $reg_pri_tra_old->department    =   $request->department;
        $reg_pri_tra_old->office_area   =   $request->office_area;
        $reg_pri_tra_old->civil_servant =   $request->civil_servant;
        $reg_pri_tra_old->address       =   $request->address;
        $reg_pri_tra_old->contact_address   =   $request->contact_address;
        $reg_pri_tra_old->phone         =   $request->phone;
        $reg_pri_tra_old->email         =   $request->email;
        $reg_pri_tra_old->enrol_no_exam    =   $request->enrol_no_exam;
        $reg_pri_tra_old->attendance    =   $request->attendance;
        $reg_pri_tra_old->fail_exam     =   $request->fail_exam;
        $reg_pri_tra_old->resigned      =   $request->resigned;
        $reg_pri_tra_old->batch_session_no  =   $request->batch_session_no;
        $reg_pri_tra_old->save();

        return response()->json([
            'message' => "Insert Successully"
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
        $reg_pri_tra_old = CpaTwoRegPrivateTrainOld::find($id);
        return response()->json([
            'data' => $reg_pri_tra_old
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
        if ($request->hasfile('photo')) {
            $file = $request->file('photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/',$name);
            $photo = '/storage/'.$name;
         }else{
             $photo = $request->old_photo;
         }
        $reg_pri_tra_old = CpaTwoRegPrivateTrainOld::find($id);
        $reg_pri_tra_old->private_training_name =   $request->pri_tra_name;
        $reg_pri_tra_old->academic_year =   $request->aca_year;
        $reg_pri_tra_old->photo         =   $photo;
        $reg_pri_tra_old->name_mm       =   $request->name_mm;
        $reg_pri_tra_old->name_en       =   $request->name_en;
        $reg_pri_tra_old->nrc_state_region = $request->nrc_state_region;
        $reg_pri_tra_old->nrc_township  =   $request->nrc_township;
        $reg_pri_tra_old->nrc_citizen   =   $request->nrc_citizen;
        $reg_pri_tra_old->nrc_number    =   $request->nrc_number;
        $reg_pri_tra_old->father_name_mm=   $request->father_name_mm;
        $reg_pri_tra_old->father_name_en=   $request->father_name_en;
        $reg_pri_tra_old->race_religion=   $request->race_religion;
        $reg_pri_tra_old->birth_date    =   date('Y-m-d',strtotime($request->birth_date));
        $reg_pri_tra_old->education     =   $request->education;
        $reg_pri_tra_old->position      =   $request->position;
        $reg_pri_tra_old->department    =   $request->department;
        $reg_pri_tra_old->office_area   =   $request->office_area;
        $reg_pri_tra_old->civil_servant =   $request->civil_servant;
        $reg_pri_tra_old->address       =   $request->address;
        $reg_pri_tra_old->contact_address   =   $request->contact_address;
        $reg_pri_tra_old->phone         =   $request->phone;
        $reg_pri_tra_old->email         =   $request->email;
        $reg_pri_tra_old->enrol_no_exam    =   $request->enrol_no_exam;
        $reg_pri_tra_old->attendance    =   $request->attendance;
        $reg_pri_tra_old->fail_exam     =   $request->fail_exam;
        $reg_pri_tra_old->resigned      =   $request->resigned;
        $reg_pri_tra_old->batch_session_no  =   $request->batch_session_no;
        $reg_pri_tra_old->save();


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
        $reg_pri_tra_old = CpaTwoRegPrivateTrainOld::find($id);
        $reg_pri_tra_old->delete();
        return response()->json([
            'message' => "Delete Successfully"
        ],200);
    }
}
