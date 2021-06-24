<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CpaFullForm;
use App\CpaFfFile;
use App\LocalDegree;
use App\ForeignDegree;

use Illuminate\Support\Facades\File; 


class CpaFullFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cpa_full_form = CpaFullForm::with('edu_lvl','local_degree','foreign_degree','cpa_ff_file')->get();
        return response()->json([
            'data' => $cpa_full_form
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
  
        if ($request->hasfile('cpa')) {
           $file = $request->file('cpa');
           $name  = uniqid().'.'.$file->getClientOriginalExtension(); 
           $file->move(public_path().'/storage/cpa_ff/',$name);
           $cpa = '/storage/cpa_ff/'.$name;
        }

       if ($request->hasfile('mpa_mem_card')) {
        $file = $request->file('mpa_mem_card');
        $name  = uniqid().'.'.$file->getClientOriginalExtension(); 
        $file->move(public_path().'/storage/cpa_ff/',$name);
        $mpa_mem_card = '/storage/cpa_ff/'.$name;
        }

        if ($request->hasfile('nrc')) {
            $file = $request->file('nrc');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff/',$name);
            $nrc = '/storage/cpa_ff/'.$name;
        }
        if ($request->hasfile('cdp_record')) {
            $file = $request->file('cdp_record');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff/',$name);
            $cdp_record = '/storage/cpa_ff/'.$name;
        }
        if ($request->hasfile('passport_photo')) {
            $file = $request->file('passport_photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff/',$name);
            $passport_photo = '/storage/cpa_ff/'.$name;
        }
        if ($request->hasfile('certificate')) {
            $file = $request->file('certificate');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff/',$name);
            $certificate = '/storage/cpa_ff/'.$name;
        }

        $cpa_full_form  = new CpaFullForm();
        $cpa_full_form->name = $request->name;
        $cpa_full_form->nrc_state_region    =   $request->nrc_state_region;
        $cpa_full_form->nrc_township        =   $request->nrc_township;
        $cpa_full_form->nrc_citizen         =   $request->nrc_citizen;
        $cpa_full_form->nrc_number          =   $request->nrc_number;
        $cpa_full_form->father_name         =   $request->father_name;
        $cpa_full_form->education_level_id  =   $request->edu_lvl;
        $cpa_full_form->cpa_no              =   $request->cpa_no;
        $cpa_full_form->address             =   $request->address;
        $cpa_full_form->phone               =   $request->phone;
        $cpa_full_form->email               =   $request->email;
        $cpa_full_form->local_degree        =   $request->local_degree;
        $cpa_full_form->foreign_degree      =   $request->foreign_degree;
        $cpa_full_form->save();
 

        $cpa_ff_file = new CpaFfFile();
        $cpa_ff_file->cpa_full_form_id  = $cpa_full_form->id;
        $cpa_ff_file->cpa               = $cpa;
        $cpa_ff_file->mpa_member_card   = $mpa_mem_card;
        $cpa_ff_file->nrc               = $nrc;
        $cpa_ff_file->cdp_record        = $cdp_record;
        $cpa_ff_file->passport_photo    = $passport_photo;
        $cpa_ff_file->save();
        
        
        $local = new LocalDegree();
        $local->cpa_full_form_id  = $cpa_full_form->id;
        $local->year = $request->lyear;
        $local->personal_no = $request->personal_no;
        $local->save();
        
        $foreign = new ForeignDegree();
        $foreign->cpa_full_form_id  = $cpa_full_form->id;
        $foreign->country       = $request->country;
        $foreign->organization  = $request->organization;
        $foreign->year          = $request->fyear;
        $foreign->month         = $request->month;
        $foreign->seat_num      = $request->seat_num;
        $cpa_ff_file->certificate   = $certificate;
            $foreign->save();
        
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
        $cpa_full_form = CpaFullForm::where('id',$id)->with('edu_lvl','local_degree','foreign_degree','cpa_ff_file')->get();
        return response()->json([
            'data' => $cpa_full_form
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
        
        if ($request->hasfile('cpa')) {
            $file = $request->file('cpa');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff/',$name);
            $cpa = '/storage/cpa_ff/'.$name;
         }else{
             $cpa = $request->old_cpa;
         }
 
        if ($request->hasfile('mpa_mem_card')) {
         $file = $request->file('mpa_mem_card');
         $name  = uniqid().'.'.$file->getClientOriginalExtension();
         $file->move(public_path().'/storage/cpa_ff/',$name);
         $mpa_mem_card = '/storage/cpa_ff/'.$name;
         }else{
            $mpa_mem_card = $request->old_mpa_card;


         }
         if ($request->hasfile('nrc')) {
             $file = $request->file('nrc');
             $name  = uniqid().'.'.$file->getClientOriginalExtension();
             $file->move(public_path().'/storage/cpa_ff/',$name);
             $nrc = '/storage/cpa_ff/'.$name;
         }else{
            $nrc = $request->old_nrc;
            
         }
         if ($request->hasfile('cdp_record')) {
             $file = $request->file('cdp_record');
             $name  = uniqid().'.'.$file->getClientOriginalExtension();
             $file->move(public_path().'/storage/cpa_ff/',$name);
             $cdp_record = '/storage/cpa_ff/'.$name;
         }else{
            $cdp_record = $request->old_cdp_record;

         }
         if ($request->hasfile('passport_photo')) {
             $file = $request->file('passport_photo');
             $name  = uniqid().'.'.$file->getClientOriginalExtension();
             $file->move(public_path().'/storage/cpa_ff/',$name);
             $passport_photo = '/storage/cpa_ff/'.$name;
         }else{
            $passport_photo = $request->old_passport_photo;

         }
 
         $cpa_full_form  = CpaFullForm::find($id);
         $cpa_full_form->name = $request->name;
         $cpa_full_form->nrc_state_region    =   $request->nrc_state_region;
         $cpa_full_form->nrc_township        =   $request->nrc_township;
         $cpa_full_form->nrc_citizen         =   $request->nrc_citizen;
         $cpa_full_form->nrc_number          =   $request->nrc_number;
         $cpa_full_form->father_name         =   $request->father_name;
         $cpa_full_form->education_level_id  =   $request->edu_lvl_id;
         $cpa_full_form->cpa_no              =   $request->cpa_no;
         $cpa_full_form->address             =   $request->address;
         $cpa_full_form->phone               =   $request->phone;
         $cpa_full_form->email               =   $request->email;
         $cpa_full_form->local_degree        =   $request->local_degree;
         $cpa_full_form->foreign_degree      =   $request->foreign_degree;
         $cpa_full_form->save();
  
 
         $cpa_ff_file = CpaFfFile::where('cpa_full_form_id',$cpa_full_form->id)->first();
         $cpa_ff_file->cpa_full_form_id  = $cpa_full_form->id;
         $cpa_ff_file->cpa               = $cpa;
         $cpa_ff_file->mpa_member_card   = $mpa_mem_card;
         $cpa_ff_file->nrc               = $nrc;
         $cpa_ff_file->cdp_record        = $cdp_record;
         $cpa_ff_file->passport_photo    = $passport_photo;
       
         $cpa_ff_file->save();
 

 
         if($request->local_degree === "1"){
              
             $local = LocalDegree::where('cpa_full_form_id',$cpa_full_form->id)->first();
             $local->cpa_full_form_id  = $cpa_full_form->id;
             $local->year = $request->year;
             $local->personal_no = $request->personal_no;
             $local->save();
         }
 
 
         if($request->foreign_degree === "1"){
             $foreign = ForeignDegree::where('cpa_full_form_id',$cpa_full_form->id)->first();
             $foreign->cpa_full_form_id  = $cpa_full_form->id;
             $foreign->country       = $request->country;
             $foreign->organization  = $request->organization;
             $foreign->year          = $request->year;
             $foreign->month         = $request->month;
             $foreign->seat_num      = $request->seat_num;
             $foreign->save();
         }
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
        $acc_firm_info = CpaFullForm::find($id);
        LocalDegree::where('cpa_full_form_id',$id)->delete();
        ForeignDegree::where('cpa_full_form_id',$id)->delete();
        LocalDegree::where('cpa_full_form_id',$id)->delete();
        $cpa_ff_file = CpaFfFile::where('cpa_full_form_id',$id)->first();
        
        File::delete(public_path($cpa_ff_file->cpa));
        File::delete(public_path($cpa_ff_file->mpa_member_card));
        File::delete(public_path($cpa_ff_file->nrc));
        File::delete(public_path($cpa_ff_file->cdp_record));
        File::delete(public_path($cpa_ff_file->passport_photo));
        $cpa_ff_file->delete();
        $acc_firm_info->delete();
 
          return response()->json([
            'data' => "Delete Successfuly"
        ],200);  

    }
}
