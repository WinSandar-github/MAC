<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentInfo;
use App\StudentJobHistroy;
use App\EducationHistroy;
use App\StudentRegister;
use App\StudentCourseReg;
use Hash;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Mail\ContactMail;

class DARegisterController extends Controller
{
    public function index()
    {

        $student_infos = StudentCourseReg::with('student_info','batch')->get();
        return response()->json([ 
            'data' => $student_infos
        ],200);
        // $student_infos = StudentInfo::with('student_job', 'student_education_histroy','student_courses')->get();
        // return response()->json([ 
        //     'data' => $student_infos
        // ],200);
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

        // if ($request->hasfile('certificate')) {
        //     $file = $request->file('certificate');
        //     $name  = uniqid().'.'.$file->getClientOriginalExtension();
        //     $file->move(public_path().'/storage/student_info/',$name);
        //     $certificate = '/storage/student_info/'.$name;
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

        // $date_of_birth = date('Y-m-d');
        // $date = date('Y-m-d');
        // $qualified_date = date('Y-m-d');
        // $course_date = date('Y-m-d');

        $date_of_birth = $request->date_of_birth;
        $date = $request->date_of_birth;
        $qualified_date = $request->qualified_date;
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
        // $student_info->date_of_birth    =   date('Y-m-d',strtotime($request->date_of_birth)); 
        $student_info->date_of_birth    =   $date_of_birth;
        $student_info->address          =   $request->address;
        $student_info->current_address  =   $request->current_address;
        $student_info->phone            =   $request->phone;
        $student_info->gov_staff        =   $request->gov_staff;
        $student_info->image            =   $image;
        $student_info->registration_no  =   $request->registration_no;
        $student_info->approve_reject_status  =  0;
        $student_info->date             =   $date; 
        $student_info->email            =   strtolower($request->email);
        $student_info->course_type_id   =   1;
        $student_info->password         =   Hash::make($request->password);

        $student_info->verify_status    =   1;
        $student_info->verify_code      =   $request->verify_code;
        $student_info->payment_method   =   $request->payment_method;
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
        // $education_histroy->certificate     = $certificate;
        $education_histroy->certificate     = json_encode($certificate);
        // $education_histroy->qualified_date  = date('Y-m-d',strtotime($request->qualified_date)); 
        $education_histroy->qualified_date  = $qualified_date; 
        $education_histroy->roll_number     = $request->roll_number;
        $education_histroy->save();

        $student_course = new StudentCourseReg();
        $student_course->student_info_id = $student_info->id;
        $student_course->batch_id        = $request->batch_id;
        //$student_course->date            = date('Y-m-d',strtotime($request->degree_date)); 
        $student_course->date            = $course_date; 
        $student_course->status          = 1;
        $student_course->save();

        return response()->json($student_info,200);
    }

    public function send_email(Request $request)
    {
        $student_info = new StudentInfo();
        $student_info->verify_code = '1234';
        // $student_info->verify_code = mt_rand(1000,9999);
        // $data = array(
        //     'email' => 'macadmin@gmail.com',
        //     'verify_code' => $student_info['verify_code']
        // );
        // Mail::to($request['email'])->send(new ContactMail($data));
        return response()->json([
            'data' => $student_info
        ],200);
    }

    public function show($id)
    {
         
        $approve_reject = StudentCourseReg::where('id' ,$id)->with('student_info','batch')->get();
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
        $info->date_of_birth    =   date('Y-m-d',strtotime($request->date_of_birth)); 
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
      
         
        $stu_course_reg = StudentCourseReg::find($id) ;
        $stu_course_reg->approve_reject_status =1;
        $stu_course_reg->save();
        $approve = StudentInfo::where('id',$stu_course_reg->student_info_id)->first();
        $approve->approve_reject_status = 1;
        $approve->save();
        return response()->json([
            'message' => "You have successfully approved that user!",
            'code'    =>  $stu_course_reg->batch->course->code  
        ],200);
    }

    public function reject($id)
    {
         
        $stu_course_reg = StudentCourseReg::find($id);
        $stu_course_reg->approve_reject_status =2;
        $stu_course_reg->save();
        $approve = StudentInfo::where('id',$stu_course_reg->student_info_id)->first();
        $approve->approve_reject_status = 2;
        $approve->save();
        return response()->json([
            'message' => "You have successfully rejected that user!",
            'code'    =>  $stu_course_reg->batch->course->code  

        ],200);
    }

     public function reg_feedback($id)
    {
        
         $stu_course_reg = StudentCourseReg::where('student_info_id',$id)->with('batch')->latest()->first();
         $student_register = StudentRegister::where('student_info_id',$id)->where('form_type',$stu_course_reg->batch->course_id)->first();
         $status = $student_register != null ? $student_register->status : null;
         // print_r($stu_course_reg);
        return response()->json($stu_course_reg,200);

    }

    public function auditFormStatus($id)
    {
        $data = StudentInfo::where('id',$id)->get('approve_reject_status');
        return response()->json($data,200);

    }

    public function FilterApplicationList(Request $request)
    {
        
        $student_infos = StudentCourseReg::with('student_info','batch');
        // $test=StudentInfo::where(DB::raw('CONCAT(nrc_state_region, "/", nrc_township,"(",nrc_citizen,")",nrc_number)'),$request->nrc)->get();
        if($request->name!="")
        {
            $student_infos=$student_infos->join('student_infos', 'student_course_regs.student_info_id', '=', 'student_infos.id')
                                        ->where('student_infos.name_mm', 'like', '%' . $request->name. '%')
                                        ->orWhere('student_infos.name_eng', 'like', '%' . $request->name. '%');
        }
        if($request->nrc!="" && $request->name=="")
        {
            $student_infos=$student_infos->join('student_infos', 'student_course_regs.student_info_id', '=', 'student_infos.id')
                                        // ->where('student_infos.nrc_state_region'.'/'.'student_infos.nrc_township'.'('.'student_infos.nrc_citizen'.')', $request->nrc);
                                        ->where(DB::raw('CONCAT(nrc_state_region, "/", nrc_township,"(",nrc_citizen,")",nrc_number)'),$request->nrc);
        }
        if($request->nrc!="" && $request->name!="")
        {
            $student_infos=$student_infos->where(DB::raw('CONCAT(nrc_state_region, "/", nrc_township,"(",nrc_citizen,")",nrc_number)'),$request->nrc);
        }
        if($request->batch!="all"){
            $student_infos = $student_infos->where('batch_id',$request->batch);
        }
        $student_infos=$student_infos->get();
        return response()->json([ 
            'data' => $student_infos,
            // 'test'=>$test
        ],200);
    }

    public function checkCode($id)
    {
        $data = StudentInfo::where('id',$id)->first();
        $data->verify_status = 1;
        $data->save();
        return response()->json([
            'data' => $data
        ],200);
    }
}
