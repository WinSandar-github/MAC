<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentRegister;
use App\StudentInfo;
use App\StudentCourseReg;
use App\StudentJobHistroy;
use App\Course;
use App\ExamRegister;
use App\Invoice;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class StudentRegisterController extends Controller
{
    public function index()
    {
        $student_infos = StudentInfo::with('student_register')->get();
        return response()->json(['data' => $student_infos], 200);
    }

    public function store(Request $request)
    {
        // return $request;
        $date = date('Y-m-d');
        if ($request->date) {
            $date = $request->date;
        } else {
            $date = date('Y-m-d');
        }
        $invoice_date = date('Y-m-d');

        if ($request->remain_module == 1 || $request->remain_module == 2 || $request->remain_module==0 && $request->remain_module != null) {
            $course_date = date('Y-m-d');

            $student_info = StudentInfo::find($request->student_id);
            $student_info->approve_reject_status = 1;
            $student_info->save();

            $student_course = new StudentCourseReg();
            $student_course->sr_no = $request->sr_no;
            $student_course->student_info_id = $student_info->id;
            $student_course->batch_id        = $request->batch_id;
            $student_course->date = $course_date;
            $student_course->status = 1;
            $student_course->approve_reject_status = 1;
            $student_course->type = $request->type;
            $student_course->mac_type = $request->mac_type;
            $student_course->save();

            //invoice
            // $invNo = str_pad($student_course->id, 20, "0", STR_PAD_LEFT);

            // $invoice = new Invoice();
            // $invoice->student_info_id = $student_info->id;
            // $invoice->invoiceNo = $invNo;
            // $invoice->status = 0;
            // $invoice->save();

            
        }

        //update student information
        $student_info = StudentInfo::find($request->student_id);

        if ($request->hasfile('recommendation_letter')) {
            $file = $request->file('recommendation_letter');
            $name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/storage/student_info/', $name);
            $recommendation_letter = '/storage/student_info/' . $name;
        } else {
            $recommendation_letter = $student_info->recommend_letter;
        }
        
        if ($request->hasfile('profile_photo')) {
            $file = $request->file('profile_photo');
            $name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/storage/student_info/', $name);
            $profile_photo = '/storage/student_info/' . $name;
        } else {
            $profile_photo = $student_info->image;
        }
        $student_info->recommend_letter = $recommendation_letter;
        $student_info->image = $profile_photo;
        $student_info->address = $request->address;
        $student_info->current_address = $request->current_address;
        $student_info->phone = $request->phone;
        $student_info->gov_staff = $request->gov_staff;
        $student_info->save();

        $student_job = StudentJobHistroy::where('student_info_id', $request->student_id)->first();
        $student_job->office_address = $request->office_address;
        $student_job->save();
        //update student information end....

        switch ($request->type) {
            case 0:

                if (isset($request->reg_reason)) {
                    foreach ($request->reg_reason as $reg_reason) {
                        $registration_reason[] = $reg_reason;
                    }
                }

                if ($request->hasfile('recommend_file')) {
                    $file = $request->file('recommend_file');
                    $name = uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path() . '/storage/aa_register/', $name);
                    $recommend_file = '/storage/aa_register/' . $name;
                } else {
                    $recommend_file = "";
                }

                $student_register = new StudentRegister();
                $student_register->student_info_id = $request->student_id;
                $student_register->sr_no = $request->sr_no;

                if ($request->reg_reason) {
                    $student_register->reg_reason = implode(",", $registration_reason);
                    // $student_register->reg_reason = $request->reg_reason;
                }

                $student_register->date = $date;
                $student_register->invoice_id = $request->student_id;
                $student_register->invoice_date = $invoice_date;
                $student_register->batch_id = $request->batch_id;
                // $student_register->academic_year=$request->academic_year;
                // $student_register->direct_access_no=$request->direct_access_no;
                // $student_register->entry_success_no=$request->entry_success_no;
                // $student_register->module=$request->module;
                // $student_register->batch_part_no = $request->batch_part_no;

                $student_register->academic_year = $request->academic_year;
                $student_register->batch_no = $request->batch_no_self;
                $student_register->part_no = $request->part_no_self;
                $student_register->personal_no = $request->personal_no_self;
                $student_register->direct_access_no = $request->direct_access_no;
                $student_register->entry_success_no = $request->entry_success_no;
                $student_register->module = $request->module;

		        // $student_register->batch_part_no = $request->batch_part_no;;

                $student_register->type = $request->type;
                $student_register->status = 0;
                $student_register->form_type = $request->form_type;

		        // $student_register->mentor_id = $request->mentor_id;
                // $student_register->current_check_service_id = $request->current_check_service_id;
                // $student_register->current_check_services_other = $request->current_check_services_other;
                // $student_register->recommend_file = $recommend_file;
                $student_register->save();
        
                //invoice        
                $invoice = new Invoice();
                $invoice->student_info_id = $student_info->id;

                // $invNo = str_pad( date('Ymd') . Str::upper(Str::random(5)) . $student_info->id, 20, "0", STR_PAD_LEFT);
                // $invoice->invoiceNo       = $invNo;

                $invoice->name_eng        = $student_info->name_eng;
                $invoice->email           = $student_info->email;
                $invoice->phone           = $student_info->phone;
                
                $std = StudentCourseReg::with('batch')->where("student_info_id", $student_info->id)->latest()->first();

                $invoice->invoiceNo = 'self_reg_' . $std->batch->course->code;
                $invoice->productDesc     = 'App Fee,Self-Study Reg Fee,' . $std->batch->course->name;
                $invoice->amount          = $std->batch->course->form_fee. ',' .$std->batch->course->selfstudy_registration_fee;
                $invoice->status          = 0;
                $invoice->save();
                return "You have successfully registerd!";
                break;
            case 1:
                if ($request->hasfile('recommend_file')) {
                    $file = $request->file('recommend_file');
                    $name = uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path() . '/storage/aa_register/', $name);
                    $recommend_file = '/storage/aa_register/' . $name;
                } else {
                    $recommend_file = "";
                }
                $student_register = new StudentRegister();
                $student_register->student_info_id = $request->student_id;
                $student_register->sr_no = $request->sr_no;
                $student_register->date = $date;
                $student_register->invoice_id = $request->student_id;
                $student_register->batch_id = $request->batch_id;
                $student_register->invoice_date = $invoice_date;
                $student_register->type = $request->type;
                $student_register->private_school_name = $request->private_school_name;
                $student_register->academic_year = $request->academic_year;
                $student_register->batch_no = $request->batch_no_private;
                $student_register->part_no = $request->part_no_private;
                $student_register->personal_no = $request->personal_no_private;
                $student_register->module = $request->module;
                $student_register->direct_access_no = $request->direct_access_no;
                $student_register->entry_success_no = $request->entry_success_no;
                $student_register->cpa_one_pass_date = $request->cpa_one_pass_date;
                $student_register->cpa_one_access_no = $request->cpa_one_access_no;
                $student_register->cpa_one_success_no = $request->cpa_one_success_no;
                $student_register->module = $request->module;
                $student_register->status = 0;
                $student_register->form_type = $request->form_type;

                $student_register->save();               

                //invoice        
                $invoice = new Invoice();
                $invoice->student_info_id = $student_info->id;

                // $invNo = str_pad( date('Ymd') . Str::upper(Str::random(5)) . $student_info->id, 20, "0", STR_PAD_LEFT);
                // $invoice->invoiceNo       = $invNo;

                $invoice->name_eng        = $student_info->name_eng;
                $invoice->email           = $student_info->email;
                $invoice->phone           = $student_info->phone;
                
                $std = StudentCourseReg::with('batch')->where("student_info_id", $student_info->id)->latest()->first();

                $invoice->invoiceNo = 'prv_reg_' . $std->batch->course->code;
                $invoice->productDesc     = 'App Fee,Private School Reg Fee,' . $std->batch->course->name;
                $invoice->amount          = $std->batch->course->form_fee.','.$std->batch->course->privateschool_registration_fee ;
                $invoice->status          = 0;
                $invoice->save();
                return "You have successfully registerd!";
                break;
            case 2:
                if ($request->hasfile('good_behavior')) {
                    $file = $request->file('good_behavior');
                    $name = uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path() . '/storage/student_info/', $name);
                    $good_behavior = '/storage/student_info/' . $name;
                } else {
                    $good_behavior = "";
                }
                if ($request->hasfile('no_crime')) {
                    $file = $request->file('no_crime');
                    $name = uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path() . '/storage/student_info/', $name);
                    $no_crime = '/storage/student_info/' . $name;
                } else {
                    $no_crime = "";
                }

                if ($request->hasfile('recommend_file')) {
                    $file = $request->file('recommend_file');
                    $name = uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path() . '/storage/aa_register/', $name);
                    $recommend_file = '/storage/aa_register/' . $name;
                } else {
                    $recommend_file = "";
                }

                $student_register = new StudentRegister();
                $student_register->student_info_id = $request->student_id;
                $student_register->sr_no = $request->sr_no;
                $student_register->date = $date;
                $student_register->invoice_id = $request->student_id;
                $student_register->batch_id = $request->batch_id;
                $student_register->invoice_date = $invoice_date;
                $student_register->type = $request->type;
                $student_register->academic_year = $request->academic_year;
                $student_register->batch_no = $request->batch_no_mac;
                $student_register->part_no = $request->part_no_mac;
                $student_register->personal_no = $request->personal_no_mac;
                $student_register->direct_access_no = $request->direct_access_no;
                $student_register->entry_success_no = $request->entry_success_no;
                $student_register->internship = $request->internship;
                $student_register->good_behavior = $good_behavior;
                $student_register->no_crime = $no_crime;
                $student_register->module = $request->module;
                $student_register->cpa_one_pass_date = $request->cpa_one_pass_date;
                $student_register->cpa_one_access_no = $request->cpa_one_access_no;
                $student_register->cpa_one_success_no = $request->cpa_one_success_no;
                $student_register->status = 0;
                $student_register->form_type = $request->form_type;
                $student_register->save();

                //invoice        
                $invoice = new Invoice();
                $invoice->student_info_id = $student_info->id;

                // $invNo = str_pad( date('Ymd') . Str::upper(Str::random(5)) . $student_info->id, 20, "0", STR_PAD_LEFT);
                // $invoice->invoiceNo       = $invNo;

                $invoice->name_eng        = $student_info->name_eng;
                $invoice->email           = $student_info->email;
                $invoice->phone           = $student_info->phone;
                
                $std = StudentCourseReg::with('batch')->where("student_info_id", $student_info->id)->latest()->first();

                $invoice->invoiceNo = 'mac_reg_' . $std->batch->course->code;
                $invoice->productDesc     = 'App Fee,MAC Reg Fee,Course Fee,'. $std->batch->course->name;
                $invoice->amount          = $std->batch->course->form_fee.','.$std->batch->course->mac_registration_fee.','.$std->batch->course->tution_fee;
                $invoice->status          = 0;
                $invoice->save();
                return "You have successfully registerd!";
                break;
        }
    }

    public function show($id)
    {
        $student_register = StudentInfo::where('id', $id)->with('student_register')->get();
        return response()->json([
            'data' => $student_register
        ], 200);

    }

    public function showStudentRegister($id)
    {
        $student_register = StudentRegister::where('id', $id)->with('student_info', 'course')->first();
        return response()->json([
            'data' => $student_register
        ], 200);

    }

    public function approveStudent($id)
    {
        $approve = StudentRegister::find($id);
        $approve->status = 1;
        $approve->save();
        return response()->json([
            'data' => $approve->form_type
        ], 200);
    }

    public function rejectStudent($id)
    {
        $reject = StudentRegister::find($id);
        $reject->status = 2;
        $reject->save();
        return response()->json([
            'data' => $reject->form_type
        ], 200);
    }

    public function getType($id)
    {
        $type = StudentRegister::where('student_info_id', $id)->with('course')->get();
        // return $type;
        return response()->json([
            'data' => $type
        ], 200);
    }

    public function FilterRegistration(Request $request)
    {
        // return $request;
        
        $student_register = StudentRegister::with('student_info', 'course')
            ->where('form_type', $request->form_type)
            ->where('status', $request->status)
            ->where('type', $request->reg_type)
            ->get();

        $datatable = DataTables::of($student_register)
            ->editColumn('name', function ($infos) {
                return $infos->student_info->name_mm ;
            })

            ->addColumn('action', function ($student) {               

                /*0 is self study*/

                return "<div class='btn-group'>
                    <button type='button' class='btn btn-primary btn-xs' onclick='showRegistration($student->id,$student->form_type)'>
                    <li class='fa fa-eye fa-sm'></li>
                    </button>
                </div>";
            })

            ->addColumn('email', function ($student) {
                return $student->student_info ? Str::limit($student->student_info->email, 50, '...') : '';
            })

            ->addColumn('reg_no', function ($student) {
                return $student->sr_no ? Str::limit($student->sr_no, 50, '...') : '';
            })

            ->addColumn('phone', function ($student) {
                return $student->student_info ? Str::limit($student->student_info->phone, 50, '...') : '';
            })

            ->addColumn('payment_status', function ($student){
                // return $student;
                switch ($student->course->code) {
                    case 'da_1':
                        $course_code = "da_1";
                        break;
                    case 'da_2':
                        $course_code = "da_2";
                        break;
                    case 'cpa_1':
                        $course_code = "cpa_1";
                        break;
                    case 'cpa_2':
                        $course_code = "cpa_2";
                        break;
                    default:
                        $course_code = "da_1";
                        break;

                }

                switch ($student->type) {
                    case 0:
                        $reg_type = "self_reg_";
                        break;
                    case 1:
                        $reg_type = "prv_reg_";
                        break;
                    case 2:
                        $reg_type = "mac_reg_";
                        break;
                    default:
                        $reg_type = "self_reg_";
                        break;
                }
                $invoices = Invoice::where('invoiceNo',$reg_type.$course_code)
                                    ->where('student_info_id',$student->student_info_id)->get();
                                    
                foreach($invoices as $invoice){
                    return $invoice->status == "AP" ? "Complete" : "Incomplete";
                }
                
            })

            ->addColumn('status', function ($student) {
                if ($student->status == 0) {
                    return "<span class='pending'>Pending</span>";
                } else if ($student->status == 1) {
                    return "<span class='approve'>Approved</span>";
                } else {
                    return "<span class='reject'>Rejected</span>";
                }
            })

            ->rawColumns(['name', 'action', 'status']);

        if ($request->is_reg_reason == true) {
            $datatable = $datatable->addColumn('reg_reason', function ($student) {
                return $student->reg_reason ? Str::limit($student->reg_reason, 50, '...') : '';
            });
        }
        $datatable = $datatable->make(true);
        return $datatable;
    }

    public function updateMentor(Request $request)
    {

        if ($request->hasfile('recommend_file')) {
            $file = $request->file('recommend_file');
            $name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/storage/aa_register/', $name);
            $recommend_file = '/storage/aa_register/' . $name;
        } else {
            $recommend_file = "";
        }

        $student_register = StudentRegister::where('student_info_id', $request->student_id)->latest()->first();

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
        // $date = date('Y-m-d');
        $course_date = date('Y-m-d');

        if($request->date){
            $date = $request->date;
        } else {
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
        //update student information

        if ($request->hasfile('recommendation_letter')) {
            $file = $request->file('recommendation_letter');
            $name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/storage/student_info/', $name);
            $recommendation_letter = '/storage/student_info/' . $name;
        } else {
            $recommendation_letter = $student_info->recommend_letter;
        }
        if ($request->hasfile('profile_photo')) {
            $file = $request->file('profile_photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $profile_photo = '/storage/student_info/'.$name;
        } else{
            $profile_photo=$student_info->image;
        }       

        $student_info->recommend_letter =   $recommendation_letter;
        $student_info->image =   $profile_photo;
        $student_info->address = $request->address;
        $student_info->current_address =   $request->current_address;
        $student_info->phone =   $request->phone;
        $student_info->gov_staff =   $request->gov_staff;
        $student_info->save();

        $student_job = StudentJobHistroy::where('student_info_id', $request->student_id)->first();
        $student_job->office_address = $request->office_address;
        $student_job->save();

        // $old_course = StudentCourseReg::where('student_info_id',$student_info->id)->first();

        $student_course = new StudentCourseReg();
        $student_course->student_info_id = $student_info->id;
        $student_course->batch_id        = $request->batch_id;
        $student_course->date            = $course_date;
        $student_course->status          = 1;
        $student_course->type            = $request->type;

        if($request->type == 2){
            $student_course->mac_type          = $request->mac_type;
        }

        $student_course->approve_reject_status = 1;
        $student_course->save();

        switch ($request->type) {
            case 0:
                if (isset($request->reg_reason)) {
                    foreach ($request->reg_reason as $reg_reason) {
                        $registration_reason[] = $reg_reason;
                    }
                }

                if ($request->hasfile('recommend_file')) {
                    $file = $request->file('recommend_file');
                    $name = uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path() . '/storage/aa_register/', $name);
                    $recommend_file = '/storage/aa_register/' . $name;
                } else {
                    $recommend_file = "";
                }

                $student_register = new StudentRegister();
                $student_register->student_info_id = $request->student_id;
                $student_register->sr_no = $request->sr_no;
                if($request->reg_reason){
                    $student_register->reg_reason = implode(",",$registration_reason);
                    // $student_register->reg_reason = $request->reg_reason;
                }
                $student_register->batch_no = $request->batch_no_self;
                $student_register->part_no = $request->part_no_self;
                $student_register->batch_id = $request->batch_id;
                $student_register->personal_no = $request->personal_no_self;
                $student_register->date = $date;
                $student_register->invoice_id = $request->student_id;
                $student_register->invoice_date = $invoice_date;
                $student_register->academic_year = $request->academic_year;
                $student_register->direct_access_no = $request->direct_access_no;
                $student_register->entry_success_no = $request->entry_success_no;
                $student_register->module = $request->module;
                // $student_register->batch_part_no = $request->batch_part_no;;
                $student_register->type = $request->type;
                $student_register->status = 0;
                $student_register->form_type = $request->form_type;
                // $student_register->mentor_id = $request->mentor_id;
                // $student_register->current_check_service_id = $request->current_check_service_id;
                // $student_register->current_check_services_other = $request->current_check_services_other;
                // $student_register->recommend_file = $recommend_file;
                $student_register->save();
                //invoice        
                $invoice = new Invoice();
                $invoice->student_info_id = $student_info->id;

                // $invNo = str_pad( date('Ymd') . Str::upper(Str::random(5)) . $student_info->id, 20, "0", STR_PAD_LEFT);
                // $invoice->invoiceNo       = $invNo;

                $invoice->name_eng        = $student_info->name_eng;
                $invoice->email           = $student_info->email;
                $invoice->phone           = $student_info->phone;
                
                $std = StudentCourseReg::with('batch')->where("student_info_id", $student_info->id)->latest()->first();

                $invoice->invoiceNo = 'self_reg_' . $std->batch->course->code;
                $invoice->productDesc     = 'App Fee,Self-Study Reg Fee,' . $std->batch->course->name;
                $invoice->amount          = $std->batch->course->form_fee.','.$std->batch->course->selfstudy_registration_fee ;
                $invoice->status          = 0;
                $invoice->save();

                return "You have successfully registerd!";
                break;
            case 1:
                if ($request->hasfile('recommend_file')) {
                    $file = $request->file('recommend_file');
                    $name = uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path() . '/storage/aa_register/', $name);
                    $recommend_file = '/storage/aa_register/' . $name;
                } else {
                    $recommend_file = "";
                }

                $student_register = new StudentRegister();
                $student_register->student_info_id = $request->student_id;
                $student_register->sr_no = $request->sr_no;
                $student_register->date = $date;
                $student_register->invoice_id = $request->student_id;
                $student_register->batch_id = $request->batch_id;
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
                $student_register->module = $request->module;
                $student_register->status = 0;
                $student_register->form_type = $request->form_type;

                $student_register->save();
                //invoice        
                $invoice = new Invoice();
                $invoice->student_info_id = $student_info->id;

                // $invNo = str_pad( date('Ymd') . Str::upper(Str::random(5)) . $student_info->id, 20, "0", STR_PAD_LEFT);
                // $invoice->invoiceNo       = $invNo;

                $invoice->name_eng        = $student_info->name_eng;
                $invoice->email           = $student_info->email;
                $invoice->phone           = $student_info->phone;
                
                $std = StudentCourseReg::with('batch')->where("student_info_id", $student_info->id)->latest()->first();

                $invoice->invoiceNo = 'prv_reg_' . $std->batch->course->code;
                $invoice->productDesc     = 'App Fee,Private School Reg Fee,' . $std->batch->course->name;
                $invoice->amount          = $std->batch->course->form_fee.','.$std->batch->course->privateschool_registration_fee ;
                $invoice->status          = 0;
                $invoice->save();
                return "You have successfully registerd!";
                break;
            case 2:
                if ($request->hasfile('good_behavior')) {
                    $file = $request->file('good_behavior');
                    $name = uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path() . '/storage/student_info/', $name);
                    $good_behavior = '/storage/student_info/' . $name;
                } else {
                    $good_behavior = "";
                }
                if ($request->hasfile('no_crime')) {
                    $file = $request->file('no_crime');
                    $name = uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path() . '/storage/student_info/', $name);
                    $no_crime = '/storage/student_info/' . $name;
                } else {
                    $no_crime = "";
                }

                if ($request->hasfile('recommend_file')) {
                    $file = $request->file('recommend_file');
                    $name = uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path() . '/storage/aa_register/', $name);
                    $recommend_file = '/storage/aa_register/' . $name;
                } else {
                    $recommend_file = "";
                }

                $student_register = new StudentRegister();
                $student_register->student_info_id = $request->student_id;
                $student_register->sr_no = $request->sr_no;
                $student_register->date = $date;
                $student_register->invoice_id = $request->student_id;
                $student_register->batch_id = $request->batch_id;
                $student_register->invoice_date = $invoice_date;
                $student_register->type = $request->type;
                $student_register->batch_no = $request->batch_no_mac;
                $student_register->part_no = $request->part_no_mac;
                $student_register->personal_no = $request->personal_no_mac;
                $student_register->academic_year = $request->academic_year;
                $student_register->direct_access_no = $request->direct_access_no;
                $student_register->entry_success_no = $request->entry_success_no;
                $student_register->internship = $request->internship;
                $student_register->good_behavior = $good_behavior;
                $student_register->no_crime = $no_crime;
                $student_register->module = $request->module;
                $student_register->cpa_one_pass_date = $request->cpa_one_pass_date;
                $student_register->cpa_one_access_no = $request->cpa_one_access_no;
                $student_register->cpa_one_success_no = $request->cpa_one_success_no;
                $student_register->status = 0;
                $student_register->form_type = $request->form_type;

                $student_register->save();
                //invoice        
                $invoice = new Invoice();
                $invoice->student_info_id = $student_info->id;

                // $invNo = str_pad( date('Ymd') . Str::upper(Str::random(5)) . $student_info->id, 20, "0", STR_PAD_LEFT);
                // $invoice->invoiceNo       = $invNo;

                $invoice->name_eng        = $student_info->name_eng;
                $invoice->email           = $student_info->email;
                $invoice->phone           = $student_info->phone;
                
                $std = StudentCourseReg::with('batch')->where("student_info_id", $student_info->id)->latest()->first();

                $invoice->invoiceNo = 'mac_reg_' . $std->batch->course->code;
                $invoice->productDesc     = 'App Fee,MAC Reg Fee,Course Fee,' . $std->batch->course->name;
                $invoice->amount          = $std->batch->course->form_fee.','.$std->batch->course->mac_registration_fee.','.$std->batch->course->tution_fee ;
                $invoice->status          = 0;
                $invoice->save();
                return "You have successfully registerd!";
                break;
        }

    }

    //show registertion list in Frontend
    public function getAttendesStudent(Request $request)
    { 
       
       
        $course = Course::where('code',$request->course_code)->with('course_type','active_batch')->first();
          
        $student_infos = StudentRegister::with('student_info','course')
                        ->where('status',1)
                        ->where('batch_id', $course->active_batch[0]->id)
                        ->whereNotNull('sr_no');
                       
                        
 
          if($request->module)
        {
            
            $student_infos = $student_infos->where('module',$request->module);
        }
         if($request->student_type)
        {
            
            $student_infos = $student_infos->where('type',$request->student_type);
        }

        $student_infos =    $student_infos->orderByRaw('LENGTH(sr_no)','‌asc')
                            ->orderBy('sr_no','asc')
                            ->get();
           
        return DataTables::of($student_infos)
            ->addColumn('nrc', function ($infos) {
                $nrc_result = $infos->student_info->nrc_state_region . "/" . $infos->student_info->nrc_township . "(" . $infos->student_info->nrc_citizen . ")" . $infos->student_info->nrc_number;
                return $nrc_result;
            })
            ->addColumn('cpersonal_no', function ($infos) {
                $cpersonal_no = $infos->course->course_type->course_code == "da"
                    ? $infos->student_info->personal_no
                    : $infos->student_info->cpersonal_no;
                return $cpersonal_no;
            })
            ->rawColumns(['action', 'nrc', 'cpersonal_no'])
            ->make(true);
        // return response()->json([
        //     'data' => $student_infos
        // ]);


    }

    public function ‌approveExamList(Request $request)
    {
        $course = Course::where('code', $request->course_code)->with('active_batch')->first();

        $student_infos = ExamRegister::with('student_info', 'course')
            ->where('batch_id', $course->active_batch[0]->id)
            ->where('status', 1)
            ->orderBy('is_full_module', 'desc')
            ->whereNotNull('sr_no');

        if ($request->module) {

            $student_infos = $student_infos->where('is_full_module', $request->module);
        }

        if ($request->grade) {
            $student_infos = $student_infos->Where('grade', $request->grade)->orderby('total_mark', 'desc');

        } else {
            $student_infos = $student_infos->orderBy('sr_no', 'asc');
        }
        $student_infos = $student_infos->get();

        return DataTables::of($student_infos)
            ->addColumn('nrc', function ($infos) {
                $nrc_result = $infos->student_info->nrc_state_region . "/" . $infos->student_info->nrc_township . "(" . $infos->student_info->nrc_citizen . ")" . $infos->student_info->nrc_number;
                return $nrc_result;
            })
            ->addColumn('module', function ($infos) {
                if ($infos->is_full_module == 1) {
                    return "Module One";
                } else if ($infos->is_full_module == 2) {
                    return "Module Two";
                } else if ($infos->is_full_module == 3){
                    return "All Module";
                }else {
                    return "-";
                }
            })
            ->addColumn('cpersonal_no', function ($infos) {
                $cpersonal_no = $infos->course->course_type->course_code == "da"
                    ? $infos->student_info->personal_no
                    : $infos->student_info->cpersonal_no;
                return $cpersonal_no;
            })
            ->rawColumns(['action', 'nrc', 'cpersonal_no','module'])
            ->make(true);
    }

    public function RegChartFilter(Request $request)
    {
        $student = StudentRegister::where('status', 1)
            ->whereYear('updated_at', $request->year);
        $student = $student->get();

        return response()->json([
            'data' => $student
        ], 200);
    }

     //show data on mac student Application list
     public function getStudentAppList(Request $request)
     {
         
         $course = Course::where('code',$request->course_code)->with('active_batch','course_type')->first();
        
         $student_infos = StudentCourseReg::with('student_info')
                         ->where('batch_id',$course->active_batch[0]->id)
                         ->where('approve_reject_status',1)
                         ->where('qt_entry',0)
                         ->whereNotNull('sr_no')
                         ->orderByRaw('LENGTH(sr_no)','ASC')->orderBy('sr_no','asc')->get();
             
         return DataTables::of($student_infos)
 
         ->addColumn('nrc', function ($infos){
             $nrc_result = $infos->student_info->nrc_state_region . "/" . $infos->student_info->nrc_township . "(" . $infos->student_info->nrc_citizen . ")" . $infos->student_info->nrc_number;
             return $nrc_result;
         })
         
         ->rawColumns(['action','nrc'])
         ->make(true);
         // return response()->json([
         //     'data' => $student_infos
         // ]);
 
 
     }
}
    