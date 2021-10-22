<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Papp;
use App\StudentJobHistroy;
use App\EducationHistroy;
use App\StudentInfo;
use App\Membership;
use App\CPAFF;
use App\Invoice;
use Hash;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class PAPPController extends Controller
{
    //
    public function index()
    {
        $papp = Papp::with('student_info','student_job', 'student_education_histroy')->get();
        return response()->json([
            'data' => $papp
        ],200);
    }
    public function store(Request $request)
    {
        if ($request->hasfile('profile_photo')) {
            $file = $request->file('profile_photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $profile_photo = '/storage/student_info/'.$name;
        }else{
            $profile_photo=null;
        }
        $cpaff_data=CPAFF::where('student_info_id',$request->student_id)->first();
        // if ($request->hasfile('cpa')) {
        //     $cpa_file = $request->file('cpa');
        //     $cpa_name  = uniqid().'.'.$cpa_file->getClientOriginalExtension();
        //     $cpa_file->move(public_path().'/storage/student_papp/',$cpa_name);
        //     $cpa = '/storage/student_papp/'.$cpa_name;
        // }
        // else{
        //     $cpa="";
        // }

        // if ($request->hasfile('ra')) {
        //     $ra_file = $request->file('ra');
        //     $ra_name  = uniqid().'.'.$ra_file->getClientOriginalExtension();
        //     $ra_file->move(public_path().'/storage/student_papp/',$ra_name);
        //     $ra = '/storage/student_papp/'.$ra_name;
        // }
        // else{
        //     $ra="";
        // }

        // if ($request->hasfile('foreign_degree')) {
        //     $degree_file = $request->file('foreign_degree');
        //     $degree_name  = uniqid().'.'.$degree_file->getClientOriginalExtension();
        //     $degree_file->move(public_path().'/storage/student_papp/',$degree_name);
        //     $degree = '/storage/student_papp/'.$degree_name;
        // }
        // else{
        //     $degree="";
        // }
        // if($request->hasfile('foreign_degree'))
        // {
        //     foreach($request->file('foreign_degree') as $file)
        //     {
        //         $name  = uniqid().'.'.$file->getClientOriginalExtension();
        //         $file->move(public_path().'/storage/student_papp/',$name);
        //         $degree[] = '/storage/student_papp/'.$name;
        //     }

        // }else{
        //     $cpaff_data=CPAFF::where('student_info_id',$request->student_id)->first();
        //     $degree = $cpaff_data->foreign_degree;
        // }

        if ($request->hasfile('cpa_ff_recommendation')) {
            $cpa_ff_file = $request->file('cpa_ff_recommendation');
            $cpa_ff_name  = uniqid().'.'.$cpa_ff_file->getClientOriginalExtension();
            $cpa_ff_file->move(public_path().'/storage/student_papp/',$cpa_ff_name);
            $cpa_ff = '/storage/student_papp/'.$cpa_ff_name;
        }
        else{
            $cpa_ff="";
        }

        // if ($request->hasfile('recommendation_183')) {
        //     $recomm_183_file = $request->file('recommendation_183');
        //     $recomm_183_name  = uniqid().'.'.$recomm_183_file->getClientOriginalExtension();
        //     $recomm_183_file->move(public_path().'/storage/student_papp/',$recomm_183_name);
        //     $recomm_183 = '/storage/student_papp/'.$recomm_183_name;
        // }else{
        //     $recomm_183="";
        // }

        // if ($request->hasfile('not_fulltime_recommendation')) {
        //     $not_fulltime_file = $request->file('not_fulltime_recommendation');
        //     $not_fulltime_name  = uniqid().'.'.$not_fulltime_file->getClientOriginalExtension();
        //     $not_fulltime_file->move(public_path().'/storage/student_papp/',$not_fulltime_name);
        //     $not_fulltime= '/storage/student_papp/'.$not_fulltime_name;
        // }else{
        //     $not_fulltime="";
        // }

        // if ($request->hasfile('work_in_myanmar_confession')) {
        //     $work_in_mm_file = $request->file('work_in_myanmar_confession');
        //     $work_in_mm_name  = uniqid().'.'.$work_in_mm_file->getClientOriginalExtension();
        //     $work_in_mm_file->move(public_path().'/storage/student_papp/',$work_in_mm_name);
        //     $work_in_mm= '/storage/student_papp/'.$work_in_mm_name;
        // }else{
        //     $work_in_mm="";
        // }

        // if ($request->hasfile('rule_confession')) {
        //     $rule_file = $request->file('rule_confession');
        //     $rule_name  = uniqid().'.'.$rule_file->getClientOriginalExtension();
        //     $rule_file->move(public_path().'/storage/student_papp/',$rule_name);
        //     $rule = '/storage/student_papp/'.$rule_name;
        // }else{
        //     $rule="";
        // }

        if ($request->hasfile('cpd_record')) {
            $cpd_file = $request->file('cpd_record');
            $cpd_name  = uniqid().'.'.$cpd_file->getClientOriginalExtension();
            $cpd_file->move(public_path().'/storage/student_papp/',$cpd_name);
            $cpd = '/storage/student_papp/'.$cpd_name;
        }else{
            $cpd="";
        }

        if ($request->hasfile('mpa_mem_card_front')) {
            $mpa_mem_card_front_file = $request->file('mpa_mem_card_front');
            $mpa_mem_card_front_name  = uniqid().'.'.$mpa_mem_card_front_file->getClientOriginalExtension();
            $mpa_mem_card_front_file->move(public_path().'/storage/student_papp/',$mpa_mem_card_front_name);
            $mpa_mem_card_front = '/storage/student_papp/'.$mpa_mem_card_front_name;
        }else{
            $mpa_mem_card_front="";
        }

        if ($request->hasfile('mpa_mem_card_back')) {
            $mpa_mem_card_back_file = $request->file('mpa_mem_card_back');
            $mpa_mem_card_back_name  = uniqid().'.'.$mpa_mem_card_back_file->getClientOriginalExtension();
            $mpa_mem_card_back_file->move(public_path().'/storage/student_papp/',$mpa_mem_card_back_name);
            $mpa_mem_card_back = '/storage/student_papp/'.$mpa_mem_card_back_name;
        }else{
            $mpa_mem_card_back="";
        }

        if ($request->hasfile('tax_free_recommendation')) {
            $tax_free_file = $request->file('tax_free_recommendation');
            $tax_free_name  = uniqid().'.'.$tax_free_file->getClientOriginalExtension();
            $tax_free_file->move(public_path().'/storage/student_papp/',$tax_free_name);
            $tax_free = '/storage/student_papp/'.$tax_free_name;
        }else{
            $tax_free="";
        }

        // if ($request->hasfile('letter')) {
        //     $file = $request->file('letter');
        //     $name  = uniqid().'.'.$file->getClientOriginalExtension();
        //     $file->move(public_path().'/storage/student_papp/',$name);
        //     $letter = '/storage/student_papp/'.$name;
        // }else{
        //     $letter="";
        // }

        $papp  = new Papp();
        $papp->student_id                   =   $request->student_id;
        $papp->profile_photo                =   $profile_photo;
        $papp->cpa                          =   $cpaff_data->cpa;
        $papp->ra                           =   $cpaff_data->ra;
        $papp->foreign_degree               =   $cpaff_data->foreign_degree;
        $papp->degree_name                  =   $cpaff_data->degree_name;
        $papp->degree_pass_year             =   $cpaff_data->degree_pass_year;
        $papp->papp_date                    =   $request->papp_date;
        $papp->cpaff_pass_date              =   $request->cpaff_pass_date;
        $papp->use_firm                     =   $request->use_firm;
        $papp->firm_name                    =   $request->firm_name;
        $papp->firm_type                    =   $request->firm_type;
        $papp->firm_step                    =   $request->firm_step;
        $papp->staff_firm_name              =   $request->staff_firm_name;
        $papp->cpa_ff_recommendation        =   $cpa_ff;
        // $papp->recommendation_183           =   $recomm_183;
        // $papp->not_fulltime_recommendation  =   $not_fulltime;
        // $papp->work_in_myanmar_confession   =   $work_in_mm;
        // $papp->rule_confession              =   $rule;
        $papp->cpd_record                   =   $cpd;
        $papp->cpd_hours                    =   $request->cpd_hours;
        $papp->mpa_mem_card_front           =   $mpa_mem_card_front;
        $papp->mpa_mem_card_back            =   $mpa_mem_card_back;
        $papp->tax_year                     =   $request->tax_year;
        $papp->tax_free_recommendation      =   $tax_free;
        $papp->status                       =  0;
        //save to papp
        $papp->cpa_batch_no     =   $request->cpa_batch_no;
        $papp->address          =   $request->address;
        $papp->phone            =   $request->phone;
        $papp->contact_mail     =   $request->contact_mail;
        // $papp->letter           =   $letter;
        $papp->cpaff_reg_no           =   $request->cpaff_reg_no;
        $papp->type             =   $request->type;
        $papp->self_confession  =   $request->self_confession;

        $thisYear = date('Y');
        $today = date('d-m-Y');
        $papp->validate_from = $today;
        $papp->validate_to = '31-12-' . $thisYear;

        $papp->save();

        //invoice
        $fees = Membership::where('membership_name','=','PAPP')->first(['form_fee', 'registration_fee']);
        $stdInfo = StudentInfo::where('id', '=', $request->student_id)->first();
        //$invNo = str_pad($papp->id, 20, "0", STR_PAD_LEFT);

        $invoice = new Invoice();
        $invoice->student_info_id = $request->student_id;
        $invoice->invoiceNo  = "papp-initial";
        $invoice->name_eng       =  $stdInfo->name_eng;
        $invoice->email       = $stdInfo->email;
        $invoice->phone       = $stdInfo->phone;
        $invoice->productDesc = 'Application Fee , Registration Fee,PAPP Registration';
        $invoice->amount = $fees->form_fee.",". $fees->registration_fee;
        $invoice->status          = 0;
        $invoice->save();

        return response()->json([
            'message' => "You have successfully registered!"
        ],200);
    }

    public function show($id)
    {
        $papp = Papp::where('id',$id)->with('student_info','student_job', 'student_education_histroy','student_register')->get();
        return response()->json([
            'data'  => $papp
        ]);
    }

    public function approve($id)
    {
        $accepted_date = date('Y-m-d');
        $approve = Papp::find($id);
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
        $reject = Papp::find($request->id);
        $reject->status = 2;
        $reject->renew_status=2;
        $reject->reject_description = $request->description;
        $reject->save();
        return response()->json([
            'message' => "You have successfully rejected that user!"
        ],200);
    }

    public function PappRenewRegistration(Request $request){
        $oldPapp = Papp::where('student_id', '=', $request->student_id)->latest()->first();
        if ($request->hasfile('profile_photo')) {
            $file = $request->file('profile_photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $profile_photo = '/storage/student_info/'.$name;
        }else{
            $profile_photo=null;
        }
        $cpaff_data=CPAFF::where('student_info_id',$request->student_id)->first();
        // if ($request->hasfile('cpa')) {
        //     $cpa_file = $request->file('cpa');
        //     $cpa_name  = uniqid().'.'.$cpa_file->getClientOriginalExtension();
        //     $cpa_file->move(public_path().'/storage/student_papp/',$cpa_name);
        //     $cpa = '/storage/student_papp/'.$cpa_name;
        // }
        // else{
        //     $cpa="";
        // }

        // if ($request->hasfile('ra')) {
        //     $ra_file = $request->file('ra');
        //     $ra_name  = uniqid().'.'.$ra_file->getClientOriginalExtension();
        //     $ra_file->move(public_path().'/storage/student_papp/',$ra_name);
        //     $ra = '/storage/student_papp/'.$ra_name;
        // }
        // else{
        //     $ra="";
        // }

        // if($request->hasfile('foreign_degree'))
        // {
        //     foreach($request->file('foreign_degree') as $file)
        //     {
        //         $name  = uniqid().'.'.$file->getClientOriginalExtension();
        //         $file->move(public_path().'/storage/student_papp/',$name);
        //         $degree[] = '/storage/student_papp/'.$name;
        //     }

        // }else{
        //     $cpaff_data=CPAFF::where('student_info_id',$request->student_id)->first();
        //     $degree = $cpaff_data->foreign_degree;
        // }

        if ($request->hasfile('cpa_ff_recommendation')) {
            $cpa_ff_file = $request->file('cpa_ff_recommendation');
            $cpa_ff_name  = uniqid().'.'.$cpa_ff_file->getClientOriginalExtension();
            $cpa_ff_file->move(public_path().'/storage/student_papp/',$cpa_ff_name);
            $cpa_ff = '/storage/student_papp/'.$cpa_ff_name;
        }
        else{
            $cpa_ff="";
        }

        if ($request->hasfile('recommendation_183')) {
            $recomm_183_file = $request->file('recommendation_183');
            $recomm_183_name  = uniqid().'.'.$recomm_183_file->getClientOriginalExtension();
            $recomm_183_file->move(public_path().'/storage/student_papp/',$recomm_183_name);
            $recomm_183 = '/storage/student_papp/'.$recomm_183_name;
        }else{
            $recomm_183="";
        }

        if ($request->hasfile('not_fulltime_recommendation')) {
            $not_fulltime_file = $request->file('not_fulltime_recommendation');
            $not_fulltime_name  = uniqid().'.'.$not_fulltime_file->getClientOriginalExtension();
            $not_fulltime_file->move(public_path().'/storage/student_papp/',$not_fulltime_name);
            $not_fulltime= '/storage/student_papp/'.$not_fulltime_name;
        }else{
            $not_fulltime="";
        }

        if ($request->hasfile('work_in_myanmar_confession')) {
            $work_in_mm_file = $request->file('work_in_myanmar_confession');
            $work_in_mm_name  = uniqid().'.'.$work_in_mm_file->getClientOriginalExtension();
            $work_in_mm_file->move(public_path().'/storage/student_papp/',$work_in_mm_name);
            $work_in_mm= '/storage/student_papp/'.$work_in_mm_name;
        }else{
            $work_in_mm="";
        }

        if ($request->hasfile('rule_confession')) {
            $rule_file = $request->file('rule_confession');
            $rule_name  = uniqid().'.'.$rule_file->getClientOriginalExtension();
            $rule_file->move(public_path().'/storage/student_papp/',$rule_name);
            $rule = '/storage/student_papp/'.$rule_name;
        }else{
            $rule="";
        }

        if ($request->hasfile('cpd_record')) {
            $cpd_file = $request->file('cpd_record');
            $cpd_name  = uniqid().'.'.$cpd_file->getClientOriginalExtension();
            $cpd_file->move(public_path().'/storage/student_papp/',$cpd_name);
            $cpd = '/storage/student_papp/'.$cpd_name;
        }else{
            $cpd="";
        }

        if ($request->hasfile('mpa_mem_card_front')) {
            $mpa_mem_card_front_file = $request->file('mpa_mem_card_front');
            $mpa_mem_card_front_name  = uniqid().'.'.$mpa_mem_card_front_file->getClientOriginalExtension();
            $mpa_mem_card_front_file->move(public_path().'/storage/student_papp/',$mpa_mem_card_front_name);
            $mpa_mem_card_front = '/storage/student_papp/'.$mpa_mem_card_front_name;
        }else{
            $mpa_mem_card_front="";
        }

        if ($request->hasfile('mpa_mem_card_back')) {
            $mpa_mem_card_back_file = $request->file('mpa_mem_card_back');
            $mpa_mem_card_back_name  = uniqid().'.'.$mpa_mem_card_back_file->getClientOriginalExtension();
            $mpa_mem_card_back_file->move(public_path().'/storage/student_papp/',$mpa_mem_card_back_name);
            $mpa_mem_card_back = '/storage/student_papp/'.$mpa_mem_card_back_name;
        }else{
            $mpa_mem_card_back="";
        }

        if ($request->hasfile('tax_free_recommendation')) {
            $tax_free_file = $request->file('tax_free_recommendation');
            $tax_free_name  = uniqid().'.'.$tax_free_file->getClientOriginalExtension();
            $tax_free_file->move(public_path().'/storage/student_papp/',$tax_free_name);
            $tax_free = '/storage/student_papp/'.$tax_free_name;
        }else{
            $tax_free="";
        }

        if ($request->hasfile('letter')) {
            $file = $request->file('letter');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_papp/',$name);
            $letter = '/storage/student_papp/'.$name;
        }else{
            $letter="";
        }

        
        $papp  = new Papp();
        $papp->student_id                   = $request->student_id;
        $papp->profile_photo                =   $profile_photo;
        $papp->cpa                          =   $cpaff_data->cpa;
        $papp->ra                           =   $cpaff_data->ra;
        $papp->foreign_degree               =   $cpaff_data->foreign_degree;
        $papp->degree_name                  =   $cpaff_data->degree_name;
        $papp->degree_pass_year             =   $cpaff_data->degree_pass_year;
        $papp->papp_date                    =   $request->papp_date;
        $papp->papp_reg_date                =   $request->papp_reg_date;
        $papp->use_firm                     =   $request->use_firm;
        $papp->firm_name                    =   $request->firm_name;
        $papp->firm_type                    =   $request->firm_type;
        $papp->firm_step                    =   $request->firm_step;
        $papp->staff_firm_name              =   $request->staff_firm_name;
        $papp->cpa_ff_recommendation        =   $cpa_ff;
        $papp->recommendation_183           =   $recomm_183;
        $papp->not_fulltime_recommendation  =   $not_fulltime;
        $papp->work_in_myanmar_confession   =   $work_in_mm;
        $papp->rule_confession              =   $rule;
        $papp->cpd_record                   =   $cpd;
        $papp->cpd_hours                    =   $request->cpd_hours;
        $papp->mpa_mem_card_front           =   $mpa_mem_card_front;
        $papp->mpa_mem_card_back            =   $mpa_mem_card_back;
        $papp->tax_year                     =   $request->tax_year;
        $papp->tax_free_recommendation      =   $tax_free;
        $papp->company               =   json_encode($request->company);
        $papp->period                  =   json_encode($request->period);
        $papp->manager             =   json_encode($request->manager);
        $papp->status                       =  0;
        //save to papp
        $papp->cpa_batch_no     =   $request->cpa_batch_no;
        $papp->address          =   $request->address;
        $papp->phone            =   $request->phone;
        $papp->contact_mail     =   $request->contact_mail;
        $papp->letter           =   $letter;
        $papp->cpaff_reg_no           =   $request->cpaff_reg_no;
        $papp->papp_reg_no      =   $request->papp_reg_no;
        $papp->audit_work       =   $request->audit_work;
        $papp->audit_year       =   $request->audit_year;
        $papp->type             =   $request->type;
        $papp->papp_renew_date     =   $request->papp_renew_date;       
        
        $today = date('d-m-Y');        
        $papp->validate_from = $today ;
        // $old_validate_to=date('Y-m',strtotime($oldPapp->validate_to));
        if(strtotime($today)<=strtotime($oldPapp->validate_to))
        {
            $thisYear = date('Y')+1;
            $papp->validate_to = '31-12-' . $thisYear;
        }
        else{
            $thisYear = date('Y');
            $papp->validate_to = '31-12-' . $thisYear;
        }
        $papp->save();

        //invoice
        $fees = Membership::where('membership_name','=','PAPP')->first(['renew_fee','form_fee', 'late_fee','reconnected_fee_before_2015','reconnected_fee']);
        $stdInfo = StudentInfo::where('id', '=', $request->student_id)->first();
        //$invNo = str_pad($papp->id, 20, "0", STR_PAD_LEFT);

        $invoice = new Invoice();
        $invoice->student_info_id = $request->student_id;
        $invoice->invoiceNo       = '';
        $invoice->name_eng        =  $stdInfo->name_eng;
        $invoice->email           = $stdInfo->email;
        $invoice->phone           = $stdInfo->phone;
        if($oldPapp->offline_user==0){
            $thisYear = date('Y');
            $oldYear=date('Y',strtotime($oldPapp->validate_to));
            if($thisYear == $oldYear){
                $invoice->productDesc     = 'Application Fee, Renewal Fee,PAPP Registration';
                $invoice->amount          = $fees->form_fee.",".$fees->renew_fee;
            }else if($thisYear == $oldYear + 1 && date('M') === 'Jan'){
                $invoice->productDesc     = 'Application Fee, Renewal Fee, Delay Fee(within Jan),PAPP Registration' ;
                $invoice->amount          = $fees->form_fee.",".$fees->renew_fee . ',' . $fees->late_fee ;
            }
            else if($thisYear == $oldYear + 1 && date('m')>1 && date('m')<=4){
                $invoice->productDesc     = 'Application Fee, Renewal Fee, Delay Fee(from Feb to Apr),PAPP Registration' ;
                $invoice->amount          = $fees->form_fee.",".$fees->renew_fee . ', 10 x ' . $fees->late_fee ;
            }
            else{
                $invoice->productDesc     = 'Application Fee, Renewal Fee, Delay Fee(from Feb to Apr),PAPP Registration' ;
                $invoice->amount          = $fees->form_fee.",".$fees->renew_fee . ', 10 x ' . $fees->late_fee ;
            }
        }
        else if($oldPapp->offline_user==1){
            if($oldPapp->submitted_stop_form==0){
                $thisYear = date('Y');
                $last_paid_year=$oldPapp->latest_reg_year;
                if($last_paid_year>="2015"){
                    $greater_than_2015=$thisYear-$last_paid_year-1;
                    $invoice->productDesc     = 'Application Fee, Renewal Fee,Reconnected Fee, CPA(Full-Fledged) Registration';
                    $invoice->amount          = $fees->form_fee.",".$fees->renew_fee.",".$greater_than_2015*$fees->reconnected_fee;
                }
                else{
                    $year_diff_before_2015='2015'-$last_paid_year-1;
                    $year_diff_after_2015=$thisYear-"2015";
                    $calculate_amount=$year_diff_before_2015*$fees->reconnected_fee_before_2015+$year_diff_after_2015*$fees->reconnected_fee;
                    $invoice->productDesc     = 'Application Fee, Renewal Fee,Reconnected Fee, CPA(Full-Fledged) Registration';
                    $invoice->amount          = $fees->form_fee.",".$fees->renew_fee.",".$calculate_amount;
                }
            }
            else if($oldPapp->submitted_stop_form==1){
                $last_paid_year=$oldPapp->latest_reg_year;
                $submitted_stop_form_year=$oldPapp->papp_resign_date;
                if( $last_paid_year<"2015" && $submitted_stop_form_year<"2015"){
                    $year_diff=$submitted_stop_form_year-$last_paid_year-1;
                    $invoice->productDesc     = 'Application Fee, Renewal Fee,Reconnected Fee, CPA(Full-Fledged) Registration';
                    $invoice->amount          = $fees->form_fee.",".$fees->renew_fee.",".$year_diff*$fees->reconnected_fee_before_2015;
                }
                else if($last_paid_year<"2015" && $submitted_stop_form_year>="2015"){
                    $year_diff_before_2015='2015'-$last_paid_year-1;
                    $year_diff_after_2015=$submitted_stop_form_year-"2015";
                    $calculate_amount=$year_diff_before_2015*$fees->reconnected_fee_before_2015+$year_diff_after_2015*$fees->reconnected_fee;
                    $invoice->productDesc     = 'Application Fee, Renewal Fee,Reconnected Fee, CPA(Full-Fledged) Registration';
                    $invoice->amount          = $fees->form_fee.",".$fees->renew_fee.",".$calculate_amount;
                }
                else if($last_paid_year>"2015" && $submitted_stop_form_year>="2015"){
                    $year_diff=$submitted_stop_form_year-$last_paid_year-1;
                    $invoice->productDesc     = 'Application Fee, Renewal Fee,Reconnected Fee, CPA(Full-Fledged) Registration';
                    $invoice->amount          = $fees->form_fee.",".$fees->renew_fee.",".$year_diff*$fees->reconnected_fee;
                }
            }
        }
        $invoice->invoiceNo = "papp-renew";
        $invoice->status = 0;
        // return $invoice;
        $invoice->save();
        
        return response()->json([
            'message' => "You have successfully registerd!"
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
        else{
            $profile_photo=$request->file_183;
        }


        if ($request->hasfile('cpa')) {
            $cpa_file = $request->file('cpa');
            $cpa_name  = uniqid().'.'.$cpa_file->getClientOriginalExtension();
            $cpa_file->move(public_path().'/storage/student_papp/',$cpa_name);
            $cpa = '/storage/student_papp/'.$cpa_name;
        }
        else{
            $cpa="";
        }

        if ($request->hasfile('ra')) {
            $ra_file = $request->file('ra');
            $ra_name  = uniqid().'.'.$ra_file->getClientOriginalExtension();
            $ra_file->move(public_path().'/storage/student_papp/',$ra_name);
            $ra = '/storage/student_papp/'.$ra_name;
        }
        else{
            $ra="";
        }
        if($request->hasfile('foreign_degree'))
        {
            foreach($request->file('foreign_degree') as $file)
            {
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/student_papp/',$name);
                $degree[] = '/storage/student_papp/'.$name;
            }

        }else{
            $degree = null;
        }

        if ($request->hasfile('cpa_ff_file')) {
            $cpa_ff_file = $request->file('cpa_ff_file');
            $cpa_ff_name  = uniqid().'.'.$cpa_ff_file->getClientOriginalExtension();
            $cpa_ff_file->move(public_path().'/storage/student_papp/',$cpa_ff_name);
            $cpa_ff = '/storage/student_papp/'.$cpa_ff_name;
        }
        else{
            $cpa_ff=$request->cpa_ff_file;
        }

        if ($request->hasfile('file_183')) {
            $recomm_183_file = $request->file('file_183');
            $recomm_183_name  = uniqid().'.'.$recomm_183_file->getClientOriginalExtension();
            $recomm_183_file->move(public_path().'/storage/student_papp/',$recomm_183_name);
            $recomm_183 = '/storage/student_papp/'.$recomm_183_name;
        }else{
            $recomm_183=$request->file_183;
        }

        if ($request->hasfile('not_fulltime_file')) {
            $not_fulltime_file = $request->file('not_fulltime_file');
            $not_fulltime_name  = uniqid().'.'.$not_fulltime_file->getClientOriginalExtension();
            $not_fulltime_file->move(public_path().'/storage/student_papp/',$not_fulltime_name);
            $not_fulltime= '/storage/student_papp/'.$not_fulltime_name;
        }else{
            $not_fulltime=$request->not_fulltime_file;
        }

        if ($request->hasfile('work_in_mm_file')) {
            $work_in_mm_file = $request->file('work_in_mm_file');
            $work_in_mm_name  = uniqid().'.'.$work_in_mm_file->getClientOriginalExtension();
            $work_in_mm_file->move(public_path().'/storage/student_papp/',$work_in_mm_name);
            $work_in_mm= '/storage/student_papp/'.$work_in_mm_name;
        }else{
            $work_in_mm=$request->work_in_mm_file;
        }

        if ($request->hasfile('rule_conf_file')) {
            $rule_file = $request->file('rule_conf_file');
            $rule_name  = uniqid().'.'.$rule_file->getClientOriginalExtension();
            $rule_file->move(public_path().'/storage/student_papp/',$rule_name);
            $rule = '/storage/student_papp/'.$rule_name;
        }else{
            $rule=$request->rule_conf_file;
        }

        if ($request->hasfile('cpd_record_file')) {
            $cpd_file = $request->file('cpd_record_file');
            $cpd_name  = uniqid().'.'.$cpd_file->getClientOriginalExtension();
            $cpd_file->move(public_path().'/storage/student_papp/',$cpd_name);
            $cpd = '/storage/student_papp/'.$cpd_name;
        }else{
            $cpd=$request->cpd_record_file;
        }

        if ($request->hasfile('tax_free_file')) {
            $tax_free_file = $request->file('tax_free_file');
            $tax_free_name  = uniqid().'.'.$tax_free_file->getClientOriginalExtension();
            $tax_free_file->move(public_path().'/storage/student_papp/',$tax_free_name);
            $tax_free = '/storage/student_papp/'.$tax_free_name;
        }else{
            $tax_free=$request->tax_free_file;
        }

        if ($request->hasfile('mpa_mem_card_front')) {
            $mpa_mem_card_front_file = $request->file('mpa_mem_card_front');
            $mpa_mem_card_front_name  = uniqid().'.'.$mpa_mem_card_front_file->getClientOriginalExtension();
            $mpa_mem_card_front_file->move(public_path().'/storage/student_papp/',$mpa_mem_card_front_name);
            $mpa_mem_card_front = '/storage/student_papp/'.$mpa_mem_card_front_name;
        }else{
            $mpa_mem_card_front=$request->mpa_mem_card_front;
        }

        if ($request->hasfile('mpa_mem_card_back')) {
            $mpa_mem_card_back_file = $request->file('mpa_mem_card_back');
            $mpa_mem_card_back_name  = uniqid().'.'.$mpa_mem_card_back_file->getClientOriginalExtension();
            $mpa_mem_card_back_file->move(public_path().'/storage/student_papp/',$mpa_mem_card_back_name);
            $mpa_mem_card_back = '/storage/student_papp/'.$mpa_mem_card_back_name;
        }else{
            $mpa_mem_card_back=$request->mpa_mem_card_back;
        }

        if ($request->hasfile('letter')) {
            $letter_file = $request->file('letter');
            $letter_name  = uniqid().'.'.$letter_file->getClientOriginalExtension();
            $letter_file->move(public_path().'/storage/student_papp/',$letter_name);
            $letter = '/storage/student_papp/'.$letter_name;
        }else{
            $letter=$request->letter;
        }

        $papp = Papp::find($id);
        $papp->profile_photo=$profile_photo;
        $papp->use_firm                     =   $request->use_firm;
        $papp->firm_name                    =   $request->firm_name;
        $papp->firm_type                    =   $request->firm_type;
        $papp->firm_step                    =   $request->firm_step;
        $papp->staff_firm_name              =   $request->staff_firm_name;
        $papp->cpa_ff_recommendation        =   $cpa_ff;
        $papp->recommendation_183           =   $recomm_183;
        $papp->not_fulltime_recommendation  =   $not_fulltime;
        $papp->work_in_myanmar_confession   =   $work_in_mm;
        $papp->rule_confession              =   $rule;
        $papp->cpd_record                   =   $cpd;
        $papp->cpd_hours                    =   $request->total_hours;;
        $papp->tax_year                     =   $request->tax_year;
        $papp->tax_free_recommendation      =   $tax_free;
        $papp->mpa_mem_card_front           =   $mpa_mem_card_front;
        $papp->mpa_mem_card_back            =   $mpa_mem_card_back;
        $papp->letter                       =   $letter;
        $papp->renew_accepted_date=date('Y-m-d');
        $papp->renew_status=1;
        $papp->status=0;
        $papp->save();
        return response()->json([
            'message' => "Your renew subscription is successfully"
        ],200);

     }
     public function getPappByStuId($stu_id){
        $papp = Papp::where('student_id',$stu_id)->first();
        return response()->json([
            'data'  => $papp
        ]);
    }

    public function approvePapp($id)
    { 
        $std_info = StudentInfo::find($id) ;
        $std_info->payment_method = 'PAPP';
        $std_info->save();
        return response()->json([
            'data' => $std_info,
        ],200);
    }

    public function checkPaymentPapp($id)
    {
        $data = StudentInfo::where('id',$id)->get();
        return response()->json($data,200);
    }

    public function FilterPappRegistration($status,$type){
        $papp = Papp::with('student_info','student_job', 'student_education_histroy')
                      ->where('status','=',$status)
                      ->where('type','=',$type)
                      ->get();

        return DataTables::of($papp)
          ->addColumn('action', function ($infos) {
              return "<div class='btn-group'>
                          <button type='button' class='btn btn-primary btn-xs' onclick='showPAPPList($infos->id,$infos->type)'>
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

            // ->addColumn('type', function ($infos){
            //     if($infos->status == 0){
            //     return "Initial";
            //     }
            //     else{
            //         return "Renew";
            //     }
            // })

          ->addColumn('use_firm', function ($infos){
              if($infos->use_firm == 0){
                return "No Use Frim Name";
              }
              else{
                return "Use Frim Name";
              }
          })

          ->addColumn('papp_date', function ($infos){
              return $infos->papp_date;
          })
          ->addColumn('created_at', function ($infos){
            return date("d F Y", strtotime($infos->student_info->created_at));
        })
        ->addColumn('updated_at', function ($infos){
            return date("d F Y", strtotime($infos->student_info->updated_at));
        })
          ->rawColumns(['action','nrc','papp_date','status','use_firm','created_at','updated_at'])
          ->make(true);
    }

    public function updateRejectedInitialData(Request $request){
        $papp = Papp::find($request->papp_id);
        if ($request->hasfile('profile_photo')) {
            $file = $request->file('profile_photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $profile_photo = '/storage/student_info/'.$name;

            $papp->profile_photo                =   $profile_photo;
        }       
        if ($request->hasfile('cpa_ff_recommendation')) {
            $cpa_ff_file = $request->file('cpa_ff_recommendation');
            $cpa_ff_name  = uniqid().'.'.$cpa_ff_file->getClientOriginalExtension();
            $cpa_ff_file->move(public_path().'/storage/student_papp/',$cpa_ff_name);
            $cpa_ff = '/storage/student_papp/'.$cpa_ff_name;

            $papp->cpa_ff_recommendation        =   $cpa_ff;
        }

        if ($request->hasfile('cpd_record')) {
            $cpd_file = $request->file('cpd_record');
            $cpd_name  = uniqid().'.'.$cpd_file->getClientOriginalExtension();
            $cpd_file->move(public_path().'/storage/student_papp/',$cpd_name);
            $cpd = '/storage/student_papp/'.$cpd_name;

            $papp->cpd_record                   =   $cpd;
        }

        if ($request->hasfile('mpa_mem_card_front')) {
            $mpa_mem_card_front_file = $request->file('mpa_mem_card_front');
            $mpa_mem_card_front_name  = uniqid().'.'.$mpa_mem_card_front_file->getClientOriginalExtension();
            $mpa_mem_card_front_file->move(public_path().'/storage/student_papp/',$mpa_mem_card_front_name);
            $mpa_mem_card_front = '/storage/student_papp/'.$mpa_mem_card_front_name;

            $papp->mpa_mem_card_front           =   $mpa_mem_card_front;
        }

        if ($request->hasfile('mpa_mem_card_back')) {
            $mpa_mem_card_back_file = $request->file('mpa_mem_card_back');
            $mpa_mem_card_back_name  = uniqid().'.'.$mpa_mem_card_back_file->getClientOriginalExtension();
            $mpa_mem_card_back_file->move(public_path().'/storage/student_papp/',$mpa_mem_card_back_name);
            $mpa_mem_card_back = '/storage/student_papp/'.$mpa_mem_card_back_name;

            $papp->mpa_mem_card_back            =   $mpa_mem_card_back;
        }

        if ($request->hasfile('tax_free_recommendation')) {
            $tax_free_file = $request->file('tax_free_recommendation');
            $tax_free_name  = uniqid().'.'.$tax_free_file->getClientOriginalExtension();
            $tax_free_file->move(public_path().'/storage/student_papp/',$tax_free_name);
            $tax_free = '/storage/student_papp/'.$tax_free_name;

            $papp->tax_free_recommendation      =   $tax_free;
        }

        $papp->papp_date                    =   $request->papp_date;
        $papp->cpaff_pass_date              =   $request->cpaff_pass_date;
        $papp->use_firm                     =   $request->use_firm;
        $papp->firm_name                    =   $request->firm_name;
        $papp->firm_type                    =   $request->firm_type;
        $papp->firm_step                    =   $request->firm_step;
        $papp->staff_firm_name              =   $request->staff_firm_name;      
        $papp->cpd_hours                    =   $request->cpd_hours;        
        $papp->tax_year                     =   $request->tax_year;        
        $papp->status                       =  0;
        //save to papp
        $papp->cpa_batch_no     =   $request->cpa_batch_no;
        $papp->address          =   $request->address;
        $papp->phone            =   $request->phone;
        $papp->contact_mail     =   $request->contact_mail;
        // $papp->letter           =   $letter;
        $papp->cpaff_reg_no           =   $request->cpaff_reg_no;
        $papp->type             =   $request->type;
        $papp->save();

        //invoice
        // $invNo = str_pad($papp->id, 20, "0", STR_PAD_LEFT);

        // $invoice = new Invoice();
        // $invoice->student_info_id = $request->student_id;
        // $invoice->invoiceNo       = $invNo;
        // $invoice->status          = 0;
        // $invoice->save();

        return response()->json([
            'message' => "You have successfully updated!"
        ],200);
    }

    public function updateRejectedRenewalData(Request $request){        
        $papp = Papp::find($request->papp_id);
        if ($request->hasfile('profile_photo')) {
            $file = $request->file('profile_photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $profile_photo = '/storage/student_info/'.$name;

            $papp->profile_photo                =   $profile_photo;
        }
        if ($request->hasfile('cpa_ff_recommendation')) {
            $cpa_ff_file = $request->file('cpa_ff_recommendation');
            $cpa_ff_name  = uniqid().'.'.$cpa_ff_file->getClientOriginalExtension();
            $cpa_ff_file->move(public_path().'/storage/student_papp/',$cpa_ff_name);
            $cpa_ff = '/storage/student_papp/'.$cpa_ff_name;

            $papp->cpa_ff_recommendation        =   $cpa_ff;
        }

        if ($request->hasfile('recommendation_183')) {
            $recomm_183_file = $request->file('recommendation_183');
            $recomm_183_name  = uniqid().'.'.$recomm_183_file->getClientOriginalExtension();
            $recomm_183_file->move(public_path().'/storage/student_papp/',$recomm_183_name);
            $recomm_183 = '/storage/student_papp/'.$recomm_183_name;

            $papp->recommendation_183           =   $recomm_183;
        }

        if ($request->hasfile('not_fulltime_recommendation')) {
            $not_fulltime_file = $request->file('not_fulltime_recommendation');
            $not_fulltime_name  = uniqid().'.'.$not_fulltime_file->getClientOriginalExtension();
            $not_fulltime_file->move(public_path().'/storage/student_papp/',$not_fulltime_name);
            $not_fulltime= '/storage/student_papp/'.$not_fulltime_name;

            $papp->not_fulltime_recommendation  =   $not_fulltime;
        }

        if ($request->hasfile('work_in_myanmar_confession')) {
            $work_in_mm_file = $request->file('work_in_myanmar_confession');
            $work_in_mm_name  = uniqid().'.'.$work_in_mm_file->getClientOriginalExtension();
            $work_in_mm_file->move(public_path().'/storage/student_papp/',$work_in_mm_name);
            $work_in_mm= '/storage/student_papp/'.$work_in_mm_name;
            
            $papp->work_in_myanmar_confession   =   $work_in_mm;
        }

        if ($request->hasfile('rule_confession')) {
            $rule_file = $request->file('rule_confession');
            $rule_name  = uniqid().'.'.$rule_file->getClientOriginalExtension();
            $rule_file->move(public_path().'/storage/student_papp/',$rule_name);
            $rule = '/storage/student_papp/'.$rule_name;

            $papp->rule_confession              =   $rule;
        }

        if ($request->hasfile('cpd_record')) {
            $cpd_file = $request->file('cpd_record');
            $cpd_name  = uniqid().'.'.$cpd_file->getClientOriginalExtension();
            $cpd_file->move(public_path().'/storage/student_papp/',$cpd_name);
            $cpd = '/storage/student_papp/'.$cpd_name;

            $papp->cpd_record                   =   $cpd;
        }

        if ($request->hasfile('mpa_mem_card_front')) {
            $mpa_mem_card_front_file = $request->file('mpa_mem_card_front');
            $mpa_mem_card_front_name  = uniqid().'.'.$mpa_mem_card_front_file->getClientOriginalExtension();
            $mpa_mem_card_front_file->move(public_path().'/storage/student_papp/',$mpa_mem_card_front_name);
            $mpa_mem_card_front = '/storage/student_papp/'.$mpa_mem_card_front_name;
            
            $papp->mpa_mem_card_front           =   $mpa_mem_card_front;
        }

        if ($request->hasfile('mpa_mem_card_back')) {
            $mpa_mem_card_back_file = $request->file('mpa_mem_card_back');
            $mpa_mem_card_back_name  = uniqid().'.'.$mpa_mem_card_back_file->getClientOriginalExtension();
            $mpa_mem_card_back_file->move(public_path().'/storage/student_papp/',$mpa_mem_card_back_name);
            $mpa_mem_card_back = '/storage/student_papp/'.$mpa_mem_card_back_name;

            $papp->mpa_mem_card_back            =   $mpa_mem_card_back;
        }

        if ($request->hasfile('tax_free_recommendation')) {
            $tax_free_file = $request->file('tax_free_recommendation');
            $tax_free_name  = uniqid().'.'.$tax_free_file->getClientOriginalExtension();
            $tax_free_file->move(public_path().'/storage/student_papp/',$tax_free_name);
            $tax_free = '/storage/student_papp/'.$tax_free_name;

            $papp->tax_free_recommendation      =   $tax_free;
        }

        // if ($request->hasfile('letter')) {
        //     $file = $request->file('letter');
        //     $name  = uniqid().'.'.$file->getClientOriginalExtension();
        //     $file->move(public_path().'/storage/student_papp/',$name);
        //     $letter = '/storage/student_papp/'.$name;

        //     $papp->letter           =   $letter;
        // }

        $papp->student_id                   = $request->student_id;
        $papp->papp_date                    =   $request->papp_date;
        $papp->use_firm                     =   $request->use_firm;
        $papp->firm_name                    =   $request->firm_name;
        $papp->firm_type                    =   $request->firm_type;
        $papp->firm_step                    =   $request->firm_step;
        $papp->staff_firm_name              =   $request->staff_firm_name;
        $papp->cpd_hours                    =   $request->cpd_hours;
        $papp->tax_year                     =   $request->tax_year;
        $papp->company               =   json_encode($request->company);
        $papp->period                  =   json_encode($request->period);
        $papp->manager             =   json_encode($request->manager);
        $papp->status                       =  0;
        //save to papp
        $papp->cpa_batch_no     =   $request->cpa_batch_no;
        $papp->papp_renew_date     =   $request->papp_renew_date;
        $papp->papp_reg_no      =   $request->papp_reg_no;
        $papp->audit_work       =   $request->audit_work;
        $papp->address          =   $request->address;
        $papp->phone            =   $request->phone;
        $papp->contact_mail     =   $request->contact_mail;
        $papp->cpaff_reg_no           =   $request->cpaff_reg_no;
        $papp->audit_year       =   $request->audit_year;
        $papp->type             =   $request->type;
        $papp->self_confession  =   $request->self_confession;
        $papp->save();

        return response()->json([
            'message' => "You have successfully updated!"
        ],200);
    }

    public function ReconnectPapp(Request $request){
        // $oldPapp = Papp::where('student_id', '=', $request->student_id)->latest()->first();
        if ($request->hasfile('profile_photo')) {
            $file = $request->file('profile_photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $profile_photo = '/storage/student_info/'.$name;
        }else{
            $profile_photo=null;
        }
        if ($request->hasfile('old_card_file')) {
            $file = $request->file('old_card_file');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $cpaff_old_card_file = '/storage/student_info/'.$name;
        }else{
            $cpaff_old_card_file=null;
        }
        $cpaff_data=CPAFF::where('student_info_id',$request->student_id)->first();
        if ($request->hasfile('cpa')) {
            $cpa_file = $request->file('cpa');
            $cpa_name  = uniqid().'.'.$cpa_file->getClientOriginalExtension();
            $cpa_file->move(public_path().'/storage/student_papp/',$cpa_name);
            $cpa = '/storage/student_papp/'.$cpa_name;
        }
        else{
            $cpa=null;
        }

        if ($request->hasfile('ra')) {
            $ra_file = $request->file('ra');
            $ra_name  = uniqid().'.'.$ra_file->getClientOriginalExtension();
            $ra_file->move(public_path().'/storage/student_papp/',$ra_name);
            $ra = '/storage/student_papp/'.$ra_name;
        }
        else{
            $ra=null;
        }

        if($request->hasfile('degree_file'))
        {
            foreach($request->file('degree_file') as $file)
            {
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/student_papp/',$name);
                $degree[] = '/storage/student_papp/'.$name;
            }

        }else{
            $degree = null;
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
        if ($request->hasfile('cpa_ff_recommendation')) {
            $cpa_ff_file = $request->file('cpa_ff_recommendation');
            $cpa_ff_name  = uniqid().'.'.$cpa_ff_file->getClientOriginalExtension();
            $cpa_ff_file->move(public_path().'/storage/student_papp/',$cpa_ff_name);
            $cpa_ff_path = '/storage/student_papp/'.$cpa_ff_name;
        }
        else{
            $cpa_ff_path="";
        }

        if ($request->hasfile('mpa_mem_card_front')) {
            $mpa_mem_card_front_file = $request->file('mpa_mem_card_front');
            $mpa_mem_card_front_name  = uniqid().'.'.$mpa_mem_card_front_file->getClientOriginalExtension();
            $mpa_mem_card_front_file->move(public_path().'/storage/student_papp/',$mpa_mem_card_front_name);
            $mpa_mem_card_front = '/storage/student_papp/'.$mpa_mem_card_front_name;
        }else{
            $mpa_mem_card_front="";
        }

        if ($request->hasfile('mpa_mem_card_back')) {
            $mpa_mem_card_back_file = $request->file('mpa_mem_card_back');
            $mpa_mem_card_back_name  = uniqid().'.'.$mpa_mem_card_back_file->getClientOriginalExtension();
            $mpa_mem_card_back_file->move(public_path().'/storage/student_papp/',$mpa_mem_card_back_name);
            $mpa_mem_card_back = '/storage/student_papp/'.$mpa_mem_card_back_name;
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
        $date_of_birth = $request->date_of_birth;
        $student_info = new StudentInfo();
        $student_info->name_mm          =   $request->name_mm;
        $student_info->name_eng         =   $request->name_eng;
        $student_info->nrc_state_region =   $request['nrc_state_region'];
        $student_info->nrc_township     =   $request['nrc_township'] ;
        $student_info->nrc_citizen      =   $request['nrc_citizen'] ;
        $student_info->nrc_number       =   $request['nrc_number'];
        $student_info->father_name_mm   =   $request->father_name_mm;
        $student_info->father_name_eng  =   $request->father_name_eng;
        $student_info->gender           =   $request->gender;
        $student_info->race             =   $request->race;
        $student_info->religion         =   $request->religion; 
        $student_info->date_of_birth    =   $date_of_birth;
        $student_info->address          =   $request->address;
        $student_info->phone            =   $request->phone;
        $student_info->image            =   $profile_photo;
        $student_info->nrc_front        =   $nrc_front;
        $student_info->nrc_back         =   $nrc_back;
        $student_info->email            =   strtolower($request->email);
        $student_info->password         =   Hash::make($request->password);
        $student_info->save();
        
        $cpa_ff  = new CPAFF();
        $cpa_ff->student_info_id    =   $student_info->id;
        $cpa_ff->profile_photo    =   $profile_photo;
        $cpa_ff->email             =   strtolower($request->email);
        $cpa_ff->name_mm           =   $request->name_mm;
        $cpa_ff->name_eng          =   $request->name_eng;
        $cpa_ff->nrc_state_region  =   $request->nrc_state_region;
        $cpa_ff->nrc_township      =   $request->nrc_township;
        $cpa_ff->nrc_citizen       =   $request->nrc_citizen;
        $cpa_ff->nrc_number        =   $request->nrc_number;
        $cpa_ff->father_name_mm    =   $request->father_name_mm;
        $cpa_ff->father_name_eng   =   $request->father_name_eng; 
        $cpa_ff->cpa              =   $cpa;
        $cpa_ff->ra               =   $ra;
        $cpa_ff->degree_name      =   json_encode($request->degree_name);
        $cpa_ff->degree_pass_year =   json_encode($request->degree_pass_year);
        $cpa_ff->foreign_degree   =   json_encode($degree);
        $cpa_ff->cpa_batch_no     =   $request->cpa_batch_no;
        $cpa_ff->address          =   $request->address;
        $cpa_ff->phone            =   $request->phone;
        $cpa_ff->contact_mail     =   $request->contact_mail;
        $cpa_ff->last_paid_year   =   $request->last_paid_year;
        $cpa_ff->old_card_no      =   $request->old_card_no;
        $cpa_ff->old_card_file    =   $cpaff_old_card_file;
        $cpa_ff->old_card_no_year =   $request->old_card_no_year;
        $cpa_ff->cpaff_reg_no           =   $request->cpaff_reg_no;
        $cpa_ff->cpaff_reg_year   =   $request->cpaff_reg_year;
        $cpa_ff->is_convicted     =   $request->is_convicted;
        $cpa_ff->cpa_certificate  =   $cpa_certificate;
        $cpa_ff->mpa_mem_card     =   $mpa_mem_card_front;
        $cpa_ff->mpa_mem_card_back=   $mpa_mem_card_back;
        $cpa_ff->nrc_front        =   $nrc_front;
        $cpa_ff->nrc_back         =   $nrc_back;
        $cpa_ff->status           =  0;
        $cpa_ff->is_renew         =   2;
        $cpa_ff->offline_user         =  1;
        $cpa_ff->type             =   2;
        $cpa_ff->resign   =   $request->resign;
        // $cpa_ff->start_date   =   $request->submitted_from_date;
        // $cpa_ff->end_date   =   $request->submitted_to_date;
        $cpa_ff->resign_date   =   $request->resign_date;
        $cpa_ff->save();

        $student_data = StudentInfo::find($student_info->id);
        $student_data->cpaff_id = $cpa_ff->id;
        $student_data->save();

        $papp  = new Papp();
        $papp->student_id                   =   $student_info->id;
        $papp->profile_photo                =   $profile_photo;
        $papp->cpa                          =   $cpa;
        $papp->ra                           =   $ra;
        $papp->degree_name                  =   json_encode($request->degree_name);
        $papp->degree_pass_year             =   json_encode($request->degree_pass_year);
        $papp->foreign_degree               =   json_encode($degree);
        $papp->papp_date                    =   $request->papp_date;
        $papp->use_firm                     =   $request->use_firm;
        $papp->firm_name                    =   $request->firm_name;
        $papp->firm_type                    =   $request->firm_type;
        $papp->firm_step                    =   $request->firm_step;
        $papp->staff_firm_name              =   $request->staff_firm_name;
        $papp->cpa_ff_recommendation        =   $cpa_ff_path;
        $papp->mpa_mem_card_front           =   $mpa_mem_card_front;
        $papp->mpa_mem_card_back            =   $mpa_mem_card_back;
        $papp->status                       =  0;
        //save to papp
        $papp->cpa_batch_no     =   $request->cpa_batch_no;
        $papp->address          =   $request->address;
        $papp->phone            =   $request->phone;
        $papp->contact_mail     =   $request->contact_mail;
        $papp->reg_no           =   $request->reg_no;
        $papp->papp_reg_no      =   $request->papp_reg_no;
        $papp->papp_date        =   $request->papp_date;
        $papp->papp_reg_date    =   $request->papp_reg_date;
        $papp->type             =   $request->type;
        $papp->papp_renew_date  =   $request->papp_renew_date;       
        $papp->latest_reg_year  =   $request->latest_reg_year;
        $papp->submitted_stop_form  =   $request->submitted_stop_form;       
        // $papp->submitted_from_date   =   $request->submitted_from_date;
        // $papp->submitted_to_date     =   $request->submitted_to_date;
        $papp->papp_resign_date     =   $request->papp_resign_date;
        $papp->self_confession  =   $request->self_confession;
        // $papp->submitted_to_date     =   $request->submitted_to_date;
        // $thisYear = date('Y');
        // $today = date('d-m-Y');
        // $papp->validate_from = $today;
        $papp->offline_user =1;
        $papp->save();

        //invoice
        // $fees = Membership::where('membership_name','=','PAPP')->first(['renew_fee','form_fee', 'late_fee']);
        // $stdInfo = StudentInfo::where('id', '=', $request->student_id)->first();
        // //$invNo = str_pad($papp->id, 20, "0", STR_PAD_LEFT);

        // $invoice = new Invoice();
        // $invoice->student_info_id = $request->student_id;
        // $invoice->invoiceNo       = '';
        // $invoice->name_eng        =  $stdInfo->name_eng;
        // $invoice->email           = $stdInfo->email;
        // $invoice->phone           = $stdInfo->phone;
        // $thisYear = date('Y');
        // $oldYear=date('Y',strtotime($oldPapp->validate_to));
        // if($thisYear == $oldYear){
        //     $invoice->productDesc     = 'Application Fee, Renewal Fee';
        //     $invoice->amount          = $fees->form_fee.",".$fees->renew_fee;
        // }else if($thisYear == $oldYear + 1 && date('M') === 'Jan'){
        //     $invoice->productDesc     = 'Application Fee, Renewal Fee, Delay Fee(within Jan)' ;
        //     $invoice->amount          = $fees->form_fee.",".$fees->renew_fee . ',' . $fees->late_fee ;
        // }
        // else if($thisYear == $oldYear + 1 && date('m')>1 && date('m')<=4){
        //     $invoice->productDesc     = 'Application Fee, Renewal Fee, Delay Fee(from Feb to Apr)' ;
        //     $invoice->amount          = $fees->form_fee.",".$fees->renew_fee . ', 10 x ' . $fees->late_fee ;
        // }

        // $invoice->status = 0;
        // $invoice->save();
        
        return response()->json([
            'message' => "You have successfully registerd!"
        ],200);
    }
    public function GetPappOfflineUser($status,$type){
        $papp = Papp::with('student_info','student_job', 'student_education_histroy')
                      ->where('status','=',$status)
                      ->where('type','=',$type)
                      ->get();

        return DataTables::of($papp)
          ->addColumn('action', function ($infos) {
              return "<div class='btn-group'>
                          <button type='button' class='btn btn-primary btn-xs' onclick='pappOfflineUser($infos->id)'>
                              <li class='fa fa-eye fa-sm'></li>
                          </button>
                      </div>";
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
          ->rawColumns(['action','status'])
          ->make(true);
    }
    public function reject_offline_papp(Request $request)
    {
        $reject = Papp::find($request->id);
        $reject->status = 2;
        $reject->renew_status=2;
        $reject->reject_description = $request->description;
        $reject->save();

        $cpa_ff = CPAFF::find($request->cpaff_id);
        $cpa_ff->status = 2;
        $cpa_ff->renew_status=2;
        $cpa_ff->reject_description = $request->description;
        $cpa_ff->save();
        return response()->json([
            'message' => "You have successfully rejected that user!"
        ],200);
    }

    public function approve_offline_papp($id,$cpaff_id)
    {
        $month_day=date('m-d');
        $year=date('Y')-1;
        $accepted_date = $year.'-'.$month_day;
        $approve = Papp::find($id);
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

        $approve_cpaff = CPAFF::find($cpaff_id);
        if($approve_cpaff->status==0)
        {
            $approve_cpaff->status = 1;
            $approve_cpaff->accepted_date=$accepted_date;
            $approve_cpaff->renew_accepted_date=$accepted_date;
            // Generate Reg No.
            // $approve_cpaff->reg_no = 'CPAFF_' . str_pad($cpaff_id, 5, "0", STR_PAD_LEFT);
            // $approve_cpaff->reg_date = date('Y-m-d');
        }
        else if($approve_cpaff->status==1){
            $approve_cpaff->status = 1;
            $approve_cpaff->renew_status=1;
            $approve_cpaff->renew_accepted_date=$accepted_date;
        }
        $approve_cpaff->save();

        return response()->json([
            'message' => "You have successfully approved that user!"
        ],200);
    }

    public function UpdateReconnectPapp(Request $request){
        $cpa_ff=CPAFF::find($request->cpaff_id);
        $papp = Papp::find($request->papp_id);
        $student_info = StudentInfo::find($request->student_id);
        if ($request->hasfile('profile_photo')) {
            $file = $request->file('profile_photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $profile_photo = '/storage/student_info/'.$name;

            $student_info->image            =   $profile_photo;
            $cpa_ff->profile_photo    =   $profile_photo;
            $papp->profile_photo                =   $profile_photo;
        }
        if ($request->hasfile('old_card_file')) {
            $file = $request->file('old_card_file');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $cpaff_old_card_file = '/storage/student_info/'.$name;

            $cpa_ff->old_card_file    =   $cpaff_old_card_file;
        }
        
        $cpaff_data=CPAFF::where('student_info_id',$request->student_id)->first();
        if ($request->hasfile('cpa')) {
            $cpa_file = $request->file('cpa');
            $cpa_name  = uniqid().'.'.$cpa_file->getClientOriginalExtension();
            $cpa_file->move(public_path().'/storage/student_papp/',$cpa_name);
            $cpa = '/storage/student_papp/'.$cpa_name;

            $cpa_ff->cpa              =   $cpa;
            
            $papp->cpa                          =   $cpa;
        }
        

        if ($request->hasfile('ra')) {
            $ra_file = $request->file('ra');
            $ra_name  = uniqid().'.'.$ra_file->getClientOriginalExtension();
            $ra_file->move(public_path().'/storage/student_papp/',$ra_name);
            $ra = '/storage/student_papp/'.$ra_name;

            $cpa_ff->ra               =   $ra;
            $papp->ra                           =   $ra;
        }

        if($request->hasfile('degree_file'))
        {
            foreach($request->file('degree_file') as $file)
            {
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/student_papp/',$name);
                $degree[] = '/storage/student_papp/'.$name;
            }
            $papp->foreign_degree     =   json_encode($degree);
            $cpa_ff->foreign_degree   =   json_encode($degree);
        }
        if ($request->hasfile('cpa_certificate')) {
            $file = $request->file('cpa_certificate');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $cpa_certificate = '/storage/cpa_ff_register/'.$name;
            
            $cpa_ff->cpa_certificate  =   $cpa_certificate;
        }
        
        if ($request->hasfile('cpa_ff_recommendation')) {
            $cpa_ff_file = $request->file('cpa_ff_recommendation');
            $cpa_ff_name  = uniqid().'.'.$cpa_ff_file->getClientOriginalExtension();
            $cpa_ff_file->move(public_path().'/storage/student_papp/',$cpa_ff_name);
            $cpa_ff_path = '/storage/student_papp/'.$cpa_ff_name;
            $papp->cpa_ff_recommendation        =   $cpa_ff_path;
        }
        

        if ($request->hasfile('mpa_mem_card_front')) {
            $mpa_mem_card_front_file = $request->file('mpa_mem_card_front');
            $mpa_mem_card_front_name  = uniqid().'.'.$mpa_mem_card_front_file->getClientOriginalExtension();
            $mpa_mem_card_front_file->move(public_path().'/storage/student_papp/',$mpa_mem_card_front_name);
            $mpa_mem_card_front = '/storage/student_papp/'.$mpa_mem_card_front_name;
            $cpa_ff->mpa_mem_card     =   $mpa_mem_card_front;
            $papp->mpa_mem_card_front           =   $mpa_mem_card_front;
        }

        if ($request->hasfile('mpa_mem_card_back')) {
            $mpa_mem_card_back_file = $request->file('mpa_mem_card_back');
            $mpa_mem_card_back_name  = uniqid().'.'.$mpa_mem_card_back_file->getClientOriginalExtension();
            $mpa_mem_card_back_file->move(public_path().'/storage/student_papp/',$mpa_mem_card_back_name);
            $mpa_mem_card_back = '/storage/student_papp/'.$mpa_mem_card_back_name;
            $papp->mpa_mem_card_back            =   $mpa_mem_card_back;
            $cpa_ff->mpa_mem_card_back=   $mpa_mem_card_back;
        }
        if ($request->hasfile('nrc_front')) {
            $file = $request->file('nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_front= '/storage/student_info/'.$name;

            $student_info->nrc_front        =   $nrc_front;
            $cpa_ff->nrc_front        =   $nrc_front;
        }

        if ($request->hasfile('nrc_back')) {
            $file = $request->file('nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_back= '/storage/student_info/'.$name;
            $cpa_ff->nrc_back         =   $nrc_back;
            $student_info->nrc_back         =   $nrc_back;
        }

        $date_of_birth = $request->date_of_birth;
        $student_info->name_mm          =   $request->name_mm;
        $student_info->name_eng         =   $request->name_eng;
        $student_info->nrc_state_region =   $request['nrc_state_region'];
        $student_info->nrc_township     =   $request['nrc_township'] ;
        $student_info->nrc_citizen      =   $request['nrc_citizen'] ;
        $student_info->nrc_number       =   $request['nrc_number'];
        $student_info->father_name_mm   =   $request->father_name_mm;
        $student_info->father_name_eng  =   $request->father_name_eng;
        $student_info->gender           =   $request->gender;
        $student_info->race             =   $request->race;
        $student_info->religion         =   $request->religion; 
        $student_info->date_of_birth    =   $date_of_birth;
        $student_info->address          =   $request->address;
        $student_info->phone            =   $request->phone;    
        $student_info->email            =   strtolower($request->email);
        // $student_info->password         =   Hash::make($request->password);
        $student_info->save();
        
        $cpa_ff->student_info_id    =   $student_info->id;
        $cpa_ff->email             =   strtolower($request->email);
        $cpa_ff->name_mm           =   $request->name_mm;
        $cpa_ff->name_eng          =   $request->name_eng;
        $cpa_ff->nrc_state_region  =   $request->nrc_state_region;
        $cpa_ff->nrc_township      =   $request->nrc_township;
        $cpa_ff->nrc_citizen       =   $request->nrc_citizen;
        $cpa_ff->nrc_number        =   $request->nrc_number;
        $cpa_ff->father_name_mm    =   $request->father_name_mm;
        $cpa_ff->father_name_eng   =   $request->father_name_eng; 
        
        
        $cpa_ff->degree_name      =   json_encode($request->degree_name);
        $cpa_ff->degree_pass_year =   json_encode($request->degree_pass_year);
        
        $cpa_ff->cpa_batch_no     =   $request->cpa_batch_no;
        $cpa_ff->address          =   $request->address;
        $cpa_ff->phone            =   $request->phone;
        $cpa_ff->contact_mail     =   $request->contact_mail;
        $cpa_ff->last_paid_year   =   $request->last_paid_year;
        $cpa_ff->old_card_no      =   $request->old_card_no;
        
        $cpa_ff->old_card_no_year =   $request->old_card_no_year;
        $cpa_ff->cpaff_reg_no           =   $request->cpaff_reg_no;
        $cpa_ff->cpaff_reg_year   =   $request->cpaff_reg_year;
        $cpa_ff->is_convicted     =   $request->is_convicted;
       
       
        
       
        
        $cpa_ff->status           =  0;
        $cpa_ff->is_renew         =   2;
        $cpa_ff->offline_user         =  1;
        $cpa_ff->type             =   2;
        $cpa_ff->resign   =   $request->resign;
        // $cpa_ff->start_date   =   $request->submitted_from_date;
        // $cpa_ff->end_date   =   $request->submitted_to_date;
        $cpa_ff->resign_date   =   $request->resign_date;
        $cpa_ff->save();

        // $student_data = StudentInfo::find($student_info->id);
        // $student_data->cpaff_id = $cpa_ff->id;
        // $student_data->save();

        $papp->student_id                   =   $student_info->id;      
        $papp->degree_name                  =   json_encode($request->degree_name);
        $papp->degree_pass_year             =   json_encode($request->degree_pass_year);
        $papp->papp_date                    =   $request->papp_date;
        $papp->use_firm                     =   $request->use_firm;
        $papp->firm_name                    =   $request->firm_name;
        $papp->firm_type                    =   $request->firm_type;
        $papp->firm_step                    =   $request->firm_step;
        $papp->staff_firm_name              =   $request->staff_firm_name;
        $papp->status                       =  0;
        //save to papp
        $papp->cpa_batch_no     =   $request->cpa_batch_no;
        $papp->address          =   $request->address;
        $papp->phone            =   $request->phone;
        $papp->contact_mail     =   $request->contact_mail;
        $papp->reg_no           =   $request->reg_no;
        $papp->papp_reg_no      =   $request->papp_reg_no;
        $papp->papp_date        =   $request->papp_date;
        $papp->papp_reg_date    =   $request->papp_reg_date;
        $papp->type             =   $request->type;
        $papp->papp_renew_date  =   $request->papp_renew_date;       
        $papp->latest_reg_year  =   $request->latest_reg_year;
        $papp->submitted_stop_form  =   $request->submitted_stop_form;     
        $papp->papp_resign_date     =   $request->papp_resign_date;
        $papp->offline_user =1;
        $papp->save();
        return response()->json([
            'message' => "You have successfully registerd!"
        ],200);
    }
}
