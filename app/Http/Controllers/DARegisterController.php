<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentInfo;
use App\StudentJobHistroy;
use App\EducationHistroy;
use App\StudentRegister;
use App\StudentCourseReg;
use Hash;

class DARegisterController extends Controller
{
    public function index()
    {
        $student_infos = StudentInfo::with('student_job', 'student_education_histroy')->get();
        return response()->json([ 
            'data' => $student_infos
        ],200);
    }

    public function store(Request $request)
    {
        //$nrc = $request['nrc_state_region'] .'/'. $request['nrc_township'] . $request['nrc_citizen'] . $request['nrc_number'];
        $data = StudentInfo::where('nrc_state_region', '=', $request['nrc_state_region'])
        ->where('nrc_township', '=', $request['nrc_township'])
        ->where('nrc_citizen', '=', $request['nrc_citizen'])
        ->where('nrc_number', '=', $request['nrc_number'])
        ->first();
        if($data)
        {
            return "NRC has been used, please check again!";
        }

        $email = $request->email;
        $emailcheck = StudentInfo::where('email', '=', $email)->first();
        if($emailcheck)
        {
            return "Email has been used, please check again!";
        }

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $image = '/storage/student_info/'.$name;
        } 

        if ($request->hasfile('certificate')) {
            $file = $request->file('certificate');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $certificate = '/storage/student_info/'.$name;
        } 

        $date_of_birth = date('Y-m-d');
        $date = date('Y-m-d');
        $qualified_date = date('Y-m-d');
        $course_date = date('Y-m-d');

        $student_info = new StudentInfo();
        $student_info->name_mm          =   $request->name_mm;
        $student_info->name_eng         =   $request->name_eng;
        $student_info->nrc_state_region =   $request['nrc_state_region'];
        $student_info->nrc_township     =   $request['nrc_township'] ;
        $student_info->nrc_citizen      =    $request['nrc_citizen'] ;
        $student_info->nrc_number       =   $request['nrc_number'];
        $student_info->father_name_mm   =   $request->father_name_mm;
        $student_info->father_name_eng  =   $request->father_name_eng;
        $student_info->race             =   $request->race;
        $student_info->religion         =   $request->religion;
        $student_info->date_of_birth    =   $date_of_birth;
        $student_info->address          =   $request->address;
        $student_info->current_address  =   $request->current_address;
        $student_info->phone            =   $request->phone;
        $student_info->gov_staff        =   $request->gov_staff;
        $student_info->image            =   $image;
        $student_info->registration_no  =   $request->registration_no;
        $student_info->approve_reject_status  =  0;
        $student_info->date             =   $date;
        $student_info->email            =   $request->email;
        $student_info->course_type_id   =   1;
        $student_info->password         =   Hash::make($request->password);
        $student_info->save(); 
         
        $student_job_histroy = new StudentJobHistroy;
        $student_job_histroy->student_info_id   = $student_info->id;
        $student_job_histroy->name              = $request->name;
        $student_job_histroy->position          = $request->position;
        $student_job_histroy->department        = $request->department;
        $student_job_histroy->organization      = $request->organization;
        $student_job_histroy->company_name      = $request->company_name;
        $student_job_histroy->salary            = $request->salary;
        $student_job_histroy->office_address    = $request->office_address;
        $student_job_histroy->save();
        
        $education_histroy  =   new EducationHistroy();
        $education_histroy->student_info_id = $student_info->id;
        $education_histroy->university_name = $request->university_name;
        $education_histroy->degree_name     = $request->degree_name;
        $education_histroy->certificate     = $certificate;
        $education_histroy->qualified_date  = $qualified_date;
        $education_histroy->roll_number     = $request->roll_number;
        $education_histroy->save();

        $student_course = new StudentCourseReg();
        $student_course->student_info_id = $student_info->id;
        $student_course->batch_id        = 1;
        $student_course->date            = $course_date;
        $student_course->status          = 1;
        $student_course->save();

        return response()->json($student_info,200);
    }

    public function show($id)
    {
        $approve_reject = StudentInfo::where('id' ,$id)->with('student_job', 'student_education_histroy')->get();
        return response()->json([
            'data' => $approve_reject
        ],200);
        
    }

    public function GetStudentByNRC(Request $request)
    {
        $data = StudentInfo::where('nrc_state_region', '=', $request['nrc_state_region'])
        ->where('nrc_township', '=', $request['nrc_township'])
        ->where('nrc_citizen', '=', $request['nrc_citizen'])
        ->where('nrc_number', '=', $request['nrc_number'])
        ->with('student_job', 'student_education_histroy')
        ->first();
        return response()->json([
            'data' => $data
        ],200);
        
    }

    public function update(Request $request, $id)
    {
        //
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $image = '/storage/student_info/'.$name;
        }
        else{

        }
        $date_of_birth = date('Y-m-d');
        $info = StudentInfo::find($id);
        $info->name_mm          =   $request->name_mm;
        $info->name_eng         =   $request->name_eng;
        $info->nrc_state_region =   $request['nrc_state_region'];
        $info->nrc_township     =   $request['nrc_township'] ;
        $info->nrc_citizen      =   $request['nrc_citizen'] ;
        $info->nrc_number       =   $request['nrc_number'];
        $info->father_name_mm   =   $request->father_name_mm;
        $info->father_name_eng  =   $request->father_name_eng;
        $info->race             =   $request->race;
        $info->religion         =   $request->religion;
        $info->date_of_birth    =   $date_of_birth;
        $info->address          =   $request->address;
        $info->current_address  =   $request->current_address;
        $info->phone            =   $request->phone;
        $info->gov_staff        =   $request->civil_servant;
        $info->image            =   $image;
        $info->save();

        return response()->json([
            'message' => "Update Successfully"
        ],200);
    }

    public function approve($id)
    {
        
        $approve = StudentInfo::find($id);
        $approve->approve_reject_status = 1;
        $approve->save();
        return response()->json([
            'message' => "You have successfully approved that user!"
        ],200);
    }

    public function reject($id)
    {
        $reject = StudentInfo::find($id);
        $reject->approve_reject_status = 2;
        $reject->save();
        return response()->json([
            'message' => "You have successfully rejected that user!"
        ],200);
    }

     public function reg_feedback($id)
    {
        $student_register = StudentRegister::where('student_info_id',$id)->first();
         $status = $student_register != null ? $student_register->status : null;
        return response()->json($status,200);

    }
}
