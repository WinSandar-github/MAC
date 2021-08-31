<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Papp;
use App\StudentJobHistroy;
use App\EducationHistroy;

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

        // if ($request->hasfile('foreign_degree')) {
        //     $degree_file = $request->file('foreign_degree');
        //     $degree_name  = uniqid().'.'.$degree_file->getClientOriginalExtension();
        //     $degree_file->move(public_path().'/storage/student_papp/',$degree_name);
        //     $degree = '/storage/student_papp/'.$degree_name;
        // }
        // else{
        //     $degree="";
        // }
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

        if ($request->hasfile('tax_free_recommendation')) {
            $tax_free_file = $request->file('tax_free_recommendation');
            $tax_free_name  = uniqid().'.'.$tax_free_file->getClientOriginalExtension();
            $tax_free_file->move(public_path().'/storage/student_papp/',$tax_free_name);
            $tax_free = '/storage/student_papp/'.$tax_free_name;
        }else{
            $tax_free="";
        }

        $papp  = new Papp();
        $papp->student_id                   = $request->student_id;
        $papp->cpa                          =   $cpa;
        $papp->ra                           =   $ra;
        $papp->foreign_degree               =   json_encode($degree);
        $papp->papp_date                    =   $request->papp_date;
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
        $papp->tax_year                     =   $request->tax_year;
        $papp->tax_free_recommendation      =   $tax_free;
        $papp->status                       =  0;
            $papp->save();

        return response()->json([
            'message' => "You have successfully registerd!"
        ],200);
    }

    public function show($id)
    {
        $papp = Papp::where('id',$id)->with('student_info','student_job', 'student_education_histroy')->get();
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

    public function reject($id)
    {
        $reject = Papp::find($id);
        $reject->status = 2;
        $approve->renew_status=2;
        $reject->save();
        return response()->json([
            'message' => "You have successfully rejected that user!"
        ],200);
    }

    public function update(Request $request, $id)
    {
        $papp = Papp::find($id);
        if ($request->hasfile('renew_file')) {
            $file = $request->file('renew_file');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_papp/',$name);
            $renew_file = '/storage/student_papp/'.$name;
        }else{
            $renew_file="";
        }

        if ($request->hasfile('renew_papp_reg')) {
            $file = $request->file('renew_papp_reg');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_papp/',$name);
            $renew_papp_reg = '/storage/student_papp/'.$name;
        }else{
            $renew_papp_reg="";
        }

        if ($request->hasfile('renew_micpa')) {
            $file = $request->file('renew_micpa');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_papp/',$name);
            $renew_micpa = '/storage/student_papp/'.$name;
        }else{
            $renew_micpa="";
        }

        if ($request->hasfile('renew_cpd')) {
            $file = $request->file('renew_cpd');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_papp/',$name);
            $renew_cpd = '/storage/student_papp/'.$name;
        }else{
            $renew_cpd="";
        }

        if ($request->hasfile('renew_183_recomm')) {
            $file = $request->file('renew_183_recomm');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_papp/',$name);
            $renew_183_recomm = '/storage/student_papp/'.$name;
        }else{
            $renew_183_recomm="";
        }

        if ($request->hasfile('renew_not_fulltime_recomm')) {
            $file = $request->file('renew_not_fulltime_recomm');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_papp/',$name);
            $renew_not_fulltime_recomm = '/storage/student_papp/'.$name;
        }else{
            $renew_not_fulltime_recomm="";
        }

        if ($request->hasfile('renew_rule_confession')) {
            $file = $request->file('renew_rule_confession');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_papp/',$name);
            $renew_rule_confession = '/storage/student_papp/'.$name;
        }else{
            $renew_cpd="";
        }
        $papp->renew_file=$renew_file;
        $papp->renew_papp_reg=$renew_papp_reg;
        $papp->renew_micpa=$renew_micpa;
        $papp->renew_cpd=$renew_cpd;
        $papp->renew_183_recomm=$renew_183_recomm;
        $papp->renew_not_fulltime_recomm=$renew_not_fulltime_recomm;
        $papp->renew_rule_confession=$renew_rule_confession;
        $papp->renew_accepted_date=date('Y-m-d');
        $papp->renew_status=1;
        $papp->save();        
        return response()->json([
            'message' => "Insert Successfully"
        ],200);

     }
     public function getPappByStuId($stu_id){
        $papp = Papp::where('student_id',$stu_id)->first();
        return response()->json([
            'data'  => $papp
        ]);
    }
}