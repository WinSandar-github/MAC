<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CpaOneRegistration;
use Illuminate\Support\Facades\File; 

class CpaOneRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cpa_one_reg = CpaOneRegistration::with('module')->get();
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
        $data = CpaOneRegistration::where('nrc_state_region', '=', $request['nrc_state_region'])
        ->where('nrc_township', '=', $request['nrc_township'])
        ->where('nrc_citizen', '=', $request['nrc_citizen'])
        ->where('nrc_number', '=', $request['nrc_number'])
        ->first();
        if($data)
        {
            return "NRC has been used, please check again!";
        }
        if ($request->hasfile('photo')) {
            $file = $request->file('photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_one/',$name);
            $photo = '/storage/cpa_one/'.$name;
         }
         else{
            $photo=null;
         }

         if ($request->hasfile('good_morale')) {
            $file = $request->file('good_morale');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_one/',$name);
            $good_morale = '/storage/cpa_one/'.$name;
            }
            else{
                $good_morale=null;
            }
    
            if ($request->hasfile('no_crime')) {
                $file = $request->file('no_crime');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/cpa_one/',$name);
                $no_crime = '/storage/cpa_one/'.$name;
            }
            else{
                $no_crime=null;
            }

           


       
        $cpa_one_reg = new CpaOneRegistration();
        $cpa_one_reg->private_school_name =   $request->private_school_name;
        $cpa_one_reg->academic_year =   $request->academic_year;
        $cpa_one_reg->photo         =   $photo;
        $cpa_one_reg->name_mm       =   $request->name_mm;
        $cpa_one_reg->name_en       =   $request->name_en;
        $cpa_one_reg->nrc_state_region = $request->nrc_state_region;
        $cpa_one_reg->nrc_township  =   $request->nrc_township;
        $cpa_one_reg->nrc_citizen   =   $request->nrc_citizen;
        $cpa_one_reg->nrc_number    =   $request->nrc_number;
        $cpa_one_reg->race =   $request->race;
        $cpa_one_reg->religion =   $request->religion;
        $cpa_one_reg->father_name_mm=   $request->father_name_mm;
        $cpa_one_reg->father_name_en=   $request->father_name_en;
        $cpa_one_reg->birth_date    =   date('Y-m-d',strtotime($request->birth_date));
        $cpa_one_reg->education     =   $request->education;
        $cpa_one_reg->position      =   $request->position;
        $cpa_one_reg->department    =   $request->department;
        $cpa_one_reg->office_area   =   $request->office_area;
        $cpa_one_reg->civil_servant =   $request->civil_servant;
        $cpa_one_reg->address       =   $request->address;
        $cpa_one_reg->current_address       =   $request->current_address;
        $cpa_one_reg->phone         =   $request->phone;
        $cpa_one_reg->email         =   $request->email;
        $cpa_one_reg->direct_access_no =$request->direct_access_no;
        $cpa_one_reg->entry_success_no =$request->entry_success_no;
        $cpa_one_reg->gov_department=   $request->gov_department;
        $cpa_one_reg->personal_acc_training =   $request->personal_acc_training;
        $cpa_one_reg->after_second_exam     =   $request->after_second_exam;
        $cpa_one_reg->good_morale_file      =   $good_morale;
        $cpa_one_reg->no_crime_file         =   $no_crime;
        $cpa_one_reg->module_id     =   $request->module_id;
        $cpa_one_reg->enrol_no_exam     =   $request->enrol_no_exam;
        $cpa_one_reg->attendance     =   $request->attendance;
        $cpa_one_reg->fail_exam     =   $request->fail_exam;
        $cpa_one_reg->resigned     =   $request->resigned;
        $cpa_one_reg->batch_session_no     =   $request->batch_session_no;
        $cpa_one_reg->entrance_part     =   $request->entrance_part;
        $cpa_one_reg->entrance_exam_no     =   $request->entrance_exam_no;
        $cpa_one_reg->cpa_one_type     =   $request->cpa_one_type;
        $cpa_one_reg->status           =  0;
        $cpa_one_reg->save();
        
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
        $cpa_one_reg = CpaOneRegistration::where('id',$id)->with('module')->get();
        return $cpa_one_reg;
    }

    public function GetCPAOneByNRC(Request $request)
    {
        $data = CpaOneRegistration::where('nrc_state_region', '=', $request['nrc_state_region'])
        ->where('nrc_township', '=', $request['nrc_township'])
        ->where('nrc_citizen', '=', $request['nrc_citizen'])
        ->where('nrc_number', '=', $request['nrc_number'])
        ->first();
        return response()->json([
            'data' => $data
        ],200);
        
    }

    public function approve($id)
    {
        
        $approve = CpaOneRegistration::find($id);
        $approve->status = 1;
        $approve->save();
        return response()->json([
            'message' => "You have successfully approved that user!"
        ],200);
    }

    public function reject($id)
    {
        $cpa_ff = CpaOneRegistration::find($id);
        $cpa_ff->status = 2;
        $cpa_ff->save();
        return response()->json([
            'message' => "You have successfully rejected that user!"
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

        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $cpa_one_reg = CpaOneRegistration::find($id);
        
    //     if ($request->hasfile('photo')) {
    //         File::delete(public_path($cpa_one_reg->photo));  

    //         $file = $request->file('photo');
    //         $name  = uniqid().'.'.$file->getClientOriginalExtension();
    //         $file->move(public_path().'/storage/cpa_one/',$name);
    //         $photo = '/storage/cpa_one/'.$name;
    //      }else{
    //          $photo = $request->old_photo;
    //      }

    //     if ($request->hasfile('good_morale')) {
    //         File::delete(public_path($cpa_one_reg->good_morale_file));
    //         $file = $request->file('good_morale');
    //         $name  = uniqid().'.'.$file->getClientOriginalExtension();
    //         $file->move(public_path().'/storage/cpa_one/',$name);
    //         $good_morale = '/storage/cpa_one/'.$name;
    //     }else{
    //         $good_morale = $request->old_good_morale;
    //     }

    //     if ($request->hasfile('no_crime')) {
    //         File::delete(public_path($cpa_one_reg->no_crime_file));
    //         $file = $request->file('no_crime');
    //         $name  = uniqid().'.'.$file->getClientOriginalExtension();
    //         $file->move(public_path().'/storage/cpa_one/',$name);
    //         $no_crime = '/storage/cpa_one/'.$name;
    //     }else{
    //         $no_crime = $request->old_no_crime;
    //     }

    //     $cpa_one_reg->academic_year =   $request->aca_year;
    //     $cpa_one_reg->photo         =   $photo;
    //     $cpa_one_reg->name_mm       =   $request->name_mm;
    //     $cpa_one_reg->name_en       =   $request->name_en;
    //     $cpa_one_reg->nrc_state_region = $request->nrc_state_region;
    //     $cpa_one_reg->nrc_township  =   $request->nrc_township;
    //     $cpa_one_reg->nrc_citizen   =   $request->nrc_citizen;
    //     $cpa_one_reg->nrc_number    =   $request->nrc_number;
    //     $cpa_one_reg->father_name_mm=   $request->father_name_mm;
    //     $cpa_one_reg->father_name_en=   $request->father_name_en;
    //     $cpa_one_reg->race_religion =   $request->race_religion;
    //     $cpa_one_reg->birth_date    =   date('Y-m-d',strtotime($request->birth_date));
    //     $cpa_one_reg->education     =   $request->education;
    //     $cpa_one_reg->position      =   $request->position;
    //     $cpa_one_reg->department    =   $request->department;
    //     $cpa_one_reg->office_area   =   $request->office_area;
    //     $cpa_one_reg->civil_servant =   $request->civil_servant;
    //     $cpa_one_reg->address       =   $request->address;
    //     $cpa_one_reg->phone         =   $request->phone;
    //     $cpa_one_reg->email         =   $request->email;
    //     $cpa_one_reg->direct_access_no =$request->dir_access_no;
    //     $cpa_one_reg->entry_success_no =$request->entry_success_no;
    //     $cpa_one_reg->gov_department=   $request->gov_department;
    //     $cpa_one_reg->personal_acc_training =   $request->per_acc_training;
    //     $cpa_one_reg->after_second_exam     =   $request->after_sec_exam;
    //     $cpa_one_reg->good_morale_file      =   $good_morale;
    //     $cpa_one_reg->no_crime_file         =   $no_crime;
    //     $cpa_one_reg->module_id     =   $request->module_id;
    //     $cpa_one_reg->save();

    //      return response()->json([
    //         'message' => "Update Successfully"
    //     ],200);
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $cpa_one_reg = CpaOneRegistration::find($id);
   
    //     File::delete(public_path($cpa_one_reg->photo));  
    //     File::delete(public_path($cpa_one_reg->good_morale_file));
    //     File::delete(public_path($cpa_one_reg->no_crime_file));
    
    //      $cpa_one_reg->delete();
    //      return response()->json([
    //         'message' => "Delete Successfully"
    //     ],200);

    // }
}
