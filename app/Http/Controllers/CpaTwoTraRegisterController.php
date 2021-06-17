<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CpaTwoTrainRegister;

class CpaTwoTraRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CpaTwoTrainRegister::get();
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
            $name  = $file->getClientOriginalName();
            $file->move(public_path().'/storage/',$name);
            $photo = '/storage/'.$name;
         }

         

      
        $cpa_two_tra_reg = new CpaTwoTrainRegister();
        $cpa_two_tra_reg->academic_year =   $request->aca_year;
        $cpa_two_tra_reg->photo         =   $photo;
        $cpa_two_tra_reg->name_mm       =   $request->name_mm;
        $cpa_two_tra_reg->name_en       =   $request->name_en;
        $cpa_two_tra_reg->nrc_state_region = $request->nrc_state_region;
        $cpa_two_tra_reg->nrc_township  =   $request->nrc_township;
        $cpa_two_tra_reg->nrc_citizen   =   $request->nrc_citizen;
        $cpa_two_tra_reg->nrc_number    =   $request->nrc_number;
        $cpa_two_tra_reg->race_religion =   $request->race_religion;
        $cpa_two_tra_reg->father_name_mm=   $request->father_name_mm;
        $cpa_two_tra_reg->father_name_en=   $request->father_name_en;
        $cpa_two_tra_reg->birth_date    =   date('Y-m-d',strtotime($request->birth_date));
        $cpa_two_tra_reg->education     =   $request->education;
        $cpa_two_tra_reg->position      =   $request->position;
        $cpa_two_tra_reg->department    =   $request->department;
        $cpa_two_tra_reg->office_area   =   $request->office_area;
        $cpa_two_tra_reg->civil_servant =   $request->civil_servant;
        $cpa_two_tra_reg->address       =   $request->address;
        $cpa_two_tra_reg->contact_address   =   $request->contact_address;
        $cpa_two_tra_reg->phone         =   $request->phone;
        $cpa_two_tra_reg->email         =   $request->email;
        $cpa_two_tra_reg->cpa_one_pass_time     =   $request->cpa_one_pass_time;
        $cpa_two_tra_reg->cpa_one_personal_no   =   $request->cpa_one_personal_no;
        $cpa_two_tra_reg->save();

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
        $cpa_two_tra_reg = CpaTwoTrainRegister::find($id);
        return $cpa_two_tra_reg;
        
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
            $name  = $file->getClientOriginalName();
            $file->move(public_path().'/storage/',$name);
            $photo = '/storage/'.$name;
         }else{
             $photo = $request->old_photo;
         }

         

      
        $cpa_two_tra_reg = CpaTwoTrainRegister::find($id);
        $cpa_two_tra_reg->academic_year =   $request->aca_year;
        $cpa_two_tra_reg->photo         =   $photo;
        $cpa_two_tra_reg->name_mm       =   $request->name_mm;
        $cpa_two_tra_reg->name_en       =   $request->name_en;
        $cpa_two_tra_reg->nrc_state_region = $request->nrc_state_region;
        $cpa_two_tra_reg->nrc_township  =   $request->nrc_township;
        $cpa_two_tra_reg->nrc_citizen   =   $request->nrc_citizen;
        $cpa_two_tra_reg->nrc_number    =   $request->nrc_number;
        $cpa_two_tra_reg->race_religion =   $request->race_religion;
        $cpa_two_tra_reg->father_name_mm=   $request->father_name_mm;
        $cpa_two_tra_reg->father_name_en=   $request->father_name_en;
        $cpa_two_tra_reg->birth_date    =   date('Y-m-d',strtotime($request->birth_date));
        $cpa_two_tra_reg->education     =   $request->education;
        $cpa_two_tra_reg->position      =   $request->position;
        $cpa_two_tra_reg->department    =   $request->department;
        $cpa_two_tra_reg->office_area   =   $request->office_area;
        $cpa_two_tra_reg->civil_servant =   $request->civil_servant;
        $cpa_two_tra_reg->address       =   $request->address;
        $cpa_two_tra_reg->contact_address   =   $request->contact_address;
        $cpa_two_tra_reg->phone         =   $request->phone;
        $cpa_two_tra_reg->email         =   $request->email;
        $cpa_two_tra_reg->cpa_one_pass_time     =   $request->cpa_one_pass_time;
        $cpa_two_tra_reg->cpa_one_personal_no   =   $request->cpa_one_personal_no;
        $cpa_two_tra_reg->save();

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
        $cpa_two_tra_reg = CpaTwoTrainRegister::find($id);
        $cpa_two_tra_reg->delete();
        return "Delete Successfully";
        
    }
}
