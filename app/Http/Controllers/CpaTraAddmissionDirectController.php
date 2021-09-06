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
        return $request->file('certificate');
        
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
        
        if ($request->hasfile('nrc_front')) {
            $file = $request->file('nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_front = '/storage/student_info/'.$name;
        }
        if ($request->hasfile('nrc_back')) {
            $file = $request->file('nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_back = '/storage/student_info/'.$name;
        }

        if ($request->hasfile('deg_certi_img')) {

                $file = $request->file('deg_certi_img');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/student_info/',$name);
                $deg_certi_img = '/storage/student_info/'.$name;
           
        }else{
            $deg_certi_img = null;
        }
     
        // if ($request->hasfile('certificates')) {
         
        //     $file = $request->file('certificates');
            
        //     $name  = uniqid().'.'.$file->getClientOriginalExtension();
        //     $file->move(public_path().'/storage/student_info/',$name);
        //     $certificates = '/storage/student_info/'.$name;
        // } 
        // else{
        //     $certificates=null;
        // }

        if($request->hasfile('certificate'))
        {
            foreach($request->file('certificate') as $file)
            {
                $name  = uniqid().'.'.$file->getClientOriginalExtension(); 
                $file->move(public_path().'/storage/student_info/',$name);
                $certificate[] = '/storage/student_info/'.$name;
            }        
        }else{
            $certificate = null;
        }

        if($request->hasfile('recommend_letter'))
        {
            
            $file = $request->file('recommend_letter') ;
        
                $name  = uniqid().'.'.$file->getClientOriginalExtension(); 
                $file->move(public_path().'/storage/student_info/',$name);
                $rec_letter = '/storage/student_info/'.$name;
                 
        }else{
            $rec_letter = null;
        }
////Multiple University
        // if($request->hasfile('uni_certificate'))
        // {
        //     foreach($request->file('uni_certificate') as $file)
        //     {
        //     $name  = uniqid().'.'.$file->getClientOriginalExtension();
        //     $file->move(public_path().'/storage/acc_firm/',$name);
        //     $certificates[] = $name;
        //     }

        // }else{
        //     $certificates = null;
        // }

        // if(isset($request->uni_degree_name))
        // {
        //     foreach($request->uni_degree_name as $uni_degree_name){
        //         $degree_name[] = $uni_degree_name;
        //     }
        // }
        // if(isset($request->uni_name))
        // {
        //     foreach($request->uni_name as $uni_name){
        //         $university_name[] = $uni_name;
        //     }
        // }
        // if(isset($request->uni_roll_no))
        // {
        //     foreach($request->uni_roll_no as $uni_roll_no){
        //         $roll_no[] = $uni_roll_no;
        //     }
        // }
        // if($request->uni_degree_name){
        //     $student_register->reg_reason = implode(",",$degree_name);
        //     // $student_register->reg_reason = $request->reg_reason;
        // }
////multiple university
       

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
        $student_info->nrc_front        =   $nrc_front;
        $student_info->nrc_back         =   $nrc_back;
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
        $student_info->recommend_letter =   $rec_letter;


        $student_info->course_type_id   = 2 ;
        // CPA
        $student_info->direct_degree                =   $request->direct_degree; 
        $student_info->degree_date                  =   date("Y-m-d",strtotime($request->degree_date));
        $student_info->degree_certificate_image     =   $deg_certi_img;
        $student_info->degree_rank                  =   $request->degree_rank;
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
        // $education_histroy->university_name = json_encode($university_name);
        // $education_histroy->degree_name     =json_encode($degree_name);
        // $education_histroy->certificate     = json_encode($certificates);
        // $education_histroy->roll_number     = json_encode($roll_no);
        $education_histroy->university_name = $request->university_name;
        $education_histroy->degree_name     =$request->degree_name;
        $education_histroy->certificate     = json_encode($certificate);
        // $education_histroy->certificate     = json_encode($certificates);

        $education_histroy->qualified_date  = $qualified_date;
        $education_histroy->roll_number     = $request->roll_no;
        $education_histroy->save();
        
        $student_course = new StudentCourseReg();
        $student_course->student_info_id = $student_info->id;
        $student_course->batch_id          = $request->batch_id;
        $student_course->date            = $course_date;
        $student_course->status          = 1;
        $student_course->approve_reject_status = 0;
        if($request->qt_entry){
            $student_course->qt_entry      = $request->qt_entry;
        }
        $student_course->save();

       
        
        // $cpa_tra_add_direct = new CpaOneTrainingAddmissionDirect();
        // $cpa_tra_add_direct->student_info_id  = $student_info->id;
        // $cpa_tra_add_direct->certificate      = json_encode($certificates);  

        // $cpa_tra_add_direct->da_pass_year     =   $request->da_pass_year;
        // $cpa_tra_add_direct->da_pass_month    =   $request->da_pass_month;
        // $cpa_tra_add_direct->da_pass_roll_number  =   $request->da_pass_roll_number;
        // $cpa_tra_add_direct->acca_cima_pass_level        =   $request->acca_cima_pass_level;
        // $cpa_tra_add_direct->acca_cima_exam_year         =   $request->acca_cima_exam_year;
        // $cpa_tra_add_direct->acca_cima_exam_month        =   $request->acca_cima_exam_month;
        // $cpa_tra_add_direct->acca_cima_reg_no            =   $request->acca_cima_reg_no;
        // $cpa_tra_add_direct->save();
        
        return response()->json([
            $data => $student_info
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
 
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $image = '/storage/student_info/'.$name;
        }else{
            $image = $request->old_image;
        }

       

        if ($request->hasfile('certificates')) {
            $file = $request->file('certificates');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/student_info/',$name);
                $certificates = '/storage/student_info/'.$name;
          
        } 
        else{
            $certificates = $request->old_certificate;
        }

        if ($request->hasfile('deg_certi_img')) {

            $file = $request->file('deg_certi_img');

                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/student_info/',$name);
                $deg_certi_img[] = '/storage/student_info/'.$name;
            
        }else{
            $deg_certi_img = $request->old_deg_certi;
        }

      

        $date_of_birth = date('Y-m-d');
        $date = date('Y-m-d');
        $qualified_date = date('Y-m-d');
        $course_date = date('Y-m-d');
      
        $student_info = StudentInfo::find($id);
        $student_info->name_mm          =   $request->name_mm;
        $student_info->name_eng          =   $request->name_eng;
        $student_info->nrc_state_region =   $request['nrc_state_region'];
        $student_info->nrc_township     =   $request['nrc_township'] ;
        $student_info->nrc_citizen      =    $request['nrc_citizen'] ;
        $student_info->nrc_number       =   $request['nrc_number'];      
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
        $student_info->approve_reject_status = 0;
        $student_info->date             =   date("Y-m-d");

          // CPA
          $student_info->direct_degree                =   $request->direct_degree; 
          $student_info->degree_date                  =   date("Y-m-d",strtotime($request->degree_date));
          $student_info->degree_certificate_image     =   $deg_certi_img;
          $student_info->degree_rank                  =   $request->degree_rank;
       
        $student_info->save(); 
         
        StudentJobHistroy::where('student_info_id',$id)->delete();
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

        EducationHistroy::where('student_info_id',$id)->delete();
        $education_histroy  =   new EducationHistroy();
        $education_histroy->roll_number     = $request->roll_number;
        $education_histroy->student_info_id = $student_info->id;
        $education_histroy->university_name = $request->university_name;
        $education_histroy->degree_name     = $request->degree_name;
        $education_histroy->certificate     = $certificates;
        $education_histroy->qualified_date  = $qualified_date;
        $education_histroy->roll_number     = $request->roll_number;
        $education_histroy->save();
       

        StudentCourseReg::where('student_info_id',$id)->delete();
        $student_course = new StudentCourseReg();
        $student_course->student_info_id = $student_info->id;
        $student_course->batch_id        = $request->batch_id;
        $student_course->date            = $course_date;
        $student_course->approve_reject_status = 0;
        $student_course->status          = 1;
        $student_course->save();

        CpaOneTrainingAddmissionDirect::where('student_info_id',$id)->delete();
        $cpa_tra_add_direct = new CpaOneTrainingAddmissionDirect();
        $cpa_tra_add_direct->student_info_id  = $student_info->id;
        $cpa_tra_add_direct->certificate      = $certificates;  
        $cpa_tra_add_direct->da_pass_year     =   $request->da_pass_year;
        $cpa_tra_add_direct->da_pass_month    =   $request->da_pass_month;
        $cpa_tra_add_direct->da_pass_roll_number  =   $request->da_pass_roll_number;
        $cpa_tra_add_direct->acca_cima_pass_level        =   $request->acca_cima_pass_level;
        $cpa_tra_add_direct->acca_cima_exam_year         =   $request->acca_cima_exam_year;
        $cpa_tra_add_direct->acca_cima_exam_month        =   $request->acca_cima_exam_month;
        $cpa_tra_add_direct->acca_cima_reg_no            =   $request->acca_cima_reg_no;
        $cpa_tra_add_direct->save();

        return response()->json($student_info,200);
 
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
