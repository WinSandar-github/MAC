<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CpaOneExamRegister;
class CpaOneExamRegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cpa_one_exam = CpaOneExamRegister::with('module')->get();
        return response()->json([
            'data' => $cpa_one_exam
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

       
        
        $cpa_one_exam = new CpaOneExamRegister();
        $cpa_one_exam->exam_center   =   $request->exam_center;
        $cpa_one_exam->photo         =   $photo;
        $cpa_one_exam->name_mm       =   $request->name_mm;
        $cpa_one_exam->name_en       =   $request->name_en;
        $cpa_one_exam->nrc_state_region = $request->nrc_state_region;
        $cpa_one_exam->nrc_township  =   $request->nrc_township;
        $cpa_one_exam->nrc_citizen   =   $request->nrc_citizen;
        $cpa_one_exam->nrc_number    =   $request->nrc_number;
        $cpa_one_exam->father_name_mm=   $request->father_name_mm;
        $cpa_one_exam->father_name_en=   $request->father_name_en;
        $cpa_one_exam->personal_no   =   $request->personal_no;
        $cpa_one_exam->birth_date    =   date('Y-m-d',strtotime($request->birth_date));
        $cpa_one_exam->contact_address   =   $request->contact_address;
        $cpa_one_exam->phone         =   $request->phone;
        $cpa_one_exam->email         =   $request->email;
        $cpa_one_exam->accounting_council    =   $request->acc_council;
        $cpa_one_exam->private_training      =   $request->private_training;
        $cpa_one_exam->self_learner  =   $request->self_learner;
        $cpa_one_exam->private_training_name =   $request->pri_tra_name;
        $cpa_one_exam->last_exam_no  =   $request->last_exam_no;
        $cpa_one_exam->last_exam_time=   $request->last_exam_time;
        $cpa_one_exam->last_exam_module_one  =   $request->last_exam_mol_one;
        $cpa_one_exam->last_exam_module_two  =   $request->last_exam_mol_two;
        $cpa_one_exam->receipt_no            =   $request->receipt_no;
        $cpa_one_exam->receipt_date          =   date('Y-m-d',strtotime($request->receipt_date));
        $cpa_one_exam->module_id     =   $request->module_id;
        $cpa_one_exam->save();

        return response()->json([
            'message' => "Insert Succssfully"
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
        $cpa_one_exam =  CpaOneExamRegister::where('id',$id)->with('module')->get();
        return response()->json([
            'data' => $cpa_one_exam
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

       
        
        $cpa_one_exam = CpaOneExamRegister::find($id);
        $cpa_one_exam->exam_center   =   $request->exam_center;
        $cpa_one_exam->photo         =   $photo;
        $cpa_one_exam->name_mm       =   $request->name_mm;
        $cpa_one_exam->name_en       =   $request->name_en;
        $cpa_one_exam->nrc_state_region = $request->nrc_state_region;
        $cpa_one_exam->nrc_township  =   $request->nrc_township;
        $cpa_one_exam->nrc_citizen   =   $request->nrc_citizen;
        $cpa_one_exam->nrc_number    =   $request->nrc_number;
        $cpa_one_exam->father_name_mm=   $request->father_name_mm;
        $cpa_one_exam->father_name_en=   $request->father_name_en;
        $cpa_one_exam->personal_no   =   $request->personal_no;
        $cpa_one_exam->birth_date    =   date('Y-m-d',strtotime($request->birth_date));
        $cpa_one_exam->contact_address   =   $request->contact_address;
        $cpa_one_exam->phone         =   $request->phone;
        $cpa_one_exam->email         =   $request->email;
        $cpa_one_exam->accounting_council    =   $request->acc_council;
        $cpa_one_exam->private_training      =   $request->private_training;
        $cpa_one_exam->self_learner  =   $request->self_learner;
        $cpa_one_exam->private_training_name =   $request->pri_tra_name;
        $cpa_one_exam->last_exam_no  =   $request->last_exam_no;
        $cpa_one_exam->last_exam_time=   $request->last_exam_time;
        $cpa_one_exam->last_exam_module_one  =   $request->last_exam_mol_one;
        $cpa_one_exam->last_exam_module_two  =   $request->last_exam_mol_two;
        $cpa_one_exam->receipt_no            =   $request->receipt_no;
        $cpa_one_exam->receipt_date          =   date('Y-m-d',strtotime($request->receipt_date));
        $cpa_one_exam->module_id     =   $request->module_id;
        $cpa_one_exam->save();

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
        $cpa_one_exam = CpaOneExamRegister::find($id);
        $cpa_one_exam->delete();
         return response()->json([
            'message' =>  "Delete Successfully"
        ],200);

        
    }
}
