<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CpaOneRegPrivateTrainingNewbie;

class CpaPrivateNewbieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cpa_pri_newbie = CpaOneRegPrivateTrainingNewbie::get();
        return response()->json([
            'data' => $cpa_pri_newbie
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

        $cpa_pri_newbie = new CpaOneRegPrivateTrainingNewbie();
        $cpa_pri_newbie->academic_year =   $request->aca_year;
        $cpa_pri_newbie->private_training_name =   $request->pri_tra_name;
        $cpa_pri_newbie->photo         =   $photo;
        $cpa_pri_newbie->name_mm       =   $request->name_mm;
        $cpa_pri_newbie->name_en       =   $request->name_en;
        $cpa_pri_newbie->nrc_state_region = $request->nrc_state_region;
        $cpa_pri_newbie->nrc_township  =   $request->nrc_township;
        $cpa_pri_newbie->nrc_citizen   =   $request->nrc_citizen;
        $cpa_pri_newbie->nrc_number    =   $request->nrc_number;
        $cpa_pri_newbie->father_name_mm=   $request->father_name_mm;
        $cpa_pri_newbie->father_name_en=   $request->father_name_en;
        $cpa_pri_newbie->race_religion=   $request->race_religion;
        $cpa_pri_newbie->birth_date    =   date('Y-m-d',strtotime($request->birth_date));
        $cpa_pri_newbie->education     =   $request->education;
        $cpa_pri_newbie->position      =   $request->position;
        $cpa_pri_newbie->department    =   $request->department;
        $cpa_pri_newbie->office_region =   $request->office_region;
        $cpa_pri_newbie->civil_servant =   $request->civil_servant;
        $cpa_pri_newbie->address       =   $request->address;
        $cpa_pri_newbie->contact_address   =   $request->contact_address;
        $cpa_pri_newbie->phone         =   $request->phone;
        $cpa_pri_newbie->email         =   $request->email;
        $cpa_pri_newbie->direct_access_no =    $request->dir_access_no;
        $cpa_pri_newbie->entrance_exam_no =   $request->entrance_exam_no;
        $cpa_pri_newbie->save();

        return response()->json([
            'message' => "Inesert Successfully"
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
        $cpa_pri_newbie = CpaOneRegPrivateTrainingNewbie::get();
        return response()->json([
            'data' => $cpa_pri_newbie
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

        $cpa_pri_newbie = CpaOneRegPrivateTrainingNewbie::find($id);
        $cpa_pri_newbie->academic_year =   $request->aca_year;
        $cpa_pri_newbie->private_training_name =   $request->pri_tra_name;
        $cpa_pri_newbie->photo         =   $photo;
        $cpa_pri_newbie->name_mm       =   $request->name_mm;
        $cpa_pri_newbie->name_en       =   $request->name_en;
        $cpa_pri_newbie->nrc_state_region = $request->nrc_state_region;
        $cpa_pri_newbie->nrc_township  =   $request->nrc_township;
        $cpa_pri_newbie->nrc_citizen   =   $request->nrc_citizen;
        $cpa_pri_newbie->nrc_number    =   $request->nrc_number;
        $cpa_pri_newbie->father_name_mm=   $request->father_name_mm;
        $cpa_pri_newbie->father_name_en=   $request->father_name_en;
        $cpa_pri_newbie->race_religion=   $request->race_religion;
        $cpa_pri_newbie->birth_date    =   date('Y-m-d',strtotime($request->birth_date));
        $cpa_pri_newbie->education     =   $request->education;
        $cpa_pri_newbie->position      =   $request->position;
        $cpa_pri_newbie->department    =   $request->department;
        $cpa_pri_newbie->office_region =   $request->office_region;
        $cpa_pri_newbie->civil_servant =   $request->civil_servant;
        $cpa_pri_newbie->address       =   $request->address;
        $cpa_pri_newbie->contact_address   =   $request->contact_address;
        $cpa_pri_newbie->phone         =   $request->phone;
        $cpa_pri_newbie->email         =   $request->email;
        $cpa_pri_newbie->direct_access_no =    $request->dir_access_no;
        $cpa_pri_newbie->entrance_exam_no =   $request->entrance_exam_no;
        $cpa_pri_newbie->save();

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
        $cpa_pri_newbie = CpaOneRegPrivateTrainingNewbie::find($id);
        $cpa_pri_newbie->delete();
        return response()->json([
            'message' => "Delete Successfully"
        ],200);
         
    }
}
