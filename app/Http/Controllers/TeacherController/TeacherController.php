<?php

namespace App\Http\Controllers\TeacherController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TeacherRegister;
use App\StudentInfo;
use App\EducationHistroy;
use App\Invoice;
use App\teacher_renew;
use Hash;
use DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;    
use Carbon\Carbon;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = TeacherRegister::orderBy('created_at','desc')->get();
        $count_invoice_no=DB::table('teacher_registers')->select(DB::raw('COUNT(invoice_no) as count_invoice_no'))->get();
        return  response()->json([
            'data' => $teacher,
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
        // profile photo
        if ($request->hasfile('profile_photo')) {
            $file = $request->file('profile_photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $image = '/storage/teacher_info/'.$name;
        }
        // nrc front image
        if ($request->hasfile('nrc_front')) {
            $file = $request->file('nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $nrc_front = '/storage/teacher_info/'.$name;
        }
        // nrc back image
        if ($request->hasfile('nrc_back')) {
            $file = $request->file('nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $nrc_back = '/storage/teacher_info/'.$name;
        }
        if ($request->hasfile('recommend_letter')) {
            $file = $request->file('recommend_letter');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $recommend_letter = '/storage/teacher_info/'.$name;
        }else{
            $recommend_letter=null;
        }
        if ($request->hasfile('degrees_certificates')) {
            foreach($request->file('degrees_certificates') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/teacher_info/',$name);
                 $degrees_certificates[] = $name;
             }
            
        }else{
            $degrees_certificates=null;
        }
        $teacher = new TeacherRegister();
        $teacher->name_mm = $request->name_mm;
        $teacher->name_eng = $request->name_eng;
        $teacher->father_name_mm = $request->father_name_mm;
        $teacher->father_name_eng = $request->father_name_eng;
        $teacher->reg_date = date('Y-m-d');
        $teacher->phone = $request->phone;
        $teacher->email = $request->email;
        $teacher->password = Hash::make($request->password);
        $teacher->nrc_state_region = $request->nrc_state_region;
        $teacher->nrc_township = $request->nrc_township;
        $teacher->nrc_citizen = $request->nrc_citizen;
        $teacher->nrc_number = $request->nrc_number;
        $teacher->nrc_front = $nrc_front;
        $teacher->nrc_back = $nrc_back;
        $teacher->gov_employee = $request->gov_employee;
        $teacher->exp_desc = $request->exp_desc;
        $teacher->image = $image;
        
        $certificates = ""; $diplomas = "";
        foreach($request->certificates as $c){
            $certificates = $certificates . $c . ',';

        }
        foreach($request->diplomas as $d){
            $diplomas = $diplomas . $d . ',';

        }
        $teacher->certificates = rtrim($certificates, ',');
        $teacher->diplomas = rtrim($diplomas, ',');
        $teacher->race = $request->race;
        $teacher->religion = $request->religion;
        $teacher->date_of_birth = $request->date_of_birth;
        $teacher->address = $request->address;
        $teacher->current_address = $request->current_address;
        $teacher->recommend_letter = $recommend_letter;
        $teacher->position = $request->position;
        $teacher->department = $request->department;
        $teacher->organization = $request->organization;
        $teacher->school_id = $request->selected_school_id;
        $teacher->school_type = $request->school_type;
        $teacher->school_name = $request->school_name;
        $teacher->save();
        
        //Student Info
            $std_info = new StudentInfo();
            $std_info->teacher_id = $teacher->id;
            $std_info->email = $request->email;
            $std_info->password = Hash::make($request->password);
            $std_info->save();
        if($degrees_certificates!=null){
            $degrees_certificates=implode(',', $degrees_certificates);
            $new_degrees_certificates= explode(',',$degrees_certificates);
            for($i=0;$i < sizeof($request->degrees);$i++){
           
                $education_histroy  =   new EducationHistroy();
                $education_histroy->student_info_id = $std_info->id;
                $education_histroy->university_name = $request->degrees[$i];
                $education_histroy->certificate     ='/storage/teacher_info/'.$new_degrees_certificates[$i];
                $education_histroy->teacher_id      = $teacher->id;
                $education_histroy->save();
            }
        }
        
        

        //invoice
        // $invNo = str_pad($std_info->id, 20, "0", STR_PAD_LEFT);

        // $invoice = new Invoice();
        // $invoice->student_info_id = $std_info->id;
        // $invoice->invoiceNo       = $invNo;
        // $invoice->status          = 0;
        // $invoice->save();

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
        $teacher = TeacherRegister::with('student_info','teacher_renew')->where('id',$id)->get();
        return  response()->json([
            'data' => $teacher
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
        if ($request->hasfile('profile_photo')) {
            $file = $request->file('profile_photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $image = '/storage/teacher_info/'.$name;
        }
        // nrc front image
        if ($request->hasfile('nrc_front')) {
            $file = $request->file('nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $nrc_front = '/storage/teacher_info/'.$name;
        }else{
            $nrc_front =$request->nrc_front;
        }
        
        // nrc back image
        if ($request->hasfile('nrc_back')) {
            $file = $request->file('nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $nrc_back = '/storage/teacher_info/'.$name;
        }else{
            $nrc_back =$request->nrc_back;
        }
        if ($request->hasfile('recommend_letter')) {
            $file = $request->file('recommend_letter');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $recommend_letter = '/storage/teacher_info/'.$name;
        }else{
            $recommend_letter=$request->recommend_letter;
        }
        if ($request->hasfile('degrees_certificates')) {
            foreach($request->file('degrees_certificates') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/teacher_info/',$name);
                 $degrees_certificates[] = $name;
             }
            
        }else{
            $degrees_certificates='null';
        }
        
        $teacher = TeacherRegister::find($id);
        $teacher->phone = $request->phone_number;
        $teacher->nrc_front = $nrc_front;
        $teacher->nrc_back = $nrc_back;
        $teacher->gov_employee = $request->gov_employee;
        $teacher->exp_desc = $request->exp_desc;
        $teacher->image = $image;
        
        $teacher->certificates = json_encode($request->certificates);
        $teacher->diplomas = json_encode($request->diplomas);
        $teacher->address = $request->address;
        $teacher->recommend_letter = $recommend_letter;
        $teacher->position = $request->position;
        $teacher->department = $request->department;
        $teacher->organization = $request->organization;
        $teacher->school_id = $request->selected_school_id;
        $teacher->school_type = $request->school_type;
        $teacher->school_name = $request->school_name;
        $teacher->approve_reject_status = 0;
        $teacher->reason = $request->reason;
        // $teacher->initial_status = 0;
        
        // $teacher->payment_method = null;
        // $teacher->payment_date = null;
        $teacher->save();

       
        if($request->degrees!=null){
            $degrees_certificates=implode(',', $degrees_certificates);
            $new_degrees_certificates= explode(',',$degrees_certificates);
            for($i=0;$i < sizeof($request->degrees);$i++){
           
                $education_histroy  =   new EducationHistroy();
                $education_histroy->student_info_id = $request->student_info_id;
                $education_histroy->university_name = $request->degrees[$i];
                $education_histroy->certificate     ='/storage/teacher_info/'.$new_degrees_certificates[$i];
                $education_histroy->teacher_id       = $teacher->id;
                $education_histroy->save();
            }
        }else{
            
            if ($request->hasfile('old_degrees_certificates')) {
                foreach($request->file('old_degrees_certificates') as $file)
                 {
                     $name  = uniqid().'.'.$file->getClientOriginalExtension();
                     $file->move(public_path().'/storage/teacher_info/',$name);
                     $old_degrees_certificates[] = $name;
                 }
                 for($i=0;$i <sizeof($request->old_degrees_id);$i++){
                    $education_histroy  =EducationHistroy::find($request->old_degrees_id[$i]);
                    $education_histroy->university_name = $request->old_degrees[$i];
                    $education_histroy->certificate     ='/storage/teacher_info/'.$old_degrees_certificates[$i];
                    $education_histroy->save();
                }
            }else{
                $old_degrees_certificates=$request->old_degrees_certificates_h;
                
                for($i=0;$i <sizeof($request->old_degrees_id);$i++){
                    $education_histroy  =EducationHistroy::find($request->old_degrees_id[$i]);
                    $education_histroy->university_name = $request->old_degrees[$i];
                    $education_histroy->certificate     =$old_degrees_certificates[$i];
                    $education_histroy->save();
                }
            }
            
        }
        $std_info = StudentInfo::find($request->student_info_id);
        $std_info->payment_method = null;
        $std_info->approve_reject_status = 0;
        $std_info->save();
        return response()->json([
            'message' => 'You have updated successfully.'
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

    public function approve_teacher_register(Request $request)
    {
        $std_info = StudentInfo::find($request->student_info_id);
        $std_info->approve_reject_status = $request->status;
        $std_info->save();
        $teacher = TeacherRegister::find($request->id);
        $teacher->approve_reject_status = $request->status;
        $teacher->reason = $request->reason;
        $teacher->save();
        return response()->json([
            'message' => 'You have approved this user.'
        ],200);
    }

    public function FilterTeacher(Request $request)
    {
        
        $teacher = TeacherRegister::where('approve_reject_status',$request->status)
        ->where('initial_status',$request->initial_status)
        ->orderBy('created_at','desc');
        if($request->name!=""){
            $teacher=$teacher->where('name_mm', 'like', '%' . $request->name. '%')
                        ->orWhere('name_eng', 'like', '%' . $request->name. '%');
        }
        if($request->nrc!=""){
            $teacher=$teacher->where(DB::raw('CONCAT(nrc_state_region, "/", nrc_township,"(",nrc_citizen,")",nrc_number)'),$request->nrc);
        }
        $teachers=$teacher->get();
        return DataTables::of($teachers)
                ->addColumn('action', function ($infos) {
                    return "<div class='btn-group'>
                                    <a href='teacher_edit?id=$infos->id' class='btn btn-primary btn-xs' onclick='showMentorStudent($infos->id)'>
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
                ->addColumn('exp_date', function ($infos){
                    if($infos->payment_date	 ==""){
                        return "";
                    }else{
                        $date = Carbon::createFromFormat('Y-m-d H:i:s', $infos->payment_date);
                        return $date->format('d-m-Y').' to 31-12-'.date('Y');
                    }
                })
                ->addColumn('card', function ($infos) {
                    $btn='';
                    if($infos->payment_method != ""){
                        $btn = "<div class='btn-group'>
                                    <a href='teacher_card?id=$infos->id' class='btn btn-primary btn-xs'>
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
                    if($infos->payment_date	 == ""){
                        return "";
                    }else{
                        $date = Carbon::createFromFormat('Y-m-d H:i:s', $infos->payment_date);
                        return $date->format('d-m-Y');
                    }
                })
                // ->addColumn('renew_payment_method', function ($infos){
                //     if($infos->renew_payment_date	 == ""){
                //         return "Payment Incomplete";
                       
                //     }else{
                //         return "Payment Complete";
                       
                //     }
                // })
                // ->addColumn('renew_payment_date', function ($infos){
                //     if($infos->renew_payment_date	 == ""){
                //         return "";
                //     }else if( $infos->renew_payment_date	 != ""){
                //         return "";
                //     }else{
                //         $date = Carbon::createFromFormat('Y-m-d H:i:s', $infos->renew_payment_date);
                //         return $monthName = $date->format('d-m-Y').' to 31-12-'.date('Y');
                //     }
                // })
                ->rawColumns(['card','action'])
                ->make(true);
        // return  response()->json([
        //     'data' => $teacher
        // ],200);
    }
    public function teacherStatus($id)
    {
        $data = StudentInfo::where('id',$id)->with('teacher','teacher_renew')->get();
        return response()->json($data,200);
    }

    public function approveTeacher(Request $request)
    { 
        $teacher = TeacherRegister::find($request->id);
        $teacher->payment_method = 'CASH';
        $teacher->invoice_no = $request->invoice_no;
        $teacher->payment_date = $request->current_date;
        $teacher->save();
        return response()->json([
            'data' => $teacher,
        ],200);
    }

    public function check_payment($id)
    {
        $data = TeacherRegister::with('teacher_renew')->where('id',$id)->get();
        return response()->json($data,200);
    }
    public function getEducationHistory(Request $request)
    {
        if($request->school_id){
            $data = EducationHistroy::where('school_id',$request->school_id)->get();
            return response()->json([
                'data' => $data
            ],200);
        }else if($request->teacher_id){
            $data = EducationHistroy::where('teacher_id',$request->teacher_id)->get();
            return response()->json([
                'data' => $data
            ],200);
        }else{
            $data = EducationHistroy::where('renewteacher_id',$request->renewteacher_id)->get();
            return response()->json([
                'data' => $data
            ],200);
        }
        
    }
    public function getTeacher($invoice_no)
    {
        $data = TeacherRegister::where('invoice_no',$invoice_no)->get();
        return response()->json([
            'data' => $data
        ],200);
    }
    public function cessation_teacher_register(Request $request)
    {
        $std_info = StudentInfo::find($request->student_info_id);
        $std_info->approve_reject_status = $request->status;
        $std_info->save();
        $teacher = TeacherRegister::find($request->id);
        $teacher->approve_reject_status = $request->status;
        $teacher->cessation_reason = $request->cessation_reason;
        $teacher->initial_status = $request->initial_status;
        $teacher->save();
        return response()->json([
            'message' => 'You have approved this user.'
        ],200);
    }
    public function renewTeacher(Request $request)
    {
        // profile photo
        if ($request->hasfile('profile_photo')) {
            $file = $request->file('profile_photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $image = '/storage/teacher_info/'.$name;
        }
        // nrc front image
        if ($request->hasfile('nrc_front')) {
            $file = $request->file('nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $nrc_front = '/storage/teacher_info/'.$name;
        }else{
            $nrc_front =null;
        }
        // nrc back image
        if ($request->hasfile('nrc_back')) {
            $file = $request->file('nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $nrc_back = '/storage/teacher_info/'.$name;
        }else{
            $nrc_back =null;
        }
        
        if ($request->hasfile('degrees_certificates')) {
            foreach($request->file('degrees_certificates') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/teacher_info/',$name);
                 $degrees_certificates[] = $name;
             }
            
        }else{
            $degrees_certificates=null;
        }
        $teacher = new teacher_renew();
        $teacher->name_mm = $request->name_mm;
        $teacher->name_eng = $request->name_eng;
        $teacher->father_name_mm = $request->father_name_mm;
        $teacher->father_name_eng = $request->father_name_eng;
        $teacher->renew_date = date('Y-m-d');
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->nrc_state_region = $request->nrc_state_region;
        $teacher->nrc_township = $request->nrc_township;
        $teacher->nrc_citizen = $request->nrc_citizen;
        $teacher->nrc_number = $request->nrc_number;
        $teacher->nrc_front = $nrc_front;
        $teacher->nrc_back = $nrc_back;
        $teacher->image = $image;
        
        $certificates = ""; $diplomas = "";
        foreach($request->certificates as $c){
            $certificates = $certificates . $c . ',';

        }
        foreach($request->diplomas as $d){
            $diplomas = $diplomas . $d . ',';

        }
        $teacher->certificates = rtrim($certificates, ',');
        $teacher->diplomas = rtrim($diplomas, ',');
        $teacher->current_address = $request->current_address;
        $teacher->school_id = $request->selected_school_id;
        $teacher->school_type = $request->school_type;
        $teacher->school_name = $request->school_name;
        $teacher->regno = $request->regno;
        $teacher->teacher_id  = $request->teacher_id;
        $teacher->student_info_id  = $request->student_info_id;
        $teacher->save();
        
        
        if($degrees_certificates!=null){
            $degrees_certificates=implode(',', $degrees_certificates);
            $new_degrees_certificates= explode(',',$degrees_certificates);
            for($i=0;$i < sizeof($request->degrees);$i++){
           
                $education_histroy  =   new EducationHistroy();
                $education_histroy->student_info_id = $request->student_info_id;
                $education_histroy->university_name = $request->degrees[$i];
                $education_histroy->certificate     ='/storage/teacher_info/'.$new_degrees_certificates[$i];
                $education_histroy->teacher_id      = $request->teacher_id;
                $education_histroy->renewteacher_id      = $teacher->id;
                $education_histroy->save();
            }
        }
        

        return response()->json([
            'message' => 'Success Registration.'
        ],200);
    }
    public function filterRenewTeacher(Request $request)
    {
        
        $teacher = teacher_renew::where('approve_reject_status',$request->status)
        ->where('initial_status',$request->initial_status)
        ->orderBy('created_at','desc');
        if($request->name!=""){
            $teacher=$teacher->where('name_mm', 'like', '%' . $request->name. '%')
                        ->orWhere('name_eng', 'like', '%' . $request->name. '%');
        }
        if($request->nrc!=""){
            $teacher=$teacher->where(DB::raw('CONCAT(nrc_state_region, "/", nrc_township,"(",nrc_citizen,")",nrc_number)'),$request->nrc);
        }
        $teachers=$teacher->get();
        return DataTables::of($teachers)
                ->addColumn('action', function ($infos) {
                    return "<div class='btn-group'>
                                    <a href='renew_teacher_edit?id=$infos->id' class='btn btn-primary btn-xs'>
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
                ->addColumn('exp_date', function ($infos){
                    if($infos->payment_date	 ==""){
                        return "";
                    }else{
                        return '01-01-'.date('Y').' to 31-12-'.date('Y');
                    }
                })
                ->addColumn('card', function ($infos) {
                    $btn='';
                    if($infos->payment_method != ""){
                        $btn = "<div class='btn-group'>
                                    <a href='teacher_card?id=$infos->id' class='btn btn-primary btn-xs'>
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
                    if($infos->payment_date	 == ""){
                        return "";
                    }else{
                        $date = Carbon::createFromFormat('Y-m-d', $infos->payment_date);
                        return $date->format('d-m-Y');
                    }
                })
                ->addColumn('yearly', function ($infos){
                    if($infos->renew_date	 == ""){
                        return "";
                    }else{
                        $date = Carbon::createFromFormat('Y-m-d', $infos->renew_date);
                        return $date->format('Y');
                    }
                })
                ->rawColumns(['card','action'])
                ->make(true);
        
    }
    public function getRenewTeacher($id)
    {
        $teacher = teacher_renew::where('id',$id)->get();
        return  response()->json([
            'data' => $teacher
        ],200);
    }
    public function approveRenewTeacherRegister(Request $request)
    {
        $teacher = teacher_renew::find($request->id);
        $teacher->approve_reject_status = $request->status;
        $teacher->reason = $request->reason;
        $teacher->save();
        return response()->json([
            'message' => 'You have approved this user.'
        ],200);
    }
    public function approveRenewTeacher(Request $request)
    { 
        $teacher = teacher_renew::find($request->id);
        $teacher->payment_method = 'CASH';
        $teacher->payment_date = date('Y-m-d');
        $teacher->save();
        return response()->json([
            'data' => $teacher,
        ],200);
    }
    public function renewTeacherUpdate(Request $request,$id)
    {
        // profile photo
        if ($request->hasfile('profile_photo')) {
            $file = $request->file('profile_photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $image = '/storage/teacher_info/'.$name;
        }
        // nrc front image
        if ($request->hasfile('nrc_front')) {
            $file = $request->file('nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $nrc_front = '/storage/teacher_info/'.$name;
        }else{
            $nrc_front =$request->nrc_front;
        }
        // nrc back image
        if ($request->hasfile('nrc_back')) {
            $file = $request->file('nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $nrc_back = '/storage/teacher_info/'.$name;
        }else{
            $nrc_back =$request->nrc_back;
        }
        
        if ($request->hasfile('degrees_certificates')) {
            foreach($request->file('degrees_certificates') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/teacher_info/',$name);
                 $degrees_certificates[] = $name;
             }
            
        }else{
            $degrees_certificates=null;
        }
        $teacher =teacher_renew::find($id);
        // $teacher->name_mm = $request->name_mm;
        // $teacher->name_eng = $request->name_eng;
        // $teacher->father_name_mm = $request->father_name_mm;
        // $teacher->father_name_eng = $request->father_name_eng;
        $teacher->renew_date = date('Y-m-d');
        // $teacher->email = $request->email;
        // $teacher->phone = $request->phone;
        // $teacher->nrc_state_region = $request->nrc_state_region;
        // $teacher->nrc_township = $request->nrc_township;
        // $teacher->nrc_citizen = $request->nrc_citizen;
        // $teacher->nrc_number = $request->nrc_number;
        $teacher->nrc_front = $nrc_front;
        $teacher->nrc_back = $nrc_back;
        $teacher->image = $image;
        
        $certificates = ""; $diplomas = "";
        foreach($request->certificates as $c){
            $certificates = $certificates . $c . ',';

        }
        foreach($request->diplomas as $d){
            $diplomas = $diplomas . $d . ',';

        }
        $teacher->certificates = rtrim($certificates, ',');
        $teacher->diplomas = rtrim($diplomas, ',');
        $teacher->current_address = $request->current_address;
        $teacher->school_id = $request->selected_school_id;
        $teacher->school_type = $request->school_type;
        $teacher->school_name = $request->school_name;
        $teacher->reason = $request->reason;
        $teacher->approve_reject_status = 0;
        // $teacher->teacher_id  = $request->teacher_id;
        // $teacher->student_info_id  = $request->student_info_id;
        $teacher->save();
        
        
        if($degrees_certificates!=null){
            $degrees_certificates=implode(',', $degrees_certificates);
            $new_degrees_certificates= explode(',',$degrees_certificates);
            for($i=0;$i < sizeof($request->degrees);$i++){
           
                $education_histroy  =   new EducationHistroy();
                $education_histroy->student_info_id = $request->student_info_id;
                $education_histroy->university_name = $request->degrees[$i];
                $education_histroy->certificate     ='/storage/teacher_info/'.$new_degrees_certificates[$i];
                $education_histroy->teacher_id      = $request->teacher_id;
                $education_histroy->renewteacher_id      = $teacher->id;
                $education_histroy->save();
            }
        }else{
            
            if ($request->hasfile('old_renewdegrees_certificates')) {
                foreach($request->file('old_renewdegrees_certificates') as $file)
                 {
                     $name  = uniqid().'.'.$file->getClientOriginalExtension();
                     $file->move(public_path().'/storage/teacher_info/',$name);
                     $old_renewdegrees_certificates[] = $name;
                 }
                 for($i=0;$i <sizeof($request->old_renewdegrees);$i++){
                    $education_histroy  =EducationHistroy::find($request->old_renewdegrees_id[$i]);
                    $education_histroy->university_name = $request->old_renewdegrees[$i];
                    $education_histroy->certificate     ='/storage/teacher_info/'.$old_renewdegrees_certificates[$i];
                    $education_histroy->save();
                }
            }else{
                $old_renewdegrees_certificates=$request->old_renewdegrees_certificates_h;
                if($request->old_renewdegrees!=""){
                    for($i=0;$i <sizeof($request->old_renewdegrees);$i++){
                        $education_histroy  =EducationHistroy::find($request->old_renewdegrees_id[$i]);
                        $education_histroy->university_name = $request->old_renewdegrees[$i];
                        $education_histroy->certificate     =$old_renewdegrees_certificates[$i];
                        $education_histroy->save();
                    }
                }
                
            }
            
        }
        

        return response()->json([
            'message' => 'Updated Successfully.'
        ],200);
    }
    public function cessationRenewTeacherRegister(Request $request)
    {
        $teacher = teacher_renew::find($request->id);
        $teacher->approve_reject_status = $request->status;
        $teacher->cessation_reason = $request->cessation_reason;
        $teacher->initial_status = $request->initial_status;
        $teacher->save();
        return response()->json([
            'message' => 'You have cessation this user.'
        ],200);
    }
}
