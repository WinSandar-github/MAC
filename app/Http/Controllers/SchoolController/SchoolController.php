<?php

namespace App\Http\Controllers\SchoolController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SchoolRegister;
use App\StudentInfo;
use App\SchoolEstablisher;
use App\SchoolGovern;
use App\SchoolMember;
use App\SchoolTeacher;
use App\tbl_branch_school;
use App\tbl_bulding_type;
use App\tbl_classroom;
use App\tbl_manage_room_numbers;
use App\tbl_toilet_type;
use App\EducationHistroy;

use Hash;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;    

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
        print_r($request->school_type);
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
            foreach($request->file('business_license') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/student_info/',$name);
                 $business_license[] = $name;
             }
            
        }else{
            $business_license=null;
        } 
        

        if ($request->hasfile('school_location_attach')) {
            $file = $request->file('school_location_attach');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $school_location_attach = '/storage/student_info/'.$name;
        }else{
            $school_location_attach=null;
        }  

        if ($request->hasfile('profile_photo')) {
            $file = $request->file('profile_photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $profile_photo = '/storage/student_info/'.$name;
        }

        if ($request->hasfile('own_type_letter')) {
            $file = $request->file('own_type_letter');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $own_type_letter = '/storage/student_info/'.$name;
        }
        if ($request->hasfile('degrees_certificates')) {
            foreach($request->file('degrees_certificates') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/student_info/',$name);
                 $degrees_certificates[] = $name;
             }
            
        }
        if ($request->hasfile('attachment')) {
            foreach($request->file('attachment') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/student_info/',$name);
                 $attachment[] = $name;
             }
            
        }
        if ($request->hasfile('sch_establish_notes_attach')) {
            foreach($request->file('sch_establish_notes_attach') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/student_info/',$name);
                 $sch_establish_notes_attach[] =$name;
             }
            
        }else{
            $sch_establish_notes_attach=null;
        }
        if ($request->hasfile('teacher_reg_copy')) {
            foreach($request->file('teacher_reg_copy') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/student_info/',$name);
                 $teacher_reg_copy[] = $name;
             }
            
        }else{
            $teacher_reg_copy=null;
        }
        if ($request->hasfile('branch_school_attach')) {
            foreach($request->file('branch_school_attach') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/student_info/',$name);
                 $branch_school_attach[] = $name;
             }
            
        }else{
            $branch_school_attach=null;
        } 
        if ($request->hasfile('branch_sch_letter')) {
            foreach($request->file('branch_sch_letter') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/student_info/',$name);
                 $branch_sch_letter[] = $name;
             }
            
        }else{
            $branch_sch_letter=null;
        } 
        if ($request->hasfile('school_building_attach')) {
            foreach($request->file('school_building_attach') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/student_info/',$name);
                 $school_building_attach[] = $name;
             }
            
        }else{
            $school_building_attach=null;
        } 
        if ($request->hasfile('classroom_attach')) {
            foreach($request->file('classroom_attach') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/student_info/',$name);
                 $classroom_attach[] = $name;
             }
            
        }else{
            $classroom_attach=null;
        } 
        if ($request->hasfile('toilet_attach')) {
            foreach($request->file('toilet_attach') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/student_info/',$name);
                 $toilet_attach[] = $name;
             }
            
        }else{
            $toilet_attach=null;
        } 
        if ($request->hasfile('manage_room_attach')) {
            foreach($request->file('manage_room_attach') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/student_info/',$name);
                 $manage_room_attach[] = $name;
             }
            
        }else{
            $manage_room_attach=null;
        } 
        
        $school = new SchoolRegister();
        $school->name_mm         = $request->name_mm;
        $school->name_eng        = $request->name_eng;
        $school->nrc_front       = $nrc_front;
        $school->nrc_back        = $nrc_back;
        $school->father_name_mm  = $request->father_name_mm;
        $school->father_name_eng = $request->father_name_eng;
        $school->date_of_birth   = $request->dob;
        $school->address         = $request->address;
        $school->phone           = $request->phone;
        $school->attachment      = json_encode($attachment);
        
        $school->profile_photo               = $profile_photo;
        $school->school_name                 = $request->school_name;
        $school->attend_course               = json_encode($request->attend_course);
        $school->school_address              = $request->school_address;
        $school->own_type                    = $request->own_type;
        $school->own_type_letter             = $own_type_letter;
        $school->business_license            = json_encode($business_license);
        $school->school_location_attach      = $school_location_attach;
        $school->sch_establish_notes_attach  = json_encode($sch_establish_notes_attach);
        
        $school->email            = strtolower($request->email);
        $school->password         = Hash::make($request->password);
        $school->nrc_state_region = $request->nrc_state_region;
        $school->nrc_township     = $request->nrc_township;
        $school->nrc_citizen      = $request->nrc_citizen;
        $school->nrc_number       = $request->nrc_number;
        $school->reg_date = date('Y-m-d');
        $school->renew_date = date('Y-m-d');
        $school_type = "";
        if($request->school_type!=""){
            foreach($request->school_type as $type){
                $school_type = $school_type.$type.',';
               
            }
            $school->type = rtrim($school_type, ',');
        }
        
        $school->save();
       
        //Student Info
        
        if($request->student_info_id!=0){
            $std_info =StudentInfo::find($request->student_info_id);
            $std_info->school_id = $school->id;
            $std_info->password = Hash::make($request->password);
            $std_info->save();
        }else{
            $std_info = new StudentInfo();
            $std_info->school_id = $school->id;
            $std_info->email = $request->email;
            $std_info->password = Hash::make($request->password);
            $std_info->save();
        }
    

        $degrees_certificates=implode(',', $degrees_certificates);
        $new_degrees_certificates= explode(',',$degrees_certificates);
        for($i=0;$i < sizeof($request->degrees);$i++){
       
            $education_histroy  =   new EducationHistroy();
            $education_histroy->student_info_id = $std_info->id;
            $education_histroy->university_name = $request->degrees[$i];
            $education_histroy->certificate        ='/storage/student_info/'.$new_degrees_certificates[$i];
            $education_histroy->save();
        }
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
        if($request->school_type!=""){
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
        }
        

        //teacher list
        $teacher_reg_copy=implode(',', $teacher_reg_copy);
        $new_teacher_reg_copy= explode(',',$teacher_reg_copy);
        
        for($i=0;$i<sizeof($request->teacher_registration_no);$i++){
            
            $teacher = new SchoolTeacher();
            $teacher->name             = $request->teacher_name[$i];
            $teacher->nrc              = $request->teacher_nrc[$i];
            $teacher->registration_no  = $request->teacher_registration_no[$i];
            $teacher->education        = $request->teacher_education[$i];
            $teacher->subject          = $request->teaching_subject[$i];
            $teacher->ph_number        = $request->teacher_ph_number[$i];
            $teacher->email            = $request->teacher_email[$i];
            $teacher->school_id        = $school->id;
            $teacher->teacher_reg_copy = '/storage/student_info/'.$new_teacher_reg_copy[$i];
            $teacher->save();
        }
        //branch_school
        $branch_school_attach=implode(',', $branch_school_attach);
        $new_branch_school_attach= explode(',',$branch_school_attach);
        $branch_sch_letter=implode(',', $branch_sch_letter);
        $new_branch_sch_letter= explode(',',$branch_sch_letter);
        for($i=0;$i<sizeof($request->branch_school_address);$i++){
            $branch_school = new tbl_branch_school();
            $branch_school->branch_school_address= $request->branch_school_address[$i];
            $branch_school->branch_school_attach = '/storage/student_info/'.$new_branch_school_attach[$i];
            $branch_school->branch_sch_own_type= $request->branch_sch_own_type[$i];
            $branch_school->branch_sch_letter= '/storage/student_info/'.$new_branch_sch_letter[$i];
            $branch_school->school_id       = $school->id;
            $branch_school->save();
        }
        //bulding_type
        $school_building_attach=implode(',', $school_building_attach);
        $new_school_building_attach= explode(',',$school_building_attach);
        for($i=0;$i<sizeof($request->bulding_type);$i++){
            $bulding_type = new tbl_bulding_type();
            $bulding_type->bulding_type= $request->bulding_type[$i];
            $bulding_type->building_measurement = $request->building_measurement[$i];
            $bulding_type->floor_numbers= $request->floor_numbers[$i];
            $bulding_type->school_building_attach= '/storage/student_info/'.$new_school_building_attach[$i];
            $bulding_type->school_id       = $school->id;
            $bulding_type->save();
        }
        //classroom_number
        $classroom_attach=implode(',', $classroom_attach);
        $new_classroom_attach= explode(',',$classroom_attach);
        for($i=0;$i<sizeof($request->classroom_number);$i++){
            $classroom_number = new tbl_classroom();
            $classroom_number->classroom_number= $request->classroom_number[$i];
            $classroom_number->classroom_measurement = $request->classroom_measurement[$i];
            $classroom_number->student_num_limit= $request->student_num_limit[$i];
            $classroom_number->air_con= $request->air_con[$i];
            $classroom_number->classroom_attach= '/storage/student_info/'.$new_classroom_attach[$i];
            $classroom_number->school_id       = $school->id;
            $classroom_number->save();
        }
        //toilet_type
        $toilet_attach=implode(',', $toilet_attach);
        $new_toilet_attach= explode(',',$toilet_attach);
        for($i=0;$i<sizeof($request->toilet_type);$i++){
            $toilet_type = new tbl_toilet_type();
            $toilet_type->toilet_type= $request->toilet_type[$i];
            $toilet_type->toilet_number = $request->toilet_number[$i];
            $toilet_type->toilet_attach= '/storage/student_info/'.$new_toilet_attach[$i];
            $toilet_type->school_id       = $school->id;
            $toilet_type->save();
        }
        //manage_room_numbers
        $manage_room_attach=implode(',', $manage_room_attach);
        $new_manage_room_attach= explode(',',$manage_room_attach);
        for($i=0;$i<sizeof($request->manage_room_numbers);$i++){
            $manage_room_numbers = new tbl_manage_room_numbers();
            $manage_room_numbers->manage_room_numbers= $request->manage_room_numbers[$i];
            $manage_room_numbers->manage_room_measurement = $request->manage_room_measurement[$i];
            $manage_room_numbers->manage_room_attach= '/storage/student_info/'.$new_manage_room_attach[$i];
            $manage_room_numbers->school_id       = $school->id;
            $manage_room_numbers->save();
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
        $school = SchoolRegister::where('id',$id)
        ->with('school_establishers','school_governs','school_members','school_teachers','student_info',
        'school_branch','bulding_type','classroom','toilet_type','manage_room_numbers')->first();
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
        if ($request->hasfile('nrc_front')) {
            $file = $request->file('nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_front = '/storage/student_info/'.$name;
        }else{
            $nrc_front =$request->nrc_front;
        } 

        if ($request->hasfile('nrc_back')) {
            $file = $request->file('nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_back = '/storage/student_info/'.$name;
        }else{
            $nrc_back =$request->nrc_back;
        }  

        if ($request->hasfile('business_license')) {
            $file = $request->file('business_license');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $business_license = '/storage/student_info/'.$name;
        }else{
            $business_license =$request->business_license;
        }  

        if ($request->hasfile('company_reg')) {
            $file = $request->file('company_reg');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $company_reg = '/storage/student_info/'.$name;
        }else{
            $company_reg =$request->company_reg;
        } 

        if ($request->hasfile('org_reg_origin_and_copy')) {
            $file = $request->file('org_reg_origin_and_copy');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $org_reg_origin_and_copy = '/storage/student_info/'.$name;
        }else{
            $org_reg_origin_and_copy =$request->org_reg_origin_and_copy;
        }  

        if ($request->hasfile('estiblisher_list_and_bio')) {
            $file = $request->file('estiblisher_list_and_bio');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $estiblisher_list_and_bio = '/storage/student_info/'.$name;
        }else{
            $estiblisher_list_and_bio =$request->estiblisher_list_and_bio;
        }  

        if ($request->hasfile('governer_list_and_bio')) {
            $file = $request->file('governer_list_and_bio');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $governer_list_and_bio = '/storage/student_info/'.$name;
        }else{
            $governer_list_and_bio =$request->governer_list_and_bio;
        }  

        if ($request->hasfile('org_member_list_and_bio')) {
            $file = $request->file('org_member_list_and_bio');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $org_member_list_and_bio = '/storage/student_info/'.$name;
        }else{
            $org_member_list_and_bio =$request->org_member_list_and_bio;
        }  

        if ($request->hasfile('teacher_list_and_bio')) {
            $file = $request->file('teacher_list_and_bio');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $teacher_list_and_bio = '/storage/student_info/'.$name;
        }else{
            $teacher_list_and_bio =$request->teacher_list_and_bio;
        }  

        if ($request->hasfile('teacher_reg_copy')) {
            $file = $request->file('teacher_reg_copy');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $teacher_reg_copy = '/storage/student_info/'.$name;
        }else{
            $teacher_reg_copy =$request->teacher_reg_copy;
        }  

        if ($request->hasfile('school_location_attach')) {
            $file = $request->file('school_location_attach');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $school_location_attach = '/storage/student_info/'.$name;
        }else{
            $school_location_attach =$request->school_location_attach;
        }  

        if ($request->hasfile('school_building_attach')) {
            $file = $request->file('school_building_attach');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $school_building_attach = '/storage/student_info/'.$name;
        }else{
            $school_building_attach =$request->school_building_attach;
        }  

        if ($request->hasfile('classroom_attach')) {
            $file = $request->file('classroom_attach');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $classroom_attach = '/storage/student_info/'.$name;
        }else{
            $classroom_attach =$request->classroom_attach;
        }  

        if ($request->hasfile('toilet_attach')) {
            $file = $request->file('toilet_attach');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $toilet_attach = '/storage/student_info/'.$name;
        }else{
            $toilet_attach =$request->toilet_attach;
        }  
        
        if ($request->hasfile('manage_room_attach')) {
            $file = $request->file('manage_room_attach');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $manage_room_attach = '/storage/student_info/'.$name;
        }else{
            $manage_room_attach =$request->manage_room_attach;
        }  

        if ($request->hasfile('supporting_structure_photo')) {
            $file = $request->file('supporting_structure_photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $supporting_structure_photo = '/storage/student_info/'.$name;
        }else{
            $supporting_structure_photo =$request->supporting_structure_photo;
        }  

        if ($request->hasfile('relevant_evidence_contracts')) {
            $file = $request->file('relevant_evidence_contracts');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $relevant_evidence_contracts = '/storage/student_info/'.$name;
        }else{
            $relevant_evidence_contracts =$request->relevant_evidence_contracts;
        }  

        if ($request->hasfile('sch_establish_notes_attach')) {
            $file = $request->file('sch_establish_notes_attach');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $sch_establish_notes_attach = '/storage/student_info/'.$name;
        }else{
            $sch_establish_notes_attach =$request->sch_establish_notes_attach;
        }  

        if ($request->hasfile('profile_photo')) {
            $file = $request->file('profile_photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $profile_photo = '/storage/student_info/'.$name;
        }else{
            $profile_photo =$request->profile_photo;
        } 

        if ($request->hasfile('attachment')) {
            $file = $request->file('attachment');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $attachment = '/storage/student_info/'.$name;
        }else{
            $attachment =$request->attachment;
        } 
        $school = SchoolRegister::find($id);
        $school->nrc_front       = $nrc_front;
        $school->nrc_back        = $nrc_back;
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
        
        $school_type = "";
        foreach($request->school_type as $type){
            $school_type = $school_type.$type.',';
           
        }
        $school->type = rtrim($school_type, ',');
        $school->renew_date = date('Y-m-d');
        $school->save();
        //establisher list
        SchoolEstablisher::where('school_id', $id)->delete();
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
        SchoolGovern::where('school_id', $id)->delete();
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
        SchoolMember::where('school_id', $id)->delete();
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
        SchoolTeacher::where('school_id', $id)->delete();
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

    public function approve_school_register(Request $request)
    {
        $std_info = StudentInfo::find($request->student_info_id);
        $std_info->approve_reject_status = 1;
        $std_info->save();
        $school = SchoolRegister::find($request->id);
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
        $school = SchoolRegister::where('approve_reject_status',$request->status)->orderBy('created_at','desc');
        if($request->name!=""){
            $school=$school->where('name_mm', 'like', '%' . $request->name. '%')
                        ->orWhere('name_eng', 'like', '%' . $request->name. '%');
        }
        if($request->nrc!=""){
            $school=$school->where(DB::raw('CONCAT(nrc_state_region, "/", nrc_township,"(",nrc_citizen,")",nrc_number)'),$request->nrc);
        }
        $schools=$school->get();
        return DataTables::of($schools)
        ->addColumn('action', function ($infos) {
            return "<div class='btn-group'>
                            <a href='school_edit?id=$infos->id' class='btn btn-primary btn-xs' onclick='showMentorStudent($infos->id)'>
                                <li class='fa fa-eye fa-sm'></li>
                            </a>
                        </div>";
        })
        ->addColumn('nrc', function ($infos){
            $nrc_result = $infos->nrc_state_region . "/" . $infos->nrc_township . "(" . $infos->nrc_citizen . ")" . $infos->nrc_number;
            return $nrc_result;
        })
        ->addColumn('status', function ($infos){
            if($infos->approve_reject_status	 == 0){
                return "PENDING";
            }else if($infos->approve_reject_status	 == 1){
                return "APPROVED";
            }else{
                return "REJECTED";
            }
        })
        ->addColumn('payment_method', function ($infos){
            if($infos->payment_method	 == ""){
                return "Payment Incomplete";
            }else{
                return "Payment Complete";
            }
        })
        ->make(true);
        // return  response()->json([
        //     'data' => $school
        // ],200);
    }

    public function schoolStatus($id)
    {
        $data = StudentInfo::where('id',$id)->get('approve_reject_status');
        return response()->json($data,200);
    }

    public function approveSchool($id)
    { 
        $std_info = StudentInfo::find($id) ;
        $std_info->payment_method = 'CASH';
        $std_info->save();
        $school = SchoolRegister::find($std_info->school_id);
        $school->payment_method = 'CASH';
        $school->renew_date = date('Y-m-d');
        $school->save();
        return response()->json([
            'data' => $std_info,
        ],200);
    }

    public function checkPayment($id)
    {
        $data = StudentInfo::where('id',$id)->get();
        return response()->json($data,200);
    }
    public function checkEmail(Request $request){
        $std_info =StudentInfo::where('email','=',$request->email)->get();
        $data =StudentInfo::where('school_id','=','NULL')
                            ->where('teacher_id','!=','NULL')
                            ->get();
        $status=2;
        if(sizeof($std_info)){
            
            if(sizeof($data)){
                return response()->json($data,200);
            }else{
                return response()->json($status,200);
            }
           
        }
        else{
            return response()->json($status,200);
        }
    
    }
}