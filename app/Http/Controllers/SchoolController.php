<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SchoolRegister;
use App\StudentInfo;
use App\SchoolEstablisher;
use App\SchoolGovern;
use App\SchoolMember;
use App\SchoolTeacher;
use Hash;
use Illuminate\Support\Facades\DB;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $school = SchoolRegister::orderBy('created_at','desc')->get();
        return  response()->json([
            'data' => $school
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        if ($request->hasfile('business_license')) {
            $file = $request->file('business_license');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $business_license = '/storage/student_info/'.$name;
        } 

        if ($request->hasfile('company_reg')) {
            $file = $request->file('company_reg');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $company_reg = '/storage/student_info/'.$name;
        } 

        if ($request->hasfile('org_reg_origin_and_copy')) {
            $file = $request->file('org_reg_origin_and_copy');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $org_reg_origin_and_copy = '/storage/student_info/'.$name;
        } 

        if ($request->hasfile('estiblisher_list_and_bio')) {
            $file = $request->file('estiblisher_list_and_bio');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $estiblisher_list_and_bio = '/storage/student_info/'.$name;
        } 

        if ($request->hasfile('governer_list_and_bio')) {
            $file = $request->file('governer_list_and_bio');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $governer_list_and_bio = '/storage/student_info/'.$name;
        } 

        if ($request->hasfile('org_member_list_and_bio')) {
            $file = $request->file('org_member_list_and_bio');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $org_member_list_and_bio = '/storage/student_info/'.$name;
        } 

        if ($request->hasfile('teacher_list_and_bio')) {
            $file = $request->file('teacher_list_and_bio');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $teacher_list_and_bio = '/storage/student_info/'.$name;
        } 

        if ($request->hasfile('teacher_reg_copy')) {
            $file = $request->file('teacher_reg_copy');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $teacher_reg_copy = '/storage/student_info/'.$name;
        } 

        if ($request->hasfile('school_location_attach')) {
            $file = $request->file('school_location_attach');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $school_location_attach = '/storage/student_info/'.$name;
        } 

        if ($request->hasfile('school_building_attach')) {
            $file = $request->file('school_building_attach');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $school_building_attach = '/storage/student_info/'.$name;
        } 

        if ($request->hasfile('classroom_attach')) {
            $file = $request->file('classroom_attach');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $classroom_attach = '/storage/student_info/'.$name;
        } 

        if ($request->hasfile('toilet_attach')) {
            $file = $request->file('toilet_attach');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $toilet_attach = '/storage/student_info/'.$name;
        } 
        
        if ($request->hasfile('manage_room_attach')) {
            $file = $request->file('manage_room_attach');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $manage_room_attach = '/storage/student_info/'.$name;
        } 

        if ($request->hasfile('supporting_structure_photo')) {
            $file = $request->file('supporting_structure_photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $supporting_structure_photo = '/storage/student_info/'.$name;
        } 

        if ($request->hasfile('relevant_evidence_contracts')) {
            $file = $request->file('relevant_evidence_contracts');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $relevant_evidence_contracts = '/storage/student_info/'.$name;
        } 

        if ($request->hasfile('sch_establish_notes_attach')) {
            $file = $request->file('sch_establish_notes_attach');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $sch_establish_notes_attach = '/storage/student_info/'.$name;
        } 

        if ($request->hasfile('profile_photo')) {
            $file = $request->file('profile_photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $profile_photo = '/storage/student_info/'.$name;
        }

        // if($request->hasFile('attachment')){
        //     $fileName = $school->id.'.'.$request->file('attachment')->getClientOriginalExtension();
        //     //$request->file('attachment')->storeAs('attachment/school/', $fileName);
        //     $request->file('attachment')->move(public_path().'/storage/attachment/',$fileName);
        //     $school->attachment=$fileName;
        //     $school->save();
        // }

        if ($request->hasfile('attachment')) {
            $file = $request->file('attachment');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $attachment = '/storage/student_info/'.$name;
        }

        $school = new SchoolRegister();
        $school->name_mm         = $request->name_mm;
        $school->name_eng        = $request->name_eng;
        $school->nrc_front       = $request->nrc_front;
        $school->nrc_back        = $request->nrc_back;
        $school->father_name_mm  = $request->father_name_mm;
        $school->father_name_eng = $request->father_name_eng;
        // $school->date_of_birth = date('y-m-d', strtotime($request->dob));
        $school->date_of_birth   = $request->dob;
        $school->degree          = $request->degree;
        $school->address         = $request->address;
        $school->phone           = $request->phone;
        $school->attachment      = $attachment;
        
        $school->profile_photo               = $profile_photo;
        $school->school_name                 = $request->school_name;
        $school->attend_course               = json_encode($request->attend_course);
        $school->school_address              = $request->school_address;
        $school->own_type                    = $request->own_type;
        $school->branch_school_address       = $request->branch_school_address;
        $school->branch_sch_own_type         = $request->branch_sch_own_type;
        $school->business_license            = $business_license;
        $school->company_reg                 = $company_reg;
        $school->org_reg_origin_and_copy     = $org_reg_origin_and_copy;
        $school->estiblisher_list_and_bio    = $estiblisher_list_and_bio;
        $school->governer_list_and_bio       = $governer_list_and_bio;
        $school->org_member_list_and_bio     = $org_member_list_and_bio;
        $school->teacher_list_and_bio        = $teacher_list_and_bio;
        $school->teacher_reg_copy            = $teacher_reg_copy;
        $school->school_location_attach      = $school_location_attach;
        $school->school_building_attach      = $school_building_attach;
        $school->classroom_attach            = $classroom_attach;
        $school->toilet_attach               = $toilet_attach;
        $school->manage_room_attach          = $manage_room_attach;
        $school->supporting_structure_photo  = $supporting_structure_photo;
        $school->using_type                  = $request->using_type;
        $school->relevant_evidence_contracts = $relevant_evidence_contracts;
        $school->sch_establish_notes_attach  = $sch_establish_notes_attach;
        
        $school->school_location         = $request->school_location;
        $school->branch_school_location  = $request->branch_school_location;
        $school->bulding_type            = $request->bulding_type;
        $school->building_measurement    = $request->building_measurement;
        $school->floor_numbers           = $request->floor_numbers;
        $school->classroom_number        = $request->classroom_number;
        $school->classroom_measurement   = $request->classroom_measurement;
        $school->student_num_limit       = $request->student_num_limit;
        $school->air_con                 = $request->air_con;
        $school->toilet_type             = $request->toilet_type;
        $school->toilet_number           = $request->toilet_number;
        $school->manage_room_numbers     = $request->manage_room_numbers;
        $school->manage_room_measurement = $request->manage_room_measurement;
        
        $school->email            = $request->email;
        $school->password         = $request->password;
        $school->nrc_state_region = $request->nrc_state_region;
        $school->nrc_township     = $request->nrc_township;
        $school->nrc_citizen      = $request->nrc_citizen;
        $school->nrc_number       = $request->nrc_number;
        $school->reg_date = date('Y-m-d');
        $school_type = "";
        foreach($request->school_type as $type){
            $school_type = $school_type.$type.',';
           
        }
        $school->type = rtrim($school_type, ',');
        $school->save();

        //Student Info
        $std_info = new StudentInfo();
        $std_info->school_id = $school->id;
        $std_info->email = $request->email;
        $std_info->password = Hash::make($request->password);
        $std_info->save();

        //establisher list
        for($i=0;$i<sizeof($request->establisher_name);$i++){
            $establisher = new SchoolEstablisher();
            $establisher->name         = $request->establisher_name[$i];
            $establisher->nrc          = $request->establisher_nrc[$i];
            $establisher->cpa_papp_no  = $request->establisher_cpa_papp_no[$i];
            $establisher->education    = $request->establisher_education[$i];
            $establisher->address      = $request->establisher_address[$i];
            $establisher->ph_number    = $request->establisher_ph_number[$i];
            $establisher->email        = $request->establisher_email[$i];
            $establisher->school_id    = $school->id;
            $establisher->save();
        }

        //govern list
        for($i=0;$i<sizeof($request->govern_name);$i++){
            $govern = new SchoolGovern();
            $govern->name            = $request->govern_name[$i];
            $govern->nrc             = $request->govern_nrc[$i];
            $govern->cpa_papp_no     = $request->govern_cpa_papp_no[$i];
            $govern->education       = $request->govern_education[$i];
            $govern->responsibility  = $request->govern_responsibility[$i];
            $govern->ph_number       = $request->govern_ph_number[$i];
            $govern->email           = $request->govern_email[$i];
            $govern->school_id       = $school->id;
            $govern->save();
        }

        //member list
        for($i=0;$i<sizeof($request->member_name);$i++){
            $member = new SchoolMember();
            $member->name            = $request->member_name[$i];
            $member->nrc             = $request->member_nrc[$i];
            $member->cpa_papp_no     = $request->member_cpa_papp_no[$i];
            $member->education       = $request->member_education[$i];
            $member->responsibility  = $request->member_responsibility[$i];
            $member->ph_number       = $request->member_ph_number[$i];
            $member->email           = $request->member_email[$i];
            $member->school_id       = $school->id;
            $member->save();
        }

        //teacher list
        for($i=0;$i<sizeof($request->teacher_name);$i++){
            $teacher = new SchoolTeacher();
            $teacher->name             = $request->teacher_name[$i];
            $teacher->nrc              = $request->teacher_nrc[$i];
            $teacher->registration_no  = $request->teacher_registration_no[$i];
            $teacher->education        = $request->teacher_education[$i];
            $teacher->subject          = $request->teaching_subject[$i];
            $teacher->ph_number        = $request->teacher_ph_number[$i];
            $teacher->email            = $request->teacher_email[$i];
            $teacher->school_id        = $school->id;
            $teacher->save();
        }
 
        return response()->json([
            'message' => 'Success Registration.'
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $school = SchoolRegister::find($id);
        return  response()->json([
            'data' => $school
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $school = SchoolRegister::find($id);
        $school->renew_date = date('Y-m-d');
        $school->save();
        return response()->json([
            'message' => 'You have renewed successfully.'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function approve_school_register(Request $request, $id)
    {
        $std_info = StudentInfo::where('school_id', $id)->first();
        $std_info->approve_reject_status = 1;
        $std_info->save();
        $school = SchoolRegister::find($id);
        $school->approve_reject_status = 1;
        $school->renew_date = date('Y-m-d');
        $school->save();
        return response()->json([
            'message' => 'You have approved this user.'
        ],200);
    }

    public function reject_school_register(Request $request, $id)
    {
        $school = SchoolRegister::find($id);
        $school->approve_reject_status = 2;
        $school->save();
        return response()->json([
            'message' => 'You have rejected this user.'
        ],200);
    }

    public function FilterSchool(Request $request)
    {
        $school = SchoolRegister::orderBy('created_at','desc');
        if($request->name!=""){
            $school=$school->where('name_mm', 'like', '%' . $request->name. '%')
                        ->orWhere('name_eng', 'like', '%' . $request->name. '%');
        }
        if($request->nrc!=""){
            $school=$school->where(DB::raw('CONCAT(nrc_state_region, "/", nrc_township,"(",nrc_citizen,")",nrc_number)'),$request->nrc);
        }
        $school=$school->get();
        return  response()->json([
            'data' => $school
        ],200);
    }

    public function schoolStatus($id)
    {
        $data = StudentInfo::where('id',$id)->get('approve_reject_status');
        return response()->json($data,200);
    }
}
