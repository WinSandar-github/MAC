<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CpaOneTrainingAddmissionDirect;

class CpaTraAddmissionDirectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CpaOneTrainingAddmissionDirect::get();
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

        
        $cpa_tra_add_direct = new CpaOneTrainingAddmissionDirect();
        
        $cpa_tra_add_direct->photo         =   $photo;
        $cpa_tra_add_direct->name          =   $request->name;
        $cpa_tra_add_direct->nrc_state_region = $request->nrc_state_region;
        $cpa_tra_add_direct->nrc_township  =   $request->nrc_township;
        $cpa_tra_add_direct->nrc_citizen   =   $request->nrc_citizen;
        $cpa_tra_add_direct->nrc_number    =   $request->nrc_number;
        $cpa_tra_add_direct->father_name   =   $request->father_name;
        $cpa_tra_add_direct->race_religion =   $request->race_religion;
        $cpa_tra_add_direct->birth_date    =   date('Y-m-d',strtotime($request->birth_date));
        $cpa_tra_add_direct->address       =   $request->address;
        $cpa_tra_add_direct->contact_address   =   $request->contact_address;
        $cpa_tra_add_direct->telephone         =   $request->phone;
        $cpa_tra_add_direct->email         =   $request->email;
        $cpa_tra_add_direct->occupation    =   $request->occupation;
        $cpa_tra_add_direct->position      =   $request->position;
        $cpa_tra_add_direct->organization  =   $request->organization;
        $cpa_tra_add_direct->salary        =   $request->salary;
        $cpa_tra_add_direct->office_address=   $request->office_address;
        $cpa_tra_add_direct->civil_servant =   $request->civil_servant;
        $cpa_tra_add_direct->degree        =   $request->degree;
        $cpa_tra_add_direct->university    =   $request->university;
        $cpa_tra_add_direct->major         =   $request->major;
        $cpa_tra_add_direct->graduation_time  =   $request->graduation_time;
        $cpa_tra_add_direct->seat_no      =   $request->seat_no;
        $cpa_tra_add_direct->diplo_second_pass_year     =   $request->diplo_sec_pass_year;
        $cpa_tra_add_direct->diplo_second_pass_month    =   $request->diplo_sec_pass_month;
        $cpa_tra_add_direct->diplo_second_pass_seat_no  =   $request->diplo_sec_pass_seat_no;
        $cpa_tra_add_direct->training_ground_id =   $request->training_ground_id;
        $cpa_tra_add_direct->acca          =   $request->acca;
        $cpa_tra_add_direct->cima          =   $request->cima;
        $cpa_tra_add_direct->acca_cima_pass_level        =   $request->acca_cima_pass_level;
        $cpa_tra_add_direct->acca_cima_exam_year         =   $request->acca_cima_exam_year;
        $cpa_tra_add_direct->acca_cima_exam_month        =   $request->acca_cima_exam_month;
        $cpa_tra_add_direct->acca_cima_reg_no            =   $request->acca_cima_reg_no;
        $cpa_tra_add_direct->save();

        return "Save Succssfully";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cpa_tra_add_direct = CpaOneTrainingAddmissionDirect::find($id);
        return $cpa_tra_add_direct;

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

        
        $cpa_tra_add_direct = CpaOneTrainingAddmissionDirect::find($id);
        $cpa_tra_add_direct->photo         =   $photo;
        $cpa_tra_add_direct->name          =   $request->name;
        $cpa_tra_add_direct->nrc_state_region = $request->nrc_state_region;
        $cpa_tra_add_direct->nrc_township  =   $request->nrc_township;
        $cpa_tra_add_direct->nrc_citizen   =   $request->nrc_citizen;
        $cpa_tra_add_direct->nrc_number    =   $request->nrc_number;
        $cpa_tra_add_direct->father_name   =   $request->father_name;
        $cpa_tra_add_direct->race_religion =   $request->race_religion;
        $cpa_tra_add_direct->birth_date    =   date('Y-m-d',strtotime($request->birth_date));
        $cpa_tra_add_direct->address       =   $request->address;
        $cpa_tra_add_direct->contact_address   =   $request->contact_address;
        $cpa_tra_add_direct->telephone         =   $request->phone;
        $cpa_tra_add_direct->email         =   $request->email;
        $cpa_tra_add_direct->occupation    =   $request->occupation;
        $cpa_tra_add_direct->position      =   $request->position;
        $cpa_tra_add_direct->organization  =   $request->organization;
        $cpa_tra_add_direct->salary        =   $request->salary;
        $cpa_tra_add_direct->office_address=   $request->office_address;
        $cpa_tra_add_direct->civil_servant =   $request->civil_servant;
        $cpa_tra_add_direct->degree        =   $request->degree;
        $cpa_tra_add_direct->university    =   $request->university;
        $cpa_tra_add_direct->major         =   $request->major;
        $cpa_tra_add_direct->graduation_time  =   $request->graduation_time;
        $cpa_tra_add_direct->seat_no      =   $request->seat_no;
        $cpa_tra_add_direct->diplo_second_pass_year     =   $request->diplo_sec_pass_year;
        $cpa_tra_add_direct->diplo_second_pass_month    =   $request->diplo_sec_pass_month;
        $cpa_tra_add_direct->diplo_second_pass_seat_no  =   $request->diplo_sec_pass_seat_no;
        $cpa_tra_add_direct->training_ground_id =   $request->training_ground_id;
        $cpa_tra_add_direct->acca          =   $request->acca;
        $cpa_tra_add_direct->cima          =   $request->cima;
        $cpa_tra_add_direct->acca_cima_pass_level        =   $request->acca_cima_pass_level;
        $cpa_tra_add_direct->acca_cima_exam_year         =   $request->acca_cima_exam_year;
        $cpa_tra_add_direct->acca_cima_exam_month        =   $request->acca_cima_exam_month;
        $cpa_tra_add_direct->acca_cima_reg_no            =   $request->acca_cima_reg_no;
        $cpa_tra_add_direct->save();

        return "Save Succssfully";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $cpa_tra_add_direct = CpaOneTrainingAddmissionDirect::find($id);
        $cpa_tra_add_direct->delete();
        return "Delete Successfully";

    }
}
