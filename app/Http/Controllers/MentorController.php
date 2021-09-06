<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mentor;
use App\StudentInfo;
use Hash;
use Illuminate\Support\Facades\DB;

class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mentor = Mentor::orderBy('created_at','desc')->get();
        return  response()->json([
            'data' => $mentor
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //   $current_check_service = [];
        // foreach($request->current_check_services as $service){
        //     array_push($current_check_service,$service);
        // }
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
        // $request->validate([
        //     'name_eng' => 'required',
        //     'email'    => 'required',
        //     'password'  => 'required',

        // ]);

        // $current_check_service = [];
        // foreach($request->current_check_services as $service){
        //     array_push($current_check_service,$service);
        // }

        // profile photo
        if ($request->hasfile('profile_photo')) {
            $file = $request->file('profile_photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $image = '/storage/student_info/'.$name;
        }
        // nrc front image
        if ($request->hasfile('nrc_front')) {
            $file = $request->file('nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_front = '/storage/student_info/'.$name;
        }
        // nrc back image
        if ($request->hasfile('nrc_back')) {
            $file = $request->file('nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_back = '/storage/student_info/'.$name;
        }

        $mentor = new Mentor();
        $mentor->current_check_service_id = $request->current_check_service_id;
        $mentor->name_mm = $request->name_mm;
        $mentor->name_eng = $request->name_eng;
        $mentor->father_name_mm     = $request->father_name_mm;
        $mentor->father_name_eng    = $request->father_name_eng;
        $mentor->nrc_state_region   = $request['nrc_state_region'];
        $mentor->nrc_township       = $request['nrc_township'];
        $mentor->nrc_citizen        = $request['nrc_citizen'];
        $mentor->nrc_number         = $request['nrc_number'];
        $mentor->race               = $request->race;
        $mentor->religion           = $request->religion;
        $mentor->date_of_birth      = date('Y-m-d',strtotime($request->date_of_birth));
        $mentor->education          = $request->education;
        $mentor->ra_cpa_success_year= $request->ra_cpa_success_year;
        $mentor->ra_cpa_personal_no = $request->ra_cpa_personal_no;
        $mentor->cpa_reg_no         = $request->cpa_reg_no;
        $mentor->cpa_reg_date       = date('Y-m-d',strtotime($request->cpa_reg_date));
        $mentor->ppa_reg_no         = $request->ppa_reg_no;
        $mentor->ppa_reg_date       = date('Y-m-d',strtotime($request->ppa_reg_date));
        $mentor->address            = $request->address;
        $mentor->phone_no           = $request->phone_no;
        $mentor->fax_no             = $request->fax_no;
        $mentor->m_email            = $request->m_email;
        $mentor->audit_firm_name    = $request->audit_firm_name;
        $mentor->audit_started_date = date('Y-m-d',strtotime($request->audit_started_date));
        $mentor->audit_structure    = $request->audit_structure;
        $mentor->audit_staff_no     = $request->audit_staff_no;
        // $mentor->current_check_services      = json_encode($current_check_service);
        $mentor->current_check_services_other= $request->current_check_services_other;
        $mentor->experience                  = $request->experience;
        $mentor->started_teaching_year       = date('Y-m-d',strtotime($request->started_teaching_year));
        $mentor->internship_accept_no        = $request->internship_accept_no;
        $mentor->current_accept_no           = $request->current_accept_no;
        $mentor->trained_trainees_no         = $request->trained_trainees_no;
        if($request->repeat_yearly != 'undefined'){
          $mentor->repeat_yearly               = $request->repeat_yearly;
        }
        if($request->training_absent != 'undefined'){
          $mentor->training_absent             = $request->training_absent;
        }
        $mentor->training_absent_reason      = $request->training_absent_reason;
        $mentor->type      = $request->type;
        $mentor->image      = $image;
        $mentor->nrc_front      = $nrc_front;
        $mentor->nrc_back      = $nrc_back;
        $mentor->status      = $request->status;
        $mentor->reg_date = date('Y-m-d');
        $mentor->save();

        $std_info = new StudentInfo();
        $std_info->mentor_id = $mentor->id;
        // $std_info->email = $request->email;
        // $std_info->password = Hash::make($request->password);
        $std_info->save();
        return response()->json([
            'message' => "Successfully Added"
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mentor = Mentor::find($id);
        return  response()->json([
            'data' => $mentor
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $current_check_service = [];

        // foreach($request->current_check_services as $service){
        //     array_push($current_check_service,$service);
        // }
        // return $id;

        $mentor = Mentor::find($id);
        $mentor->current_check_service_id = $request->current_check_service_id;
        $mentor->name_mm = $request->name_mm;
        $mentor->name_eng = $request->name_eng;
        $mentor->father_name_mm     = $request->father_name_mm;
        $mentor->father_name_eng    = $request->father_name_eng;
        $mentor->nrc_state_region   = $request['nrc_state_region'];
        $mentor->nrc_township       = $request['nrc_township'];
        $mentor->nrc_citizen        = $request['nrc_citizen'];
        $mentor->nrc_number         = $request['nrc_number'];
        $mentor->race               = $request->race;
        $mentor->religion           = $request->religion;
        $mentor->date_of_birth      = date('Y-m-d',strtotime($request->date_of_birth));
        $mentor->education          = $request->education;
        $mentor->ra_cpa_success_year= $request->ra_cpa_success_year;
        $mentor->ra_cpa_personal_no = $request->ra_cpa_personal_no;
        $mentor->cpa_reg_no         = $request->cpa_reg_no;
        $mentor->cpa_reg_date       = date('Y-m-d',strtotime($request->cpa_reg_date));
        $mentor->ppa_reg_no         = $request->ppa_reg_no;
        $mentor->ppa_reg_date       = date('Y-m-d',strtotime($request->ppa_reg_date));
        $mentor->address            = $request->address;
        $mentor->phone_no           = $request->phone_no;
        $mentor->fax_no             = $request->fax_no;
        $mentor->m_email            = $request->m_email;
        $mentor->audit_firm_name    = $request->audit_firm_name;
        $mentor->audit_started_date = date('Y-m-d',strtotime($request->audit_started_date));
        $mentor->audit_structure    = $request->audit_structure;
        $mentor->audit_staff_no     = $request->audit_staff_no;
        // $mentor->current_check_services      = json_encode($current_check_service);
        $mentor->current_check_services_other= $request->current_check_services_other;
        $mentor->experience                  = $request->experience;
        $mentor->started_teaching_year       = date('Y-m-d',strtotime($request->started_teaching_year));
        $mentor->internship_accept_no        = $request->internship_accept_no;
        $mentor->current_accept_no           = $request->current_accept_no;
        $mentor->trained_trainees_no         = $request->trained_trainees_no;
        $mentor->repeat_yearly               = $request->repeat_yearly;
        $mentor->training_absent             = $request->training_absent;
        $mentor->training_absent_reason      = $request->training_absent_reason;
        $mentor->save();

        return response()->json([
            'message' => "Successfully Updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mentor = Mentor::find($id);
        $mentor->delete();

        return response()->json([
            'message' => "Successfully Delete"
        ]);
    }

    public function getMentorMAC()
    {
        $mentor = Mentor::where('status', 1)->get();
        return response()->json([
            'data' => $mentor
        ],200);
    }

    public function getMentorSelfandPrivate()
    {
        $mentor = Mentor::where('current_check_service_id', '<', 10)->where('status', 1)->get();
        return response()->json([
            'data' => $mentor
        ],200);
    }

    public function FilterMentor(Request $request)
    {
        $mentor = Mentor::orderBy('created_at','desc');
        if($request->name!=""){
            $mentor=$mentor->where('name_mm', 'like', '%' . $request->name. '%')
                        ->orWhere('name_eng', 'like', '%' . $request->name. '%');
        }
        if($request->nrc!=""){
            $mentor=$mentor->where(DB::raw('CONCAT(nrc_state_region, "/", nrc_township,"(",nrc_citizen,")",nrc_number)'),$request->nrc);
        }
        $mentor=$mentor->get();
        return  response()->json([
            'data' => $mentor
        ],200);
    }

    // public function FilterMentor(Request $request)
    // {
    //     $mentor = Mentor::orderBy('created_at','desc');
    //     if($request->name!=""){
    //         $mentor=$mentor->where('name_mm', 'like', '%' . $request->name. '%')
    //                     ->orWhere('name_eng', 'like', '%' . $request->name. '%');
    //     }
    //     if($request->nrc!=""){
    //         $mentor=$mentor->where(DB::raw('CONCAT(nrc_state_region, "/", nrc_township,"(",nrc_citizen,")",nrc_number)'),$request->nrc);
    //     }
    //     $mentor = $mentor->paginate(5);
    //     return view('pages.mentor.mentor_paginate', compact('mentor'));
    // }

    public function approve($id)
    { 
        $std_info = StudentInfo::where('mentor_id', $id)->first();
        
        $std_info->approve_reject_status = 1;
        $std_info->save();
        $approve = Mentor::find($id);
        $approve->status = 1;
        $approve->renew_date = date('Y-m-d');
        $approve->save();
        return response()->json([
            'message' => "You have successfully approved that user!"
        ],200);
    }

    public function reject($id)
    {
        $reject = Mentor::find($id);
        $reject->status = 2;
        $reject->save();
        return response()->json([
            'message' => "You have successfully rejected that user!"
        ],200);
    }

    public function mentorStatus($id)
    {
        $data = StudentInfo::where('id',$id)->get('approve_reject_status');
        return response()->json($data,200);
    }
    public function renewMentor($id)
    {
        $approve = Mentor::find($id);
        $approve->renew_date = date('Y-m-d');
        $approve->save();
        return response()->json([
            'message' => 'You have renewed successfully.'
        ],200);
    }
}
