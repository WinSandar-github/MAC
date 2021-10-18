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
use App\Invoice;
use App\Membership;

use Hash;
use DB;

use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;    
use Carbon\Carbon;

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
        $count_invoice_no=DB::table('school_registers')->select(DB::raw('COUNT(invoice_no) as count_invoice_no'))->get();
        return  response()->json([
            'data' => $school,
            'count_invoice_no'=>$count_invoice_no
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
            foreach($request->file('own_type_letter') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/student_info/',$name);
                 $own_type_letter[] = $name;
             }
            
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
        $school->eng_address         = $request->eng_address;
        $school->phone           = $request->phone;
        $school->attachment      = json_encode($attachment);
        
        $school->profile_photo               = $profile_photo;
        $school->school_name                 = $request->school_name;
        $school->attend_course               = json_encode($request->attend_course);
        $school->school_address              = $request->school_address;
        $school->eng_school_address          = $request->eng_school_address;
        $school->own_type                    = $request->own_type;
        $school->own_type_letter             = json_encode($own_type_letter);
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
        
        $school->type = $request->school_type;
        
        //reconnected form
        $school->last_registration_fee_year = $request->last_registration_fee_year;
        $school->request_for_temporary_stop = $request->request_for_temporary_stop;
        $school->from_request_stop_date = $request->from_request_stop_date;
        $school->to_request_stop_date = $request->to_request_stop_date;
        $school->offline_user=$request->offline_user;
        if($request->offline_user=="true"){
            $school->payment_method = 'exit_sch';
        }else{
            $school->payment_method = 'init_sch';
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
        $school->regno            = 'S-'.$school->id;
        $school->student_info_id  = $std_info->id;
        $school->save();

        $degrees_certificates=implode(',', $degrees_certificates);
        $new_degrees_certificates= explode(',',$degrees_certificates);
        for($i=0;$i < sizeof($request->degrees);$i++){
       
            $education_histroy  =   new EducationHistroy();
            $education_histroy->student_info_id = $std_info->id;
            $education_histroy->degree_name = $request->degrees[$i];
            $education_histroy->certificate     ='/storage/student_info/'.$new_degrees_certificates[$i];
            $education_histroy->school_id       = $school->id;
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
        if($request->school_type=="P"){
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
        if($branch_school_attach!=null){
            $branch_school_attach=implode(',', $branch_school_attach);
            $new_branch_school_attach= explode(',',$branch_school_attach);
            
        }
        
        if($request->branch_school_address!=null){
            
            if($branch_sch_letter!=null){
                
                $branch_sch_letter=implode(',', $branch_sch_letter);
                $new_branch_sch_letter= explode(',',$branch_sch_letter);
                
            }
            for($i=0;$i<sizeof($request->branch_school_address);$i++){
                $branch_school = new tbl_branch_school();
                $branch_school->branch_school_address= $request->branch_school_address[$i];
                $branch_school->branch_school_attach = '/storage/student_info/'.$new_branch_school_attach[$i];
                $branch_school->branch_sch_own_type= $request->branch_sch_own_type[$i];
                $branch_school->branch_sch_letter= '/storage/student_info/'.$new_branch_sch_letter[$i];//'/storage/student_info/'.
                $branch_school->school_id       = $school->id;
                $branch_school->save();
            }
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

        $memberships = Membership::where('membership_name', 'like', 'School')->get();
        
        //invoice
            if($request->offline_user!=true){
                $invoice = new Invoice();
                $invoice->student_info_id = $std_info->id;
                $invoice->invoiceNo = 'init_sch';
                
                $invoice->name_eng        = $request->name_eng;
                $invoice->email           = $request->email;
                $invoice->phone           = $request->phone;

                $invoice->productDesc     = 'Application Fee,Initial Registration Fee,Yearly Fee';
                foreach($memberships as $memberships){
                    $invoice->amount          = $memberships->form_fee.','.$memberships->registration_fee.','.$memberships->yearly_fee;
                }
            
                $invoice->status          = 0;
                $invoice->save();
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
            foreach($request->file('business_license') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/student_info/',$name);
                 $business_license[] = $name;
             }
            if($request->old_business_license){
                $new_business_license=str_replace(',', '",', $request->old_business_license);
                $business_license[]=$new_business_license;
            }
            $business_license=json_encode($business_license);
        }else{
            $business_license=$request->old_business_license;
        } 
        

        if ($request->hasfile('school_location_attach')) {
            $file = $request->file('school_location_attach');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $school_location_attach = '/storage/student_info/'.$name;
        }else{
            $school_location_attach=$request->school_location_attach;
        }  

        if ($request->hasfile('profile_photo')) {
            $file = $request->file('profile_photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $profile_photo = '/storage/student_info/'.$name;
        }

        if ($request->hasfile('own_type_letter')) {
            foreach($request->file('own_type_letter') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/student_info/',$name);
                 $own_type_letter[] = $name;
             }
            if($request->old_own_type_letter){
                $new_own_type_letter=str_replace(',', '",', $request->old_own_type_letter);
                $own_type_letter[]=$new_own_type_letter;
            }
            $own_type_letter=json_encode($own_type_letter);
        }else{
            $own_type_letter=$request->old_own_type_letter;
        }
        if ($request->hasfile('degrees_certificates')) {
            foreach($request->file('degrees_certificates') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/student_info/',$name);
                 $degrees_certificates[] = $name;
             }
            
        }else{
            $degrees_certificates=null;
        }
        if ($request->hasfile('attachment')) {
            foreach($request->file('attachment') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/student_info/',$name);
                 $attachment[] = $name;
             }
            if($request->old_attachment){
                $new_attachment=str_replace(',', '",', $request->old_attachment);
                $attachment[]=$request->old_attachment;
            }
            $attachment=json_encode($attachment);
            
        }else{
            $attachment=$request->old_attachment;
        }
        
        if ($request->hasfile('sch_establish_notes_attach')) {
            foreach($request->file('sch_establish_notes_attach') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/student_info/',$name);
                 $sch_establish_notes_attach[] =$name;
             }
            if($request->old_sch_establish_notes_attach){
                $new_sch_establish_notes_attach=str_replace(',', '",', $request->old_sch_establish_notes_attach);
                $sch_establish_notes_attach[]=$new_sch_establish_notes_attach;
            }
            $sch_establish_notes_attach=json_encode($sch_establish_notes_attach);
        }else{
            $sch_establish_notes_attach=$request->old_sch_establish_notes_attach;
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
        $school = SchoolRegister::find($id);
        $school->name_mm         = $request->name_mm;
        $school->name_eng        = $request->name_eng;
        $school->nrc_front       = $nrc_front;
        $school->nrc_back        = $nrc_back;
        $school->father_name_mm  = $request->father_name_mm;
        $school->father_name_eng = $request->father_name_eng;
        $school->date_of_birth   = $request->dob;
        $school->address         = $request->address;
        $school->phone           = $request->phone;
        $school->attachment      = ($attachment);
        
        $school->profile_photo               = $profile_photo;
        $school->school_name                 = $request->school_name;
        $school->attend_course               = json_encode($request->attend_course);
        $school->school_address              = $request->school_address;
        $school->own_type                    = $request->own_type;
        $school->own_type_letter             = ($own_type_letter);
        $school->business_license            = ($business_license);
        $school->school_location_attach      = $school_location_attach;
        $school->sch_establish_notes_attach  = ($sch_establish_notes_attach);
        
        $school->email            = strtolower($request->email);
        //$school->password         = Hash::make($request->password);
        $school->nrc_state_region = $request->nrc_state_region;
        $school->nrc_township     = $request->nrc_township;
        $school->nrc_citizen      = $request->nrc_citizen;
        $school->nrc_number       = $request->nrc_number;
        $school->reason = $request->reason;
        //$school->renew_date = date('Y-m-d');
        $school->type = $request->school_type;
        $school->approve_reject_status = 0;
        $school->initial_status = $request->initial_status;
        
        $school->save();
        //student info
        $std_info = StudentInfo::find($request->student_info_id);
        $std_info->payment_method = null;
        $std_info->approve_reject_status = 0;
        $std_info->save();
        //education
        if($request->degrees!=null){
            $degrees_certificates=implode(',', $degrees_certificates);
            $new_degrees_certificates= explode(',',$degrees_certificates);
            for($i=0;$i < sizeof($request->degrees);$i++){
           
                $education_histroy  =   new EducationHistroy();
                $education_histroy->student_info_id = $std_info->id;
                $education_histroy->degree_name = $request->degrees[$i];
                $education_histroy->certificate     ='/storage/student_info/'.$new_degrees_certificates[$i];
                $education_histroy->school_id       = $school->id;
                $education_histroy->save();
            }
        }else{
            
            if ($request->hasfile('old_degrees_certificates')) {
                foreach($request->file('old_degrees_certificates') as $file)
                 {
                     $name  = uniqid().'.'.$file->getClientOriginalExtension();
                     $file->move(public_path().'/storage/student_info/',$name);
                     $old_degrees_certificates[] = $name;
                 }
                 for($i=0;$i <sizeof($request->old_degrees_id);$i++){
                    $education_histroy  =EducationHistroy::find($request->old_degrees_id[$i]);
                    $education_histroy->degree_name = $request->old_degrees[$i];
                    $education_histroy->certificate     ='/storage/student_info/'.$old_degrees_certificates[$i];
                    $education_histroy->save();
                }
            }else{
                $old_degrees_certificates=$request->old_degrees_certificates_h;
                if($request->old_degrees!=null){
                    for($i=0;$i <sizeof($request->old_degrees_id);$i++){
                        $education_histroy  =EducationHistroy::find($request->old_degrees_id[$i]);
                        $education_histroy->degree_name = $request->old_degrees[$i];
                        $education_histroy->certificate     =$old_degrees_certificates[$i];
                        $education_histroy->save();
                    }
                }
                
            }
            
        }
            
        //establisher list
        if($request->establisher_name!=null){
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
        }else{
            if($request->old_establisher_name!=null){
                for($i=0;$i<sizeof($request->old_establisher_name);$i++){
                    $establisher =SchoolEstablisher::find($request->old_establisher_id[$i]);
                    $establisher->name         = $request->old_establisher_name[$i];
                    $establisher->nrc          = $request->old_establisher_nrc[$i];
                    $establisher->cpa_papp_no  = $request->old_establisher_cpa_papp_no[$i];
                    $establisher->education    = $request->old_establisher_education[$i];
                    $establisher->address      = $request->old_establisher_address[$i];
                    $establisher->ph_number    = $request->old_establisher_ph_number[$i];
                    $establisher->email        = $request->old_establisher_email[$i];
                    $establisher->save();
                }
            }
            
        }
        //govern list
        if($request->govern_name!=null){
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
        }else{
            if($request->old_govern_name!=null){
                for($i=0;$i<sizeof($request->old_govern_name);$i++){
                    $govern =SchoolGovern::find($request->old_govern_id[$i]);
                    $govern->name            = $request->old_govern_name[$i];
                    $govern->nrc             = $request->old_govern_nrc[$i];
                    $govern->cpa_papp_no     = $request->old_govern_cpa_papp_no[$i];
                    $govern->education       = $request->old_govern_education[$i];
                    $govern->responsibility  = $request->old_govern_responsibility[$i];
                    $govern->ph_number       = $request->old_govern_ph_number[$i];
                    $govern->email           = $request->old_govern_email[$i];
                    $govern->save();
                }
            }
            
        }
        //member list
        if($request->member_name!=null){
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
        }else{
            if($request->old_member_name!=null){
                for($i=0;$i<sizeof($request->old_member_name);$i++){
                    $member = SchoolMember::find($request->old_member_id[$i]);
                    $member->name            = $request->old_member_name[$i];
                    $member->nrc             = $request->old_member_nrc[$i];
                    $member->cpa_papp_no     = $request->old_member_cpa_papp_no[$i];
                    $member->education       = $request->old_member_education[$i];
                    $member->responsibility  = $request->old_member_responsibility[$i];
                    $member->ph_number       = $request->old_member_ph_number[$i];
                    $member->email           = $request->old_member_email[$i];
                    $member->save();
                }
            }
            
        }
        //teacher list
        if($request->teacher_name!=null){
            $teacher_reg_copy=implode(',', $teacher_reg_copy);
            $new_teacher_reg_copy= explode(',',$teacher_reg_copy);
            for($i=0;$i<sizeof($request->teacher_name);$i++){
                $teacher = new SchoolTeacher();
                $teacher->name             = $request->teacher_name[$i];
                $teacher->nrc              = $request->teacher_nrc[$i];
                $teacher->registration_no  = $request->teacher_registration_no[$i];
                $teacher->education        = $request->teacher_education[$i];
                $teacher->subject          = $request->teaching_subject[$i];
                $teacher->ph_number        = $request->teacher_ph_number[$i];
                $teacher->email            = $request->teacher_email[$i];
                $teacher->teacher_reg_copy = '/storage/student_info/'.$new_teacher_reg_copy[$i];
                $teacher->school_id        = $school->id;
                $teacher->save();
            }
        }else{
        if ($request->hasfile('old_teacher_reg_copy')) {
            foreach($request->file('old_teacher_reg_copy') as $file)
            {
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/student_info/',$name);
                $new_teacher_reg_copy[] = $name;
            }
                for($i=0;$i<sizeof($request->old_teacher_name);$i++){
                $teacher =SchoolTeacher::find($request->old_teacher_id[$i]);
                $teacher->name             = $request->old_teacher_name[$i];
                $teacher->nrc              = $request->old_teacher_nrc[$i];
                $teacher->registration_no  = $request->old_teacher_registration_no[$i];
                $teacher->education        = $request->old_teacher_education[$i];
                $teacher->subject          = $request->old_teaching_subject[$i];
                $teacher->ph_number        = $request->old_teacher_ph_number[$i];
                $teacher->email            = $request->old_teacher_email[$i];
                $teacher->teacher_reg_copy = '/storage/student_info/'.$new_teacher_reg_copy[$i];
                $teacher->save();
            }
        }else{
                $old_teacher_reg_copy=$request->old_teacher_reg_copy_h;
                if($request->old_teacher_name!=null){
                    for($i=0;$i<sizeof($request->old_teacher_name);$i++){
                        $teacher =SchoolTeacher::find($request->old_teacher_id[$i]);
                        $teacher->name             = $request->old_teacher_name[$i];
                        $teacher->nrc              = $request->old_teacher_nrc[$i];
                        $teacher->registration_no  = $request->old_teacher_registration_no[$i];
                        $teacher->education        = $request->old_teacher_education[$i];
                        $teacher->subject          = $request->old_teaching_subject[$i];
                        $teacher->ph_number        = $request->old_teacher_ph_number[$i];
                        $teacher->email            = $request->old_teacher_email[$i];
                        $teacher->teacher_reg_copy = $old_teacher_reg_copy[$i];
                        $teacher->save();
                    }
                }
                
            }
            
        }
        //branch_school
        if($request->branch_school_address!=null){
            if($branch_school_attach!=null){
                $branch_school_attach=implode(',', $branch_school_attach);
                $new_branch_school_attach= explode(',',$branch_school_attach);
                
            }
            if($branch_sch_letter!=null){
                
                $branch_sch_letter=implode(',', $branch_sch_letter);
                $new_branch_sch_letter= explode(',',$branch_sch_letter);
                
            }
            for($i=0;$i<sizeof($request->branch_school_address);$i++){
                $branch_school = new tbl_branch_school();
                $branch_school->branch_school_address= $request->branch_school_address[$i];
                $branch_school->branch_school_attach = '/storage/student_info/'.$new_branch_school_attach[$i];
                $branch_school->branch_sch_own_type= $request->branch_sch_own_type[$i];
                $branch_school->branch_sch_letter= '/storage/student_info/'.$new_branch_sch_letter[$i];
                $branch_school->school_id       = $school->id;
                $branch_school->save();
            }
        }else{
            if($request->old_branch_school_address!=null){
                if($request->hasfile('old_branch_school_attach') && $request->hasfile('old_branch_sch_letter')) {
                    foreach($request->file('old_branch_school_attach') as $file)
                     {
                         $name  = uniqid().'.'.$file->getClientOriginalExtension();
                         $file->move(public_path().'/storage/student_info/',$name);
                         $new_branch_school_attach[] = $name;
                     }
                     foreach($request->file('old_branch_sch_letter') as $file)
                     {
                         $name  = uniqid().'.'.$file->getClientOriginalExtension();
                         $file->move(public_path().'/storage/student_info/',$name);
                         $new_branch_sch_letter[] = $name;
                     }
                     for($i=0;$i<sizeof($request->old_branch_school_address);$i++){
                        $branch_school =tbl_branch_school::find($request->old_branch_school_id[$i]);
                        $branch_school->branch_school_address= $request->old_branch_school_address[$i];
                        $branch_school->branch_school_attach = '/storage/student_info/'.$new_branch_school_attach[$i];
                        $branch_school->branch_sch_own_type= $request->old_branch_sch_own_type[$i];
                        $branch_school->branch_sch_letter= '/storage/student_info/'.$new_branch_sch_letter[$i];
                        $branch_school->save();
                    }
                }else if($request->hasfile('old_branch_school_attach') && $request->old_branch_sch_letter_h){
                    foreach($request->file('old_branch_school_attach') as $file)
                     {
                         $name  = uniqid().'.'.$file->getClientOriginalExtension();
                         $file->move(public_path().'/storage/student_info/',$name);
                         $new_branch_school_attach[] = $name;
                     }
                     $old_branch_sch_letter=$request->old_branch_sch_letter_h;
                     for($i=0;$i<sizeof($request->old_branch_school_address);$i++){
                        $branch_school =tbl_branch_school::find($request->old_branch_school_id[$i]);
                        $branch_school->branch_school_address= $request->old_branch_school_address[$i];
                        $branch_school->branch_school_attach = '/storage/student_info/'.$new_branch_school_attach[$i];
                        $branch_school->branch_sch_own_type= $request->old_branch_sch_own_type[$i];
                        $branch_school->branch_sch_letter= $old_branch_sch_letter[$i];
                        $branch_school->save();
                    }
                }else if ($request->hasfile('old_branch_sch_letter') && $request->old_branch_school_attach_h) {
                    foreach($request->file('old_branch_sch_letter') as $file)
                     {
                         $name  = uniqid().'.'.$file->getClientOriginalExtension();
                         $file->move(public_path().'/storage/student_info/',$name);
                         $new_branch_sch_letter[] = $name;
                     }
                     $old_branch_school_attach=$request->old_branch_school_attach_h;
                     for($i=0;$i<sizeof($new_branch_sch_letter);$i++){
                        $branch_school =tbl_branch_school::find($request->old_branch_school_id[$i]);
                        $branch_school->branch_school_address= $request->old_branch_school_address[$i];
                        $branch_school->branch_school_attach = $old_branch_school_attach[$i];
                        $branch_school->branch_sch_own_type= $request->old_branch_sch_own_type[$i];
                        $branch_school->branch_sch_letter= '/storage/student_info/'.$new_branch_sch_letter[$i];
                        $branch_school->save();
                    }
                }
                else{
                    $old_branch_school_attach=$request->old_branch_school_attach_h;
                    $old_branch_sch_letter=$request->old_branch_sch_letter_h;
                    if($request->old_branch_school_address!=null){
                        for($i=0;$i<sizeof($request->old_branch_school_address);$i++){
                            $branch_school =tbl_branch_school::find($request->old_branch_school_id[$i]);
                            $branch_school->branch_school_address= $request->old_branch_school_address[$i];
                            $branch_school->branch_school_attach = $old_branch_school_attach[$i];
                            $branch_school->branch_sch_own_type= $request->old_branch_sch_own_type[$i];
                            $branch_school->branch_sch_letter= $old_branch_sch_letter[$i];
                            $branch_school->save();
                        }
                    }
                    
                } 
            }
            
        }
        
        //bulding_type
        if($request->bulding_type!=null){
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
        }else{
            if ($request->hasfile('old_school_building_attach')) {
                foreach($request->file('old_school_building_attach') as $file)
                 {
                     $name  = uniqid().'.'.$file->getClientOriginalExtension();
                     $file->move(public_path().'/storage/student_info/',$name);
                     $new_school_building_attach[] = $name;
                 }
                 for($i=0;$i<sizeof($request->old_bulding_type);$i++){
                    $bulding_type =tbl_bulding_type::find($request->old_bulding_id[$i]);
                    $bulding_type->bulding_type= $request->old_bulding_type[$i];
                    $bulding_type->building_measurement = $request->old_building_measurement[$i];
                    $bulding_type->floor_numbers= $request->old_floor_numbers[$i];
                    $bulding_type->school_building_attach= '/storage/student_info/'.$new_school_building_attach[$i];
                    $bulding_type->save();
                }
                
            }else{
                $old_school_building_attach=$request->old_school_building_attach_h;
                if($request->old_bulding_type!=null){
                    for($i=0;$i<sizeof($request->old_bulding_type);$i++){
                        $bulding_type =tbl_bulding_type::find($request->old_bulding_id[$i]);
                        $bulding_type->bulding_type= $request->old_bulding_type[$i];
                        $bulding_type->building_measurement = $request->old_building_measurement[$i];
                        $bulding_type->floor_numbers= $request->old_floor_numbers[$i];
                        $bulding_type->school_building_attach= $old_school_building_attach[$i];
                        $bulding_type->save();
                    }
                }
                
            } 
            
        }
        //classroom_number
        if($request->classroom_number!=null){
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
        }else{
            if ($request->hasfile('old_classroom_attach')) {
                foreach($request->file('old_classroom_attach') as $file)
                 {
                     $name  = uniqid().'.'.$file->getClientOriginalExtension();
                     $file->move(public_path().'/storage/student_info/',$name);
                     $new_classroom_attach[] = $name;
                 }
                 for($i=0;$i<sizeof($request->old_classroom_number);$i++){
                    $classroom_number =tbl_classroom::find($request->old_classroom_id[$i]);
                    $classroom_number->classroom_number= $request->old_classroom_number[$i];
                    $classroom_number->classroom_measurement = $request->old_classroom_measurement[$i];
                    $classroom_number->student_num_limit= $request->old_student_num_limit[$i];
                    $classroom_number->air_con= $request->old_air_con[$i];
                    $classroom_number->classroom_attach= '/storage/student_info/'.$new_classroom_attach[$i];
                    $classroom_number->save();
                }
                
            }else{
                $old_classroom_attach=$request->old_classroom_attach_h;
                if($request->old_classroom_number!=null){
                    for($i=0;$i<sizeof($request->old_classroom_number);$i++){
                        $classroom_number =tbl_classroom::find($request->old_classroom_id[$i]);
                        $classroom_number->classroom_number= $request->old_classroom_number[$i];
                        $classroom_number->classroom_measurement = $request->old_classroom_measurement[$i];
                        $classroom_number->student_num_limit= $request->old_student_num_limit[$i];
                        $classroom_number->air_con= $request->old_air_con[$i];
                        $classroom_number->classroom_attach= $old_classroom_attach[$i];
                        $classroom_number->save();
                    }
                }
                
            } 
            
        }
        //toilet_type
        if($request->toilet_type!=null){
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
        }else{
            if ($request->hasfile('old_toilet_attach')) {
                foreach($request->file('old_toilet_attach') as $file)
                 {
                     $name  = uniqid().'.'.$file->getClientOriginalExtension();
                     $file->move(public_path().'/storage/student_info/',$name);
                     $new_toilet_attach[] = $name;
                 }
                 for($i=0;$i<sizeof($request->old_toilet_type);$i++){
                    $toilet_type =tbl_toilet_type::find($request->old_toilet_id[$i]);
                    $toilet_type->toilet_type= $request->old_toilet_type[$i];
                    $toilet_type->toilet_number = $request->old_toilet_number[$i];
                    $toilet_type->toilet_attach= '/storage/student_info/'.$new_toilet_attach[$i];
                    $toilet_type->save();
                }
            }else{
                $old_toilet_attach=$request->old_toilet_attach_h;
                if($request->old_toilet_type!=null){
                    for($i=0;$i<sizeof($request->old_toilet_type);$i++){
                        $toilet_type =tbl_toilet_type::find($request->old_toilet_id[$i]);
                        $toilet_type->toilet_type= $request->old_toilet_type[$i];
                        $toilet_type->toilet_number = $request->old_toilet_number[$i];
                        $toilet_type->toilet_attach= $old_toilet_attach[$i];
                        $toilet_type->save();
                    }
                }
                
            } 
            
        }
        //manage_room_numbers
        if($request->manage_room_numbers!=null){
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
        }else{
            if ($request->hasfile('old_manage_room_attach')) {
                foreach($request->file('old_manage_room_attach') as $file)
                 {
                     $name  = uniqid().'.'.$file->getClientOriginalExtension();
                     $file->move(public_path().'/storage/student_info/',$name);
                     $new_manage_room_attach[] = $name;
                 }
                for($i=0;$i<sizeof($request->old_manage_room_numbers);$i++){
                    $manage_room_numbers =tbl_manage_room_numbers::find($request->old_manage_room_id[$i]);
                    $manage_room_numbers->manage_room_numbers= $request->old_manage_room_numbers[$i];
                    $manage_room_numbers->manage_room_measurement = $request->old_manage_room_measurement[$i];
                    $manage_room_numbers->manage_room_attach= '/storage/student_info/'.$new_manage_room_attach[$i];
                    $manage_room_numbers->save();
                }
            }else{
                $old_manage_room_attach=$request->old_manage_room_attach_h;
                if($request->old_manage_room_numbers!=null){
                    for($i=0;$i<sizeof($request->old_manage_room_numbers);$i++){
                        $manage_room_numbers =tbl_manage_room_numbers::find($request->old_manage_room_id[$i]);
                        $manage_room_numbers->manage_room_numbers= $request->old_manage_room_numbers[$i];
                        $manage_room_numbers->manage_room_measurement = $request->old_manage_room_measurement[$i];
                        $manage_room_numbers->manage_room_attach= $old_manage_room_attach[$i];
                        $manage_room_numbers->save();
                    }
                }
                
            } 
            
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
        //$school->renew_date = date('Y-m-d');
        $school->save();
        return response()->json([
            'message' => 'You have approved this user.'
        ],200);
    }

    public function reject_school_register(Request $request)
    {
        $std_info = StudentInfo::find($request->student_info_id);
        $std_info->approve_reject_status = 2;
        $std_info->save();
        $school = SchoolRegister::find($request->id);
        $school->approve_reject_status = 2;
        $school->reason = $request->reason;
        $school->save();
        return response()->json([
            'message' => 'You have rejected this user.'
        ],200);
    }

    public function FilterSchool(Request $request)
    {
        if($request->offline_user==true){
            
            $school = SchoolRegister::where('approve_reject_status',$request->status)
            ->where('offline_user',$request->offline_user)
            ->orderBy('created_at','desc');
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
                            <a href='school_edit?id=$infos->id&offline_user=true' class='btn btn-primary btn-xs'>
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
            ->addColumn('reason', function ($infos){
                if($infos->reason == ""){
                    return "";
                   
                }else{
                    return $infos->reason;
                   
                }
            })
            ->rawColumns(['action'])
            ->make(true);
        }else{
          
            $school = SchoolRegister::where('approve_reject_status',$request->status)
                                    ->where('initial_status',$request->initial_status)
                                    ->where('offline_user',null)
                                    ->orderBy('created_at','desc');
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
                $btn='';
                if($infos->initial_status == 0){
                    $btn ="<div class='btn-group'>
                            <a href='school_edit?id=$infos->id' class='btn btn-primary btn-xs' onclick='showMentorStudent($infos->id)'>
                                <li class='fa fa-eye fa-sm'></li>
                            </a>
                            </div>";
                    return $btn;
                }else{
                    $btn ="<div class='btn-group'>
                            <a href='renew_school_edit?id=$infos->id' class='btn btn-primary btn-xs' onclick='showMentorStudent($infos->id)'>
                                <li class='fa fa-eye fa-sm'></li>
                            </a>
                            </div>";
                    return $btn;
                }
                
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
                    
                    if($infos->initial_status==2){
                        return "cessation";
                    }else{
                        return "REJECTED";
                    }
                }
            })
            ->addColumn('payment_method', function ($infos){
                if($infos->payment_method	 == ""){
                    return "Payment Incomplete";
                }else{
                    return "Payment Complete";
                }
            })
            ->addColumn('exp_date', function ($infos){
                if($infos->initial_status==0){
                    if($infos->from_valid_date	 ==""){
                        return "";
                    }else{
                        $date = Carbon::createFromFormat('Y-m-d H:i:s', $infos->from_valid_date);
                        return $date->format('d-m-Y').' to 31-12-'.date('Y');
                    }
                }else if($infos->initial_status==1){
                    if($infos->from_valid_date	 ==""){
                        return "";
                    }else{
                        $currentDate = Carbon::now()->addYears(3);
                        return '01-01-'.date('Y').' to 31-12-'.$currentDate->format('Y');
                    }
                }
                
            })
            ->addColumn('card', function ($infos) {
                $btn='';
                if($infos->payment_method != ""){
                    $btn = "<div class='btn-group'>
                                <a href='school_card?id=$infos->id' class='btn btn-primary btn-xs'>
                                    <li class='fa fa-id-card-o fa-sm'></li>
                                </a>
                            </div>";
                    return $btn;
                    
                }else{
                    return $btn;
                }
                
            })
            ->addColumn('remark', function ($infos){
                if($infos->cessation_reason == ""){
                    return "";
                
                }else{
                    return $infos->cessation_reason;
                
                }
            })
            ->addColumn('reason', function ($infos){
                if($infos->reason == ""){
                    return "";
                
                }else{
                    return $infos->reason;
                
                }
            })
            ->addColumn('payment_date', function ($infos){
                if($infos->initial_status==0){
                    if($infos->from_valid_date	 == ""){
                        return "";
                    }else{
                        $date = Carbon::createFromFormat('Y-m-d H:i:s', $infos->from_valid_date);
                        return $date->format('d-m-Y');
                    }
                }else if($infos->initial_status==1){
                    if($infos->from_valid_date	 == ""){
                        return "";
                    }else{
                        $date = Carbon::createFromFormat('Y-m-d', $infos->from_valid_date);
                        return $date->format('d-m-Y');
                    }
                }
                
            })
            ->rawColumns(['card','action'])
            ->make(true);
            }
        
    }

    public function schoolStatus($id)
    {
        $data = StudentInfo::where('id',$id)->with('school')->get();
        return response()->json($data,200);
    }

    public function approveSchool(Request $request)
    { 
        // $std_info = StudentInfo::find($id) ;
        // $std_info->payment_method = 'CASH';
        // $std_info->save();
        $school = SchoolRegister::find($request->id);
        $school->payment_method = 'CASH';
        $school->invoice_no = $request->invoice_no;
        $school->s_code = $request->invoice_no;
        $school->from_valid_date = $request->current_date;
        $school->save();
        return response()->json([
            'data' => $school,
        ],200);
    }

    public function checkPayment($id)
    {
        $data = SchoolRegister::where('id',$id)->get();
        return response()->json($data,200);
    }
    public function checkEmail(Request $request){
        $std_info =StudentInfo::where('email','=',$request->email)->get();
        $data =StudentInfo::where('email','=',$request->email)
                            ->where('school_id','=',null)
                            ->where('teacher_id','!=',null)
                            ->get();
        $status1=1;
        $status2=2;
        if(sizeof($std_info)){
            
             if(sizeof($data)){
                return response()->json($data,200);
             }else{
                return response()->json($status1,200);
             }
           
        }
        else{
            return response()->json($status2,200);
        }
    
    }
    public function cessation_school_register(Request $request)
    {
        $std_info = StudentInfo::find($request->student_info_id);
        $std_info->approve_reject_status = $request->status;
        $std_info->save();
        $school = SchoolRegister::find($request->id);
        $school->approve_reject_status = $request->status;
        $school->cessation_reason = $request->cessation_reason;
        $school->initial_status = $request->initial_status;
        $school->save();
        return response()->json([
            'message' => 'You have approved this user.'
        ],200);
    }
    public function renewSchool(Request $request)
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
            foreach($request->file('own_type_letter') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/student_info/',$name);
                 $own_type_letter[] = $name;
             }
             $own_type_letter=json_encode($own_type_letter);
        }else{
            $own_type_letter=null;
        }
        if ($request->hasfile('degrees_certificates')) {
            foreach($request->file('degrees_certificates') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/student_info/',$name);
                 $degrees_certificates[] = $name;
             }
            
        }else{
            $degrees_certificates=null;
        }
        if ($request->hasfile('attachment')) {
            foreach($request->file('attachment') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/student_info/',$name);
                 $attachment[] = $name;
             }
             $attachment=json_encode($attachment);
        }else{
            $attachment=null;
        }
        if ($request->hasfile('sch_establish_notes_attach')) {
            foreach($request->file('sch_establish_notes_attach') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/student_info/',$name);
                 $sch_establish_notes_attach[] =$name;
             }
             $sch_establish_notes_attach=json_encode($sch_establish_notes_attach);
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
        $school->eng_address     = $request->eng_address;
        $school->phone           = $request->phone;
        $school->attachment      = ($attachment);
        
        $school->profile_photo               = $profile_photo;
        $school->school_name                 = $request->school_name;
        $school->renew_school_name           = $request->old_school_name;
        $school->attend_course               = json_encode($request->attend_course);
        $school->renew_course                = $request->old_course;
        $school->school_address              = $request->school_address;
        $school->renew_school_address        = $request->old_school_address;
        $school->own_type                    = $request->own_type;
        $school->own_type_letter             = ($own_type_letter);
        $school->business_license            = ($business_license);
        $school->school_location_attach      = $school_location_attach;
        $school->sch_establish_notes_attach  = ($sch_establish_notes_attach);
        
        $school->email            = strtolower($request->email);
        //$school->password         = Hash::make($request->email);
        $school->nrc_state_region = $request->nrc_state_region;
        $school->nrc_township     = $request->nrc_township;
        $school->nrc_citizen      = $request->nrc_citizen;
        $school->nrc_number       = $request->nrc_number;
        $school->initial_status   = $request->initial_status;
        $school->reg_date       = date('Y-m-d');
        $school->renew_date       = date('Y-m-d');
        //$school->renew_id         = $request->renew_id;
        $school->student_info_id  = $request->student_info_id;
        $school->s_code   = $request->s_code;
        $school->type = $request->school_type;
        $school->regno = $request->regno;
        if($request->offline_user=="true"){
            $school->payment_method = 'renew_exit_sch';
        }else{
            $school->payment_method = 'renew_sch';
        }
        $school->save();
        
        if($degrees_certificates!=null){
            $degrees_certificates=implode(',', $degrees_certificates);
            $new_degrees_certificates= explode(',',$degrees_certificates);
            for($i=0;$i < sizeof($request->degrees);$i++){
           
                $education_histroy  =   new EducationHistroy();
                $education_histroy->student_info_id = $request->student_info_id;
                $education_histroy->degree_name = $request->degrees[$i];
                $education_histroy->certificate     ='/storage/student_info/'.$new_degrees_certificates[$i];
                $education_histroy->school_id       = $school->id;
                $education_histroy->save();
            }
        }

        
        //establisher list
        if($request->establisher_name!=null){
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
        }
        

        //govern list
        if($request->govern_name!=null){
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
        }
        

        //member list
        if($request->school_type=="P"){
            if($request->member_name!=null){
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
            
        }
        

        //teacher list
        if($teacher_reg_copy!=null){
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
        }
        
        //branch_school
        if($branch_school_attach!=null){
            $branch_school_attach=implode(',', $branch_school_attach);
            $new_branch_school_attach= explode(',',$branch_school_attach);
            
        }
        
        if($request->branch_school_address!=null){
            
            if($branch_sch_letter!=null){
                
                $branch_sch_letter=implode(',', $branch_sch_letter);
                $new_branch_sch_letter= explode(',',$branch_sch_letter);
                
            }
            for($i=0;$i<sizeof($request->branch_school_address);$i++){
                $branch_school = new tbl_branch_school();
                $branch_school->branch_school_address= $request->branch_school_address[$i];
                $branch_school->renew_branch_school_address= $request->branch_school_address[$i];
                $branch_school->branch_school_attach = '/storage/student_info/'.$new_branch_school_attach[$i];
                $branch_school->branch_sch_own_type= $request->branch_sch_own_type[$i];
                $branch_school->branch_sch_letter= '/storage/student_info/'.$new_branch_sch_letter[$i];//'/storage/student_info/'.
                $branch_school->school_id       = $school->id;
                $branch_school->save();
            }
        }else{
            if($request->old_branch_school_address!=null){
                for($i=0;$i<sizeof($request->branch_school_address);$i++){
                    $branch_school =tbl_branch_school::find($request->old_branch_school_id);
                    $branch_school->branch_school_address= $request->old_branch_school_address[$i];
                    //$branch_school->renew_branch_school_address= $request->branch_school_address[$i];
                    //$branch_school->branch_school_attach = '/storage/student_info/'.$new_branch_school_attach[$i];
                    //$branch_school->branch_sch_own_type= $request->branch_sch_own_type[$i];
                    //$branch_school->branch_sch_letter= '/storage/student_info/'.$new_branch_sch_letter[$i];//'/storage/student_info/'.
                    $branch_school->school_id       = $school->id;
                    $branch_school->save();
                }
            }
        }
        
        //bulding_type
        if($school_building_attach!=null){
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
        }
        
        //classroom_number
        if($classroom_attach!=null){
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
        }
        
        //toilet_type
        if($toilet_attach!=null){
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
        }
        
        //manage_room_numbers
        if($manage_room_attach!=null){
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
        }
        $memberships = Membership::where('membership_name', 'like', 'School')->get();
        
        //invoice
            if($request->offline_user=="true"){
                if($request->request_for_temporary_stop=="no"){
                    $currentYear = Carbon::now()->format('Y');
                    $currentMonth = Carbon::now()->format('M');

                    $invoice = new Invoice();
                    $invoice->student_info_id = $request->student_info_id;
                    $invoice->invoiceNo = 'renew_exit_sch';
                    
                    $invoice->name_eng        = $request->name_eng;
                    $invoice->email           = $request->email;
                    $invoice->phone           = $request->phone;
                    
                    list($last_pay_month, $last_pay_year) = explode("-", $request->last_registration_fee_year);
                    $diffYear=$currentYear - $last_pay_year;
                    
                    if(($currentMonth=="Jan" && $diffYear <= 2) || ($currentMonth=="Nov" && $diffYear <= 3) || ($currentMonth=="Dec" && $diffYear <= 3)){//$diffYear <= 3
                        $invoice->productDesc     = 'Application Fee,Renew Registration Fee,Renew Yearly Fee';
                        foreach($memberships as $memberships){
                            $invoice->amount          = $memberships->form_fee.','.$memberships->renew_registration_fee.','.$memberships->renew_yearly_fee;
                        }
                    }else if($last_pay_month=="Feb" && $diffYear <= 2){
                        $invoice->productDesc     = 'Application Fee,Renew Registration Fee,Renew Yearly Fee,Delay Fee';
                        foreach($memberships as $memberships){
                            $invoice->amount          = $memberships->form_fee.','.$memberships->renew_registration_fee.','.$memberships->renew_yearly_fee.','.$memberships->late_fee;
                        }
                    }else{
                        $invoice->productDesc     = 'Application Fee,Renew Registration Fee,Renew Yearly Fee,' . $diffYear . ' x Reconnect Fee';
                        foreach($memberships as $memberships){
                            $invoice->amount          = $memberships->form_fee.','.$memberships->renew_registration_fee.','.$memberships->renew_yearly_fee.','.$diffYear.'x'.$memberships->reconnected_fee;
                        }
                    }
                    
                    $invoice->status          = 0;
                    $invoice->save();
                    
                    
                }else{
                    $currentYear = Carbon::now()->format('Y');
                    list($start_pay_day,$start_pay_month, $start_pay_year)= explode("-", $request->from_request_stop_date);
                    list($end_pay_day,$end_pay_month, $end_pay_year)= explode("-", $request->to_request_stop_date);
                    //$diffYear=$end_pay_year - $start_pay_year;
                    list($last_pay_month, $last_pay_year)= explode("-", $request->last_registration_fee_year);
                    $diffYear=$currentYear-$last_pay_year;
                    
                    $invoice = new Invoice();
                    $invoice->student_info_id = $request->student_info_id;
                    $invoice->invoiceNo = 'renew_exit_sch';
                    
                    $invoice->name_eng        = $request->name_eng;
                    $invoice->email           = $request->email;
                    $invoice->phone           = $request->phone;

                    // if($last_pay_month=="Jan" || $last_pay_month=="Nov" || $last_pay_month=="Dec"){
                    //     $invoice->productDesc     = 'Renew Application Fee,Renew Registration Fee,Renew Yearly Fee,' . $diffYear . ' x Reconnect Fee';
                    //     foreach($memberships as $memberships){
                    //         $invoice->amount          = $memberships->form_fee.','.$memberships->renew_registration_fee.','.$memberships->renew_yearly_fee.','.$diffYear.'x'.$memberships->reconnected_fee;
                    //     }
                        
                    // }else if($last_pay_month=="Feb"){
                    //     $invoice->productDesc     = 'Renew Application Fee,Renew Registration Fee,Renew Yearly Fee,Delay Fee,' . $diffYear . ' x Reconnect Fee';
                    //     foreach($memberships as $memberships){
                    //         $invoice->amount          = $memberships->form_fee.','.$memberships->renew_registration_fee.','.$memberships->renew_yearly_fee.','.$memberships->late_fee.','.$diffYear.'x'.$memberships->reconnected_fee;
                    //     }
                    // }
                    $invoice->productDesc     = 'Renew Application Fee,Renew Registration Fee,Renew Yearly Fee,' . $diffYear . ' x Reconnect Fee';
                        foreach($memberships as $memberships){
                            $invoice->amount          = $memberships->form_fee.','.$memberships->renew_registration_fee.','.$memberships->renew_yearly_fee.','.$diffYear.'x'.$memberships->reconnected_fee;
                        }
                    $invoice->status          = 0;
                    $invoice->save();
                }
                

                
            }else{
                $month = Carbon::now()->format('m');
                $invoice = new Invoice();
                $invoice->student_info_id = $request->student_info_id;
                $invoice->invoiceNo = 'renew_sch';
                
                $invoice->name_eng        = $request->name_eng;
                $invoice->email           = $request->email;
                $invoice->phone           = $request->phone;
                if($month==10 || $month==11 || $month==12 || $month==01){
                    $invoice->productDesc     = 'Renew Application Fee,Renew Registration Fee,Renew Yearly Fee';
                    foreach($memberships as $memberships){
                        $invoice->amount          = $memberships->form_fee.','.$memberships->renew_registration_fee.','.$memberships->renew_yearly_fee;
                    }
                }else if($month==02){
                    $invoice->productDesc     = 'Renew Application Fee,Renew Registration Fee,Renew Yearly Fee,Delay Fee';
                    foreach($memberships as $memberships){
                        $invoice->amount          = $memberships->form_fee.','.$memberships->renew_registration_fee.','.$memberships->renew_yearly_fee.','.$memberships->late_fee;
                    }
                }
                
            
                $invoice->status          = 0;
                $invoice->save();
            }
        return response()->json([
            'message' => 'Success Registration.'
        ],200);
    }
    public function getSchoolInfo($id)
    {
        $school = SchoolRegister::where('student_info_id',$id)->get();
        return  response()->json([
            'data' => $school
        ],200);
    }
    public function renewSchoolPayment(Request $request){
        $currentDate = Carbon::now()->addYears(3);
        $school = SchoolRegister::find($request->id);
        $school->payment_method = 'CASH';
        $school->from_valid_date = date('Y-m-d');
        $school->to_valid_date = '31-12-'.$currentDate->format('Y');
        $school->save();
        return response()->json([
            'data' => $school,
        ],200);
    }
    public function renewUpdateSchool(Request $request, $id){

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
            foreach($request->file('business_license') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/student_info/',$name);
                 $business_license[] = $name;
             }
            if($request->old_business_license){
                $new_business_license=str_replace(',', '",', $request->old_business_license);
                $business_license[]=$new_business_license;
            }
            $business_license=json_encode($business_license);
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
            foreach($request->file('own_type_letter') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/student_info/',$name);
                 $own_type_letter[] = $name;
             }
            if($request->old_own_type_letter){
                $new_own_type_letter=str_replace(',', '",', $request->old_own_type_letter);
                $own_type_letter[]=$new_own_type_letter;
            }
            $own_type_letter=json_encode($own_type_letter);
        }else{
            $own_type_letter=null;
        }
        if ($request->hasfile('degrees_certificates')) {
            foreach($request->file('degrees_certificates') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/student_info/',$name);
                 $degrees_certificates[] = $name;
             }
            
        }else{
            $degrees_certificates=null;
        }
        if ($request->hasfile('attachment')) {
            foreach($request->file('attachment') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/student_info/',$name);
                 $attachment[] = $name;
             }
            if($request->old_attachment){
                $new_attachment=str_replace(',', '",', $request->old_attachment);
                $attachment[]=$request->old_attachment;
            }
            $attachment=json_encode($attachment);
            
        }else{
            $attachment=null;
        }
        
        if ($request->hasfile('sch_establish_notes_attach')) {
            foreach($request->file('sch_establish_notes_attach') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/student_info/',$name);
                 $sch_establish_notes_attach[] =$name;
             }
            if($request->old_sch_establish_notes_attach){
                $new_sch_establish_notes_attach=str_replace(',', '",', $request->old_sch_establish_notes_attach);
                $sch_establish_notes_attach[]=$new_sch_establish_notes_attach;
            }
            $sch_establish_notes_attach=json_encode($sch_establish_notes_attach);
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
        $school = SchoolRegister::find($id);
        $school->name_mm         = $request->name_mm;
        $school->name_eng        = $request->name_eng;
        $school->nrc_front       = $nrc_front;
        $school->nrc_back        = $nrc_back;
        $school->father_name_mm  = $request->father_name_mm;
        $school->father_name_eng = $request->father_name_eng;
        //$school->date_of_birth   = $request->dob;
        $school->address         = $request->address;
        $school->eng_address         = $request->eng_address;
        $school->phone           = $request->phone;
        $school->attachment      = ($attachment);
        
        $school->profile_photo               = $profile_photo;
        $school->school_name                 = $request->school_name;
        $school->attend_course               = json_encode($request->attend_course);
        $school->school_address              = $request->school_address;
        $school->own_type                    = $request->own_type;
        $school->own_type_letter             = ($own_type_letter);
        $school->business_license            = ($business_license);
        $school->school_location_attach      = $school_location_attach;
        $school->sch_establish_notes_attach  = ($sch_establish_notes_attach);
        
        $school->email            = strtolower($request->email);
        //$school->password         = Hash::make($request->password);
        $school->nrc_state_region = $request->nrc_state_region;
        $school->nrc_township     = $request->nrc_township;
        $school->nrc_citizen      = $request->nrc_citizen;
        $school->nrc_number       = $request->nrc_number;
        $school->reason = $request->reason;
        $school->renew_date = date('Y-m-d');
        $school->type = $request->school_type;
        $school->approve_reject_status = 0;
        $school->initial_status = 1;
        
        $school->save();
        
        //education
        if($request->degrees!=null){
            $degrees_certificates=implode(',', $degrees_certificates);
            $new_degrees_certificates= explode(',',$degrees_certificates);
            for($i=0;$i < sizeof($request->degrees);$i++){
           
                $education_histroy  =   new EducationHistroy();
                $education_histroy->student_info_id = $request->student_info_id;
                $education_histroy->degree_name = $request->degrees[$i];
                $education_histroy->certificate     ='/storage/student_info/'.$new_degrees_certificates[$i];
                $education_histroy->school_id       = $school->id;
                $education_histroy->save();
            }
        }else{
            
            if ($request->hasfile('old_degrees_certificates')) {
                foreach($request->file('old_degrees_certificates') as $file)
                 {
                     $name  = uniqid().'.'.$file->getClientOriginalExtension();
                     $file->move(public_path().'/storage/student_info/',$name);
                     $old_degrees_certificates[] = $name;
                 }
                 $old_degrees_certificates= str_replace('/storage/student_info/', '', $request->old_degrees_certificates_h);
                 for($i=0;$i <sizeof($request->old_degrees);$i++){
                    $education_histroy  =EducationHistroy::find($request->old_degrees_id[$i]);
                    $education_histroy->degree_name = $request->old_degrees[$i];
                    $education_histroy->certificate     ='/storage/student_info/'.$old_degrees_certificates[$i];
                    $education_histroy->save();
                }
            }else{
                $old_degrees_certificates=$request->old_degrees_certificates_h;
                if($request->old_degrees!=null){
                    for($i=0;$i <sizeof($request->old_degrees);$i++){
                        $education_histroy  =EducationHistroy::find($request->old_degrees_id[$i]);
                        $education_histroy->degree_name = $request->old_degrees[$i];
                        $education_histroy->certificate     =$old_degrees_certificates[$i];
                        $education_histroy->save();
                    }
                }
                
            }
            
        }
            
        //establisher list
        if($request->establisher_name!=null){
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
        }else{
            if($request->old_establisher_name!=null){
                for($i=0;$i<sizeof($request->old_establisher_name);$i++){
                    $establisher =SchoolEstablisher::find($request->old_establisher_id[$i]);
                    $establisher->name         = $request->old_establisher_name[$i];
                    $establisher->nrc          = $request->old_establisher_nrc[$i];
                    $establisher->cpa_papp_no  = $request->old_establisher_cpa_papp_no[$i];
                    $establisher->education    = $request->old_establisher_education[$i];
                    $establisher->address      = $request->old_establisher_address[$i];
                    $establisher->ph_number    = $request->old_establisher_ph_number[$i];
                    $establisher->email        = $request->old_establisher_email[$i];
                    $establisher->save();
                }
            }
            
        }
        //govern list
        if($request->govern_name!=null){
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
        }else{
            if($request->old_govern_name!=null){
                for($i=0;$i<sizeof($request->old_govern_name);$i++){
                    $govern =SchoolGovern::find($request->old_govern_id[$i]);
                    $govern->name            = $request->old_govern_name[$i];
                    $govern->nrc             = $request->old_govern_nrc[$i];
                    $govern->cpa_papp_no     = $request->old_govern_cpa_papp_no[$i];
                    $govern->education       = $request->old_govern_education[$i];
                    $govern->responsibility  = $request->old_govern_responsibility[$i];
                    $govern->ph_number       = $request->old_govern_ph_number[$i];
                    $govern->email           = $request->old_govern_email[$i];
                    $govern->save();
                }
            }
            
        }
        //member list
        if($request->member_name!=null){
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
        }else{
            if($request->old_member_name!=null){
                for($i=0;$i<sizeof($request->old_member_name);$i++){
                    $member = SchoolMember::find($request->old_member_id[$i]);
                    $member->name            = $request->old_member_name[$i];
                    $member->nrc             = $request->old_member_nrc[$i];
                    $member->cpa_papp_no     = $request->old_member_cpa_papp_no[$i];
                    $member->education       = $request->old_member_education[$i];
                    $member->responsibility  = $request->old_member_responsibility[$i];
                    $member->ph_number       = $request->old_member_ph_number[$i];
                    $member->email           = $request->old_member_email[$i];
                    $member->save();
                }
            }
            
        }
        //teacher list
        if($request->teacher_name!=null){
            $teacher_reg_copy=implode(',', $teacher_reg_copy);
            $new_teacher_reg_copy= explode(',',$teacher_reg_copy);
            for($i=0;$i<sizeof($request->teacher_name);$i++){
                $teacher = new SchoolTeacher();
                $teacher->name             = $request->teacher_name[$i];
                $teacher->nrc              = $request->teacher_nrc[$i];
                $teacher->registration_no  = $request->teacher_registration_no[$i];
                $teacher->education        = $request->teacher_education[$i];
                $teacher->subject          = $request->teaching_subject[$i];
                $teacher->ph_number        = $request->teacher_ph_number[$i];
                $teacher->email            = $request->teacher_email[$i];
                $teacher->teacher_reg_copy = '/storage/student_info/'.$new_teacher_reg_copy[$i];
                $teacher->school_id        = $school->id;
                $teacher->save();
            }
        }else{
        if ($request->hasfile('old_teacher_reg_copy')) {
            foreach($request->file('old_teacher_reg_copy') as $file)
            {
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/student_info/',$name);
                $new_teacher_reg_copy[] = $name;
            }
                for($i=0;$i<sizeof($request->old_teacher_name);$i++){
                $teacher =SchoolTeacher::find($request->old_teacher_id[$i]);
                $teacher->name             = $request->old_teacher_name[$i];
                $teacher->nrc              = $request->old_teacher_nrc[$i];
                $teacher->registration_no  = $request->old_teacher_registration_no[$i];
                $teacher->education        = $request->old_teacher_education[$i];
                $teacher->subject          = $request->old_teaching_subject[$i];
                $teacher->ph_number        = $request->old_teacher_ph_number[$i];
                $teacher->email            = $request->old_teacher_email[$i];
                $teacher->teacher_reg_copy = '/storage/student_info/'.$new_teacher_reg_copy[$i];
                $teacher->save();
            }
        }else{
                $old_teacher_reg_copy=$request->old_teacher_reg_copy_h;
                if($request->old_teacher_name!=null){
                    for($i=0;$i<sizeof($request->old_teacher_name);$i++){
                        $teacher =SchoolTeacher::find($request->old_teacher_id[$i]);
                        $teacher->name             = $request->old_teacher_name[$i];
                        $teacher->nrc              = $request->old_teacher_nrc[$i];
                        $teacher->registration_no  = $request->old_teacher_registration_no[$i];
                        $teacher->education        = $request->old_teacher_education[$i];
                        $teacher->subject          = $request->old_teaching_subject[$i];
                        $teacher->ph_number        = $request->old_teacher_ph_number[$i];
                        $teacher->email            = $request->old_teacher_email[$i];
                        $teacher->teacher_reg_copy = $old_teacher_reg_copy[$i];
                        $teacher->save();
                    }
                }
                
            }
            
        }
        //branch_school
        if($request->branch_school_address!=null){
            if($branch_school_attach!=null){
                $branch_school_attach=implode(',', $branch_school_attach);
                $new_branch_school_attach= explode(',',$branch_school_attach);
                
            }
            if($branch_sch_letter!=null){
                
                $branch_sch_letter=implode(',', $branch_sch_letter);
                $new_branch_sch_letter= explode(',',$branch_sch_letter);
                
            }
            for($i=0;$i<sizeof($request->branch_school_address);$i++){
                $branch_school = new tbl_branch_school();
                $branch_school->branch_school_address= $request->branch_school_address[$i];
                $branch_school->branch_school_attach = '/storage/student_info/'.$new_branch_school_attach[$i];
                $branch_school->branch_sch_own_type= $request->branch_sch_own_type[$i];
                $branch_school->branch_sch_letter= '/storage/student_info/'.$new_branch_sch_letter[$i];
                $branch_school->school_id       = $school->id;
                $branch_school->save();
            }
        }else{
            if($request->old_branch_school_address!=null){
                if($request->hasfile('old_branch_school_attach') && $request->hasfile('old_branch_sch_letter')) {
                    foreach($request->file('old_branch_school_attach') as $file)
                     {
                         $name  = uniqid().'.'.$file->getClientOriginalExtension();
                         $file->move(public_path().'/storage/student_info/',$name);
                         $new_branch_school_attach[] = $name;
                     }
                     foreach($request->file('old_branch_sch_letter') as $file)
                     {
                         $name  = uniqid().'.'.$file->getClientOriginalExtension();
                         $file->move(public_path().'/storage/student_info/',$name);
                         $new_branch_sch_letter[] = $name;
                     }
                     for($i=0;$i<sizeof($request->old_branch_school_address);$i++){
                        $branch_school =tbl_branch_school::find($request->old_branch_school_id[$i]);
                        $branch_school->branch_school_address= $request->old_branch_school_address[$i];
                        $branch_school->branch_school_attach = '/storage/student_info/'.$new_branch_school_attach[$i];
                        $branch_school->branch_sch_own_type= $request->old_branch_sch_own_type[$i];
                        $branch_school->branch_sch_letter= '/storage/student_info/'.$new_branch_sch_letter[$i];
                        $branch_school->save();
                    }
                }else if($request->hasfile('old_branch_school_attach') && $request->old_branch_sch_letter_h){
                    foreach($request->file('old_branch_school_attach') as $file)
                     {
                         $name  = uniqid().'.'.$file->getClientOriginalExtension();
                         $file->move(public_path().'/storage/student_info/',$name);
                         $new_branch_school_attach[] = $name;
                     }
                     $old_branch_sch_letter=$request->old_branch_sch_letter_h;
                     for($i=0;$i<sizeof($request->old_branch_school_address);$i++){
                        $branch_school =tbl_branch_school::find($request->old_branch_school_id[$i]);
                        $branch_school->branch_school_address= $request->old_branch_school_address[$i];
                        $branch_school->branch_school_attach = '/storage/student_info/'.$new_branch_school_attach[$i];
                        $branch_school->branch_sch_own_type= $request->old_branch_sch_own_type[$i];
                        $branch_school->branch_sch_letter= $old_branch_sch_letter[$i];
                        $branch_school->save();
                    }
                }else if ($request->hasfile('old_branch_sch_letter') && $request->old_branch_school_attach_h) {
                    foreach($request->file('old_branch_sch_letter') as $file)
                     {
                         $name  = uniqid().'.'.$file->getClientOriginalExtension();
                         $file->move(public_path().'/storage/student_info/',$name);
                         $new_branch_sch_letter[] = $name;
                     }
                     $old_branch_school_attach=$request->old_branch_school_attach_h;
                     for($i=0;$i<sizeof($new_branch_sch_letter);$i++){
                        $branch_school =tbl_branch_school::find($request->old_branch_school_id[$i]);
                        $branch_school->branch_school_address= $request->old_branch_school_address[$i];
                        $branch_school->branch_school_attach = $old_branch_school_attach[$i];
                        $branch_school->branch_sch_own_type= $request->old_branch_sch_own_type[$i];
                        $branch_school->branch_sch_letter= '/storage/student_info/'.$new_branch_sch_letter[$i];
                        $branch_school->save();
                    }
                }
                else{
                    $old_branch_school_attach=$request->old_branch_school_attach_h;
                    $old_branch_sch_letter=$request->old_branch_sch_letter_h;
                    if($request->old_branch_school_address!=null){
                        for($i=0;$i<sizeof($request->old_branch_school_address);$i++){
                            $branch_school =tbl_branch_school::find($request->old_branch_school_id[$i]);
                            $branch_school->branch_school_address= $request->old_branch_school_address[$i];
                            $branch_school->branch_school_attach = $old_branch_school_attach[$i];
                            $branch_school->branch_sch_own_type= $request->old_branch_sch_own_type[$i];
                            $branch_school->branch_sch_letter= $old_branch_sch_letter[$i];
                            $branch_school->save();
                        }
                    }
                    
                } 
            }
            
        }
        
        //bulding_type
        if($request->bulding_type!=null){
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
        }else{
            if ($request->hasfile('old_school_building_attach')) {
                foreach($request->file('old_school_building_attach') as $file)
                 {
                     $name  = uniqid().'.'.$file->getClientOriginalExtension();
                     $file->move(public_path().'/storage/student_info/',$name);
                     $new_school_building_attach[] = $name;
                 }
                 for($i=0;$i<sizeof($request->old_bulding_type);$i++){
                    $bulding_type =tbl_bulding_type::find($request->old_bulding_id[$i]);
                    $bulding_type->bulding_type= $request->old_bulding_type[$i];
                    $bulding_type->building_measurement = $request->old_building_measurement[$i];
                    $bulding_type->floor_numbers= $request->old_floor_numbers[$i];
                    $bulding_type->school_building_attach= '/storage/student_info/'.$new_school_building_attach[$i];
                    $bulding_type->save();
                }
                
            }else{
                $old_school_building_attach=$request->old_school_building_attach_h;
                if($request->old_bulding_type!=null){
                    for($i=0;$i<sizeof($request->old_bulding_type);$i++){
                        $bulding_type =tbl_bulding_type::find($request->old_bulding_id[$i]);
                        $bulding_type->bulding_type= $request->old_bulding_type[$i];
                        $bulding_type->building_measurement = $request->old_building_measurement[$i];
                        $bulding_type->floor_numbers= $request->old_floor_numbers[$i];
                        $bulding_type->school_building_attach= $old_school_building_attach[$i];
                        $bulding_type->save();
                    }
                }
                
            } 
            
        }
        //classroom_number
        if($request->classroom_number!=null){
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
        }else{
            if ($request->hasfile('old_classroom_attach')) {
                foreach($request->file('old_classroom_attach') as $file)
                 {
                     $name  = uniqid().'.'.$file->getClientOriginalExtension();
                     $file->move(public_path().'/storage/student_info/',$name);
                     $new_classroom_attach[] = $name;
                 }
                 for($i=0;$i<sizeof($request->old_classroom_number);$i++){
                    $classroom_number =tbl_classroom::find($request->old_classroom_id[$i]);
                    $classroom_number->classroom_number= $request->old_classroom_number[$i];
                    $classroom_number->classroom_measurement = $request->old_classroom_measurement[$i];
                    $classroom_number->student_num_limit= $request->old_student_num_limit[$i];
                    $classroom_number->air_con= $request->old_air_con[$i];
                    $classroom_number->classroom_attach= '/storage/student_info/'.$new_classroom_attach[$i];
                    $classroom_number->save();
                }
                
            }else{
                $old_classroom_attach=$request->old_classroom_attach_h;
                if($request->old_classroom_number!=null){
                    for($i=0;$i<sizeof($request->old_classroom_number);$i++){
                        $classroom_number =tbl_classroom::find($request->old_classroom_id[$i]);
                        $classroom_number->classroom_number= $request->old_classroom_number[$i];
                        $classroom_number->classroom_measurement = $request->old_classroom_measurement[$i];
                        $classroom_number->student_num_limit= $request->old_student_num_limit[$i];
                        $classroom_number->air_con= $request->old_air_con[$i];
                        $classroom_number->classroom_attach= $old_classroom_attach[$i];
                        $classroom_number->save();
                    }
                }
                
            } 
            
        }
        //toilet_type
        if($request->toilet_type!=null){
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
        }else{
            if ($request->hasfile('old_toilet_attach')) {
                foreach($request->file('old_toilet_attach') as $file)
                 {
                     $name  = uniqid().'.'.$file->getClientOriginalExtension();
                     $file->move(public_path().'/storage/student_info/',$name);
                     $new_toilet_attach[] = $name;
                 }
                 for($i=0;$i<sizeof($request->old_toilet_type);$i++){
                    $toilet_type =tbl_toilet_type::find($request->old_toilet_id[$i]);
                    $toilet_type->toilet_type= $request->old_toilet_type[$i];
                    $toilet_type->toilet_number = $request->old_toilet_number[$i];
                    $toilet_type->toilet_attach= '/storage/student_info/'.$new_toilet_attach[$i];
                    $toilet_type->save();
                }
            }else{
                $old_toilet_attach=$request->old_toilet_attach_h;
                if($request->old_toilet_type!=null){
                    for($i=0;$i<sizeof($request->old_toilet_type);$i++){
                        $toilet_type =tbl_toilet_type::find($request->old_toilet_id[$i]);
                        $toilet_type->toilet_type= $request->old_toilet_type[$i];
                        $toilet_type->toilet_number = $request->old_toilet_number[$i];
                        $toilet_type->toilet_attach= $old_toilet_attach[$i];
                        $toilet_type->save();
                    }
                }
                
            } 
            
        }
        //manage_room_numbers
        if($request->manage_room_numbers!=null){
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
        }else{
            if ($request->hasfile('old_manage_room_attach')) {
                foreach($request->file('old_manage_room_attach') as $file)
                 {
                     $name  = uniqid().'.'.$file->getClientOriginalExtension();
                     $file->move(public_path().'/storage/student_info/',$name);
                     $new_manage_room_attach[] = $name;
                 }
                for($i=0;$i<sizeof($request->old_manage_room_numbers);$i++){
                    $manage_room_numbers =tbl_manage_room_numbers::find($request->old_manage_room_id[$i]);
                    $manage_room_numbers->manage_room_numbers= $request->old_manage_room_numbers[$i];
                    $manage_room_numbers->manage_room_measurement = $request->old_manage_room_measurement[$i];
                    $manage_room_numbers->manage_room_attach= '/storage/student_info/'.$new_manage_room_attach[$i];
                    $manage_room_numbers->save();
                }
            }else{
                $old_manage_room_attach=$request->old_manage_room_attach_h;
                if($request->old_manage_room_numbers!=null){
                    for($i=0;$i<sizeof($request->old_manage_room_numbers);$i++){
                        $manage_room_numbers =tbl_manage_room_numbers::find($request->old_manage_room_id[$i]);
                        $manage_room_numbers->manage_room_numbers= $request->old_manage_room_numbers[$i];
                        $manage_room_numbers->manage_room_measurement = $request->old_manage_room_measurement[$i];
                        $manage_room_numbers->manage_room_attach= $old_manage_room_attach[$i];
                        $manage_room_numbers->save();
                    }
                }
                
            } 
            
        }
        return response()->json([
            'message' => 'You have updated successfully.'
        ],200);
    }
    
}

