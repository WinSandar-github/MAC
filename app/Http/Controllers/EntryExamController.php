<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\StudentInfo;
use Hash;
use App\StudentJobHistroy;
use App\EducationHistroy;
use App\StudentRegister;
use App\StudentCourseReg;
use App\ExamRegister;

use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class EntryExamController extends Controller
{
    public function entryExamResult()
    {
       return view("pages.exam_result.entry_exam_result");
    }
    public function entryExamDetail($id)
    {
       return view("pages.entry_exam.entry_exam_detail");
    }
    public function cpaOneEntryExam(Request $request)
    {       
      // return($request->roll_number);
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
           
    
            $date_of_birth = $request->date_of_birth;
            $degree_date = $request->degree_date;
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
           
        
            $student_info->verify_code      =   $request->verify_code;
            $student_info->payment_method   =   $request->payment_method;
           
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
            $education_histroy->degree_name     =$request->degree_name;
            $education_histroy->certificate     = json_encode($certificate);
            
    
            $education_histroy->qualified_date  = $qualified_date;
            $education_histroy->roll_number     = $request->roll_number;
            $education_histroy->save();
            
            $entry_exam = new ExamRegister();
            $entry_exam->student_info_id = $student_info->id;
            $entry_exam->date            = $date;
            $entry_exam->batch_id        = $request->batch_id;
            $entry_exam->exam_type_id    = 3;
            $entry_exam->status          = 0;
            $entry_exam->grade            = 0;
            $entry_exam->form_type      = 3;
            $entry_exam->save();

            $student_course = new StudentCourseReg();
            $student_course->student_info_id    = $student_info->id;
            $student_course->batch_id           = $request->batch_id;
            $student_course->date            = $course_date;
            $student_course->status          = 1;
            $student_course->approve_reject_status = 0;
            $student_course->type           = $request->type;
            if($request->type == 2){
              $student_course->mac_type           = $request->mac_type;
            }
            $student_course->qt_entry      = 1;
            $student_course->save();
               
            return response()->json([
                $data => $student_info
            ],200);
        
    }

    public function cpaOneEntryApp(Request $request)
    {
        
            $date = date('Y-m-d');
           
            $course_date = date('Y-m-d');
            $student_course = new StudentCourseReg();
            $student_course->student_info_id    = $request->student_info_id;
            $student_course->batch_id           = $request->batch_id;
            $student_course->date            = $course_date;
            $student_course->status          = 1;
            $student_course->approve_reject_status = 0;
            $student_course->type           = $request->type;
            if($request->type == 2){
              $student_course->mac_type           = $request->mac_type;
            }
            $student_course->save();
               
            return response()->json([
                'message' => "Successully Added"
            ],200);
        
    }

    public function entryExamFilter(Request $request)
    {
        $exam_register = ExamRegister::with('student_info','batch')
        ->where('status','=',$request->status)
        ->where('exam_type_id','=',3)
        ->get();
      
       
       
          return DataTables::of($exam_register)
            ->addColumn('action', function ($infos) {
                return "<div class='btn-group'>
                            <a href='entry_exam_detail/$infos->id' class='btn btn-primary btn-xs' >
                                <li class='fa fa-eye fa-sm'></li>
                            </a>
                        </div>";
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
            ->addColumn('remark', function ($infos){
                if($infos->grade == 0){
                  return "-";
                }
                else if($infos->grade == 1){
                  return "PASSED";
                }
                else{
                  return "FAILED";
                }
            })
            // , 'print','exam_type''module'
            ->rawColumns(['action','remark',])
            ->make(true);
    }

    public function filterEntryExamResult(Request $request){
        $exam_register = ExamRegister::with('student_info','batch')
        ->where('status','=',1)
        ->where('grade','=',$request->grade)
        ->where('exam_type_id','=',3)
        ->get();
 
        
          return DataTables::of($exam_register)
            ->addColumn('action', function ($infos) {
                return "<div class='btn-group'>
                            <button type='button' class='btn btn-primary btn-xs' onclick='fillMark($infos->id,$infos->is_full_module)'>
                                <li class='fa fa-eye fa-sm'></li>
                            </button>
                        </div>";
            })

            ->addColumn('exam_type', function ($infos){
                if($infos->exam_type_id == 0){
                  return "SELF STUDY";
                }
                else if($infos->exam_type_id == 1){
                  return "PRIVATE SCHOOL";
                }
                else{
                  return "MAC STUDENT";
                }
            })

            ->addColumn('remark', function ($infos){
                if($infos->grade == 0){
                  return "-";
                }
                else if($infos->grade == 1){
                  return "PASSED";
                }
                else{
                  return "FAILED";
                }
            })

            ->addColumn('module', function ($infos){
                if($infos->is_full_module == 1){
                  return "Module 1";
                }
                else if($infos->is_full_module == 2){
                  return "Module 2";
                }
                else{
                  return "All Module";
                }
            })
            ->rawColumns(['action', 'print','exam_type','remark','module'])
            ->make(true);
       
        
    }
     
}
