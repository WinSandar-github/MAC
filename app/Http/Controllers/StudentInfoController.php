<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentInfo;
class StudentInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student_infos = StudentInfo::all();
        return response()->json($student_infos,200);
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
            $file->move(public_path().'/storage/cpa_two/',$name);
            $photo = '/storage/cpa_two/'.$name;
         }
        $student_info = new StudentInfo();
        $student_info->name_mm          =   $request->name_mm;
        $student_info->name_en          =   $request->name_en;
        $student_info->nrc              =   $request->nrc;
        $student_info->father_name_mm   =   $request->father_name_mm;
        $student_info->father_name_eng  =   $request->father_name_eng;
        $student_info->race             =   $request->race;
        $student_info->religion         =   $request->religion;
        $student_info->date_of_birth    =   $request->date_of_birth;
        $student_info->address          =   $request->address;
        $student_info->current_address  =   $request->current_address;
        $student_info->phone            =   $request->phone;
        $student_info->gov_staff        =   $request->gov_staff;
        $student_info->image            =   $image;
        $student_info->registration_no  =   $request->registration_no;
        $student_info->date             =   date("Y-m-d");
        $student_info->email            =   $request->email;
        $student_info->password         =   Hash::make($request->password);
        $student_info->save(); 
        
        $student_job_histroy = new StudentJobHistroy;
        $student_job_histroy->student_info_id   = $student_info->id;
        $student_job_histroy->name              = $request->job_name;
        $student_job_histroy->position          = $request->position;
        $student_job_histroy->department        = $request->department;
        $student_job_histroy->organization      = $request->organization;
        $student_job_histroy->company_name      = $request->company_name;
        $student_job_histroy->salary            = $request->salary;
        $student_job_histroy->address           = $request->address;
        $student_job_histroy->save();


        $education_histroy  =   new EducationHistroy();
        $education_histroy->student_info_id = $student_info->id;
        $education_histroy->university_name = $request->uni_name;
        $education_histroy->degree_name     = $request->degree_name;
        $education_histroy->qualified_date  = $request->qualified_date;
        $education_histroy->roll_number     = $request->roll_number;
        $education_histroy->document        = $request->document;
        $education_histroy->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
