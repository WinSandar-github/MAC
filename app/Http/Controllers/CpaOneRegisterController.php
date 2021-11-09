<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CpaOneRegister;
use Illuminate\Support\Facades\File; 

class CpaOneRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cpa_one_reg = CpaOneRegister::with('module')->get();
         return response()->json([
            'data' => $cpa_one_reg
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
        return $request ;
        if ($request->hasfile('photo')) {
            $file = $request->file('photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_one/',$name);
            $photo = '/storage/cpa_one/'.$name;
         }

         if ($request->hasfile('good_morale')) {
            $file = $request->file('good_morale');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_one/',$name);
            $good_morale = '/storage/cpa_one/'.$name;
            }
    
            if ($request->hasfile('no_crime')) {
                $file = $request->file('no_crime');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/cpa_one/',$name);
                $no_crime = '/storage/cpa_one/'.$name;
            }


       
        $cpa_one_reg = new CpaOneRegister();
        $cpa_one_reg->academic_year =   $request->aca_year;
        $cpa_one_reg->photo         =   $photo;
        $cpa_one_reg->name_mm       =   $request->name_mm;
        $cpa_one_reg->name_en       =   $request->name_en;
        $cpa_one_reg->nrc_state_region = $request->nrc_state_region;
        $cpa_one_reg->nrc_township  =   $request->nrc_township;
        $cpa_one_reg->nrc_citizen   =   $request->nrc_citizen;
        $cpa_one_reg->nrc_number    =   $request->nrc_number;
        $cpa_one_reg->race_religion =   $request->race_religion;
        $cpa_one_reg->father_name_mm=   $request->father_name_mm;
        $cpa_one_reg->father_name_en=   $request->father_name_en;
        $cpa_one_reg->race_religion =   $request->race_religion;
        $cpa_one_reg->birth_date    =   date('Y-m-d',strtotime($request->birth_date));
        $cpa_one_reg->education     =   $request->education;
        $cpa_one_reg->position      =   $request->position;
        $cpa_one_reg->department    =   $request->department;
        $cpa_one_reg->office_area   =   $request->office_area;
        $cpa_one_reg->civil_servant =   $request->civil_servant;
        $cpa_one_reg->address       =   $request->address;
        $cpa_one_reg->phone         =   $request->phone;
        $cpa_one_reg->email         =   $request->email;
        $cpa_one_reg->direct_access_no =$request->dir_access_no;
        $cpa_one_reg->entry_success_no =$request->entry_success_no;
        $cpa_one_reg->gov_department=   $request->gov_department;
        $cpa_one_reg->personal_acc_training =   $request->per_acc_training;
        $cpa_one_reg->after_second_exam     =   $request->after_sec_exam;
        $cpa_one_reg->good_morale_file      =   $good_morale;
        $cpa_one_reg->no_crime_file         =   $no_crime;
        $cpa_one_reg->module_id     =   $request->module_id;
        $cpa_one_reg->save();

        //invoice        
        $invoice = new Invoice();
        $std_info = StudentInfo::where('email', '=', $cpa_one_reg->email)->first();

        $invoice->student_info_id = $std_info->id;        
        $invoice->name_eng        = $std_info->name_eng;
        $invoice->email           = $std_info->email;
        $invoice->phone           = $std_info->phone;
        
        $std = StudentCourseReg::with('batch')->where("student_info_id", $std_info->id)->latest()->first();

        $invoice->invoiceNo = 'reg_' . $std->batch->course->code ;
        $invoice->productDesc     = 'AppFee,TransFee' . $std->batch->course->name;
        $invoice->amount          = $std->batch->course->form_fee . ',1000';
        $invoice->status          = 0;
        $invoice->save();
        
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
        $cpa_one_reg = CpaOneRegister::where('id',$id)->with('module')->get();
        return $cpa_one_reg;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        
        
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
        $cpa_one_reg = CpaOneRegister::find($id);
        
        if ($request->hasfile('photo')) {
            File::delete(public_path($cpa_one_reg->photo));  

            $file = $request->file('photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_one/',$name);
            $photo = '/storage/cpa_one/'.$name;
         }else{
             $photo = $request->old_photo;
         }

        if ($request->hasfile('good_morale')) {
            File::delete(public_path($cpa_one_reg->good_morale_file));
            $file = $request->file('good_morale');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_one/',$name);
            $good_morale = '/storage/cpa_one/'.$name;
        }else{
            $good_morale = $request->old_good_morale;
        }

        if ($request->hasfile('no_crime')) {
            File::delete(public_path($cpa_one_reg->no_crime_file));
            $file = $request->file('no_crime');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_one/',$name);
            $no_crime = '/storage/cpa_one/'.$name;
        }else{
            $no_crime = $request->old_no_crime;
        }

        $cpa_one_reg->academic_year =   $request->aca_year;
        $cpa_one_reg->photo         =   $photo;
        $cpa_one_reg->name_mm       =   $request->name_mm;
        $cpa_one_reg->name_en       =   $request->name_en;
        $cpa_one_reg->nrc_state_region = $request->nrc_state_region;
        $cpa_one_reg->nrc_township  =   $request->nrc_township;
        $cpa_one_reg->nrc_citizen   =   $request->nrc_citizen;
        $cpa_one_reg->nrc_number    =   $request->nrc_number;
        $cpa_one_reg->father_name_mm=   $request->father_name_mm;
        $cpa_one_reg->father_name_en=   $request->father_name_en;
        $cpa_one_reg->race_religion =   $request->race_religion;
        $cpa_one_reg->birth_date    =   date('Y-m-d',strtotime($request->birth_date));
        $cpa_one_reg->education     =   $request->education;
        $cpa_one_reg->position      =   $request->position;
        $cpa_one_reg->department    =   $request->department;
        $cpa_one_reg->office_area   =   $request->office_area;
        $cpa_one_reg->civil_servant =   $request->civil_servant;
        $cpa_one_reg->address       =   $request->address;
        $cpa_one_reg->phone         =   $request->phone;
        $cpa_one_reg->email         =   $request->email;
        $cpa_one_reg->direct_access_no =$request->dir_access_no;
        $cpa_one_reg->entry_success_no =$request->entry_success_no;
        $cpa_one_reg->gov_department=   $request->gov_department;
        $cpa_one_reg->personal_acc_training =   $request->per_acc_training;
        $cpa_one_reg->after_second_exam     =   $request->after_sec_exam;
        $cpa_one_reg->good_morale_file      =   $good_morale;
        $cpa_one_reg->no_crime_file         =   $no_crime;
        $cpa_one_reg->module_id     =   $request->module_id;
        $cpa_one_reg->save();

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
        $cpa_one_reg = CpaOneRegister::find($id);
   
        File::delete(public_path($cpa_one_reg->photo));  
        File::delete(public_path($cpa_one_reg->good_morale_file));
        File::delete(public_path($cpa_one_reg->no_crime_file));
    
         $cpa_one_reg->delete();
         return response()->json([
            'message' => "Delete Successfully"
        ],200);

    }

   
}
