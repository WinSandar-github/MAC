<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CPAFF;
use App\StudentJobHistroy;
use App\EducationHistroy;
use App\StudentInfo;
use App\Invoice;
use App\Membership;
use App\StudentCourseReg;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Hash;

class CPAFFController extends Controller
{
    public function index()
    {
        $cpa_ff = CPAFF::with('student_info','student_job', 'student_education_histroy')->get();
        return response()->json([
            'data' => $cpa_ff
        ],200);
    }
    public function store(Request $request)
    {
        if($request->form_type == 1)
        {
            if ($request->hasfile('profile_photo')) {
                $file = $request->file('profile_photo');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/student_info/',$name);
                $profile_photo = '/storage/student_info/'.$name;
            }else{
                $profile_photo=null;
            }

            if ($request->hasfile('cpa')) {
                $file = $request->file('cpa');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/cpa_ff_register/',$name);
                $cpa = '/storage/cpa_ff_register/'.$name;
            }
            else{
                $cpa = null;
            }

            if ($request->hasfile('ra')) {
                $file = $request->file('ra');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/cpa_ff_register/',$name);
                $ra = '/storage/cpa_ff_register/'.$name;
            }
            else{
                $ra = null;
            }

            if($request->hasfile('foreign_degree'))
            {
                foreach($request->file('foreign_degree') as $file)
                {
                    $name  = uniqid().'.'.$file->getClientOriginalExtension();
                    $file->move(public_path().'/storage/cpa_ff_register/',$name);
                    $foreign_degree[] = '/storage/cpa_ff_register/'.$name;
                }
            }else{
                $foreign_degree = null;
            }

            if ($request->hasfile('cpa_certificate')) {
                $file = $request->file('cpa_certificate');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/cpa_ff_register/',$name);
                $cpa_certificate = '/storage/cpa_ff_register/'.$name;
            }
            else{
                $cpa_certificate="";
            }

            if ($request->hasfile('mpa_mem_card')) {
                $file = $request->file('mpa_mem_card');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/cpa_ff_register/',$name);
                $mpa_mem_card = '/storage/cpa_ff_register/'.$name;
            }else{
                $mpa_mem_card="";
            }

            if ($request->hasfile('mpa_mem_card_back')) {
                $file = $request->file('mpa_mem_card_back');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/cpa_ff_register/',$name);
                $mpa_mem_card_back = '/storage/cpa_ff_register/'.$name;
            }else{
                $mpa_mem_card_back="";
            }

            if ($request->hasfile('nrc_front')) {
                $file = $request->file('nrc_front');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/student_info/',$name);
                $nrc_front= '/storage/student_info/'.$name;
            }else{
                $nrc_front="";
            }

            if ($request->hasfile('nrc_back')) {
                $file = $request->file('nrc_back');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/student_info/',$name);
                $nrc_back= '/storage/student_info/'.$name;
            }else{
                $nrc_back="";
            }

            if ($request->hasfile('cpd_record')) {
                $file = $request->file('cpd_record');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/cpa_ff_register/',$name);
                $cpd_record = '/storage/cpa_ff_register/'.$name;
            }else{
                $cpd_record="";
            }

            if ($request->hasfile('three_years_full')) {
                $file = $request->file('three_years_full');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/cpa_ff_register/',$name);
                $three_years_full = '/storage/cpa_ff_register/'.$name;
            }else{
                $three_years_full="";
            }

            if($request->hasfile('degree_file'))
            {
                foreach($request->file('degree_file') as $file)
                {
                    $name  = uniqid().'.'.$file->getClientOriginalExtension(); 
                    $file->move(public_path().'/storage/cpa_ff_register/',$name);
                    $degree_file[] = '/storage/cpa_ff_register/'.$name;
                }        
            }else{
                $degree_file = null;
            }

            $cpa_ff  = new CPAFF();
            $cpa_ff->cpa              =   $cpa;
            $cpa_ff->ra               =   $ra;
            $cpa_ff->degree_name      =   json_encode($request->degree_name);
            $cpa_ff->degree_pass_year =   json_encode($request->degree_pass_year);
            $cpa_ff->foreign_degree   =   json_encode($degree_file);
            $cpa_ff->cpa_certificate  =   $cpa_certificate;
            $cpa_ff->mpa_mem_card     =   $mpa_mem_card;
            $cpa_ff->mpa_mem_card_back=   $mpa_mem_card_back;
            $cpa_ff->cpd_record       =   $cpd_record;
            $cpa_ff->total_hours      =   $request->total_hours;
            $cpa_ff->three_years_full =   $three_years_full;
            $cpa_ff->status           =  0;

            //save to cpaff
            $cpa_ff->cpa_batch_no     =   $request->cpa_batch_no;
            $cpa_ff->contact_mail     =   $request->contact_mail;
            $cpa_ff->form_type        =   $request->form_type;      
            $cpa_ff->country           =   $request->country;
            $cpa_ff->government        =   $request->government;
            $cpa_ff->exam_year         =   $request->exam_year;
            $cpa_ff->exam_month        =   $request->exam_month;
            $cpa_ff->roll_no           =   $request->roll_no;
            $cpa_ff->is_renew          =   $request->is_renew;
            $cpa_ff->self_confession   =   $request->self_confession;
            $cpa_ff->cpa2_pass_date    =   $request->cpa2_pass_date;
            $cpa_ff->cpa2_reg_no       =   $request->cpa2_reg_no;//need to add
            $cpa_ff->type              =   $request->type;
            $cpa_ff->self_confession   = $request->self_confession;
            if(date('m')==11 || date('m')==12)
            {
                $thisYear = date('Y')+1;
                $cpa_ff->last_paid_year =$thisYear;
            }
            else{
                $thisYear = date('Y');
                $cpa_ff->last_paid_year = $thisYear;
            }  
            $thisYear = date('Y');
            $today = date('d-m-Y');
            $cpa_ff->validate_from = $today;
            $cpa_ff->validate_to = '31-12-' . $thisYear;
            $cpa_ff->save();

            //save to std info
            $std_info = new StudentInfo();
            $std_info->cpaff_id         =   $cpa_ff->id;
            $std_info->image    =   $profile_photo;
            $std_info->email            =   strtolower($request->email);
            $std_info->password         =   Hash::make($request->password);
            $std_info->gender   =$request->gender;
            $std_info->approve_reject_status = 0;
            $std_info->name_mm = $request->name_mm;
            $std_info->name_eng = $request->name_eng;
            $std_info->nrc_state_region = $request->nrc_state_region;
            $std_info->nrc_township = $request->nrc_township;
            $std_info->address          =   $request->address;
            $std_info->phone            =   $request->phone;
            $std_info->nrc_citizen = $request->nrc_citizen;
            $std_info->nrc_number = $request->nrc_number;
            // $std_info->name_eng = $request->name_eng;
            $std_info->father_name_mm = $request->father_name_mm;
            $std_info->father_name_eng = $request->father_name_eng;
            $std_info->nrc_front = $nrc_front;
            $std_info->nrc_back = $nrc_back;
            $std_info->save();

            $student_data = CPAFF::find($cpa_ff->id);
            $student_data->student_info_id = $std_info->id;
            $student_data->save();

            //invoice
            $fees = Membership::where('membership_name','=','CPAFF')->first(['form_fee', 'registration_fee']);
            $stdInfo = StudentInfo::where('id', '=', $std_info->id)->first();
            //$invNo = str_pad($papp->id, 20, "0", STR_PAD_LEFT);

            $invoice = new Invoice();
            $invoice->student_info_id = $std_info->id;
            $invoice->invoiceNo     = "cpaff_initial".$cpa_ff->id;
            $invoice->name_eng       =  $stdInfo->name_eng;
            $invoice->email       = $stdInfo->email;
            $invoice->phone       = $stdInfo->phone;
            $invoice->productDesc = 'App Fee , Reg Fee, CPA(Full-Fledged) Registration';
            $invoice->amount = $fees->form_fee.",". $fees->registration_fee;
            $invoice->status          = 0;
            $invoice->save();
            
            return response()->json([
                'message' => "You have successfully registerd!"
            ],200);

        } else if ($request->form_type == 2) {

            if ($request->hasfile('profile_photo')) {
                $file = $request->file('profile_photo');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/student_info/',$name);
                $profile_photo = '/storage/student_info/'.$name;
            }else{
                $profile_photo=null;
            }

            if ($request->hasfile('cpa')) {
                $file = $request->file('cpa');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/cpa_ff_register/',$name);
                $cpa = '/storage/cpa_ff_register/'.$name;
            }
            else{
                $cpa = null;
            }

            if ($request->hasfile('ra')) {
                $file = $request->file('ra');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/cpa_ff_register/',$name);
                $ra = '/storage/cpa_ff_register/'.$name;
            }
            else{
                $ra = null;
            }

            if($request->hasfile('foreign_degree'))
            {
                foreach($request->file('foreign_degree') as $file)
                {
                    $name  = uniqid().'.'.$file->getClientOriginalExtension();
                    $file->move(public_path().'/storage/cpa_ff_register/',$name);
                    $foreign_degree[] = '/storage/cpa_ff_register/'.$name;
                }
            }else{
                $foreign_degree = null;
            }

            if ($request->hasfile('cpa_certificate')) {
                $file = $request->file('cpa_certificate');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/cpa_ff_register/',$name);
                $cpa_certificate = '/storage/cpa_ff_register/'.$name;
            }
            else{
                $cpa_certificate="";
            }

            if ($request->hasfile('mpa_mem_card')) {
                $file = $request->file('mpa_mem_card');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/cpa_ff_register/',$name);
                $mpa_mem_card = '/storage/cpa_ff_register/'.$name;
            }else{
                $mpa_mem_card="";
            }

            if ($request->hasfile('mpa_mem_card_back')) {
                $file = $request->file('mpa_mem_card_back');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/cpa_ff_register/',$name);
                $mpa_mem_card_back = '/storage/cpa_ff_register/'.$name;
            }else{
                $mpa_mem_card_back="";
            }

            if ($request->hasfile('nrc_front')) {
                $file = $request->file('nrc_front');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/student_info/',$name);
                $nrc_front= '/storage/student_info/'.$name;
            }else{
                $nrc_front="";
            }

            if ($request->hasfile('nrc_back')) {
                $file = $request->file('nrc_back');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/student_info/',$name);
                $nrc_back= '/storage/student_info/'.$name;
            }else{
                $nrc_back="";
            }

            if ($request->hasfile('cpd_record')) {
                $file = $request->file('cpd_record');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/cpa_ff_register/',$name);
                $cpd_record = '/storage/cpa_ff_register/'.$name;
            }else{
                $cpd_record="";
            }

            if($request->hasfile('degree_file'))
            {
                foreach($request->file('degree_file') as $file)
                {
                    $name  = uniqid().'.'.$file->getClientOriginalExtension(); 
                    $file->move(public_path().'/storage/cpa_ff_register/',$name);
                    $degree_file[] = '/storage/cpa_ff_register/'.$name;
                }        
            }else{
                $degree_file = null;
            }

            if ($request->hasfile('renew_file')) {
                $file = $request->file('renew_file');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/cpa_ff_register/',$name);
                $renew_file = '/storage/cpa_ff_register/'.$name;
            }else{
                $renew_file="";
            }

            $cpa_ff  = new CPAFF();
            $cpa_ff->cpa              =   $cpa;
            $cpa_ff->ra               =   $ra;
            $cpa_ff->degree_name      =   json_encode($request->degree_name);
            $cpa_ff->degree_pass_year =   json_encode($request->degree_pass_year);
            $cpa_ff->foreign_degree   =   json_encode($degree_file);
            $cpa_ff->cpa_batch_no     =   $request->cpa_batch_no;
            $cpa_ff->cpaff_reg_no     =   $request->cpaff_reg_no;
            $cpa_ff->cpaff_reg_year   =   $request->cpaff_reg_year;
            $cpa_ff->contact_mail     =   $request->contact_mail;
            $cpa_ff->cpaff_pass_date     =   $request->cpaff_pass_date;
            $cpa_ff->cpaff_renew_date     =   $request->cpaff_renew_date;
            $cpa_ff->papp_reg_year     =   $request->papp_reg_year;
            $cpa_ff->papp_reg_no     =   $request->papp_reg_no;
            $cpa_ff->renew_file     =   $renew_file;
            $cpa_ff->fine_person     =   $request->fine_person;
            $cpa_ff->cpa_certificate  =   $cpa_certificate;
            $cpa_ff->mpa_mem_card     =   $mpa_mem_card;
            $cpa_ff->mpa_mem_card_back=   $mpa_mem_card_back;
            $cpa_ff->cpd_record       =   $cpd_record;
            $cpa_ff->total_hours      =   $request->total_hours;
            $cpa_ff->last_paid_year   =   $request->last_paid_year;
            $cpa_ff->resign   =   $request->resign;
            $cpa_ff->resign_date   =   $request->resign_date;
            // $cpa_ff->end_date   =   $request->end_date;
            $cpa_ff->status           =  0;
            $cpa_ff->self_confession   =   $request->self_confession;
            $cpa_ff->form_type        =   $request->form_type;
            $cpa_ff->type              =   $request->type;
            $cpa_ff->is_renew          =   $request->is_renew;
            $cpa_ff->self_confession = $request->self_confession;
            $cpa_ff->offline_user      = 1;
            // Generate Reg No.
            // $cpa_ff->cpaff_reg_no = 'CPAFF_' . str_pad($cpa_ff->id, 5, "0", STR_PAD_LEFT);
            // $cpa_ff->reg_date = date('Y-m-d');
            // $thisYear = date('Y');
            // $today = date('d-m-Y');
            // $cpa_ff->validate_from = $today;
            // $cpa_ff->validate_to = '31-12-' . $thisYear;
            $cpa_ff->save();

            //save to std info
            $std_info = new StudentInfo();
            $std_info->cpaff_id         =   $cpa_ff->id;
            $std_info->image    =   $profile_photo;
            $std_info->email            =   strtolower($request->email);
            $std_info->password         =   Hash::make($request->password);
            $std_info->gender   =$request->gender;
            $std_info->approve_reject_status = 0;
            $std_info->name_mm = $request->name_mm;
            $std_info->name_eng = $request->name_eng;
            $std_info->nrc_state_region = $request->nrc_state_region;
            $std_info->nrc_township = $request->nrc_township;
            $std_info->address          =   $request->address;
            $std_info->phone            =   $request->phone;
            $std_info->nrc_citizen = $request->nrc_citizen;
            $std_info->nrc_number = $request->nrc_number;
            // $std_info->name_eng = $request->name_eng;
            $std_info->father_name_mm = $request->father_name_mm;
            $std_info->father_name_eng = $request->father_name_eng;
            $std_info->nrc_front        =   $nrc_front;
            $std_info->nrc_back        =   $nrc_back;
            $std_info->save();

            $student_data = CPAFF::find($cpa_ff->id);
            $student_data->student_info_id = $std_info->id;
            $student_data->save();

            // //invoice
            // $fees = Membership::where('membership_name','=','CPAFF')->first(['form_fee', 'registration_fee']);
            // $stdInfo = StudentInfo::where('id', '=', $std_info->id)->first();
            // //$invNo = str_pad($papp->id, 20, "0", STR_PAD_LEFT);

            // $invoice = new Invoice();
            // $invoice->student_info_id = $std_info->id;
            // $invoice->invoiceNo       = '';
            // $invoice->name_eng       =  $stdInfo->name_eng;
            // $invoice->email       = $stdInfo->email;
            // $invoice->phone       = $stdInfo->phone;
            // $invoice->productDesc = 'Application Fee + Registration Fee';
            // $invoice->amount = $fees->form_fee.",". $fees->registration_fee;
            // $invoice->status          = 0;
            // $invoice->save();
            
            return response()->json([
                'message' => "You have successfully registerd!"
            ],200);

        } else {
            if ($request->hasfile('profile_photo')) {
                $file = $request->file('profile_photo');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/student_info/',$name);
                $profile_photo = '/storage/student_info/'.$name;
            }else{
                $profile_photo=null;
            }

            if ($request->hasfile('cpa')) {
                $file = $request->file('cpa');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/cpa_ff_register/',$name);
                $cpa = '/storage/cpa_ff_register/'.$name;
            }
            else{
                $cpa = null;
            }

            if ($request->hasfile('ra')) {
                $file = $request->file('ra');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/cpa_ff_register/',$name);
                $ra = '/storage/cpa_ff_register/'.$name;
            }
            else{
                $ra = null;
            }

            if($request->hasfile('foreign_degree'))
            {
                foreach($request->file('foreign_degree') as $file)
                {
                    $name  = uniqid().'.'.$file->getClientOriginalExtension();
                    $file->move(public_path().'/storage/cpa_ff_register/',$name);
                    $foreign_degree[] = '/storage/cpa_ff_register/'.$name;
                }
            }else{
                $foreign_degree = null;
            }

            if ($request->hasfile('cpa_certificate')) {
                $file = $request->file('cpa_certificate');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/cpa_ff_register/',$name);
                $cpa_certificate = '/storage/cpa_ff_register/'.$name;
            }
            else{
                $cpa_certificate="";
            }

            if ($request->hasfile('mpa_mem_card')) {
                $file = $request->file('mpa_mem_card');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/cpa_ff_register/',$name);
                $mpa_mem_card = '/storage/cpa_ff_register/'.$name;
            }else{
                $mpa_mem_card="";
            }

            if ($request->hasfile('mpa_mem_card_back')) {
                $file = $request->file('mpa_mem_card_back');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/cpa_ff_register/',$name);
                $mpa_mem_card_back = '/storage/cpa_ff_register/'.$name;
            }else{
                $mpa_mem_card_back="";
            }

            if ($request->hasfile('nrc_front')) {
                $file = $request->file('nrc_front');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/student_info/',$name);
                $nrc_front= '/storage/student_info/'.$name;
            }else{
                $nrc_front="";
            }

            if ($request->hasfile('nrc_back')) {
                $file = $request->file('nrc_back');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/student_info/',$name);
                $nrc_back= '/storage/student_info/'.$name;
            }else{
                $nrc_back="";
            }

            if ($request->hasfile('cpd_record')) {
                $file = $request->file('cpd_record');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/cpa_ff_register/',$name);
                $cpd_record = '/storage/cpa_ff_register/'.$name;
            }else{
                $cpd_record="";
            }

            if ($request->hasfile('three_years_full')) {
                $file = $request->file('three_years_full');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/cpa_ff_register/',$name);
                $three_years_full = '/storage/cpa_ff_register/'.$name;
            }else{
                $three_years_full="";
            }

            if($request->hasfile('degree_file'))
            {
                foreach($request->file('degree_file') as $file)
                {
                    $name  = uniqid().'.'.$file->getClientOriginalExtension(); 
                    $file->move(public_path().'/storage/cpa_ff_register/',$name);
                    $degree_file[] = '/storage/cpa_ff_register/'.$name;
                }        
            }else{
                $degree_file = null;
            }

            $cpa_ff  = new CPAFF();
            $cpa_ff->student_info_id  =   $request->student_info_id;
            $cpa_ff->cpa              =   $cpa;
            $cpa_ff->ra               =   $ra;
            $cpa_ff->degree_name      =   json_encode($request->degree_name);
            $cpa_ff->degree_pass_year =   json_encode($request->degree_pass_year);
            $cpa_ff->foreign_degree   =   json_encode($degree_file);

            $cpa_ff->pass_batch_no    =   $request->pass_batch_no;
            $cpa_ff->pass_personal_no =   $request->pass_personal_no;

            $cpa_ff->qt_pass_date     =   json_encode($request->qt_pass_date);
            $cpa_ff->qt_pass_seat_no  =   $request->qt_pass_seat_no;
            $cpa_ff->cpa_certificate  =   $cpa_certificate;
            $cpa_ff->mpa_mem_card     =   $mpa_mem_card;
            $cpa_ff->mpa_mem_card_back=   $mpa_mem_card_back;
            $cpa_ff->cpd_record       =   $cpd_record;
            $cpa_ff->total_hours      =   $request->total_hours;
            $cpa_ff->status           =   0;
            //save to cpaff
            $cpa_ff->cpa_batch_no     =   $request->cpa_batch_no;
            $cpa_ff->contact_mail     =   $request->contact_mail;
            $cpa_ff->form_type        =   $request->form_type;
            $cpa_ff->cpa2_pass_date        =   $request->cpa2_pass_date;
            $cpa_ff->cpa2_reg_no        =   $request->cpa2_reg_no;
            $cpa_ff->country        =   $request->country;
            $cpa_ff->government        =   $request->government;
            $cpa_ff->exam_year        =   $request->exam_year;
            $cpa_ff->exam_month        =   $request->exam_month;
            $cpa_ff->roll_no        =   $request->roll_no;
            $cpa_ff->three_years_full   =   $three_years_full;    
            $cpa_ff->self_confession = $request->self_confession;    
            $cpa_ff->is_renew   =   $request->is_renew;
            $cpa_ff->type              =   $request->type;
            if(date('m')==11 || date('m')==12)
            {
                $thisYear = date('Y')+1;
                $cpa_ff->last_paid_year =$thisYear;
            }
            else{
                $thisYear = date('Y');
                $cpa_ff->last_paid_year = $thisYear;
            }  
            $thisYear = date('Y');
            $today = date('d-m-Y');
            $cpa_ff->validate_from = $today;
            $cpa_ff->validate_to = '31-12-' . $thisYear;
            $cpa_ff->save();

            //save to std info
            $student_info = StudentInfo::find($request->student_info_id);
            $student_info->name_mm         = $request->name_mm;
            $student_info->name_eng         = $request->name_eng;
            $student_info->nrc_state_region  =   $request->nrc_state_region;
            $student_info->nrc_township      =   $request->nrc_township;
            $student_info->nrc_citizen       =   $request->nrc_citizen;
            $student_info->nrc_number        =   $request->nrc_number;
            $student_info->father_name_mm    =   $request->father_name_mm;
            $student_info->father_name_eng   =   $request->father_name_eng;           
            $student_info->gender            =   $request->gender;
            $student_info->address       = $request->address;
            $student_info->phone            =   $request->phone;
            $student_info->image         = $profile_photo;
            $student_info->nrc_front        =   $nrc_front;
            $student_info->nrc_back         =   $nrc_back;
            
            $student_info->save();

            //invoice
            $fees = Membership::where('membership_name','=','CPAFF')->first(['form_fee', 'registration_fee']);
            $stdInfo = StudentInfo::where('id', '=', $request->student_info_id)->first();
            //$invNo = str_pad($papp->id, 20, "0", STR_PAD_LEFT);

            $invoice = new Invoice();
            $invoice->student_info_id = $request->student_info_id;
            $invoice->invoiceNo     = "cpaff_initial".$cpa_ff->id;
            $invoice->name_eng       =  $stdInfo->name_eng;
            $invoice->email       = $stdInfo->email;
            $invoice->phone       = $stdInfo->phone;
            $invoice->productDesc = 'App Fee , Reg Fee, CPA(Full-Fledged) Registration';
            $invoice->amount = $fees->form_fee.",". $fees->registration_fee;
            $invoice->status          = 0;
            $invoice->save();

            return response()->json([
                'message' => "You have successfully registerd!"
            ],200);
        }
    }
    //Store Renew Form
    public function storeRenewForm(Request $request){
        // return $request->student_info_id;
        $initial_cpaff=CPAFF::where('student_info_id',$request->student_info_id)->first();
        // return $initial_cpaff;
        if ($request->hasfile('profile_photo')) {
            $file = $request->file('profile_photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $profile_photo = '/storage/student_info/'.$name;
        }else{
            $profile_photo=null;
        }
        if(!$request->hasfile('cpa') && !$request->hasfile('ra') && !$request->hasfile('degree_file'))
        {
            $cpa= $initial_cpaff->cpa;
            $ra= $initial_cpaff->ra;
            $degree_name=$initial_cpaff->degree_name;
            $degree_pass_year=$initial_cpaff->degree_pass_year;
            $degree_file_json=$initial_cpaff->foreign_degree;
        }
        else{
            if ($request->hasfile('cpa')) {
                $file = $request->file('cpa');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/cpa_ff_register/',$name);
                $cpa = '/storage/cpa_ff_register/'.$name;
            }
            else{
                $cpa = null;
            }

            if ($request->hasfile('ra')) {
                $file = $request->file('ra');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/cpa_ff_register/',$name);
                $ra = '/storage/cpa_ff_register/'.$name;
            }
            else{
                $ra = null;
            }

            if($request->hasfile('degree_file'))
            {
                foreach($request->file('degree_file') as $file)
                {
                    $name  = uniqid().'.'.$file->getClientOriginalExtension(); 
                    $file->move(public_path().'/storage/cpa_ff_register/',$name);
                    $degree_file[] = '/storage/cpa_ff_register/'.$name;
                }        
            }else{
                $degree_file = null;
            }
            
            $degree_name=json_encode($request->degree_name);
            $degree_pass_year=json_encode($request->degree_pass_year);
            $degree_file_json=json_encode($degree_file);
        }
        if ($request->hasfile('cpa_certificate')) {
            $file = $request->file('cpa_certificate');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $cpa_certificate = '/storage/cpa_ff_register/'.$name;
        }
        else{
            $cpa_certificate="";
        }

        if ($request->hasfile('mpa_mem_card')) {
            $file = $request->file('mpa_mem_card');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $mpa_mem_card = '/storage/cpa_ff_register/'.$name;
        }else{
            $mpa_mem_card="";
        }

        if ($request->hasfile('mpa_mem_card_back')) {
            $file = $request->file('mpa_mem_card_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $mpa_mem_card_back = '/storage/cpa_ff_register/'.$name;
        }else{
            $mpa_mem_card_back="";
        }

        if ($request->hasfile('nrc_front')) {
            $file = $request->file('nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_front= '/storage/student_info/'.$name;
        }else{
            $nrc_front=$request->nrc_front;
        }

        if ($request->hasfile('nrc_back')) {
            $file = $request->file('nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_back= '/storage/student_info/'.$name;
        }else{
            $nrc_back=$request->nrc_back;
        }

        if ($request->hasfile('cpd_record')) {
            $file = $request->file('cpd_record');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $cpd_record = '/storage/cpa_ff_register/'.$name;
        }else{
            $cpd_record="";
        }

        if ($request->hasfile('renew_file')) {
            $file = $request->file('renew_file');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $renew_file = '/storage/cpa_ff_register/'.$name;
        }else{
            $renew_file="";
        }

        if($request->last_paid_year){
            $last_paid_year = $request->last_paid_year;
        }else{
            $last_paid_year = "";
        }

        if($request->resign_date){
            $resign_date = $request->resign_date;
        }else{
            $resign_date = "";
        }

        $oldCpaff = CPAFF::where('student_info_id', '=', $request->student_info_id)->latest()->first();

        $cpa_ff  = new CPAFF();
        $cpa_ff->student_info_id  =   $request->student_info_id;
        $cpa_ff->cpa              =   $cpa;
        $cpa_ff->ra               =   $ra;
        $cpa_ff->degree_name      =   $degree_name;
        $cpa_ff->degree_pass_year =   $degree_pass_year;
        $cpa_ff->foreign_degree   =   $degree_file_json;

        $cpa_ff->cpa_batch_no     =   $request->cpa_batch_no;
        $cpa_ff->cpaff_reg_no     =   $request->cpaff_reg_no;
        $cpa_ff->contact_mail     =   $request->contact_mail;
        $cpa_ff->cpaff_pass_date     =   $request->cpaff_pass_date;
        $cpa_ff->cpaff_renew_date     =   $request->cpaff_renew_date;
        $cpa_ff->papp_reg_no     =   $request->papp_reg_no;
        $cpa_ff->papp_reg_year     =   $request->papp_reg_year;
        $cpa_ff->renew_file     =   $renew_file;
        $cpa_ff->fine_person      =   $request->fine_person;
        $cpa_ff->cpa_certificate  =   $cpa_certificate;
        $cpa_ff->mpa_mem_card     =   $mpa_mem_card;
        $cpa_ff->mpa_mem_card_back=   $mpa_mem_card_back;
        $cpa_ff->cpd_record       =   $cpd_record;
        $cpa_ff->total_hours      =   $request->total_hours;
        $today = date('d-m-Y');
        if(strtotime($today)<=strtotime($oldCpaff->validate_to))
        {
            $thisYear = date('Y')+1;
            $cpa_ff->last_paid_year =$thisYear;
        }
        else{
            $thisYear = date('Y');
            $cpa_ff->last_paid_year = $thisYear;
        }     
        $cpa_ff->previous_last_paid_year =$oldCpaff->last_paid_year;
        $cpa_ff->cpaff_reg_no =$oldCpaff->cpaff_reg_no;
        $cpa_ff->resign_date      =   $request->resign_date;
        $cpa_ff->is_renew   =   $request->is_renew;
        $cpa_ff->self_confession = $request->self_confession_renew;
        $cpa_ff->type   =   $request->type;
        $cpa_ff->status           =  0;

        $cpa_ff->validate_from = $today ;
        // $old_validate_to=date('Y-m',strtotime($oldCpaff->validate_to));
        if(strtotime($today)<=strtotime($oldCpaff->validate_to))
        {
            $thisYear = date('Y')+1;
            $cpa_ff->validate_to = '31-12-' . $thisYear;
        }
        else{
            $thisYear = date('Y');
            $cpa_ff->validate_to = '31-12-' . $thisYear;
        }
        $cpa_ff->save();

        $student_info = StudentInfo::find($request->student_info_id);
        // $student_info->image         = $profile_photo;
        $student_info->name_mm         = $request->name_mm;
        $student_info->name_eng         = $request->name_eng;
        $student_info->nrc_state_region  =   $request->nrc_state_region;
        $student_info->nrc_township      =   $request->nrc_township;
        $student_info->nrc_citizen       =   $request->nrc_citizen;
        $student_info->nrc_number        =   $request->nrc_number;
        $student_info->father_name_mm    =   $request->father_name_mm;
        $student_info->father_name_eng   =   $request->father_name_eng;           
        $student_info->gender            =   $request->gender;
        $student_info->address       = $request->address;
        $student_info->phone            =   $request->phone;
        $student_info->image         = $profile_photo;
        $student_info->nrc_front        =   $nrc_front;
        $student_info->nrc_back         =   $nrc_back;
        
        $student_info->save();
        
         //invoice
        $fees = Membership::where('membership_name','=','CPAFF')->first(['renew_fee','form_fee', 'late_fee','reconnected_fee_before_2015','reconnected_fee']);
        $stdInfo = StudentInfo::where('id', '=', $request->student_info_id)->first();
        //$invNo = str_pad($papp->id, 20, "0", STR_PAD_LEFT);

        $invoice = new Invoice();
        $invoice->student_info_id = $request->student_info_id;
        $invoice->invoiceNo     = "cpaff_renew".$cpa_ff->id;
        $invoice->name_eng        =  $stdInfo->name_eng;
        $invoice->email           = $stdInfo->email;
        $invoice->phone           = $stdInfo->phone;
        $thisYear = date('Y');
        $thisMonth = date('M');
        if($oldCpaff->offline_user==0){
            // $thisYear = date('Y'); //need to reopen comment
            // $thisMonth = date('M');
            // // $thisYear = date('Y') + 1;   //only to test Jan delay
            // // $thisMonth = 'Jan';
            // $last_paid_year=$oldCpaff->last_paid_year;
            // $oldYear=date('Y',strtotime($oldCpaff->validate_to));
            // $diff= $thisYear - $last_paid_year;
            // $reconnect_year_count=0;
            // if($diff>0){
            //     for ($x = 1; $x <= $diff; $x++)
            //     {
            //         $reconnect_year_count++;
            //     }
            //     $calculate_amount=$before_2015_year*$fees->reconnected_fee_before_2015+$after_2015_year*$fees->reconnected_fee;
            //     $invoice->productDesc     = 'Application Fee, Renewal Fee,Reconnected Fee, CPA(Full-Fledged) Registration';
            //     $invoice->amount          = $fees->form_fee.",".$fees->renew_fee.",".$calculate_amount;
            
            // }
            // else{
            //     $invoice->productDesc     = 'Application Fee, Renewal Fee,Reconnected Fee, CPA(Full-Fledged) Registration';
            //     $invoice->amount          = $fees->form_fee.",".$fees->renew_fee.",0";
            // }
            // if($thisYear == $oldYear){
            //     $invoice->productDesc     = 'Application Fee, Renewal Fee, CPA(Full-Fledged) Renewal Registration';
            //     $invoice->amount          = $fees->form_fee.",".$fees->renew_fee;
            // }else if($thisYear == $oldYear + 1 &&  $thisMonth === 'Jan'){
            //     $invoice->productDesc     = 'Application Fee, Renewal Fee, Delay Fee(within Jan), CPA(Full-Fledged) Renewal Registration' ;
            //     $invoice->amount          = $fees->form_fee.",".$fees->renew_fee . ',' . $fees->late_fee ;
            // }
            // else if($thisYear == $oldYear + 1 && date('m')>1 && date('m')<=4){
            //     $invoice->productDesc     = 'Application Fee, Renewal Fee, Delay Fee(from Feb to Apr), CPA(Full-Fledged) Renewal Registration' ;
            //     $invoice->amount          = $fees->form_fee.",".$fees->renew_fee . ','. 10* $fees->late_fee ;
            // }
            
            $last_paid_year=$oldCpaff->last_paid_year;
            $oldYear=date('Y',strtotime($oldCpaff->validate_to));
            $diff= $thisYear - $last_paid_year;
            $reconnect_year_count=0;
            if($diff>0){
                for ($x = 1; $x <= $diff; $x++)
                {
                    $reconnect_year_count++;
                }
                $calculate_amount=$reconnect_year_count*$fees->reconnected_fee;
                if($thisMonth === 'Jan'){
                    $invoice->productDesc     = 'App Fee, Renew Fee, Delay Fee,Reconnect Fee, CPA(Full-Fledged) Renewal Registration' ;
                    $invoice->amount          = $fees->form_fee.",".$fees->renew_fee . ',' . $fees->late_fee.",".$calculate_amount ;
                }
                else if(date('m')>1 && date('m')<=4){
                    $invoice->productDesc     = 'App Fee, Renew Fee, Delay Fee, Reconnect Fee, CPA(Full-Fledged) Renewal Registration' ;
                    $invoice->amount          = $fees->form_fee.",".$fees->renew_fee . ','. 10* $fees->late_fee .",".$calculate_amount ;
                }
                else{
                    $invoice->productDesc     = 'App Fee, Renew Fee,Reconnect Fee,  CPA(Full-Fledged) Renewal Registration';
                    $invoice->amount          = $fees->form_fee.",".$fees->renew_fee.",".$calculate_amount;
                }
            }
            else{
                if($thisYear == $oldYear){
                    $invoice->productDesc     = 'App Fee, Renew Fee, CPA(Full-Fledged) Renewal Registration';
                    $invoice->amount          = $fees->form_fee.",".$fees->renew_fee;
                }else if($thisYear == $oldYear + 1 &&  $thisMonth === 'Jan'){
                    $invoice->productDesc     = 'App Fee, Renew Fee, Delay Fee, CPA(Full-Fledged) Renewal Registration' ;
                    $invoice->amount          = $fees->form_fee.",".$fees->renew_fee . ',' . $fees->late_fee ;
                }
                else if($thisYear == $oldYear + 1 && date('m')>1 && date('m')<=4){
                    $invoice->productDesc     = 'App Fee, Renew Fee, Delay Fee, CPA(Full-Fledged) Renewal Registration' ;
                    $invoice->amount          = $fees->form_fee.",".$fees->renew_fee . ','. 10* $fees->late_fee ;
                }
            }
        }
        else if($oldCpaff->offline_user==1){
            if($oldCpaff->resign==0){
                $thisYear = date('Y');
                $last_paid_year=$oldCpaff->last_paid_year;
                $diff= $thisYear - $last_paid_year;
                $before_2015_year= 0;
                $after_2015_year = 0;
                if($diff>0){
                    for ($x = 1; $x <= $diff; $x++)
                    {
                        if($last_paid_year+$x >=2015)
                        {
                            $after_2015_year++;
                        }
                        else{
                            $before_2015_year++;
                        }
                    }
                    $calculate_amount=$before_2015_year*$fees->reconnected_fee_before_2015+$after_2015_year*$fees->reconnected_fee;
                    if($thisMonth === 'Jan'){
                        $invoice->productDesc     = 'App Fee, Renew Fee, Delay Fee,Reconnect Fee, CPA(Full-Fledged) Renewal Registration' ;
                        $invoice->amount          = $fees->form_fee.",".$fees->renew_fee . ',' . $fees->late_fee.",".$calculate_amount ;
                    }
                    else if(date('m')>1 && date('m')<=4){
                        $invoice->productDesc     = 'App Fee, Renew Fee, Delay Fee, Reconnect Fee, CPA(Full-Fledged) Renewal Registration' ;
                        $invoice->amount          = $fees->form_fee.",".$fees->renew_fee . ','. 10* $fees->late_fee .",".$calculate_amount ;
                    }
                    else{
                        $invoice->productDesc     = 'App Fee, Renew Fee,Reconnect Fee,  CPA(Full-Fledged) Renewal Registration';
                        $invoice->amount          = $fees->form_fee.",".$fees->renew_fee.",".$calculate_amount;
                    }
                
                }
                else{
                    if($thisMonth === 'Jan'){
                        $invoice->productDesc     = 'App Fee, Renew Fee, Delay Fee,Reconnect Fee, CPA(Full-Fledged) Renewal Registration' ;
                        $invoice->amount          = $fees->form_fee.",".$fees->renew_fee . ',' . $fees->late_fee.",0" ;
                    }
                    else if(date('m')>1 && date('m')<=4){
                        $invoice->productDesc     = 'App Fee, Renew Fee, Delay Fee, Reconnect Fee, CPA(Full-Fledged) Renewal Registration' ;
                        $invoice->amount          = $fees->form_fee.",".$fees->renew_fee . ','. 10* $fees->late_fee .",0" ;
                    }
                    else{
                        $invoice->productDesc     = 'App Fee, Renew Fee,Reconnect Fee,  CPA(Full-Fledged) Renewal Registration';
                        $invoice->amount          = $fees->form_fee.",".$fees->renew_fee.",0";
                    }
                    // $invoice->productDesc     = 'Application Fee, Renewal Fee,Reconnected Fee, CPA(Full-Fledged) Registration';
                    // $invoice->amount          = $fees->form_fee.",".$fees->renew_fee.",0";
                }
            }
            else if($oldCpaff->resign==1){
                $last_paid_year=$oldCpaff->last_paid_year;
                $submitted_stop_form_year=$oldCpaff->resign_date-1;
                $diff= $submitted_stop_form_year - $last_paid_year;
                $before_2015_year= 0;
                $after_2015_year = 0;
                if($diff>0){
                    for ($x = 1; $x <= $diff; $x++)
                    {
                        if($last_paid_year+$x >=2015)
                        {
                            $after_2015_year++;
                        }
                        else{
                            $before_2015_year++;
                        }
                    }
                    $calculate_amount=$before_2015_year*$fees->reconnected_fee_before_2015+$after_2015_year*$fees->reconnected_fee;
                    if($thisMonth === 'Jan'){
                        $invoice->productDesc     = 'App Fee, Renew Fee, Delay Fee,Reconnect Fee, CPA(Full-Fledged) Renewal Registration' ;
                        $invoice->amount          = $fees->form_fee.",".$fees->renew_fee . ',' . $fees->late_fee.",".$calculate_amount ;
                    }
                    else if(date('m')>1 && date('m')<=4){
                        $invoice->productDesc     = 'App Fee, Renew Fee, Delay Fee, Reconnect Fee, CPA(Full-Fledged) Renewal Registration' ;
                        $invoice->amount          = $fees->form_fee.",".$fees->renew_fee . ','. 10* $fees->late_fee .",".$calculate_amount ;
                    }
                    else{
                        $invoice->productDesc     = 'App Fee, Renew Fee,Reconnect Fee,  CPA(Full-Fledged) Renewal Registration';
                        $invoice->amount          = $fees->form_fee.",".$fees->renew_fee.",".$calculate_amount;
                    }
                }
                else{
                    if($thisMonth === 'Jan'){
                        $invoice->productDesc     = 'App Fee, Renew Fee, Delay Fee,Reconnect Fee, CPA(Full-Fledged) Renewal Registration' ;
                        $invoice->amount          = $fees->form_fee.",".$fees->renew_fee . ',' . $fees->late_fee.",0" ;
                    }
                    else if(date('m')>1 && date('m')<=4){
                        $invoice->productDesc     = 'App Fee, Renew Fee, Delay Fee, Reconnect Fee, CPA(Full-Fledged) Renewal Registration' ;
                        $invoice->amount          = $fees->form_fee.",".$fees->renew_fee . ','. 10* $fees->late_fee .",0" ;
                    }
                    else{
                        $invoice->productDesc     = 'App Fee, Renew Fee,Reconnect Fee,  CPA(Full-Fledged) Renewal Registration';
                        $invoice->amount          = $fees->form_fee.",".$fees->renew_fee.",0";
                    }
                }
            }
        }

        

        $invoice->status = 0;
        $invoice->save();

        // $initial_cpaff->status=0;
        // $initial_cpaff->save();

        return response()->json([
            'message' => "You have successfully registerd!"
        ],200);
    }

    public function show($id)
    {
        $cpaff = CPAFF::where('id',$id)->with('student_info','student_job', 'student_education_histroy','student_register')->get();
        return response()->json([
            'data'  => $cpaff
        ]);
        return $cpa_ff;
    }

    public function approve($id)
    {
        $old = CPAFF::where('offline_user',0)->orderBy('cpaff_reg_no', 'desc')->first();
        // return $old->cpaff_reg_no;
        if($old->cpaff_reg_no == '' && $old->cpaff_reg_no == NULL){
            $reg_no = 1129;
        }else{
            $reg_no = $old->cpaff_reg_no +1;
        }
        // return $reg_no;
        $accepted_date = date('Y-m-d');
        $approve = CPAFF::find($id);
        if($approve->status==0)
        {
            $approve->status = 1;
            $approve->accepted_date=$accepted_date;
            $approve->renew_accepted_date=$accepted_date;
            $approve->cpaff_reg_no = $reg_no;
            $approve->reg_date = date('Y-m-d');

        }
        else if($approve->status==1){
            $approve->status = 1;
            $approve->renew_status=1;
            $approve->renew_accepted_date=$accepted_date;
        }
        $approve->save();
        return response()->json([
            'message' => "You have successfully approved that user!"
        ],200);
    }

    public function approveRenewCpaff($id)
    {
        $accepted_date = date('Y-m-d');
        $approve = CPAFF::find($id);
        if($approve->status==0)
        {
            $approve->status = 1;
            $approve->accepted_date=$accepted_date;
        $approve->renew_accepted_date=$accepted_date;
        }
        else if($approve->status==1){
            $approve->status = 1;
            $approve->renew_status=1;
            $approve->renew_accepted_date=$accepted_date;
        }
        $approve->save();
        return response()->json([
            'message' => "You have successfully approved that user!"
        ],200);
    }
    public function approveOfflineCpaff($id)
    {
        $month_day=date('m-d');
        $year=date('Y')-1;
        $accepted_date = $year.'-'.$month_day;
        $approve = CPAFF::find($id);
        if($approve->status==0)
        {
            $approve->status = 1;
            $approve->accepted_date=$accepted_date;
            $approve->renew_accepted_date=$accepted_date;
            
        }
        else if($approve->status==1){
            $approve->status = 1;
            $approve->renew_status=1;
            $approve->renew_accepted_date=$accepted_date;
        }
        
        $approve->save();
        return response()->json([
            'message' => "You have successfully approved that user!"
        ],200);
    }

    public function reject(Request $request)
    {
        $cpa_ff = CPAFF::find($request->id);
        $cpa_ff->status = 2;
        $cpa_ff->renew_status=2;
        $cpa_ff->reject_description = $request->description;
        //$cpa_ff->is_renew = 0;
        $cpa_ff->save();
        return response()->json([
            'message' => "You have successfully rejected that user!"
        ],200);
    }

    public function update(Request $request, $id)
    {
        if ($request->hasfile('profile_photo')) {
            $file = $request->file('profile_photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $profile_photo = '/storage/student_info/'.$name;
        }

        if ($request->hasfile('cpa_certificate')) {
            $file = $request->file('cpa_certificate');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $cpa_certificate = '/storage/cpa_ff_register/'.$name;
        }else{
            $cpa_certificate=$request->cpa_certificate;
        }

        if ($request->hasfile('mpa_mem_card')) {
            $file = $request->file('mpa_mem_card');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $mpa_mem_card= '/storage/cpa_ff_register/'.$name;
        }else{
            $mpa_mem_card=$request->mpa_mem_card;
        }

        if ($request->hasfile('mpa_mem_card_back')) {
            $file = $request->file('mpa_mem_card_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $mpa_mem_card_back= '/storage/cpa_ff_register/'.$name;
        }else{
            $mpa_mem_card_back=$request->mpa_mem_card_back;
        }

        if ($request->hasfile('cpd_record')) {
            $file = $request->file('cpd_record');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $cpd_record = '/storage/cpa_ff_register/'.$name;
        }else{
            $cpd_record=$request->cpd_record;
        }

        if ($request->hasfile('nrc_front')) {
            $file = $request->file('nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_front= '/storage/student_info/'.$name;
        }else{
            $nrc_front=$request->nrc_front;
        }

        if ($request->hasfile('nrc_back')) {
            $file = $request->file('nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_back= '/storage/student_info/'.$name;
        }else{
            $nrc_back=$request->nrc_back;
        }

        $cpa_ff = CPAFF::find($id);
        $cpa_ff->cpa_certificate=$cpa_certificate;
        $cpa_ff->mpa_mem_card=$mpa_mem_card;
        $cpa_ff->mpa_mem_card_back=$mpa_mem_card_back;
        $cpa_ff->cpd_record=$cpd_record;
        $cpa_ff->nrc_front        =   $nrc_front;
        $cpa_ff->nrc_back         =   $nrc_back;
        $cpa_ff->renew_accepted_date=date('Y-m-d');
        $cpa_ff->profile_photo=$profile_photo;
        $cpa_ff->renew_status=1;
        // $cpa_ff->payment_method=null;
        $cpa_ff->status  =  0;
        $cpa_ff->save();

        return response()->json([
            'message' => "Your renew subscription is successfully"
        ],200);

     }

    // public function destroy($id)
    // {
    //     $cpa_ff = CPAFF::find($id);
    //     $cpa_ff->delete();

    //     return response()->json([
    //         'message' => "Delete Successfully"
    //     ],200);
    // }

    public function getCpaffByStuId($stu_id){
        $cpaff = CPAFF::where('student_info_id',$stu_id)->latest()->first();
        return response()->json([
            'data'  => $cpaff
        ]);
    }

    public function getCpaff($stu_id){
        $cpaff = StudentInfo::where('id',$stu_id)->first();
        return response()->json([
            'data'  => $cpaff
        ]);
    }

    public function getCpaffRegNo($stu_id){
        $cpaff = CPAFF::where('student_info_id',$stu_id)->get('cpaff_reg_no');
        return response()->json([
            'data'  => $cpaff
        ]);
    }

    public function approveCpaff($id)
    {
        $std_info = StudentInfo::find($id) ;
        $std_info->payment_method = 'CPAFF';
        $std_info->save();
        // $cpaff = CPAFF::find($std_info->cpaff_id);
        // $cpaff->payment_method = 'CPAFF';
        // $cpaff->renew_accepted_date = date('Y-m-d');
        // $cpaff->save();
        return response()->json([
            'data' => $std_info,
        ],200);
    }

    public function checkPaymentCpaff($id)
    {
        $data = StudentInfo::where('id',$id)->get();
        return response()->json($data,200);
    }

    public function FilterCpaffRegistration($status,$is_renew){
        $cpa_ff = CPAFF::with('student_info','student_job', 'student_education_histroy')
                      ->where('status','=',$status)
                      ->where('is_renew','=',$is_renew)
                      ->where('offline_user','=',0)
                      ->get();
              return DataTables::of($cpa_ff)
                ->addColumn('action', function ($infos) {
                    return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-xs' onclick='showCPAFFList($infos->id,$infos->is_renew)'>
                                    <li class='fa fa-eye fa-sm'></li>
                                </button>
                            </div>";
                })
                ->addColumn('nrc', function ($infos){
                    $nrc_result = $infos->student_info->nrc_state_region . "/" . $infos->student_info->nrc_township . "(" . $infos->student_info->nrc_citizen . ")" . $infos->student_info->nrc_number;
                    return $nrc_result;
                })
                ->addColumn('self', function ($infos){
                    if($infos->self_confession == 1){
                        return "ဝန်ခံသည်";
                    }else{
                        return "ဝန်မခံပါ";
                    }
                })
                ->addColumn('status', function ($infos){
                    if($infos->type==0){
                        $invoice=Invoice::where('invoiceNo',"cpaff_initial".$infos->id)->get();
                       
                    }else{
                        $invoice=Invoice::where('invoiceNo',"cpaff_renew".$infos->id)
                        ->get();
                       
                    }
                    foreach($invoice as $i){
                        return $i->status == "0"
                            ? "Incomplete"
                            : "Complete";
                    }
                  })
                ->addColumn('degree', function ($infos){
                    if($infos->cpa_part_2 == 1){
                      return "CPA Part 2 Pass";
                    }
                    else{
                      return "QT Pass";
                    }
                })
                ->addColumn('created_at', function ($infos){
                    return date("d F Y", strtotime($infos->student_info->created_at));
                })
                ->addColumn('updated_at', function ($infos){
                    return date("d F Y", strtotime($infos->student_info->updated_at));
                })
                ->rawColumns(['action','nrc','self','degree','status','created_at','updated_at'])
                ->make(true);
    }

    //offline
    public function FilterCpaffOfflineRegistration($status,$is_renew){
        $cpa_ff = CPAFF::with('student_info','student_job', 'student_education_histroy')
                      ->where('status','=',$status)
                      ->where('is_renew','=',$is_renew)
                      ->where('offline_user','=',1)
                      ->get();
              return DataTables::of($cpa_ff)
                ->addColumn('action', function ($infos) {
                    return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-xs' onclick='showOfflineCPAFFList($infos->id,$infos->is_renew)'>
                                    <li class='fa fa-eye fa-sm'></li>
                                </button>
                            </div>";
                })
                ->addColumn('nrc', function ($infos){
                    $nrc_result = $infos->student_info->nrc_state_region . "/" . $infos->student_info->nrc_township . "(" . $infos->student_info->nrc_citizen . ")" . $infos->student_info->nrc_number;
                    return $nrc_result;
                })
                ->addColumn('self', function ($infos){
                    if($infos->self_confession == 1){
                        return "ဝန်ခံသည်";
                    }else{
                        return "ဝန်မခံပါ";
                    }
                })
                ->addColumn('status', function ($infos){
                    if($infos->status == 0){
                      return "PENDING";
                    }
                    else if($infos->status == 1){
                      return "APPROVED";
                    }
                    else{
                      return "REJECTED";
                    }
                })
                ->addColumn('degree', function ($infos){
                    if($infos->cpa_part_2 == 1){
                      return "CPA Part 2 Pass";
                    }
                    else{
                      return "QT Pass";
                    }
                })
                ->addColumn('created_at', function ($infos){
                    return date("d F Y", strtotime($infos->student_info->created_at));
                })
                ->addColumn('updated_at', function ($infos){
                    return date("d F Y", strtotime($infos->student_info->updated_at));
                })
                ->rawColumns(['action','nrc','self','degree','status','created_at','updated_at'])
                ->make(true);
    }

    public function updateRejectedInitialData(Request $request)
    {
        $cpa_ff = CPAFF::find($request->cpaff_id);

        if(!$request->hasfile('cpa') && !$request->hasfile('ra') && !$request->hasfile('degree_file'))
        {
            $cpa_ff->cpa              =   $cpa_ff->cpa  ; 
            $cpa_ff->ra               =   $cpa_ff->ra   ;
            $cpa_ff->foreign_degree   =   $cpa_ff->foreign_degree;
        }
        else{
            if ($request->hasfile('cpa')) {
                $cpa_file = $request->file('cpa');
                $cpa_name  = uniqid().'.'.$cpa_file->getClientOriginalExtension();
                $cpa_file->move(public_path().'/storage/student_papp/',$cpa_name);
                $cpa = '/storage/student_papp/'.$cpa_name;

                $cpa_ff->cpa              =   $cpa;
            }
            else{
                $cpa_ff->cpa              =   null  ;              }

            if ($request->hasfile('ra')) {
                $ra_file = $request->file('ra');
                $ra_name  = uniqid().'.'.$ra_file->getClientOriginalExtension();
                $ra_file->move(public_path().'/storage/student_papp/',$ra_name);
                $ra = '/storage/student_papp/'.$ra_name;

                $cpa_ff->ra               =   $ra;
            }
            else{
                $cpa_ff->ra               =   null;
            }

            if($request->hasfile('degree_file'))
            {
                foreach($request->file('degree_file') as $file)
                {
                    $name  = uniqid().'.'.$file->getClientOriginalExtension();
                    $file->move(public_path().'/storage/student_papp/',$name);
                    $degree[] = '/storage/student_papp/'.$name;
                }
                $cpa_ff->foreign_degree   =   json_encode($degree);
            }
            else{
                $cpa_ff->foreign_degree   =   null;
            }
        }

        if ($request->hasfile('cpa_certificate')) {
            $file = $request->file('cpa_certificate');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $cpa_certificate = '/storage/cpa_ff_register/'.$name;
        // }
        // else{
        //     $cpa_certificate="";
            $cpa_ff->cpa_certificate  =   $cpa_certificate;
        }

        if ($request->hasfile('mpa_mem_card')) {
            $file = $request->file('mpa_mem_card');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $mpa_mem_card = '/storage/cpa_ff_register/'.$name;
        // }else{
        //     $mpa_mem_card="";
            $cpa_ff->mpa_mem_card     =   $mpa_mem_card;
        }

        if ($request->hasfile('mpa_mem_card_back')) {
            $file = $request->file('mpa_mem_card_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $mpa_mem_card_back = '/storage/cpa_ff_register/'.$name;
        // }else{
        //     $mpa_mem_card_back="";
            $cpa_ff->mpa_mem_card_back=   $mpa_mem_card_back;
        }

        if ($request->hasfile('cpd_record')) {
            $file = $request->file('cpd_record');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $cpd_record = '/storage/cpa_ff_register/'.$name;
        // }else{
        //     $cpd_record="";
            $cpa_ff->cpd_record       =   $cpd_record;
        }

        if ($request->hasfile('three_years_full')) {
            $file = $request->file('three_years_full');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $three_years_full = '/storage/cpa_ff_register/'.$name;
        // }else{
        //     $three_years_full="";
            $cpa_ff->three_years_full   =   $three_years_full;
        }
        
        $cpa_ff->total_hours       =   $request->total_hours;
        $cpa_ff->status            =   0;
        $cpa_ff->cpa_batch_no      =   $request->cpa_batch_no;
        $cpa_ff->cpa2_pass_date    =   $request->cpa2_pass_date;
        $cpa_ff->cpa2_reg_no       =   $request->cpa2_reg_no;
        $cpa_ff->contact_mail      =   $request->contact_mail;
        $cpa_ff->form_type         =   $request->form_type;          
        $cpa_ff->country           =   $request->country;
        $cpa_ff->government        =   $request->government;
        $cpa_ff->exam_year         =   $request->exam_year;
        $cpa_ff->exam_month        =   $request->exam_month;
        $cpa_ff->roll_no           =   $request->roll_no;
        $cpa_ff->is_renew          =   $request->is_renew;
        $cpa_ff->self_confession   =   $request->self_confession;
        $cpa_ff->type              =   $request->type;
        $cpa_ff->save();

        $student_info = StudentInfo::find($request->student_info_id);
        $student_info->name_mm           = $request->name_mm;
        $student_info->name_eng          = $request->name_eng;
        $student_info->nrc_state_region  =   $request->nrc_state_region;
        $student_info->nrc_township      =   $request->nrc_township;
        $student_info->nrc_citizen       =   $request->nrc_citizen;
        $student_info->nrc_number        =   $request->nrc_number;
        $student_info->father_name_mm    =   $request->father_name_mm;
        $student_info->father_name_eng   =   $request->father_name_eng;           
        $student_info->gender            =   $request->gender;
        $student_info->address           = $request->address;
        $student_info->phone             =   $request->phone;
        if ($request->hasfile('profile_photo')) {
            $file = $request->file('profile_photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $profile_photo = '/storage/student_info/'.$name;
        // }else{
        //     $profile_photo=null;
            // $cpa_ff->profile_photo    =   $profile_photo;
            $student_info->image         = $profile_photo;
        }
        if ($request->hasfile('nrc_front')) {
            $file = $request->file('nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_front= '/storage/student_info/'.$name;
        // }else{
        //     $nrc_front=$request->nrc_front;
            $student_info->nrc_front        =   $nrc_front;
        }

        if ($request->hasfile('nrc_back')) {
            $file = $request->file('nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_back= '/storage/student_info/'.$name;
        // }else{
        //     $nrc_back=$request->nrc_back;
            $student_info->nrc_back         =   $nrc_back;
        }
        
        $student_info->save();

        return response()->json([
            'message' => "You have successfully registerd!"
        ],200);

     }

    public function updateRejectedRenewalData(Request $request)
    {
        $cpa_ff = CPAFF::find($request->cpaff_id);
        
        if ($request->hasfile('cpa_certificate')) {
            $file = $request->file('cpa_certificate');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $cpa_certificate = '/storage/cpa_ff_register/'.$name;
        // }
        // else{
        //     $cpa_certificate="";
            $cpa_ff->cpa_certificate  =   $cpa_certificate;
        }

        if ($request->hasfile('mpa_mem_card')) {
            $file = $request->file('mpa_mem_card');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $mpa_mem_card = '/storage/cpa_ff_register/'.$name;
        // }else{
        //     $mpa_mem_card="";
            $cpa_ff->mpa_mem_card     =   $mpa_mem_card;
        }

        if ($request->hasfile('mpa_mem_card_back')) {
            $file = $request->file('mpa_mem_card_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $mpa_mem_card_back = '/storage/cpa_ff_register/'.$name;
        // }else{
        //     $mpa_mem_card_back="";
            $cpa_ff->mpa_mem_card_back=   $mpa_mem_card_back;
        }

        if ($request->hasfile('cpd_record')) {
            $file = $request->file('cpd_record');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $cpd_record = '/storage/cpa_ff_register/'.$name;
        // }else{
        //     $cpd_record="";
            $cpa_ff->cpd_record       =   $cpd_record;
        }

        if ($request->hasfile('renew_file')) {
            $file = $request->file('renew_file');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $renew_file = '/storage/cpa_ff_register/'.$name;
        // }else{
        //     $renew_file="";
            $cpa_ff->renew_file       =   $renew_file;
        }

        $cpa_ff->student_info_id  =   $request->student_info_id;
        $cpa_ff->cpaff_pass_date    =   $request->cpaff_pass_date;
        $cpa_ff->cpaff_renew_date =   $request->cpaff_renew_date;
        $cpa_ff->papp_reg_no =   $request->papp_reg_no;
        $cpa_ff->papp_reg_year =   $request->papp_reg_year;
        $cpa_ff->qt_pass_date     =   json_encode($request->qt_pass_date);
        $cpa_ff->qt_pass_seat_no  =   $request->qt_pass_seat_no;
        $cpa_ff->total_hours      =   $request->total_hours;
        $cpa_ff->fine_person      =   $request->fine_person;
        $cpa_ff->status           =  0;
        $cpa_ff->cpa_batch_no     =   $request->cpa_batch_no;
        $cpa_ff->contact_mail     =   $request->contact_mail;
        $cpa_ff->form_type        =   $request->form_type;       
        $cpa_ff->country           =   $request->country;
        $cpa_ff->government        =   $request->government;
        $cpa_ff->exam_year         =   $request->exam_year;
        $cpa_ff->exam_month        =   $request->exam_month;
        $cpa_ff->roll_no           =   $request->roll_no;
        $cpa_ff->is_renew          =   $request->is_renew;
        $cpa_ff->self_confession   =   $request->self_confession_renew;
        $cpa_ff->type              =   $request->type;
        $cpa_ff->save();

        $student_info = StudentInfo::find($request->student_info_id);
        $student_info->name_mm         = $request->name_mm;
        $student_info->name_eng         = $request->name_eng;
        $student_info->nrc_state_region  =   $request->nrc_state_region;
        $student_info->nrc_township      =   $request->nrc_township;
        $student_info->nrc_citizen       =   $request->nrc_citizen;
        $student_info->nrc_number        =   $request->nrc_number;
        $student_info->father_name_mm    =   $request->father_name_mm;
        $student_info->father_name_eng   =   $request->father_name_eng;           
        $student_info->gender            =   $request->gender;
        $student_info->address       = $request->address;
        $student_info->phone            =   $request->phone;
        if ($request->hasfile('profile_photo')) {
            $file = $request->file('profile_photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $profile_photo = '/storage/student_info/'.$name;
        // }else{
        //     $profile_photo=null;
            // $cpa_ff->profile_photo    =   $profile_photo;
            $student_info->image         = $profile_photo;
        }
        if ($request->hasfile('nrc_front')) {
            $file = $request->file('nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_front= '/storage/student_info/'.$name;
        // }else{
        //     $nrc_front=$request->nrc_front;
            $student_info->nrc_front        =   $nrc_front;
        }

        if ($request->hasfile('nrc_back')) {
            $file = $request->file('nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_back= '/storage/student_info/'.$name;
        // }else{
        //     $nrc_back=$request->nrc_back;
            $student_info->nrc_back         =   $nrc_back;
        }
        
        $student_info->save();

        return response()->json([
            'message' => "You have successfully registerd!"
        ],200);

     }

    public function updateRejectedExistingData(Request $request)
    {
        $cpa_ff = CPAFF::find($request->cpaff_id);

        if(!$request->hasfile('cpa') && !$request->hasfile('ra') && !$request->hasfile('degree_file'))
        {
            $cpa= $cpa_ff->cpa;
            $ra= $cpa_ff->ra;
            $degree_name=$cpa_ff->degree_name;
            $degree_pass_year=$cpa_ff->degree_pass_year;
            $degree_file_json=$cpa_ff->foreign_degree;
        }
        else{
            if ($request->hasfile('cpa')) {
                $file = $request->file('cpa');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/cpa_ff_register/',$name);
                $cpa = '/storage/cpa_ff_register/'.$name;
            }
            else{
                $cpa = null;
            }

            if ($request->hasfile('ra')) {
                $file = $request->file('ra');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/cpa_ff_register/',$name);
                $ra = '/storage/cpa_ff_register/'.$name;
            }
            else{
                $ra = null;
            }

            if($request->hasfile('degree_file'))
            {
                foreach($request->file('degree_file') as $file)
                {
                    $name  = uniqid().'.'.$file->getClientOriginalExtension(); 
                    $file->move(public_path().'/storage/cpa_ff_register/',$name);
                    $degree_file[] = '/storage/cpa_ff_register/'.$name;
                }        
            }else{
                $degree_file = null;
            }
            
            $degree_name=json_encode($request->degree_name);
            $degree_pass_year=json_encode($request->degree_pass_year);
            $degree_file_json=json_encode($degree_file);
        }
        
        if ($request->hasfile('cpa_certificate')) {
            $file = $request->file('cpa_certificate');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $cpa_certificate = '/storage/cpa_ff_register/'.$name;
        // }
        // else{
        //     $cpa_certificate="";
            $cpa_ff->cpa_certificate  =   $cpa_certificate;
        }

        if ($request->hasfile('mpa_mem_card')) {
            $file = $request->file('mpa_mem_card');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $mpa_mem_card = '/storage/cpa_ff_register/'.$name;
        // }else{
        //     $mpa_mem_card="";
            $cpa_ff->mpa_mem_card     =   $mpa_mem_card;
        }

        if ($request->hasfile('mpa_mem_card_back')) {
            $file = $request->file('mpa_mem_card_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $mpa_mem_card_back = '/storage/cpa_ff_register/'.$name;
        // }else{
        //     $mpa_mem_card_back="";
            $cpa_ff->mpa_mem_card_back=   $mpa_mem_card_back;
        }

        if ($request->hasfile('cpd_record')) {
            $file = $request->file('cpd_record');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $cpd_record = '/storage/cpa_ff_register/'.$name;
        // }else{
        //     $cpd_record="";
            $cpa_ff->cpd_record       =   $cpd_record;
        }

        if ($request->hasfile('renew_file')) {
            $file = $request->file('renew_file');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $renew_file = '/storage/cpa_ff_register/'.$name;
        // }else{
        //     $renew_file="";
            $cpa_ff->renew_file       =   $renew_file;
        }

        $cpa_ff->student_info_id  =   $request->student_info_id;
        $cpa_ff->cpa              =   $cpa;
        $cpa_ff->ra               =   $ra;
        $cpa_ff->degree_name      =   $degree_name;
        $cpa_ff->degree_pass_year =   $degree_pass_year;
        $cpa_ff->foreign_degree   =   $degree_file_json;
        $cpa_ff->qt_pass_date     =   json_encode($request->qt_pass_date);
        $cpa_ff->cpa_batch_no     =   $request->cpa_batch_no;
        $cpa_ff->cpaff_reg_no     =   $request->cpaff_reg_no;
        $cpa_ff->cpaff_reg_year   =   $request->cpaff_reg_year;
        $cpa_ff->contact_mail     =   $request->contact_mail;

        $cpa_ff->cpaff_pass_date  =   $request->cpaff_pass_date;
        $cpa_ff->cpaff_renew_date =   $request->cpaff_renew_date;
        $cpa_ff->papp_reg_year    =   $request->papp_reg_year;
        $cpa_ff->papp_reg_no      =   $request->papp_reg_no;
        $cpa_ff->fine_person      =   $request->fine_person;
        $cpa_ff->total_hours      =   $request->total_hours;

        $cpa_ff->is_renew          =   $request->is_renew;
        $cpa_ff->self_confession   =   $request->self_confession;
        $cpa_ff->type              =   $request->type;
        $cpa_ff->last_paid_year    =   $request->last_paid_year;
        $cpa_ff->resign            =   $request->resign;
        $cpa_ff->resign_date       =   $request->resign_date;
        $cpa_ff->offline_user      =   1;
        $cpa_ff->form_type         =   $request->form_type;
        $cpa_ff->status            =   0;
        $cpa_ff->save();

        $student_info = StudentInfo::find($request->student_info_id);
        $student_info->name_mm         = $request->name_mm;
        $student_info->name_eng         = $request->name_eng;
        $student_info->nrc_state_region  =   $request->nrc_state_region;
        $student_info->nrc_township      =   $request->nrc_township;
        $student_info->nrc_citizen       =   $request->nrc_citizen;
        $student_info->nrc_number        =   $request->nrc_number;
        $student_info->father_name_mm    =   $request->father_name_mm;
        $student_info->father_name_eng   =   $request->father_name_eng;           
        $student_info->gender            =   $request->gender;
        $student_info->address       = $request->address;
        $student_info->phone            =   $request->phone;
        if ($request->hasfile('profile_photo')) {
            $file = $request->file('profile_photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $profile_photo = '/storage/student_info/'.$name;
        // }else{
        //     $profile_photo=null;
            // $cpa_ff->profile_photo    =   $profile_photo;
            $student_info->image         = $profile_photo;
        }
        if ($request->hasfile('nrc_front')) {
            $file = $request->file('nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_front= '/storage/student_info/'.$name;
        // }else{
        //     $nrc_front=$request->nrc_front;
            $student_info->nrc_front        =   $nrc_front;
        }

        if ($request->hasfile('nrc_back')) {
            $file = $request->file('nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_back= '/storage/student_info/'.$name;
        // }else{
        //     $nrc_back=$request->nrc_back;
            $student_info->nrc_back         =   $nrc_back;
        }
        
        $student_info->save();

        return response()->json([
            'message' => "You have successfully registerd!"
        ],200);

     } 
}
