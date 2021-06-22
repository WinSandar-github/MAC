<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CpaOneRegPrivateTrainingOld;
use Illuminate\Support\Facades\File; 



class CpaPrivateOldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cpa_pri_old = CpaOneRegPrivateTrainingOld::get();
        return response()->json([
            'data' => $cpa_pri_old
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
            $file->move(public_path().'/storage/cpa_one/',$name);
            $photo = '/storage/cpa_one/'.$name;
         }

        
        $cpa_pri_old = new CpaOneRegPrivateTrainingOld();
        $cpa_pri_old->academic_year =   $request->aca_year;
        $cpa_pri_old->private_training_name =   $request->pri_tra_name;
        $cpa_pri_old->photo         =   $photo;
        $cpa_pri_old->name_mm       =   $request->name_mm;
        $cpa_pri_old->name_en       =   $request->name_en;
        $cpa_pri_old->nrc_state_region = $request->nrc_state_region;
        $cpa_pri_old->nrc_township  =   $request->nrc_township;
        $cpa_pri_old->nrc_citizen   =   $request->nrc_citizen;
        $cpa_pri_old->nrc_number    =   $request->nrc_number;
        $cpa_pri_old->father_name_mm=   $request->father_name_mm;
        $cpa_pri_old->father_name_en=   $request->father_name_en;
        $cpa_pri_old->race_religion=   $request->race_religion;
        $cpa_pri_old->birth_date    =   date('Y-m-d',strtotime($request->birth_date));
        $cpa_pri_old->education     =   $request->education;
        $cpa_pri_old->position      =   $request->position;
        $cpa_pri_old->department    =   $request->department;
        $cpa_pri_old->office_region =   $request->office_region;
        $cpa_pri_old->civil_servant =   $request->civil_servant;
        $cpa_pri_old->address       =   $request->address;
        $cpa_pri_old->contact_address   =   $request->contact_address;
        $cpa_pri_old->phone         =   $request->phone;
        $cpa_pri_old->email         =   $request->email;
        $cpa_pri_old->enrol_no_exam =    $request->enrol_no_exam;
        $cpa_pri_old->attendance    =   $request->attendance;
        $cpa_pri_old->fail_exam     =   $request->fail_exam;
        $cpa_pri_old->resigned      =   $request->resigned;
        $cpa_pri_old->batch_session_no    =   $request->batch_session_no;
        $cpa_pri_old->save();

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
        $cpa_pri_old = CpaOneRegPrivateTrainingOld::find($id);
        return response()->json([
            'data' => $cpa_pri_old
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
            File::delete(public_path($cpa_pri_old->photo));
            $file = $request->file('photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension(); 
             $file->move(public_path().'/storage/cpa_one/',$name);
            $photo = '/storage/cpa_one/'.$name;
         }else{
             $photo = $request->old_photo;
         }

        
        $cpa_pri_old = CpaOneRegPrivateTrainingOld::find($id);
        $cpa_pri_old->academic_year =   $request->aca_year;
        $cpa_pri_old->private_training_name =   $request->pri_tra_name;
        $cpa_pri_old->photo         =   $photo;
        $cpa_pri_old->name_mm       =   $request->name_mm;
        $cpa_pri_old->name_en       =   $request->name_en;
        $cpa_pri_old->nrc_state_region = $request->nrc_state_region;
        $cpa_pri_old->nrc_township  =   $request->nrc_township;
        $cpa_pri_old->nrc_citizen   =   $request->nrc_citizen;
        $cpa_pri_old->nrc_number    =   $request->nrc_number;
        $cpa_pri_old->father_name_mm=   $request->father_name_mm;
        $cpa_pri_old->father_name_en=   $request->father_name_en;
        $cpa_pri_old->race_religion=   $request->race_religion;
        $cpa_pri_old->birth_date    =   date('Y-m-d',strtotime($request->birth_date));
        $cpa_pri_old->education     =   $request->education;
        $cpa_pri_old->position      =   $request->position;
        $cpa_pri_old->department    =   $request->department;
        $cpa_pri_old->office_region =   $request->office_region;
        $cpa_pri_old->civil_servant =   $request->civil_servant;
        $cpa_pri_old->address       =   $request->address;
        $cpa_pri_old->contact_address   =   $request->contact_address;
        $cpa_pri_old->phone         =   $request->phone;
        $cpa_pri_old->email         =   $request->email;
        $cpa_pri_old->enrol_no_exam =    $request->enrol_no_exam;
        $cpa_pri_old->attendance    =   $request->attendance;
        $cpa_pri_old->fail_exam     =   $request->fail_exam;
        $cpa_pri_old->resigned      =   $request->resigned;
        $cpa_pri_old->batch_session_no    =   $request->batch_session_no;
        $cpa_pri_old->save();

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
        $cpa_pri_old = CpaOneRegPrivateTrainingOld::find($id);
        File::delete(public_path($cpa_pri_old->photo));

        $cpa_pri_old->delete();
        return response()->json([
            'message' => "Delete Successfully"
        ],200);
    }
}
