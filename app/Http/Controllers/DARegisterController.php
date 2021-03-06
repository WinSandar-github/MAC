<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\StudentInfo;
use App\StudentJobHistroy;
use App\EducationHistroy;
use App\StudentRegister;
use App\StudentCourseReg;
use App\ExamRegister;
use Hash;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Mail\ContactMail;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use App\Course;
use App\Invoice;

class DARegisterController extends Controller
{
    public function index()
    {
        $student_infos = StudentCourseReg::with('student_info', 'batch')->get();
        
        return response()->json([
            'data' => $student_infos
        ], 200);
    }

    public function store(Request $request)
    {
        $data = StudentInfo::where('nrc_state_region', '=', $request['nrc_state_region'])
            ->where('nrc_township', '=', $request['nrc_township'])
            ->where('nrc_citizen', '=', $request['nrc_citizen'])
            ->where('nrc_number', '=', $request['nrc_number'])
            ->first();

        if($data){
            return "NRC has been used, please check again!";
        }

        $email = $request->email;
        $emailcheck = StudentInfo::where('email', '=', $email)->first();
        if ($emailcheck) {
            return "Email has been used, please check again!";
        }

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/storage/student_info/', $name);
            $image = '/storage/student_info/' . $name;
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

        if($request->hasfile('recommend_letter'))
        {
            $file = $request->file('recommend_letter') ;
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $rec_letter = '/storage/student_info/'.$name;
        }else{
            $rec_letter = null;
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
        $date = date('d-M-Y');
        $qualified_date = $request->qualified_date;
        $course_date = date('Y-m-d');

        try {
            $student_info = new StudentInfo();
            $student_info->name_mm          =   $request->name_mm;
            $student_info->name_eng         =   $request->name_eng;
            $student_info->nrc_state_region =   $request['nrc_state_region'];
            $student_info->nrc_township     =   $request['nrc_township'] ;
            $student_info->nrc_citizen      =   $request['nrc_citizen'] ;
            $student_info->nrc_number       =   $request['nrc_number'];
            $student_info->nrc_front        =   $nrc_front;
            $student_info->nrc_back         =   $nrc_back;
            $student_info->father_name_mm   =   $request->father_name_mm;
            $student_info->father_name_eng  =   $request->father_name_eng;
            $student_info->gender           =   $request->gender;
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

            // $student_info->verify_status    =   1;
            $student_info->verify_code = $request->verify_code;
            $student_info->payment_method = $request->payment_method;
            $student_info->recommend_letter = $rec_letter;
            $student_info->save();

            $student_job_histroy = new StudentJobHistroy;
            $student_job_histroy->student_info_id = $student_info->id;
            $student_job_histroy->name = $request->current_job;
            $student_job_histroy->position = $request->position;
            $student_job_histroy->department = $request->department;
            $student_job_histroy->organization = $request->organization;
            $student_job_histroy->company_name = $request->company_name;
            $student_job_histroy->salary = $request->salary;
            $student_job_histroy->office_address = $request->office_address;
            $student_job_histroy->save();

            $education_histroy  =   new EducationHistroy();
            $education_histroy->student_info_id = $student_info->id;
            $education_histroy->university_name = $request->university_name;
            $education_histroy->degree_id       = $request->degree_id;

            if($request->degree_id == 40){
                $education_histroy->degree_name     = $request->degree_name;
            }else{
                $education_histroy->degree_name     = NULL;    
            }
            $education_histroy->certificate     = json_encode($certificate);
            $education_histroy->qualified_date  = $qualified_date;
            $education_histroy->roll_number     = $request->roll_number;
            $education_histroy->save();

            $student_course = new StudentCourseReg();
            $student_course->student_info_id = $student_info->id;
            $student_course->batch_id        = $request->batch_id;
            $student_course->type            = $request->type;
            $student_course->mac_type        = $request->mac_type;
            $student_course->date            = $course_date;
            $student_course->status          = 1;
            $student_course->is_finished      = 0;
            $student_course->save();

            //invoice
            $invoice = new Invoice();
            $invoice->student_info_id = $student_info->id;

            // $invNo = str_pad( date('Ymd') . Str::upper(Str::random(5)) . $student_info->id, 20, "0", STR_PAD_LEFT);
            // $invoice->invoiceNo       = $invNo;

            $invoice->name_eng        = $request->name_eng;
            $invoice->email           = $request->email;
            $invoice->phone           = $request->phone;
            
            $std = StudentCourseReg::with('batch')->where("student_info_id", $student_info->id)->latest()->first();
            
            $invoice->invoiceNo = 'app_form_'.$student_course->id;
            $invoice->productDesc     = 'App Fee,' . $std->batch->course->name;
            $invoice->amount          = $std->batch->course->form_fee;
            $invoice->status          = 0;
            $invoice->save();

            return response()->json($student_info, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }    

    public function send_email(Request $request)
    {
        $student_info = new StudentInfo();
        $student_info->verify_code = '1234';

        // $student_info->verify_code = mt_rand(1000,9999);
        // $data = array(
        //     'email' => 'no-reply@oagmac.gov.mm',
        //     'verify_code' => $student_info['verify_code']
        // );
        // Mail::to($request['email'])->send(new ContactMail($data));

        return response()->json([
            'data' => $student_info
        ], 200);
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
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/storage/student_info/', $name);
            $image = '/storage/student_info/' . $name;
        } else {

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
        ], 200);
    }

    public function approve($id)
    {
        $stu_course_reg = StudentCourseReg::find($id) ;
        $stu_course_reg->approve_reject_status =1;
        $stu_course_reg->save();

        $approve = StudentInfo::where('id', $stu_course_reg->student_info_id)->first();
        $approve->approve_reject_status = 1;
        $approve->save();

        return response()->json([
            'message' => "You have successfully approved that user!",
            'code'    =>  $stu_course_reg->batch->course->code
        ],200);
    }

    public function reject($id, Request $request)
    {
        $stu_course_reg = StudentCourseReg::find($id);
        $stu_course_reg->approve_reject_status =2;
        $stu_course_reg->remark = $request->remark;
        $stu_course_reg->save();

        $approve = StudentInfo::where('id', $stu_course_reg->student_info_id)->first();
        $approve->approve_reject_status = 2;
        $approve->save();

        return response()->json([
            'message' => "You have successfully rejected that user!",
            'code'    =>  $stu_course_reg->batch->course->code

        ], 200);
    }

    public function reg_feedback($id)
    {
         $stu_course_reg = StudentCourseReg::where('student_info_id',$id)->with('batch')->latest()->first();
         $student_register = StudentRegister::where('student_info_id',$id)->where('form_type',$stu_course_reg->batch->course_id)->first();
         $status = $student_register != null ? $student_register->status : null;

         // return response()->json($stu_course_reg,200);
         return response()->json($status,200);
    }

    public function auditFormStatus($id)
    {
        $data = StudentInfo::where('id', $id)->get('approve_reject_status');
        return response()->json($data, 200);

    }

    public function FilterApplicationList(Request $request)
    {         
        $course  = Course::where('code',$request->course_code)->first();       
        
        $student_infos = StudentCourseReg::with('student_info','batch')
                        ->whereHas('batch', function ($query) use ($course) {
                            $query->where('course_id', $course->id);
                        })
                        ->whereHas('student_info', function($q) use ($request){
                            $q->where('offline_user', 0);
                        })

                        ->where('student_course_regs.approve_reject_status','=', $request->status)
                        ->where('qt_entry','=',0)
                        ->orderBy('id','desc')->get();

        return DataTables::of($student_infos)

            ->editColumn('name_mm', function ($infos) {
                return $infos->student_info->name_mm;
            })

            ->addColumn('action', function ($infos) {               
                return "<button type='button' class='btn btn-primary btn-xs' onclick='showDAList($infos->id)'>
                            <li class='fa fa-eye fa-sm'></li>
                        </button>";
            })

            ->addColumn('nrc', function ($infos) {
                $nrc_result = $infos->student_info->nrc_state_region . "/" . $infos->student_info->nrc_township . "(" . $infos->student_info->nrc_citizen . ")" . $infos->student_info->nrc_number;
                return $nrc_result;
            })

            ->addColumn('payment_status',function ($infos){               
                if($infos->batch->course->course_type_id == 1){
                    $invoices = Invoice::where('invoiceNo',"app_form_" . $infos->id)->get();
                    
                }else{
                    $invoices = Invoice::where('invoiceNo',"cpa_app_" . $infos->id)->get();                    
                }

                foreach($invoices as $invoice){
                    return $invoice->status == "AP" ? "Complete" : "Incomplete";
                }

            })

            ->addColumn('status', function ($infos) {
                if ($infos->approve_reject_status == 0) {
                    // return "PENDING";
                    return "<span class='pending'>Pending</span>";
                } else if ($infos->approve_reject_status == 1) {
                    // return "APPROVED";
                    return "<span class='approve'>Approved</span>";
                } else {
                    // return "REJECTED";
                    return "<span class='reject'>Rejected</span>";
                }
            })

            ->rawColumns(['name_mm', 'action', 'status'])
            ->make(true);
    }

    public function DAExistingRegister(Request $request)
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

        // if($request->hasfile('recommend_letter'))
        // {
        //     $file = $request->file('recommend_letter') ;
        //     $name  = uniqid().'.'.$file->getClientOriginalExtension();
        //     $file->move(public_path().'/storage/student_info/',$name);
        //     $rec_letter = '/storage/student_info/'.$name;
        // }else{
        //     $rec_letter = null;
        // }

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

        $date = date('d-M-Y');;
        $course_date = date('Y-m-d');
        $invoice_date = date('d-M-Y');

        try {
            $student_info = new StudentInfo();
            if($request->da_one_pass_personal_no || $request->da_two_pass_personal_no){
                $student_info->personal_no      =   $request->da_one_pass_personal_no;
            }        
                      
            $student_info->name_mm          =   $request->name_mm;
            $student_info->name_eng         =   $request->name_eng;
            $student_info->nrc_state_region =   $request['nrc_state_region'];
            $student_info->nrc_township     =   $request['nrc_township'] ;
            $student_info->nrc_citizen      =   $request['nrc_citizen'] ;
            $student_info->nrc_number       =   $request['nrc_number'];
            $student_info->nrc_front        =   $nrc_front;
            $student_info->nrc_back         =   $nrc_back;
            $student_info->father_name_mm   =   $request->father_name_mm;
            $student_info->father_name_eng  =   $request->father_name_eng;
            $student_info->gender           =   $request->gender;
            $student_info->race             =   $request->race;
            $student_info->religion         =   $request->religion;
            $student_info->date_of_birth    =   $request->date_of_birth;
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
            $student_info->verify_code      =   $request->verify_code;
            $student_info->payment_method   =   $request->payment_method;
            // $student_info->recommend_letter =   $rec_letter;
            $student_info->offline_user = 1;
            $student_info->save();

            $student_job_histroy = new StudentJobHistroy;
            $student_job_histroy->student_info_id   = $student_info->id;
            $student_job_histroy->name              = $request->current_job;
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
            $education_histroy->degree_id       = $request->degree_id;

            if($request->degree_id == 40){
                $education_histroy->degree_name     = $request->degree_name;
            }else{
                $education_histroy->degree_name     = NULL;    
            }
            $education_histroy->certificate     = json_encode($certificate);
            $education_histroy->qualified_date  = $request->qualified_date;
            $education_histroy->roll_number     = $request->roll_number;
            $education_histroy->save();

            if($request->da_type=='da_2'){ 
                // info of da 1 pass info in da2 existing form
                if($request->pass_batch_id){
                    $student_course = new StudentCourseReg();
                    $student_course->student_info_id = $student_info->id;
                    $student_course->batch_id        = $request->pass_batch_id;
                    $student_course->type            = $request->type;
                    $student_course->mac_type        = $request->mac_type;
                    $student_course->date            = $course_date;
                    $student_course->is_finished      = 1;
                    $student_course->status          = 1;
                    $student_course->approve_reject_status  = 1;                
                    $student_course->offline_user  = 0;
                    $student_course->save();
    
                    $student_register = new StudentRegister();
                    $student_register->student_info_id  = $student_info->id;
                    $student_register->batch_id         = $request->pass_batch_id;
                    $student_register->date             = date('Y-m-d');
                    $student_register->invoice_id       = $student_info->id;
                    $student_register->invoice_date     = date('Y-m-d');
                    $student_register->module           = 3;
                    $student_register->type             = $request->type;
                    $student_register->status           = 1;
                    $student_register->form_type        = 1;
                    $student_register->save();
                    
                    $exam_register = new ExamRegister();
                    $exam_register->student_info_id     = $student_info->id;
                    $exam_register->date                = $date;
                    $exam_register->grade               = 1;
                    $exam_register->batch_id            = $request->pass_batch_id;
                    $exam_register->is_full_module      = 3;
                    $exam_register->pass_module      = 3;

                    $exam_register->exam_type_id        = 1;
                    $exam_register->form_type           = 1;
                    $exam_register->status              = 1;
                    $exam_register->passed_date         = $request->da_one_pass_exam_date;
                    $exam_register->passed_level        = $request->da_one_pass_level;
                    // $exam_register->passed_personal_no  = $request->da_one_pass_personal_no;
                    $exam_register->save();
                }
                
                // info of da 2 pass info in da2 existing form
                if($request->batch_id!="null"){ 
                    $student_course = new StudentCourseReg();
                    $student_course->student_info_id = $student_info->id;
                    $student_course->batch_id        = $request->batch_id;
                    $student_course->type            = $request->type_da2;
                    $student_course->mac_type        = $request->da_two_mac_type;
                    $student_course->date            = $course_date;
                    $student_course->is_finished      = 1;
                    $student_course->status          = 1;
                    $student_course->approve_reject_status  = 1;
                    $student_course->offline_user  = 0;
                    $student_course->save();
                    
                    $student_register = new StudentRegister();
                    $student_register->student_info_id  = $student_info->id;
                    $student_register->batch_id         = $request->batch_id;
                    $student_register->date             = date('Y-m-d');
                    $student_register->invoice_id       = $student_info->id;
                    $student_register->invoice_date     = date('Y-m-d');
                    if($request->module){
                        $student_register->module           = $request->module; 
                    }
                    $student_register->type             = $request->type;
                    $student_register->status           = 1;
                    $student_register->form_type        = 2;
                    $student_register->save();
                    
                    $exam_register = new ExamRegister();
                    $exam_register->student_info_id     = $student_info->id;
                    $exam_register->date                = $date;
                    if($request->module==1 || $request->module==2){
                        $exam_register->grade           = 1;
                    }else{
                        $exam_register->grade           = 2;
                    }                    
                    $exam_register->batch_id            = $request->batch_id;
                    $exam_register->is_full_module      = $request->module;
                    $exam_register->pass_module         = $request->module;

                    $exam_register->exam_type_id        = 1;
                    $exam_register->form_type           = 2;
                    $exam_register->status              = 1;
                    $exam_register->passed_date         = $request->da_two_pass_exam_date;
                    $exam_register->passed_level        = $request->da_two_pass_level;
                    // $exam_register->passed_personal_no  = $request->da_two_pass_personal_no;
                    $exam_register->save();

                    $student_course = new StudentCourseReg();
                    $student_course->student_info_id = $student_info->id;
                    $student_course->batch_id        = $request->active_batch_id;
                    $student_course->type            = $request->type_active_da2;
                    $student_course->mac_type        = $request->da_two_active_mac_type;
                    $student_course->date            = $course_date;
                    // $student_course->is_finished      = 1;
                    $student_course->status          = 1;
                    $student_course->approve_reject_status  = 0;
                    $student_course->offline_user  = 1;
                    $student_course->save();
                }
                else{
                    $student_course = new StudentCourseReg();
                    $student_course->student_info_id = $student_info->id;
                    $student_course->batch_id        = $request->active_batch_id;
                    $student_course->type            = $request->type_active_da2;
                    $student_course->mac_type        = $request->da_two_active_mac_type;
                    $student_course->date            = $course_date;
                    // $student_course->is_finished      = 1;
                    $student_course->status          = 1;
                    $student_course->approve_reject_status  = 0;
                    $student_course->offline_user  = 1;
                    $student_course->save();
                }
                
            }
            else{
                $student_course = new StudentCourseReg();                
                $student_course->student_info_id = $student_info->id;
                $student_course->batch_id        = $request->pass_batch_id;
                $student_course->type            = $request->type;
                $student_course->mac_type        = $request->mac_type;
                $student_course->date            = $course_date;
                $student_course->is_finished     = 1;
                $student_course->status          = 0;
                $student_course->approve_reject_status  = 1;
                $student_course->offline_user  = 0;
                $student_course->save();                
                    
                $student_register = new StudentRegister();
                $student_register->student_info_id  = $student_info->id;
                $student_register->batch_id         = $request->pass_batch_id;
                $student_register->date             = date('Y-m-d');
                $student_register->invoice_id       = $student_info->id;
                $student_register->invoice_date     = date('Y-m-d');
                $student_register->module           = $request->module;
                $student_register->type             = $request->type;
                $student_register->status           = 1;
                $student_register->form_type        = 1;
                $student_register->save();
                
                $exam_register = new ExamRegister();
                $exam_register->student_info_id     = $student_info->id;
                $exam_register->date                = $date;
                if($request->module==1 || $request->module==2){                    
                    $exam_register->is_full_module      = $request->module;
                    $exam_register->pass_module      = $request->module;

                    $exam_register->grade           = 1;
                }else{
                    $exam_register->grade           = 2;
                } 
                $exam_register->batch_id            = $request->pass_batch_id;
                $exam_register->exam_type_id        = 1;
                $exam_register->form_type           = 1;
                $exam_register->status              = 1;
                $exam_register->passed_date         = $request->da_one_pass_exam_date;
                $exam_register->passed_level        = $request->da_one_pass_level;
                $exam_register->save();
    
                $student_course = new StudentCourseReg();                
                $student_course->student_info_id = $student_info->id;
                $student_course->batch_id        = $request->active_batch_id;
                $student_course->type            = $request->type_active_da2;
                $student_course->mac_type        = $request->da_two_active_mac_type;
                $student_course->date            = $course_date;
                $student_course->is_finished     = 0;
                $student_course->status          = 0;
                $student_course->approve_reject_status  = 0;
                $student_course->offline_user  = 1;
                $student_course->save();
            }
            return response()->json($student_info,200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }  

    public function updateDAExistingRegister(Request $request)
    {
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $image = '/storage/student_info/'.$name;
        }else{
            $image = $request->old_image;
        }

        if($request->hasfile('certificate'))
        {
            foreach($request->file('certificate') as $file)
            {
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/student_info/',$name);
                $certificate[] = '/storage/student_info/'.$name;
            }
        }else{
            $certificate[] = $request->old_certificate;
        }

        if ($request->hasfile('nrc_front')) {
            $file = $request->file('nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_front = '/storage/student_info/'.$name;
        }else{
            $nrc_front = $request->old_nrc_front;
        }

        if ($request->hasfile('nrc_back')) {
            $file = $request->file('nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_back = '/storage/student_info/'.$name;
        }else{
            $nrc_back = $request->old_nrc_back;
        }

        $date = date('d-M-Y');;
        $course_date = date('Y-m-d');
        $invoice_date = date('d-M-Y');

        try {
            $student_info = StudentInfo::find($request->student_info_id);
            if($request->da_one_pass_personal_no || $request->da_two_pass_personal_no){
                $student_info->personal_no      =   $request->da_one_pass_personal_no;
            } 
            $student_info->name_mm          =   $request->name_mm;
            $student_info->name_eng         =   $request->name_eng;
            $student_info->nrc_state_region =   $request['nrc_state_region'];
            $student_info->nrc_township     =   $request['nrc_township'] ;
            $student_info->nrc_citizen      =   $request['nrc_citizen'] ;
            $student_info->nrc_number       =   $request['nrc_number'];
            $student_info->nrc_front        =   $nrc_front;
            $student_info->nrc_back         =   $nrc_back;
            $student_info->father_name_mm   =   $request->father_name_mm;
            $student_info->father_name_eng  =   $request->father_name_eng;
            $student_info->gender           =   $request->gender;
            $student_info->race             =   $request->race;
            $student_info->religion         =   $request->religion;
            $student_info->date_of_birth    =   $request->date_of_birth;
            $student_info->address          =   $request->address;
            $student_info->current_address  =   $request->current_address;
            $student_info->phone            =   $request->phone;
            $student_info->gov_staff        =   $request->gov_staff;
            $student_info->image            =   $image;
            $student_info->registration_no  =   $request->registration_no;
            $student_info->approve_reject_status  =  0;
            $student_info->date             =   $date;
        
            $student_info->course_type_id   =   1;
            
            // $student_info->recommend_letter =   $rec_letter;
            $student_info->offline_user = 1;
            $student_info->save();

            $student_job_histroy = StudentJobHistroy::where('student_info_id',$request->student_info_id)->first();
            $student_job_histroy->student_info_id   = $student_info->id;
            $student_job_histroy->name              = $request->current_job;
            $student_job_histroy->position          = $request->position;
            $student_job_histroy->department        = $request->department;
            $student_job_histroy->organization      = $request->organization;
            $student_job_histroy->company_name      = $request->company_name;
            $student_job_histroy->salary            = $request->salary;
            $student_job_histroy->office_address    = $request->office_address;
            $student_job_histroy->save();

            $education_histroy  =   EducationHistroy::where('student_info_id',$request->student_info_id)->first();
            $education_histroy->student_info_id = $student_info->id;
            $education_histroy->university_name = $request->university_name;
            $education_histroy->degree_id       = $request->degree_id;

            if($request->degree_id == 40){
                $education_histroy->degree_name     = $request->degree_name;
            }else{
                $education_histroy->degree_name     = NULL;    
            }
            $education_histroy->certificate     = json_encode($certificate);
            $education_histroy->qualified_date  = $request->qualified_date;
            $education_histroy->roll_number     = $request->roll_number;
            $education_histroy->save();

            if($request->da_type=='da_2'){ 
                $student_cour_del=StudentCourseReg::where('student_info_id',$request->student_info_id)->delete();
                $student_reg_del=StudentRegister::where('student_info_id',$request->student_info_id)->delete();
                $exam_reg_del=ExamRegister::where('student_info_id',$request->student_info_id)->delete();

                // info of da 1 pass info in da2 existing form
                if($request->pass_batch_id){
                    $student_course = new StudentCourseReg();
                    $student_course->student_info_id = $student_info->id;
                    $student_course->batch_id        = $request->pass_batch_id;
                    $student_course->type            = $request->type;
                    $student_course->mac_type        = $request->mac_type;
                    $student_course->date            = $course_date;
                    $student_course->is_finished      = 1;
                    $student_course->status          = 1;
                    $student_course->approve_reject_status  = 1;                
                    $student_course->offline_user  = 0;
                    $student_course->save();
    
                    $student_register = new StudentRegister();
                    $student_register->student_info_id  = $student_info->id;
                    $student_register->batch_id         = $request->pass_batch_id;
                    $student_register->date             = date('Y-m-d');
                    $student_register->invoice_id       = $student_info->id;
                    $student_register->invoice_date     = date('Y-m-d');
                    $student_register->module           = 3;
                    $student_register->type             = $request->type;
                    $student_register->status           = 1;
                    $student_register->form_type        = 1;
                    $student_register->save();
                    
                    $exam_register = new ExamRegister();
                    $exam_register->student_info_id     = $student_info->id;
                    $exam_register->date                = $date;
                    $exam_register->grade               = 1;
                    $exam_register->batch_id            = $request->pass_batch_id;
                    $exam_register->is_full_module      = 3;
                    $exam_register->pass_module      = 3;

                    $exam_register->exam_type_id        = 1;
                    $exam_register->form_type           = 1;
                    $exam_register->status              = 1;
                    $exam_register->passed_date         = $request->da_one_pass_exam_date;
                    $exam_register->passed_level        = $request->da_one_pass_level;
                    // $exam_register->passed_personal_no  = $request->da_one_pass_personal_no;
                    $exam_register->save();
                }
                
                // info of da 2 pass info in da2 existing form
                if($request->batch_id!="null" && $request->batch_id!=null){ 
                    $student_course = new StudentCourseReg();
                    $student_course->student_info_id = $student_info->id;
                    $student_course->batch_id        = $request->batch_id;
                    $student_course->type            = $request->type_da2;
                    $student_course->mac_type        = $request->da_two_mac_type;
                    $student_course->date            = $course_date;
                    $student_course->is_finished      = 1;
                    $student_course->status          = 1;
                    $student_course->approve_reject_status  = 1;
                    $student_course->offline_user  = 0;
                    $student_course->save();
                    
                    $student_register = new StudentRegister();
                    $student_register->student_info_id  = $student_info->id;
                    $student_register->batch_id         = $request->batch_id;
                    $student_register->date             = date('Y-m-d');
                    $student_register->invoice_id       = $student_info->id;
                    $student_register->invoice_date     = date('Y-m-d');
                    if($request->module){
                        $student_register->module           = $request->module; 
                    }
                    $student_register->type             = $request->type;
                    $student_register->status           = 1;
                    $student_register->form_type        = 2;
                    $student_register->save();
                    
                    $exam_register = new ExamRegister();
                    $exam_register->student_info_id     = $student_info->id;
                    $exam_register->date                = $date;
                    if($request->module==1 || $request->module==2){
                        $exam_register->grade           = 1;
                    }else{
                        $exam_register->grade           = 2;
                    }                    
                    $exam_register->batch_id            = $request->batch_id;
                    $exam_register->is_full_module      = $request->module;
                    $exam_register->pass_module         = $request->module;

                    $exam_register->exam_type_id        = 1;
                    $exam_register->form_type           = 2;
                    $exam_register->status              = 1;
                    $exam_register->passed_date         = $request->da_two_pass_exam_date;
                    $exam_register->passed_level        = $request->da_two_pass_level;
                    // $exam_register->passed_personal_no  = $request->da_two_pass_personal_no;
                    $exam_register->save();

                    $student_course = new StudentCourseReg();
                    $student_course->student_info_id = $student_info->id;
                    $student_course->batch_id        = $request->active_batch_id;
                    $student_course->type            = $request->type_active_da2;
                    $student_course->mac_type        = $request->da_two_active_mac_type;
                    $student_course->date            = $course_date;
                    // $student_course->is_finished      = 1;
                    $student_course->status          = 1;
                    $student_course->approve_reject_status  = 0;
                    $student_course->offline_user  = 1;
                    $student_course->save();
                }
                else{
                    $student_course = new StudentCourseReg();
                    $student_course->student_info_id = $student_info->id;
                    $student_course->batch_id        = $request->active_batch_id;
                    $student_course->type            = $request->type_active_da2;
                    $student_course->mac_type        = $request->da_two_active_mac_type;
                    $student_course->date            = $course_date;
                    // $student_course->is_finished      = 1;
                    $student_course->status          = 1;
                    $student_course->approve_reject_status  = 0;
                    $student_course->offline_user  = 1;
                    $student_course->save();
                }
            }
            else{
                $student_cour_del=StudentCourseReg::where('student_info_id',$request->student_info_id)->delete();
                $student_reg_del=StudentRegister::where('student_info_id',$request->student_info_id)->delete();
                $exam_reg_del=ExamRegister::where('student_info_id',$request->student_info_id)->delete();

                $student_course = new StudentCourseReg();                
                $student_course->student_info_id = $student_info->id;
                $student_course->batch_id        = $request->pass_batch_id;
                $student_course->type            = $request->type;
                $student_course->mac_type        = $request->mac_type;
                $student_course->date            = $course_date;
                $student_course->is_finished     = 1;
                $student_course->status          = 0;
                $student_course->approve_reject_status  = 1;
                $student_course->offline_user  = 0;
                $student_course->save();                
                    
                $student_register = new StudentRegister();
                $student_register->student_info_id  = $student_info->id;
                $student_register->batch_id         = $request->pass_batch_id;
                $student_register->date             = date('Y-m-d');
                $student_register->invoice_id       = $student_info->id;
                $student_register->invoice_date     = date('Y-m-d');
                $student_register->module           = $request->module;
                $student_register->type             = $request->type;
                $student_register->status           = 1;
                $student_register->form_type        = 1;
                $student_register->save();
                
                $exam_register = new ExamRegister();
                $exam_register->student_info_id     = $student_info->id;
                $exam_register->date                = $date;
                if($request->module==1 || $request->module==2){                    
                    $exam_register->is_full_module      = $request->module;
                    $exam_register->pass_module      = $request->module;

                    $exam_register->grade           = 1;
                }else{
                    $exam_register->grade           = 2;
                } 
                $exam_register->batch_id            = $request->pass_batch_id;
                $exam_register->exam_type_id        = 1;
                $exam_register->form_type           = 1;
                $exam_register->status              = 1;
                $exam_register->passed_date         = $request->da_one_pass_exam_date;
                $exam_register->passed_level        = $request->da_one_pass_level;
                $exam_register->save();
    
                $student_course = new StudentCourseReg();                
                $student_course->student_info_id = $student_info->id;
                $student_course->batch_id        = $request->active_batch_id;
                $student_course->type            = $request->type_active_da2;
                $student_course->mac_type        = $request->da_two_active_mac_type;
                $student_course->date            = $course_date;
                $student_course->is_finished     = 0;
                $student_course->status          = 0;
                $student_course->approve_reject_status  = 0;
                $student_course->offline_user  = 1;
                $student_course->save();
    
               
            }
            return response()->json($student_info,200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }  

    public function FilterOfflineApplicationList(Request $request){

        $course  = Course::where('code',$request->course_code)->first();
        //  $student_infos = StudentCourseReg::with('student_info','batch')
        //                     ->where('approve_reject_status','=', 1)
        //                     ->where('batch_id','=', $batch_id);

        $student_infos = StudentCourseReg::with('student_info','batch')
                        ->whereHas('batch', function ($query) use ($course) {
                            $query->where('course_id', $course->id);
                        })
                        ->whereHas('student_info', function($q) use ($request){
                            // if($request->name !== ""){
                            //     $q->where('name_mm', 'like', "%" . $request->name . "%")
                            //     ->orWhere('name_eng', 'like', "%" . $request->name . "%");
                            // }
                            // if($request->nrc != "")
                            // {
                            //     $q->where(DB::raw('CONCAT(nrc_state_region, "/", nrc_township,"(",nrc_citizen,")",nrc_number)'),$request->nrc);
                            // }
                            // if($request->batch != "all"){
                            //     $q->where('batch_id', $request->batch);
                            // }
                            //$q->where('offline_user', 1);
                            $q->where('course_type_id', $request->course_type_id);
                        })
                        // ->where('student_course_regs.approve_reject_status','=', $request->status)  
                        ->where('qt_entry','=',0)                      
                        ->where('offline_user','=',1)
                        ->where('approve_reject_status','=',$request->status)
                        ->orderBy('id','desc')->get();

        // return $student_infos;               
        return DataTables::of($student_infos)
            ->addColumn('action', function ($infos) {
                return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-xs' onclick='showOfflineStudentList($infos->id)'>
                                    <li class='fa fa-eye fa-sm'></li>
                                </button>
                            </div>";
            })
            ->addColumn('nrc', function ($infos){
                $nrc_result = $infos->student_info->nrc_state_region . "/" . $infos->student_info->nrc_township . "(" . $infos->student_info->nrc_citizen . ")" . $infos->student_info->nrc_number;
                return $nrc_result;
            })
            ->addColumn('status', function ($infos){
                if($infos->approve_reject_status == 0){
                    return "PENDING";
                }else if($infos->approve_reject_status == 1){
                    return "APPROVED";
                }else{
                    return "REJECTED";
                }
            })
            ->make(true);
    }

    public function rejectOfflineDACPA($id,Request $request)
    {

        $stu_course_reg                         = StudentCourseReg::find($id);
        $stu_course_reg->approve_reject_status  =2;
        $stu_course_reg->remark                 = $request->remark;
        $stu_course_reg->save();
        $approve = StudentInfo::where('id',$stu_course_reg->student_info_id)->first();
        $approve->approve_reject_status         = 2;
        $approve->save();
        return response()->json([
            'message' => "You have successfully rejected that user!",
            'code'    =>  $stu_course_reg->batch->course->code

        ],200);
    }

    public function approveOfflineDACPA($id)
    {
        $stu_course_reg                         = StudentCourseReg::find($id) ;
        $stu_course_reg->approve_reject_status  = 1;
        $stu_course_reg->status                 = 1;
        $stu_course_reg->save();
        // $qt_entry                           = StudentCourseReg::where('id',$id)->get('qt_entry');
        // if($qt_entry[0]->qt_entry==1){
        //     $exam_register                      = ExamRegister::where('id',$stu_course_reg->student_info_id)->latest()->first();
        //     $exam_register->grade               = 1;
        // }else{
        // }     
        $approve                            = StudentInfo::where('id',$stu_course_reg->student_info_id)->first();
        $approve->approve_reject_status     = 1;
        $approve->save();
        return response()->json([
            'message' => "You have successfully approved that user!",
            'code'    =>  $stu_course_reg->batch->course->code
        ],200);
    }

    public function checkCode($id)
    {
        $data = StudentInfo::where('id', $id)->first();
        $data->verify_status = 1;
        $data->save();
        return response()->json([
            'data' => $data
        ], 200);
    }

    public function ChartFilter(Request $request)
    {
        $student = StudentCourseReg::with('batch')->where('approve_reject_status', 1)
            ->whereYear('updated_at', $request->year);
        // if($request->from!="")
        // {
        //     $from=date('Y-m-d',strtotime($request->from));
        //     $student=$student->where('updated_at','>',$from);
        // }
        // if($request->to!=""){
        //     $to=date('Y-m-d',strtotime($request->to));
        //     $student=$student->where('updated_at','<',$to);
        // }
        $student=$student->get();

        return response()->json([
            'data' => $student
        ], 200);
    }

    // public function unique_email(Request $request)
    // {
    //     $emailCheck = StudentInfo::where('email', $request['email'])->first();
    //     $nrcCheck = StudentInfo::Where('nrc_state_region', $request['nrc_state_region'])
    //             ->orWhere('nrc_township', $request['nrc_township'])
    //             ->orWhere('nrc_citizen', $request['nrc_citizen'])
    //             ->orWhere('nrc_number', $request['nrc_number'])->first();
    //     //return $emailcheck;
    //     return response()->json([
    //         'email' => $emailCheck,
    //         'nrc' => $nrcCheck
    //     ],200);
    // }

    public function unique_email(Request $request)
    {
        $emailCheck = StudentInfo::where('email', $request['email'])->first();
        $nrcCheck = StudentInfo::Where('nrc_state_region', $request['nrc_state_region'])
            ->Where('nrc_township', $request['nrc_township'])
            ->Where('nrc_citizen', $request['nrc_citizen'])
            ->Where('nrc_number', $request['nrc_number'])->first();
        //return $emailcheck;
        return response()->json([
            'email' => $emailCheck,
            'nrc' => $nrcCheck
        ], 200);
    }

    // public function unique_nrc(Request $request)
    // {
    //     $nrc_check = StudentInfo::where('nrc_number', '=', $request['nrc_number'])->first();
    //     if($nrc_check)
    //     {
    //         return response()->json([
    //             'data' => "NRC has been used, please check again!"
    //         ],200);
    //     }
    // }

    public function daOneAppListIndi(Request $request)
    {
        if ($request->id != '') {
            $student = StudentCourseReg::where('id', $request->id)->with('student_info', 'batch')->first();

            return view('pages\da_approve_reject\da1_app_individual', compact('student'));
        } else {
            return "no id found";
        }
    }

    public function cpaOneAppListIndi(Request $request)
    {
        if ($request->id != '') {
            $student = StudentCourseReg::where('id', $request->id)->with('student_info', 'batch')->first();

            return view('pages\cpa_one_approve_reject\cpa1_app_individual', compact('student'));
        } else {
            return "no id found";
        }
    }

    public function studentProfile(Request $request)
    {
        if ($request->id != '') {
            $student = StudentInfo::where('id', '=', $request->id)
                ->with('student_job', 'student_education_histroy', 'exam_results', 'student_course_regs', 'cpa_ff', 'papp', 'accountancy_firm', 'firm_ownerships_audits')
                ->first();

            return view('profile.student_profile', compact('student'));
        } else {
            return "no data";
        }
    }


    function getAppStuId($id){
        
        $student = StudentCourseReg::where('student_info_id',$id)->with('batch')->latest()->first();
        return $student;
    }

    function getRegStuId($id){
        $latest_course =  StudentCourseReg::where('student_info_id',$id)->latest()->first();
        $student = StudentRegister::where('student_info_id',$id)->where('batch_id',$latest_course->batch_id)->with('batch')->latest()->first();
        return $student;
    }

    function getExamStuId($id){

        $latest_reg =  StudentRegister::where('student_info_id',$id)->latest()->first();

        $student = ExamRegister::where('student_info_id',$id)->where('batch_id',$latest_reg->batch_id)->with('batch')->latest()->first();
        $student_info = ExamRegister::where('student_info_id',$id)->where('form_type',$student->form_type)->with('batch')->latest()->take(2)->get();
        $module = array();
       
        foreach($student_info as $info){
            array_push($module,$info->is_full_module);    
        }

         
        if(([1,2] == $module) || ([1,2] == $module) || $student->is_full_module == 3){
            $module_status = 1;
        }else{
            $module_status = 2;
        } 

        return response()->json([
            'module_status' =>  $module_status,
            'student'       =>  $student
        ],200);
    }
}
 