<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CPAFF;
use App\StudentJobHistroy;
use App\EducationHistroy;
use App\StudentInfo;
use App\Invoice;
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

            // if ($request->hasfile('foreign_degree')) {
            //     $file = $request->file('foreign_degree');
            //     $name  = uniqid().'.'.$file->getClientOriginalExtension();
            //     $file->move(public_path().'/storage/cpa_ff_register/',$name);
            //     $foreign_degree = $name;
            // }
            // else{
            //     $foreign_degree=null;
            // }

            if ($request->hasfile('cpa_certificate')) {
                $file = $request->file('cpa_certificate');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/cpa_ff_register/',$name);
                $cpa_certificate = '/storage/cpa_ff_register/'.$name;
            }
            else{
                $cpa_certificate="";
            }

            // if ($request->hasfile('cpa_certificate_back')) {
            //     $file = $request->file('cpa_certificate_back');
            //     $name  = uniqid().'.'.$file->getClientOriginalExtension();
            //     $file->move(public_path().'/storage/cpa_ff_register/',$name);
            //     $cpa_certificate_back = '/storage/cpa_ff_register/'.$name;
            // }
            // else{
            //     $cpa_certificate_back="";
            // }

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

            // if ($request->hasfile('passport_image')) {
            //     $file = $request->file('passport_image');
            //     $name  = uniqid().'.'.$file->getClientOriginalExtension();
            //     $file->move(public_path().'/storage/cpa_ff_register/',$name);
            //     $passport_image = '/storage/cpa_ff_register/'.$name;
            // }else{
            //     $passport_image="";
            // }

            if ($request->hasfile('three_years_full')) {
                $file = $request->file('three_years_full');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/cpa_ff_register/',$name);
                $three_years_full = '/storage/cpa_ff_register/'.$name;
            }else{
                $three_years_full="";
            }

            if ($request->hasfile('letter')) {
                $file = $request->file('letter');
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/cpa_ff_register/',$name);
                $letter = '/storage/cpa_ff_register/'.$name;
            }else{
                $letter="";
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
            // $cpa_ff->student_info_id  =   $std_info->id;
            $cpa_ff->profile_photo    =   $profile_photo;
            $cpa_ff->cpa              =   $cpa;
            $cpa_ff->ra               =   $ra;
            $cpa_ff->degree_name      =   json_encode($request->degree_name);
            $cpa_ff->degree_pass_year =   json_encode($request->degree_pass_year);
            $cpa_ff->foreign_degree   =   json_encode($degree_file);

            $cpa_ff->pass_batch_no    =   $request->pass_batch_no;
            $cpa_ff->pass_personal_no =   $request->pass_personal_no;

            $cpa_ff->qt_pass_date     =   json_encode($request->qt_pass_date);
            $cpa_ff->qt_pass_seat_no  =   $request->qt_pass_seat_no;
            // $cpa_ff->foreign_degree   =   json_encode($foreign_degree);
            // $cpa_ff->foreign_degree   =   $foreign_degree;
            // $cpa_ff->cpa_part_2       =   $request->cpa_part_2;
            // $cpa_ff->qt_pass          =   $request->qt_pass;
            $cpa_ff->cpa_certificate  =   $cpa_certificate;
            $cpa_ff->mpa_mem_card     =   $mpa_mem_card;
            $cpa_ff->mpa_mem_card_back=   $mpa_mem_card_back;
            $cpa_ff->nrc_front        =   $nrc_front;
            $cpa_ff->nrc_back         =   $nrc_back;
            $cpa_ff->cpd_record       =   $cpd_record;
            $cpa_ff->total_hours      =   $request->total_hours;
            // $cpa_ff->passport_image   =   $passport_image;
            $cpa_ff->three_years_full   =   $three_years_full;
            $cpa_ff->letter   =   $letter;
            $cpa_ff->status           =  0;

            //save to cpaff
            $cpa_ff->cpa_batch_no     =   $request->cpa_batch_no;
            $cpa_ff->address          =   $request->address;
            $cpa_ff->phone            =   $request->phone;
            $cpa_ff->contact_mail     =   $request->contact_mail;
            $cpa_ff->form_type        =   $request->form_type;
            // $cpa_ff->cpa_certificate_back = $cpa_certificate_back;

            $cpa_ff->email             =   strtolower($request->email);
            $cpa_ff->name_mm           =   $request->name_mm;
            $cpa_ff->name_eng          =   $request->name_eng;
            $cpa_ff->nrc_state_region  =   $request->nrc_state_region;
            $cpa_ff->nrc_township      =   $request->nrc_township;
            $cpa_ff->nrc_citizen       =   $request->nrc_citizen;
            $cpa_ff->nrc_number        =   $request->nrc_number;
            $cpa_ff->father_name_mm    =   $request->father_name_mm;
            $cpa_ff->father_name_eng   =   $request->father_name_eng;            
            $cpa_ff->is_renew   =   $request->is_renew;
            $cpa_ff->save();

            //save to std info
            $std_info = new StudentInfo();
            $std_info->cpaff_id         =   $cpa_ff->id;
            $std_info->image    =   $profile_photo;
            $std_info->email            =   strtolower($request->email);
            $std_info->password         =   Hash::make($request->password);
            $std_info->approve_reject_status = 0;
            $std_info->name_mm = $request->name_mm;
            $std_info->name_eng = $request->name_eng;
            $std_info->nrc_state_region = $request->nrc_state_region;
            $std_info->nrc_township = $request->nrc_township;
            $std_info->nrc_citizen = $request->nrc_citizen;
            $std_info->nrc_number = $request->nrc_number;
            $std_info->name_eng = $request->name_eng;
            $std_info->father_name_mm = $request->father_name_mm;
            $std_info->father_name_eng = $request->father_name_eng;
            $std_info->save();

            $student_data = CPAFF::find($cpa_ff->id);
            $student_data->student_info_id = $std_info->id;
            $student_data->save();
            
            return response()->json([
                'message' => "You have successfully registerd!"
            ],200);
        }
        // return $request;
        // profile photo
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

        // if ($request->hasfile('foreign_degree')) {
        //     $file = $request->file('foreign_degree');
        //     $name  = uniqid().'.'.$file->getClientOriginalExtension();
        //     $file->move(public_path().'/storage/cpa_ff_register/',$name);
        //     $foreign_degree = $name;
        // }
        // else{
        //     $foreign_degree=null;
        // }

        if ($request->hasfile('cpa_certificate')) {
            $file = $request->file('cpa_certificate');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $cpa_certificate = '/storage/cpa_ff_register/'.$name;
        }
        else{
            $cpa_certificate="";
        }

        // if ($request->hasfile('cpa_certificate_back')) {
        //     $file = $request->file('cpa_certificate_back');
        //     $name  = uniqid().'.'.$file->getClientOriginalExtension();
        //     $file->move(public_path().'/storage/cpa_ff_register/',$name);
        //     $cpa_certificate_back = '/storage/cpa_ff_register/'.$name;
        // }
        // else{
        //     $cpa_certificate_back="";
        // }

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

        // if ($request->hasfile('passport_image')) {
        //     $file = $request->file('passport_image');
        //     $name  = uniqid().'.'.$file->getClientOriginalExtension();
        //     $file->move(public_path().'/storage/cpa_ff_register/',$name);
        //     $passport_image = '/storage/cpa_ff_register/'.$name;
        // }else{
        //     $passport_image="";
        // }

        if ($request->hasfile('three_years_full')) {
            $file = $request->file('three_years_full');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $three_years_full = '/storage/cpa_ff_register/'.$name;
        }else{
            $three_years_full="";
        }

        if ($request->hasfile('letter')) {
            $file = $request->file('letter');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $letter = '/storage/cpa_ff_register/'.$name;
        }else{
            $letter="";
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
        $cpa_ff->profile_photo    =   $profile_photo;
        $cpa_ff->cpa              =   $cpa;
        $cpa_ff->ra               =   $ra;
        $cpa_ff->degree_name      =   json_encode($request->degree_name);
        $cpa_ff->degree_pass_year =   json_encode($request->degree_pass_year);
        $cpa_ff->foreign_degree   =   json_encode($degree_file);

        $cpa_ff->pass_batch_no    =   $request->pass_batch_no;
        $cpa_ff->pass_personal_no =   $request->pass_personal_no;

        $cpa_ff->qt_pass_date     =   json_encode($request->qt_pass_date);
        $cpa_ff->qt_pass_seat_no  =   $request->qt_pass_seat_no;
        // $cpa_ff->foreign_degree   =   json_encode($foreign_degree);
        // $cpa_ff->foreign_degree   =   $foreign_degree;
        // $cpa_ff->cpa_part_2       =   $request->cpa_part_2;
        // $cpa_ff->qt_pass          =   $request->qt_pass;
        $cpa_ff->cpa_certificate  =   $cpa_certificate;
        $cpa_ff->mpa_mem_card     =   $mpa_mem_card;
        $cpa_ff->mpa_mem_card_back=   $mpa_mem_card_back;
        $cpa_ff->nrc_front        =   $nrc_front;
        $cpa_ff->nrc_back         =   $nrc_back;
        $cpa_ff->cpd_record       =   $cpd_record;
        $cpa_ff->total_hours      =   $request->total_hours;
        $cpa_ff->status           =  0;
        //save to cpaff
        $cpa_ff->cpa_batch_no     =   $request->cpa_batch_no;
        $cpa_ff->address          =   $request->address;
        $cpa_ff->phone            =   $request->phone;
        $cpa_ff->contact_mail     =   $request->contact_mail;
        $cpa_ff->form_type        =   $request->form_type;
        $cpa_ff->cpa2_pass_date        =   $request->cpa2_pass_date;
        $cpa_ff->reg_no        =   $request->reg_no;
        $cpa_ff->country        =   $request->country;
        $cpa_ff->government        =   $request->government;
        $cpa_ff->exam_year        =   $request->exam_year;
        $cpa_ff->exam_month        =   $request->exam_month;
        $cpa_ff->roll_no        =   $request->roll_no;
        // $cpa_ff->cpa_certificate_back = $cpa_certificate_back;
        $cpa_ff->three_years_full   =   $three_years_full;
        $cpa_ff->letter   =   $letter;              
        $cpa_ff->is_renew   =   $request->is_renew;
        $cpa_ff->save();

        //invoice
        $invNo = str_pad($cpa_ff->id, 20, "0", STR_PAD_LEFT);

        $invoice = new Invoice();
        $invoice->student_info_id = $request->student_info_id;
        $invoice->invoiceNo       = $invNo;
        $invoice->status          = 0;
        $invoice->save();

        return response()->json([
            'message' => "You have successfully registerd!"
        ],200);
    }
    //Store Renew Form
    public function storeRenewForm(Request $request){
        $initial_cpaff=CPAFF::where('student_info_id',$request->student_info_id)
        ->where('is_renew',0)->first();
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

        if ($request->hasfile('three_years_full')) {
            $file = $request->file('three_years_full');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $three_years_full = '/storage/cpa_ff_register/'.$name;
        }else{
            $three_years_full="";
        }

        // if ($request->hasfile('letter')) {
        //     $file = $request->file('letter');
        //     $name  = uniqid().'.'.$file->getClientOriginalExtension();
        //     $file->move(public_path().'/storage/cpa_ff_register/',$name);
        //     $letter = '/storage/cpa_ff_register/'.$name;
        // }else{
        //     $letter="";
        // }
        $cpa_ff  = new CPAFF();
        $cpa_ff->student_info_id  =   $request->student_info_id;
        $cpa_ff->profile_photo    =   $profile_photo;
        $cpa_ff->cpa              =   $cpa;
        $cpa_ff->ra               =   $ra;
        $cpa_ff->degree_name      =   $degree_name;
        $cpa_ff->degree_pass_year =   $degree_pass_year;
        $cpa_ff->foreign_degree   =   $degree_file_json;

        $cpa_ff->pass_batch_no    =   $request->pass_batch_no;
        $cpa_ff->pass_personal_no =   $request->pass_personal_no;

        $cpa_ff->qt_pass_date     =   json_encode($request->qt_pass_date);
        $cpa_ff->qt_pass_seat_no  =   $request->qt_pass_seat_no;
        $cpa_ff->cpa_certificate  =   $cpa_certificate;
        $cpa_ff->mpa_mem_card     =   $mpa_mem_card;
        $cpa_ff->mpa_mem_card_back=   $mpa_mem_card_back;
        $cpa_ff->nrc_front        =   $nrc_front;
        $cpa_ff->nrc_back         =   $nrc_back;
        $cpa_ff->cpd_record       =   $cpd_record;
        $cpa_ff->total_hours      =   $request->total_hours;
        $cpa_ff->form_type        =   $initial_cpaff->form_type;
        $cpa_ff->status           =  0;
        //save to cpaff
        $cpa_ff->cpa_batch_no     =   $request->cpa_batch_no;
        $cpa_ff->address          =   $request->address;
        $cpa_ff->phone            =   $request->phone;
        $cpa_ff->contact_mail     =   $request->contact_mail;
        $cpa_ff->three_years_full   =   $three_years_full;
        // $cpa_ff->letter   =   $letter;           
        // $cpa_ff->old_card_year     =   $request->old_card_year;
        $cpa_ff->cpaff_pass_date     =   $request->cpaff_pass_date;
        $cpa_ff->renew_card_year          =   $request->renew_card_year;
        $cpa_ff->old_card_no            =   $request->old_card_no;
        $cpa_ff->old_card_no_year     =   $request->old_card_no_year;
        $cpa_ff->old_card_file        =   $request->old_card_file;
        $cpa_ff->is_convicted        =   $request->is_convicted;  
        $cpa_ff->is_renew   =   $request->is_renew;
        $cpa_ff->save();
        
        
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

    public function reject(Request $request)
    {
        $cpa_ff = CPAFF::find($request->id);
        $cpa_ff->status = 2;
        $cpa_ff->renew_status=2;
        $cpa_ff->reject_description = $request->description;
        $cpa_ff->is_renew = 0;
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

        // if ($request->hasfile('passport_image')) {
        //     $file = $request->file('passport_image');
        //     $name  = uniqid().'.'.$file->getClientOriginalExtension();
        //     $file->move(public_path().'/storage/cpa_ff_register/',$name);
        //     $passport_image = '/storage/cpa_ff_register/'.$name;
        // }else{
        //     $passport_image=$request->passport_image;
        // }
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

        // $std_info = StudentInfo::find($request->student_info_id);
        // $std_info->payment_method = null;
        // $std_info->approve_reject_status = 0;
        // $std_info->save();

        $cpa_ff = CPAFF::find($id);
        // $cpa_ff->cpa_part_2       =   $request->cpa_part_2;
        // $cpa_ff->qt_pass          =   $request->qt_pass;
        $cpa_ff->cpa_certificate=$cpa_certificate;
        $cpa_ff->mpa_mem_card=$mpa_mem_card;
        $cpa_ff->mpa_mem_card_back=$mpa_mem_card_back;
        $cpa_ff->cpd_record=$cpd_record;
        // $cpa_ff->passport_image=$passport_image;
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
        $cpaff = CPAFF::where('student_info_id',$stu_id)->first();
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
                        ->rawColumns(['action','nrc','degree','status','created_at','updated_at'])
                        ->make(true);
            }
}
