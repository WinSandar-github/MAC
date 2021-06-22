<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CpaOneRegSelfLearner;
use Illuminate\Support\Facades\File; 


class CpaOneRegSelfLearnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cpa_one_self_learner = CpaOneRegSelfLearner::with('module')->get();
        return response()->json([
            'data' => $cpa_one_self_learner
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
            $file->move(public_path().'/storage/cpa_one/',$name);
            $photo = '/storage/cpa_one/'.$name;
         }
        $cpa_one_self_learner = new CpaOneRegSelfLearner();
        $cpa_one_self_learner->academic_year =   $request->aca_year;
        $cpa_one_self_learner->photo         =   $photo;
        $cpa_one_self_learner->name_mm       =   $request->name_mm;
        $cpa_one_self_learner->name_en       =   $request->name_en;
        $cpa_one_self_learner->nrc_state_region = $request->nrc_state_region;
        $cpa_one_self_learner->nrc_township  =   $request->nrc_township;
        $cpa_one_self_learner->nrc_citizen   =   $request->nrc_citizen;
        $cpa_one_self_learner->nrc_number    =   $request->nrc_number;
        $cpa_one_self_learner->father_name_mm=   $request->father_name_mm;
        $cpa_one_self_learner->father_name_en=   $request->father_name_en;
        $cpa_one_self_learner->race_religion=   $request->race_religion;
        $cpa_one_self_learner->birth_date    =   date('Y-m-d',strtotime($request->birth_date));
        $cpa_one_self_learner->education     =   $request->education;
        $cpa_one_self_learner->position      =   $request->position;
        $cpa_one_self_learner->department    =   $request->department;
        $cpa_one_self_learner->office_area   =   $request->office_area;
        $cpa_one_self_learner->civil_servant =   $request->civil_servant;
        $cpa_one_self_learner->address       =   $request->address;
        $cpa_one_self_learner->contact_address   =   $request->contact_address;
        $cpa_one_self_learner->phone         =   $request->phone;
        $cpa_one_self_learner->email         =   $request->email;
        $cpa_one_self_learner->direct_access =   $request->dir_access;
        $cpa_one_self_learner->direct_access_no =    $request->dir_access_no;
        $cpa_one_self_learner->entrance_exam_no =   $request->entrance_exam_no;
        $cpa_one_self_learner->enrol_no_exam    =   $request->enrol_no_exam;
        $cpa_one_self_learner->attendance    =   $request->attendance;
        $cpa_one_self_learner->fail_exam     =   $request->fail_exam;
        $cpa_one_self_learner->resigned      =   $request->resigned;
        $cpa_one_self_learner->batch_session_no  =   $request->batch_session_no;
         $cpa_one_self_learner->module_id     =   $request->module_id;
        $cpa_one_self_learner->save();

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
        $cpa_one_self_learner = CpaOneRegSelfLearner::where('id',$id)->with('module')->get();
        return response()->json([
            'data' => $cpa_one_self_learner
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
        $cpa_one_self_learner = CpaOneRegSelfLearner::find($id);
        if ($request->hasfile('photo')) {
            File::delete(public_path($cpa_one_self_learner->photo));
            
            $file = $request->file('photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/',$name);
            $photo = '/storage/'.$name;
         }else{
             $photo = $request->old_photo;
         }
         $cpa_one_self_learner->academic_year =   $request->aca_year;
        $cpa_one_self_learner->photo         =   $photo;
        $cpa_one_self_learner->name_mm       =   $request->name_mm;
        $cpa_one_self_learner->name_en       =   $request->name_en;
        $cpa_one_self_learner->nrc_state_region = $request->nrc_state_region;
        $cpa_one_self_learner->nrc_township  =   $request->nrc_township;
        $cpa_one_self_learner->nrc_citizen   =   $request->nrc_citizen;
        $cpa_one_self_learner->nrc_number    =   $request->nrc_number;
        $cpa_one_self_learner->father_name_mm=   $request->father_name_mm;
        $cpa_one_self_learner->father_name_en=   $request->father_name_en;
        $cpa_one_self_learner->race_religion=   $request->race_religion;
        $cpa_one_self_learner->birth_date    =   date('Y-m-d',strtotime($request->birth_date));
        $cpa_one_self_learner->education     =   $request->education;
        $cpa_one_self_learner->position      =   $request->position;
        $cpa_one_self_learner->department    =   $request->department;
        $cpa_one_self_learner->office_area   =   $request->office_area;
        $cpa_one_self_learner->civil_servant =   $request->civil_servant;
        $cpa_one_self_learner->address       =   $request->address;
        $cpa_one_self_learner->contact_address   =   $request->contact_address;
        $cpa_one_self_learner->phone         =   $request->phone;
        $cpa_one_self_learner->email         =   $request->email;
        $cpa_one_self_learner->direct_access =   $request->dir_access;
        $cpa_one_self_learner->direct_access_no =    $request->dir_access_no;
        $cpa_one_self_learner->entrance_exam_no =   $request->entrance_exam_no;
        $cpa_one_self_learner->enrol_no_exam    =   $request->enrol_no_exam;
        $cpa_one_self_learner->attendance    =   $request->attendance;
        $cpa_one_self_learner->fail_exam     =   $request->fail_exam;
        $cpa_one_self_learner->resigned      =   $request->resigned;
        $cpa_one_self_learner->batch_session_no  =   $request->batch_session_no;
         $cpa_one_self_learner->module_id     =   $request->module_id;
        $cpa_one_self_learner->save();

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
        $cpa_one_self_learner = CpaOneRegSelfLearner::find($id);
        File::delete(public_path($cpa_one_self_learner->photo));

        $cpa_one_self_learner->delete();
        return response()->json([
            'message' => "Delete Successfully"
        ],200);
    }
}
