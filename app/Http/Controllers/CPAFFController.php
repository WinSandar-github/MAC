<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CPAFF;
use App\StudentJobHistroy;
use App\EducationHistroy;

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

        if ($request->hasfile('mpa_mem_card')) {
            $file = $request->file('mpa_mem_card');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $mpa_mem_card = '/storage/cpa_ff_register/'.$name;
        }else{
            $mpa_mem_card="";
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

        if ($request->hasfile('passport_image')) {
            $file = $request->file('passport_image');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/cpa_ff_register/',$name);
            $passport_image = '/storage/cpa_ff_register/'.$name;
        }else{
            $passport_image="";
        }

        $cpa_ff  = new CPAFF();
        $cpa_ff->student_info_id  =   $request->student_info_id;
        $cpa_ff->profile_photo    =   $profile_photo;
        $cpa_ff->cpa              =   $cpa;
        $cpa_ff->ra               =   $ra;
        $cpa_ff->foreign_degree   =   json_encode($foreign_degree);
        // $cpa_ff->foreign_degree   =   $foreign_degree;
        $cpa_ff->cpa_part_2       =   $request->cpa_part_2;
        $cpa_ff->qt_pass          =   $request->qt_pass;
        $cpa_ff->cpa_certificate  =   $cpa_certificate;
        $cpa_ff->mpa_mem_card     =   $mpa_mem_card;
        $cpa_ff->nrc_front        =   $nrc_front;
        $cpa_ff->nrc_back         =   $nrc_back;
        $cpa_ff->cpd_record       =   $cpd_record;
        $cpa_ff->passport_image   =   $passport_image;
        $cpa_ff->status           =  0;
        $cpa_ff->save();

        return response()->json([
            'message' => "You have successfully registerd!"
        ],200);
    }

    public function show($id)
    {
        $cpaff = CPAFF::where('id',$id)->with('student_info','student_job', 'student_education_histroy')->get();
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

    public function reject($id)
    {
        $cpa_ff = CPAFF::find($id);
        $cpa_ff->status = 2;
        $approve->renew_status=2;
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

        $cpa_ff = CPAFF::find($id);
        // if ($request->hasfile('renew_file')) {
        //     $file = $request->file('renew_file');
        //     $name  = uniqid().'.'.$file->getClientOriginalExtension();
        //     $file->move(public_path().'/storage/cpa_ff_register/',$name);
        //     $renew_file = '/storage/cpa_ff_register/'.$name;
        // }else{
        //     $renew_file="";
        // }

        // if ($request->hasfile('renew_micpa')) {
        //     $file = $request->file('renew_micpa');
        //     $name  = uniqid().'.'.$file->getClientOriginalExtension();
        //     $file->move(public_path().'/storage/cpa_ff_register/',$name);
        //     $renew_micpa = '/storage/cpa_ff_register/'.$name;
        // }else{
        //     $renew_micpa="";
        // }

        // if ($request->hasfile('renew_cpd')) {
        //     $file = $request->file('renew_cpd');
        //     $name  = uniqid().'.'.$file->getClientOriginalExtension();
        //     $file->move(public_path().'/storage/cpa_ff_register/',$name);
        //     $renew_cpd = '/storage/cpa_ff_register/'.$name;
        // }else{
        //     $renew_cpd="";
        // }

        // if ($request->hasfile('renew_cpaff_reg')) {
        //     $file = $request->file('renew_cpaff_reg');
        //     $name  = uniqid().'.'.$file->getClientOriginalExtension();
        //     $file->move(public_path().'/storage/cpa_ff_register/',$name);
        //     $renew_cpaff_reg = '/storage/cpa_ff_register/'.$name;
        // }else{
        //     $renew_cpaff_reg="";
        // }

        // $cpa_ff->renew_file=$renew_file;
        // $cpa_ff->renew_micpa=$renew_micpa;
        // $cpa_ff->renew_cpd=$renew_cpd;
        // $cpa_ff->renew_cpaff_reg=$renew_cpaff_reg;
        $cpa_ff->renew_accepted_date=date('Y-m-d');
        $cpa_ff->profile_photo=$profile_photo;
        $cpa_ff->renew_status=1;
        $cpa_ff->save();
        return response()->json([
            'message' => "You have renewed successfully"
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
}
