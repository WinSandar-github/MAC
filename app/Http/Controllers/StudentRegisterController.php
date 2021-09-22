<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentRegister;
use App\StudentInfo;
use App\StudentCourseReg;
use App\Course;
use App\ExamRegister;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class StudentRegisterController extends Controller
{
    public function index()
    {
        $student_infos = StudentInfo::with('student_register')->get();
        return response()->json([ 'data' => $student_infos],200);
    }

    public function store(Request $request)
    {


        $date = date('Y-m-d');
        if($request->date){
            $date = $request->date;
        }else{
            $date = date('Y-m-d');
        }
        $invoice_date = date('Y-m-d');

        switch ($request->type) {
            case 0:
                if(isset($request->reg_reason))
                {
                    foreach($request->reg_reason as $reg_reason){
                        $registration_reason[] = $reg_reason;
                    }
                }

                if ($request->hasfile('recommend_file')) {
                    $file = $request->file('recommend_file');
                    $name  = uniqid().'.'.$file->getClientOriginalExtension();
                    $file->move(public_path().'/storage/aa_register/',$name);
                    $recommend_file = '/storage/aa_register/'.$name;
                }
                else{
                    $recommend_file="";
                }

                $student_register = new StudentRegister();
                $student_register->student_info_id = $request->student_id;

                if($request->reg_reason){
                    $student_register->reg_reason = implode(",",$registration_reason);
                    // $student_register->reg_reason = $request->reg_reason;
                }

                $student_register->date = $date;
                $student_register->invoice_id = $request->student_id;
                $student_register->invoice_date = $invoice_date;

                // $student_register->academic_year=$request->academic_year;
                // $student_register->direct_access_no=$request->direct_access_no;
                // $student_register->entry_success_no=$request->entry_success_no;
                // $student_register->module=$request->module;
                // $student_register->batch_part_no = $request->batch_part_no;

                $student_register->academic_year=$request->academic_year;
                $student_register->batch_no = $request->batch_no_self;
                $student_register->part_no = $request->part_no_self;
                $student_register->personal_no = $request->personal_no_self;
                $student_register->direct_access_no=$request->direct_access_no;
                $student_register->entry_success_no=$request->entry_success_no;
                $student_register->module=$request->module;

		// $student_register->batch_part_no = $request->batch_part_no;;

		$student_register->type = $request->type;
                $student_register->status = 0;
                $student_register->form_type = $request->form_type;

		// $student_register->mentor_id = $request->mentor_id;
                // $student_register->current_check_service_id = $request->current_check_service_id;
                // $student_register->current_check_services_other = $request->current_check_services_other;
                // $student_register->recommend_file = $recommend_file;
                $student_register->save();


                return "You have successfully registerd!";
                break;
            case 1:
                if ($request->hasfile('recommend_file')) {
                    $file = $request->file('recommend_file');
                    $name  = uniqid().'.'.$file->getClientOriginalExtension();
                    $file->move(public_path().'/storage/aa_register/',$name);
                    $recommend_file = '/storage/aa_register/'.$name;
                }
                else{
                    $recommend_file="";
                }

                $student_register = new StudentRegister();
                $student_register->student_info_id = $request->student_id;
                $student_register->date = $date;
                $student_register->invoice_id = $request->student_id;;
                $student_register->invoice_date = $invoice_date;
                $student_register->type = $request->type;
                $student_register->private_school_name = $request->private_school_name;
                $student_register->academic_year = $request->academic_year;
                $student_register->batch_no = $request->batch_no_private;
                $student_register->part_no = $request->part_no_private;
                $student_register->personal_no = $request->personal_no_private;
                $student_register->direct_access_no = $request->direct_access_no;
                $student_register->entry_success_no = $request->entry_success_no;
                $student_register->cpa_one_pass_date = $request->cpa_one_pass_date;
                $student_register->cpa_one_access_no = $request->cpa_one_access_no;
                $student_register->cpa_one_success_no = $request->cpa_one_success_no;
                $student_register->status = 0;
                $student_register->form_type = $request->form_type;

                $student_register->save();
                return "You have successfully registerd!";
                break;
            case 2:
                if ($request->hasfile('good_behavior')) {
                    $file = $request->file('good_behavior');
                    $name  = uniqid().'.'.$file->getClientOriginalExtension();
                    $file->move(public_path().'/storage/student_info/',$name);
                    $good_behavior = '/storage/student_info/'.$name;
                }
                else{
                    $good_behavior="";
                }
                if ($request->hasfile('no_crime')) {
                    $file = $request->file('no_crime');
                    $name  = uniqid().'.'.$file->getClientOriginalExtension();
                    $file->move(public_path().'/storage/student_info/',$name);
                    $no_crime = '/storage/student_info/'.$name;
                }
                else{
                    $no_crime="";
                }

                if ($request->hasfile('recommend_file')) {
                    $file = $request->file('recommend_file');
                    $name  = uniqid().'.'.$file->getClientOriginalExtension();
                    $file->move(public_path().'/storage/aa_register/',$name);
                    $recommend_file = '/storage/aa_register/'.$name;
                }
                else{
                    $recommend_file="";
                }

                $student_register = new StudentRegister();
                $student_register->student_info_id = $request->student_id;
                $student_register->date = $date;
                $student_register->invoice_id = $request->student_id;;
                $student_register->invoice_date = $invoice_date;
                $student_register->type = $request->type;
                $student_register->academic_year=$request->academic_year;
                $student_register->batch_no = $request->batch_no_mac;
                $student_register->part_no = $request->part_no_mac;
                $student_register->personal_no = $request->personal_no_mac;
                $student_register->direct_access_no=$request->direct_access_no;
                $student_register->entry_success_no=$request->entry_success_no;
                $student_register->internship=$request->internship;
                $student_register->good_behavior=$good_behavior;
                $student_register->no_crime=$no_crime;
                $student_register->module=$request->module;
                $student_register->cpa_one_pass_date = $request->cpa_one_pass_date;
                $student_register->cpa_one_access_no = $request->cpa_one_access_no;
                $student_register->cpa_one_success_no = $request->cpa_one_success_no;
                $student_register->status = 0;
                $student_register->form_type = $request->form_type;
                $student_register->save();
                return "You have successfully registerd!";
                break;
        }


    }

    public function show($id)
    {
        $student_register = StudentInfo::where('id',$id)->with('student_register')->get();
        return response()->json([
            'data' => $student_register
        ],200);

    }
    public function showStudentRegister($id)
    {
        $student_register = StudentRegister::where('id',$id)->with('student_info')->first();
        return response()->json([
            'data' => $student_register
        ],200);

    }


    public function approveStudent($id)
    {
        $approve = StudentRegister::find($id);
        $approve->status = 1;
        $approve->save();
        return response()->json([
            'data' =>$approve->form_type
        ],200);
    }

    public function rejectStudent($id)
    {
        $reject = StudentRegister::find($id);
        $reject->status = 2;
        $reject->save();
        return response()->json([
            'data' =>$reject->form_type
        ],200);
    }

    public function getType($id)
    {
        $type = StudentRegister::where('student_info_id',$id)->with('course')->get();
        // return $type;
        return response()->json([
            'data' => $type
        ],200);
    }

    // public function FilterRegistration(Request $request){
    //     $student_register = StudentRegister::with('student_info','course');
    //     if($request->name!="")
    //     {
    //         $student_register = $student_register->join('student_infos', 'student_register.student_info_id', '=', 'student_infos.id')
    //         ->where('student_infos.name_mm', 'like', '%' . $request->name. '%')
    //         ->orWhere('student_infos.name_eng', 'like', '%' . $request->name. '%');
    //     }
    //     if($request->status!="all")
    //     {
    //         $student_register = $student_register->where('student_register.status',$request->status);
    //     }
    //     if($request->batch!="all"){
    //         $student_register = $student_register->join('student_course_regs', 'student_register.student_info_id', '=', 'student_course_regs.student_info_id')
    //         ->where('student_course_regs.batch_id',$request->batch);
    //     }
    //     $student_register = $student_register->where('form_type', $request->course_code)->get();
    //     return response()->json([ 'data' => $student_register],200);
    // }
    public function FilterRegistration(Request $request){
        $student_register = StudentRegister::with('student_info','course')
        ->where('form_type',$request->form_type)
        ->where('status',$request->status)
        ->where('type',$request->reg_type)
        ->get();
      
        $datatable= DataTables::of($student_register)
            ->addColumn('action', function ($student) {
                return "<div class='btn-group'>
                            <button type='button' class='btn btn-primary btn-xs' onclick='showRegistration($student->id,$student->form_type)'>
                            <li class='fa fa-eye fa-sm'></li>
                            </button>
                        </div>";
            })
            ->addColumn('name', function ($c){
                return $c->student_info->name_mm;
            })
            ->addColumn('email', function ($student) {
               return $student->student_info ? Str::limit($student->student_info->email, 50, '...') : '';
            })
            ->addColumn('reg_no', function ($student) {
                return $student->student_info ? Str::limit($student->student_info->registration_no, 50, '...') : '';
            })
            ->addColumn('phone', function ($student) {
                return $student->student_info ? Str::limit($student->student_info->phone, 50, '...') : '';

            })
            ->addColumn('status', function ($student) {
                if($student->status==0){
                    return "PENDING";
                }
                else if($student->status==1){
                    return "APPROVED";
                }
                else{
                    return "REJECTED";
                }
            });
        if($request->is_reg_reason==true){
            $datatable= $datatable->addColumn('reg_reason', function ($student) {
                return $student->reg_reason ? Str::limit($student->reg_reason, 50, '...') : '';
            });
        }
        $datatable= $datatable->make(true);
        return  $datatable;
    }

    public function updateMentor(Request $request)
    {

        if ($request->hasfile('recommend_file')) {
            $file = $request->file('recommend_file');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/aa_register/',$name);
            $recommend_file = '/storage/aa_register/'.$name;
        }
        else{
            $recommend_file="";
        }

        $student_register =  StudentRegister::where('student_info_id',$request->student_id)->latest()->first();

        $student_register->mentor_id = $request->mentor_id;
        $student_register->current_check_service_id = $request->current_check_service_id;
        $student_register->current_check_services_other = $request->current_check_services_other;
        $student_register->recommend_file = $recommend_file;
        $student_register->save();


        return response()->json([
            'message' => "Successfully"
        ]);
    }

    public function store_student_app_reg(Request $request)
    {
        $date = date('Y-m-d');
        $course_date = date('Y-m-d');
        if($request->date){
            $date = $request->date;
        }else{
            $date = date('Y-m-d');
        }
        $invoice_date = date('Y-m-d');

        $student_info = StudentInfo::find($request->student_id);
        $student_info->approve_reject_status = 1;
        if($request->direct_degree)
        {
            $student_info->direct_degree                =   $request->direct_degree;
            $student_info->degree_date                  =   date("Y-m-d",strtotime($request->degree_date));
            $student_info->degree_certificate_image     =   $deg_certi_img;
            $student_info->degree_rank                  =   $request->degree_rank;
        }
        $student_info->save();

        $student_course = new StudentCourseReg();
        $student_course->student_info_id = $student_info->id;
        $student_course->batch_id        = $request->batch_id;
        $student_course->date            = $course_date;
        $student_course->status          = 1;
        $student_course->approve_reject_status = 1;
        $student_course->save();

        switch ($request->type) {
            case 0:
                if(isset($request->reg_reason))
                {
                    foreach($request->reg_reason as $reg_reason){
                        $registration_reason[] = $reg_reason;
                    }
                }

                if ($request->hasfile('recommend_file')) {
                    $file = $request->file('recommend_file');
                    $name  = uniqid().'.'.$file->getClientOriginalExtension();
                    $file->move(public_path().'/storage/aa_register/',$name);
                    $recommend_file = '/storage/aa_register/'.$name;
                }
                else{
                    $recommend_file="";
                }

                $student_register = new StudentRegister();
                $student_register->student_info_id = $request->student_id;

                if($request->reg_reason){
                    $student_register->reg_reason = implode(",",$registration_reason);
                    // $student_register->reg_reason = $request->reg_reason;
                }
                $student_register->batch_no = $request->batch_no_self;
                $student_register->part_no = $request->part_no_self;
                $student_register->personal_no = $request->personal_no_self;
                $student_register->date = $date;
                $student_register->invoice_id = $request->student_id;
                $student_register->invoice_date = $invoice_date;
                $student_register->academic_year=$request->academic_year;
                $student_register->direct_access_no=$request->direct_access_no;
                $student_register->entry_success_no=$request->entry_success_no;
                $student_register->module=$request->module;
                // $student_register->batch_part_no = $request->batch_part_no;;
                $student_register->type = $request->type;
                $student_register->status = 0;
                $student_register->form_type = $request->form_type;
                // $student_register->mentor_id = $request->mentor_id;
                // $student_register->current_check_service_id = $request->current_check_service_id;
                // $student_register->current_check_services_other = $request->current_check_services_other;
                // $student_register->recommend_file = $recommend_file;
                $student_register->save();


                return "You have successfully registerd!";
                break;
            case 1:
                if ($request->hasfile('recommend_file')) {
                    $file = $request->file('recommend_file');
                    $name  = uniqid().'.'.$file->getClientOriginalExtension();
                    $file->move(public_path().'/storage/aa_register/',$name);
                    $recommend_file = '/storage/aa_register/'.$name;
                }
                else{
                    $recommend_file="";
                }

                $student_register = new StudentRegister();
                $student_register->student_info_id = $request->student_id;
                $student_register->date = $date;
                $student_register->invoice_id = $request->student_id;;
                $student_register->invoice_date = $invoice_date;
                $student_register->type = $request->type;
                $student_register->batch_no = $request->batch_no_private;
                $student_register->part_no = $request->part_no_private;
                $student_register->personal_no = $request->personal_no_private;
                $student_register->private_school_name = $request->private_school_name;
                $student_register->academic_year = $request->academic_year;
                $student_register->direct_access_no = $request->direct_access_no;
                $student_register->entry_success_no = $request->entry_success_no;
                $student_register->cpa_one_pass_date = $request->cpa_one_pass_date;
                $student_register->cpa_one_access_no = $request->cpa_one_access_no;
                $student_register->cpa_one_success_no = $request->cpa_one_success_no;
                $student_register->status = 0;
                $student_register->form_type = $request->form_type;

                $student_register->save();
                return "You have successfully registerd!";
                break;
            case 2:
                if ($request->hasfile('good_behavior')) {
                    $file = $request->file('good_behavior');
                    $name  = uniqid().'.'.$file->getClientOriginalExtension();
                    $file->move(public_path().'/storage/student_info/',$name);
                    $good_behavior = '/storage/student_info/'.$name;
                }
                else{
                    $good_behavior="";
                }
                if ($request->hasfile('no_crime')) {
                    $file = $request->file('no_crime');
                    $name  = uniqid().'.'.$file->getClientOriginalExtension();
                    $file->move(public_path().'/storage/student_info/',$name);
                    $no_crime = '/storage/student_info/'.$name;
                }
                else{
                    $no_crime="";
                }

                if ($request->hasfile('recommend_file')) {
                    $file = $request->file('recommend_file');
                    $name  = uniqid().'.'.$file->getClientOriginalExtension();
                    $file->move(public_path().'/storage/aa_register/',$name);
                    $recommend_file = '/storage/aa_register/'.$name;
                }
                else{
                    $recommend_file="";
                }

                $student_register = new StudentRegister();
                $student_register->student_info_id = $request->student_id;
                $student_register->date = $date;
                $student_register->invoice_id = $request->student_id;;
                $student_register->invoice_date = $invoice_date;
                $student_register->type = $request->type;
                $student_register->batch_no = $request->batch_no_mac;
                $student_register->part_no = $request->part_no_mac;
                $student_register->personal_no = $request->personal_no_mac;
                $student_register->academic_year=$request->academic_year;
                $student_register->direct_access_no=$request->direct_access_no;
                $student_register->entry_success_no=$request->entry_success_no;
                $student_register->internship=$request->internship;
                $student_register->good_behavior=$good_behavior;
                $student_register->no_crime=$no_crime;
                $student_register->module=$request->module;
                $student_register->cpa_one_pass_date = $request->cpa_one_pass_date;
                $student_register->cpa_one_access_no = $request->cpa_one_access_no;
                $student_register->cpa_one_success_no = $request->cpa_one_success_no;
                $student_register->status = 0;
                $student_register->form_type = $request->form_type;

                $student_register->save();
                return "You have successfully registerd!";
                break;
        }

    }

    public function getAttendesStudent(Request $request)
    {

        $course = Course::where('code',$request->course_code)->first();

        $student_infos = StudentRegister::with('student_info','course')
                        ->where('form_type',$course->id)
                        ->whereNotNull('sr_no')->orderBy('sr_no','asc')->get();

        return DataTables::of($student_infos)

        ->addColumn('nrc', function ($infos){
            $nrc_result = $infos->student_info->nrc_state_region . "/" . $infos->student_info->nrc_township . "(" . $infos->student_info->nrc_citizen . ")" . $infos->student_info->nrc_number;
            return $nrc_result;
        })
        ->make(true);
        // return response()->json([
        //     'data' => $student_infos
        // ]);


    }
    public function ‌approveExamList(Request $request)
    {
       
        $course = Course::where('code', $request->course_code)->first();
        


        $student_infos = ExamRegister::with('student_info','course')
                        ->where('form_type',$course->id)
                        ->where('status',1)
                        ->whereNotNull('sr_no')
                        ->orWhere('grade',$request->grade)->orderBy('sr_no','asc')->get();


        return DataTables::of($student_infos)
        ->addColumn('nrc', function ($infos){
            $nrc_result = $infos->student_info->nrc_state_region . "/" . $infos->student_info->nrc_township . "(" . $infos->student_info->nrc_citizen . ")" . $infos->student_info->nrc_number;
            return $nrc_result;
        })
        ->make(true);

        // return response()->json([
        //     'data' => $student_infos
        // ]);


    }

    public function RegChartFilter(Request $request)
    {
        $student=StudentRegister::where('status',1)
        ->whereYear('updated_at',$request->year);
        $student=$student->get();

        return response()->json([
            'data' => $student
        ],200);
    }
}
