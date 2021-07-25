<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CpaOneTrainingAddmissionDirect;
use Illuminate\Support\Facades\File; 
use App\StudentInfo;
use Hash;
use App\StudentJobHistroy;
use App\EducationHistroy;
use App\StudentRegister;
use App\StudentCourseReg;


class CpaTraAddmissionDirectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cpa_tra_add_direct = CpaOneTrainingAddmissionDirect::get();
        return response()->json([
            'data' => $cpa_tra_add_direct
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

        if ($request->hasfile('certificates')) {

            foreach($request->file('certificates') as $file){
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/student_info/',$name);
                $certificates[] = '/storage/student_info/'.$name;
            }
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
        $student_info->password         =   Hash::make($request->password);
        $student_info->course_type_id   = 2 ;
        $student_info->save(); 

        $student_job_histroy = new StudentJobHistroy;
        $student_job_histroy->student_info_id   = $student_info->id;
        $student_job_histroy->name              = $request->job_name;
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
        $education_histroy->qualified_date  = $qualified_date;
        $education_histroy->roll_number     = $request->roll_number;
        $education_histroy->save();

        $student_course = new StudentCourseReg();
        $student_course->student_info_id = $student_info->id;
        $student_course->batch_id        = 1;
        $student_course->date            = $course_date;
        $student_course->status          = 1;
        $student_course->save();

       
        
        $cpa_tra_add_direct = new CpaOneTrainingAddmissionDirect();
        $cpa_tra_add_direct->student_info_id  = $student_info->id;
        $cpa_tra_add_direct->certificate      = json_encode($certificates);  
        $cpa_tra_add_direct->da_pass_year     =   $request->da_pass_year;
        $cpa_tra_add_direct->da_pass_month    =   $request->da_pass_month;
        $cpa_tra_add_direct->da_pass_roll_number  =   $request->da_pass_roll_number;
        $cpa_tra_add_direct->acca_cima_pass_level        =   $request->acca_cima_pass_level;
        $cpa_tra_add_direct->acca_cima_exam_year         =   $request->acca_cima_exam_year;
        $cpa_tra_add_direct->acca_cima_exam_month        =   $request->acca_cima_exam_month;
        $cpa_tra_add_direct->acca_cima_reg_no            =   $request->acca_cima_reg_no;
        $cpa_tra_add_direct->save();
        
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
        $cpa_tra_add_direct = CpaOneTrainingAddmissionDirect::find($id);
        return response()->json([
            'data' => $cpa_tra_add_direct
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
        $cpa_tra_add_direct = CpaOneTrainingAddmissionDirect::find($id);
        if($request->hasfile('photo')) {
            File::delete(public_path($cpa_tra_add_direct->photo));
            $file = $request->file('photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_one/',$name);
            $photo = '/storage/cpa_one/'.$name;
         }else{
            $photo = $request->old_photo;
         }

        
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
        $cpa_tra_add_direct->da_pass_year     =   $request->da_pass_year;
        $cpa_tra_add_direct->da_pass_month    =   $request->da_pass_month;
        $cpa_tra_add_direct->da_pass_seat_no  =   $request->da_pass_seat_no;
        $cpa_tra_add_direct->training_ground_id =   $request->training_ground_id;
        $cpa_tra_add_direct->acca          =   $request->acca;
        $cpa_tra_add_direct->cima          =   $request->cima;
        $cpa_tra_add_direct->acca_cima_pass_level        =   $request->acca_cima_pass_level;
        $cpa_tra_add_direct->acca_cima_exam_year         =   $request->acca_cima_exam_year;
        $cpa_tra_add_direct->acca_cima_exam_month        =   $request->acca_cima_exam_month;
        $cpa_tra_add_direct->acca_cima_reg_no            =   $request->acca_cima_reg_no;
        $cpa_tra_add_direct->save();

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
        
        $cpa_tra_add_direct = CpaOneTrainingAddmissionDirect::find($id);
        File::delete(public_path($cpa_tra_add_direct->photo));

        
        $cpa_tra_add_direct->delete();
        return response()->json([
            'message' => "Delete Successfully"
        ],200);

    }
}
